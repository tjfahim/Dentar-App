<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\MessageManage;
use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Pusher\Pusher;
use Illuminate\Support\Str;

use App\Traits\PushNotification;
use App\Jobs\SendNotificationQueue;
use App\Models\Patient;
use App\Models\Student;
use Carbon\Carbon;

class MessageManageApi extends Controller
{
    use PushNotification;
    private $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    protected function getUserByType($type, $id)
    {
        return match ($type) {
            'doctor' => \App\Models\Doctor::find($id),
            'patient' => \App\Models\Patient::find($id),
            'student' => \App\Models\Student::find($id),
            default => null,
        };
    }
    public function sendMessage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required',
            'receiver_type' => 'required|in:doctor,patient,student',
            'message' => 'nullable|string',
            'file_url' => 'nullable|file',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        $input = $request->only(['receiver_id', 'message', 'file_url']);
        $input['sender_id'] = Auth::id();
        $input['sender_type'] = Auth::user()->userType; 
        $input['receiver_type'] = $request->receiver_type;
    
        // Check if a conversation exists
        if (empty($request->conversation_id)) {
            $message = MessageManage::where(function ($query) use ($input) {
                $query->where('sender_id', $input['sender_id'])
                      ->where('receiver_id', $input['receiver_id'])
                      ->where('sender_type', $input['sender_type'])
                      ->where('receiver_type', $input['receiver_type']);
            })->orWhere(function ($query) use ($input) {
                $query->where('sender_id', $input['receiver_id'])
                      ->where('receiver_id', $input['sender_id'])
                      ->where('sender_type', $input['receiver_type'])
                      ->where('receiver_type', $input['sender_type']);
            })->first();
    
            if ($message) {
                $input['conversation_id'] = $message->conversation_id;
            }
        } else {
            $input['conversation_id'] = $request->conversation_id;
        }
    
        $fileUrl = null;
        $messageType = 'text';
    
        if ($request->hasFile('file_url')) {
            $file = $request->file('file_url');
    
            if ($file instanceof UploadedFile) {
                $fileToUpload = $this->services->imageUpload($file, 'message_file/');
                $fileUrl = asset('storage/message_file/' . $fileToUpload);
    
                $fileExtension = strtolower(pathinfo($fileToUpload, PATHINFO_EXTENSION));
    
                $messageType = match(true) {
                    in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg']) => 'image',
                    in_array($fileExtension, ['mp4', 'avi', 'mkv', 'mov']) => 'video',
                    in_array($fileExtension, ['mp3', 'wav', 'ogg', 'aac']) => 'voice',
                    in_array($fileExtension, ['pdf', 'doc', 'docx', 'txt', 'zip']) => 'document',
                    default => 'file',
                };
            }
        }
    
        $input['file_url'] = $fileUrl ?? null;
        $input['message'] = $input['message'] ?? null;
    
        // Save message
        $message = MessageManage::create($input);
    
        // Get sender info
        $sender = $this->getUserByType($input['sender_type'], $input['sender_id']);
        $receiver = $this->getUserByType($input['receiver_type'], $input['receiver_id']);
    
        $senderName = $sender->name ?? 'Unknown';
        $receiverName = $receiver->name ?? 'Unknown';
    
        $sender_profile_image = $sender && !empty($sender->image)
            ? asset('storage/' . $sender->image)
            : null;
    
        // Trigger real-time message
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true,
            ]
        );
        
        if($input['sender_id'] < $input['receiver_id']){
            $chanel_name =  "public-user.{$input['sender_id']}.{$input['receiver_id']}";
        }else {
            $chanel_name =  "public-user.{$input['receiver_id']}.{$input['sender_id']}";
        }
        
        
        $carbonDate = Carbon::now()->addHours(6);
        $formattedTime = $carbonDate->format('Y-m-d h:i A');
    
        $pusher->trigger($chanel_name , 'new-message', [
            'sender_id' => $input['sender_id'],
            'sender_type' => $input['sender_type'],
            'sender_name' => $senderName,
            'sender_profile_image' => $sender_profile_image,
            'receiver_id' => $input['receiver_id'],
            'receiver_type' => $input['receiver_type'],
            'receiver_name' => $receiverName,
            'message' => $input['message'],
            'file_url' => $input['file_url'],
            'id' => $message->id,
            'message_type' => $messageType,
            'timestamp' => now(),
            'created_at' => $formattedTime
        ]);


        $rec_type =  $input['receiver_type'];
        $rec_id =  $input['receiver_id'];

        if($rec_type == 'doctor'){
            $rec_user = Doctor::where('id', $rec_id)->first();
        }
        if($rec_type == 'student'){
            $rec_user = Student::where('id', $rec_id)->first();
        }
        if($rec_type == 'patient'){
            $rec_user = Patient::where('id', $rec_id)->first();
        }

        


        $title =  Auth::user()->name;
        $body =  'You have a new message';
        $data = [
            'preload' => "message"
        ];

       
        SendNotificationQueue::dispatch($title, $body, $rec_user, $data)->onConnection('database');
      
        
        
    
        return response()->json([
            'message' => 'Message sent successfully',
            'data' => array_merge($message->toArray(), [
                'message_type' => $messageType,
                'sender_name' => $senderName,
                'receiver_name' => $receiverName,
            ]),
        ], 201);
    }
    public function conversationList()
    {
        $user = Auth::user();
    
        $messages = MessageManage::where(function ($query) use ($user) {
            $query->where(function ($q) use ($user) {
                $q->where('sender_id', $user->id)
                  ->where('sender_type', $user->userType);
            })->orWhere(function ($q) use ($user) {
                $q->where('receiver_id', $user->id)
                  ->where('receiver_type', $user->userType);
            });
        })
        ->orderBy('created_at', 'desc')
        ->get();
    
        $formattedMessages = [];
    
        foreach ($messages as $message) {
            $isSender = ($message->sender_id == $user->id && $message->sender_type == $user->userType);
    
            $otherUserId = $isSender ? $message->receiver_id : $message->sender_id;
            $otherUserType = $isSender ? $message->receiver_type : $message->sender_type;
    
            $otherUser = $this->getUserByType($otherUserType, $otherUserId);
    
            if (!$otherUser) {
                continue;
            }
    
            $isActive = 0;
            if ($otherUser->updated_at && now()->diffInMinutes($otherUser->updated_at) < 5) {
                $isActive = 1;
            }
    
            $imageUrl = $otherUser->image ? asset('storage/' . $otherUser->image) : null;
    
            $uniqueKey = $otherUserType . '_' . $otherUserId;
    
            if (!isset($formattedMessages[$uniqueKey])) {
                $lastMessage = $message->message;
    
                if (!empty($message->file_url)) {
                    $fileExtension = pathinfo($message->file_url, PATHINFO_EXTENSION);
    
                    $lastMessage = match (strtolower($fileExtension)) {
                        'jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg' => 'Image',
                        'mp4', 'avi', 'mkv', 'mov' => 'Video',
                        'pdf', 'doc', 'docx', 'txt', 'zip' => 'Document',
                        default => 'File',
                    };
                }
    
                $formattedMessages[$uniqueKey] = [
                    'id' => $otherUser->id,
                    'type' => $otherUserType,
                    'name' => $otherUser->name,
                    'email' => $otherUser->email ?? null,
                    'image' => $imageUrl,
                    'last_message' => $lastMessage,
                    'active_status' => $isActive,
                ];
            }
        }
    
        return response()->json([
            'message' => 'Message list retrieved successfully',
            'data' => array_values($formattedMessages),
        ]);
    }
    public function searchConversationList(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
    
        $searchQuery = $request->query('search', '');
    
        $messages = MessageManage::where(function ($query) use ($user) {
            $query->where(function ($q) use ($user) {
                $q->where('sender_id', $user->id)->where('sender_type', $user->userType);
            })->orWhere(function ($q) use ($user) {
                $q->where('receiver_id', $user->id)->where('receiver_type', $user->userType);
            });
        })
        ->orderBy('created_at', 'desc')
        ->get();
    
        $formattedMessages = [];
    
        foreach ($messages as $message) {
            $isSender = ($message->sender_id == $user->id && $message->sender_type == $user->userType);
    
            $otherUserId = $isSender ? $message->receiver_id : $message->sender_id;
            $otherUserType = $isSender ? $message->receiver_type : $message->sender_type;
    
            $otherUser = $this->getUserByType($otherUserType, $otherUserId);
    
            if (!$otherUser) {
                continue;
            }
    
            // Apply seach filter
            if (
                !Str::contains(Str::lower($otherUser->name), Str::lower($searchQuery)) &&
                !Str::contains(Str::lower($otherUser->email ?? ''), Str::lower($searchQuery))
            ) {
                continue;
            }
    
            $uniqueKey = $otherUserType . '_' . $otherUserId;
    
            if (!isset($formattedMessages[$uniqueKey])) {
                $lastMessage = $message->message;
    
                if (!empty($message->file_url)) {
                    $fileExtension = pathinfo($message->file_url, PATHINFO_EXTENSION);
                    $lastMessage = match (strtolower($fileExtension)) {
                        'jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg' => 'Image',
                        'mp4', 'avi', 'mkv', 'mov' => 'Video',
                        'pdf', 'doc', 'docx', 'txt', 'zip' => 'Document',
                        default => 'File',
                    };
                }
    
                $formattedMessages[$uniqueKey] = [
                    'id' => $otherUserId,
                    'type' => $otherUserType,
                    'name' => $otherUser->name,
                    'email' => $otherUser->email ?? null,
                    'image' => $otherUser->image ? asset('storage/' . $otherUser->image) : null,
                    'last_message' => $lastMessage,
                    'active_status' => $otherUser->updated_at && now()->diffInMinutes($otherUser->updated_at) < 5 ? 1 : 0,
                ];
            }
        }
    
        return response()->json([
            'message' => 'Filtered conversations retrieved successfully',
            'data' => array_values($formattedMessages),
        ]);
    }

    public function getMessages(Request $request)
    {
        $authUser = Auth::user();
        $selfId = $authUser->id;
        $selfType = $authUser->userType;
    
        $userId = $request->query('user_id');
        $userType = $request->query('user_type');
    
        if (!$userId || !$userType) {
            return response()->json(['message' => 'Missing user_id or user_type'], 400);
        }
        
       
    
        // $messages = MessageManage::where(function ($query) use ($selfId, $selfType, $userId, $userType) {
        //     $query->where('sender_id', $selfId)
        //           ->where('sender_type', $selfType)
        //           ->where('receiver_id', $userId)
        //           ->where('receiver_type', $userType);
        // })
        // ->orWhere(function ($query) use ($selfId, $selfType, $userId, $userType) {
        //     $query->where('sender_id', $userId)
        //           ->where('sender_type', $userType)
        //           ->where('receiver_id', $selfId)
        //           ->where('receiver_type', $selfType);
        // })
        // ->orderBy('id', 'ASC')
        // ->get();
        
        


        
$messages = MessageManage::where(function ($query) use ($selfId, $selfType, $userId, $userType) {
        $query->where('sender_id', $selfId)
              ->where('sender_type', $selfType)
              ->where('receiver_id', $userId)
              ->where('receiver_type', $userType);
    })
    ->orWhere(function ($query) use ($selfId, $selfType, $userId, $userType) {
        $query->where('sender_id', $userId)
              ->where('sender_type', $userType)
              ->where('receiver_id', $selfId)
              ->where('receiver_type', $selfType);
    })
    ->orderBy('id', 'ASC')
    ->get()
    ->map(function ($item) {
        // Convert to Asia/Dhaka and format as ISO 8601 (with timezone offset)
        $item->created_at_local = $item->created_at
            ->timezone('Asia/Dhaka')
            ->toIso8601String();  // Example: 2025-05-08T09:47:29+06:00
        $item->updated_at_local = $item->updated_at
            ->timezone('Asia/Dhaka')
            ->toIso8601String(); 
        return $item;
    });


        
//         return $messages;
    
        $messages = $messages->map(function ($message) {
            $sender = $this->getUserByType($message->sender_type, $message->sender_id);
            $receiver = $this->getUserByType($message->receiver_type, $message->receiver_id);
    
            $message->sender_name = $sender?->name;
            $message->sender_profile_image = $sender && !empty($sender->image)
                ? asset('storage/' . $sender->image)
                : null;
    
            $message->receiver_name = $receiver?->name;
    
            if ($message->status === 'deleted') {
                $message->message = "This message is deleted";
                $message->file_url = null;
                $message->message_type = 'deleted';
            } else {
                if (empty($message->file_url)) {
                    $message->file_url = null;
                    $message->message_type = 'text';
                } else {
                    $ext = strtolower(pathinfo($message->file_url, PATHINFO_EXTENSION));
                    $message->message_type = match ($ext) {
                        'jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg' => 'image',
                        'mp4', 'avi', 'mkv', 'mov' => 'video',
                        'mp3', 'wav', 'ogg', 'aac' => 'voice',
                        'pdf', 'doc', 'docx', 'txt', 'zip' => 'document',
                        default => 'file',
                    };
                }
            }
    
            // $message->created_at = \Carbon\Carbon::parse($message->created_at)->timezone('Asia/Dhaka')->format('Y-m-d H:i:s');
            // $message->updated_at = \Carbon\Carbon::parse($message->updated_at)->timezone('Asia/Dhaka')->format('Y-m-d H:i:s');
            return $message;
        });
        
        // foreach ($messages as $item) {
          
        //     $createdAtLocal = Carbon::parse($item->created_at_local);
        //     $updatedAtLocal = Carbon::parse($item->updated_at_local);
        
            
        //     $item->created_at = $createdAtLocal->timezone('UTC') 
        //                                       ->format('Y-m-d\TH:i:s.u\Z'); 
        //     $item->updated_at = $updatedAtLocal->timezone('UTC') ->format('Y-m-d\TH:i:s.u\Z');
        
        //     // Optionally, if you want to keep the 'created_at_local' as is, you can add it as well
        //     // $item->created_at_local = $createdAtLocal->format('Y-m-d\TH:i:s.uP'); // if you want it back in local format with timezone
        // }
        
        foreach ($messages as $item) {
            
            $carbonDate = Carbon::parse($item->created_at);
            $carbonDate->addHours(6);
            $updatedUtcTime = $carbonDate->format('Y-m-d\TH:i:s.u\Z');
   
            
            $item->local_create_time = $updatedUtcTime;
            $item->created_at = $item->local_create_time;
            
            // update_at
            
            $carbonDate = Carbon::parse($item->updated_at);
            $carbonDate->addHours(6);
            $updatedUtcTime = $carbonDate->format('Y-m-d\TH:i:s.u\Z');
   
            
            $item->local_create_time = $updatedUtcTime;
            $item->updated_at = $item->local_create_time;

   
}
        
        // foreach ($messages as $item) {
        //     $createdAtLocal = Carbon::parse($item->created_at_local);
        //     $updatedAtLocal = Carbon::parse($item->updated_at_local);
        
        //     // Keep original local time with timezone offset
        //     $item->created_at = $createdAtLocal->format('Y-m-d\TH:i:s.uP');
        //     $item->updated_at = $updatedAtLocal->format('Y-m-d\TH:i:s.uP');
        // }
        
        // foreach ($messages as $item) {
        //     $createdAtUtc = Carbon::parse($item->created_at);  // assuming this is in UTC
        //     $updatedAtUtc = Carbon::parse($item->updated_at);
        
        //     // Convert to local time (+06:00) and overwrite the original fields
        //     $item->created_at = $createdAtUtc->setTimezone('+06:00')->format('Y-m-d\TH:i:s.uP');
        //     $item->updated_at = $updatedAtUtc->setTimezone('+06:00')->format('Y-m-d\TH:i:s.uP');
        // }
        
        
        // foreach($messages as $item){
        //     unset($item->created_at); 
        // }
        
        // foreach($messages as $item){
        //     $item->created_at = $item->created_at_local;
        // }
        
        
        // return $messages;
        
    
        return response()->json([
            'message' => 'Messages retrieved successfully',
            'data' => $messages,
        ]);
    }
}