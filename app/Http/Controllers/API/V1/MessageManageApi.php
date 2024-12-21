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

class MessageManageApi extends Controller
{
    private $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }
  public function sendMessage(Request $request)
{
    $validator = Validator::make($request->all(), [
        'receiver_id' => 'required',
        'message' => 'nullable|string', 
        'file_url' => 'nullable|file', 
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    $input = $request->only(['receiver_id','message', 'file_url']);
    $input['sender_id'] = Auth::id();

    if (empty($request->conversation_id)) {
        $message = MessageManage::where(function ($query) use ($input, $request) {
            $query->where('sender_id', $input['sender_id'])
                ->where('receiver_id', $request->receiver_id);
        })->orWhere(function ($query) use ($input, $request) {
            $query->where('sender_id', $request->receiver_id)
                ->where('receiver_id', $input['sender_id']);
        })->first();

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

            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'])) {
                $messageType = 'image'; 
            } elseif (in_array($fileExtension, ['mp4', 'avi', 'mkv', 'mov'])) {
                $messageType = 'video';
            } elseif (in_array($fileExtension, ['mp3', 'wav', 'ogg', 'aac'])) {
                $messageType = 'voice';
            } elseif (in_array($fileExtension, ['pdf', 'doc', 'docx', 'txt', 'zip'])) {
                $messageType = 'document'; 
            } else {
                $messageType = 'file';
            }
        }
    }

    $input['file_url'] = $fileUrl ?? null;
    $input['message'] = $input['message'] ?? null;

    $message = MessageManage::create($input);

    $sender = Doctor::find($input['sender_id']);
    $receiver = Doctor::find($input['receiver_id']);
    $senderName = $sender ? $sender->name : 'Unknown';
    $receiverName = $receiver ? $receiver->name : 'Unknown';

    $replyMessage = null;
    $sender_profile_image = $sender && !empty($sender->image)
    ? asset('storage/' . $sender->image)
    : null;


    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ]
    );

    $pusher->trigger("public-user.{$input['sender_id']}.{$input['receiver_id']}", 'new-message', [
        'sender_id' => $input['sender_id'],
        'sender_name' => $senderName,
        'sender_profile_image' => $sender_profile_image,
        'receiver_id' => $input['receiver_id'],
        'receiver_name' => $receiverName,
        'message' => $input['message'],
        'file_url' => $input['file_url'],
        'id' => $message->id,
        'message_type' => $messageType,
        'timestamp' => now(),
    ]);
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
        $query->where('sender_id', $user->id)
              ->orWhere('receiver_id', $user->id);
    })
    ->orderBy('created_at', 'desc')  // Get the most recent message first
    ->get();

    $formattedMessages = [];

    foreach ($messages as $message) {
        $otherUserId = ($message->sender_id == $user->id) ? $message->receiver_id : $message->sender_id;

        if ($otherUserId == $user->id) {
            continue;
        }

        $otherUser = Doctor::find($otherUserId);

        if (!$otherUser) {
            continue;  // Skip if the user doesn't exist
        }

        $isActive = 0;  // Default is inactive
        if ($otherUser->updated_at && now()->diffInMinutes($otherUser->updated_at) < 5) {
            $isActive = 1;  // Active if the user was last seen within 5 minutes
        }

        $imageUrl = $otherUser->image ? asset('storage/' . $otherUser->image) : null;

        if (!isset($formattedMessages[$otherUserId])) {
            $lastMessage = $message->message;

            if (!empty($message->file_url)) {
                $fileUrl = $message->file_url; // file_url is a string, not an array
                $fileExtension = pathinfo($fileUrl, PATHINFO_EXTENSION); // Get file extension

                if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'])) {
                    $lastMessage = 'Image';
                } elseif (in_array(strtolower($fileExtension), ['mp4', 'avi', 'mkv', 'mov'])) {
                    $lastMessage = 'Video';
                } elseif (in_array(strtolower($fileExtension), ['pdf', 'doc', 'docx', 'txt', 'zip'])) {
                    $lastMessage = 'Document';
                } else {
                    $lastMessage = 'File';
                }
            }

            $formattedMessages[$otherUserId] = [
                'id' => $otherUser->id,
                'name' => $otherUser->name,
                'email' => $otherUser->email,
                'image' => $imageUrl,
                'last_message' => $lastMessage,  // Set the last message as the type of file or text
                'active_status' => $isActive,
            ];
        }
    }

    $formattedMessages = array_values($formattedMessages);

    return response()->json([
        'message' => 'Message list retrieved successfully',
        'data' => $formattedMessages
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
        $query->where('sender_id', $user->id)
              ->orWhere('receiver_id', $user->id);
    })
    ->orderBy('created_at', 'desc')  // Get the most recent message first
    ->get();

    $filteredUsers = Doctor::where('name', 'like', '%' . $searchQuery . '%')
        ->orWhere('email', 'like', '%' . $searchQuery . '%')
        ->get();

    $formattedMessages = [];

    foreach ($messages as $message) {
        $otherUserId = ($message->sender_id == $user->id) ? $message->receiver_id : $message->sender_id;

        if ($otherUserId == $user->id) {
            continue;
        }

        $otherUser = Doctor::find($otherUserId);

        if (!$otherUser || !$filteredUsers->contains('id', $otherUserId)) {
            continue;
        }

        $isActive = 0;
        if ($otherUser->updated_at && now()->diffInMinutes($otherUser->updated_at) < 5) {
            $isActive = 1;
        }

        $imageUrl = $otherUser->image ? asset('storage/' . $otherUser->image) : null;

        if (!isset($formattedMessages[$otherUserId])) {
            $lastMessage = $message->message;

            if (!empty($message->file_url)) {
                $fileExtension = pathinfo($message->file_url, PATHINFO_EXTENSION);

                if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'])) {
                    $lastMessage = 'Image';
                } elseif (in_array(strtolower($fileExtension), ['mp4', 'avi', 'mkv', 'mov'])) {
                    $lastMessage = 'Video';
                } elseif (in_array(strtolower($fileExtension), ['pdf', 'doc', 'docx', 'txt', 'zip'])) {
                    $lastMessage = 'Document';
                } else {
                    $lastMessage = 'File';
                }
            }

            $formattedMessages[$otherUserId] = [
                'id' => $otherUser->id,
                'name' => $otherUser->name,
                'email' => $otherUser->email,
                'image' => $imageUrl,
                'last_message' => $lastMessage,
                'active_status' => $isActive,
            ];
        }
    }

    $formattedMessages = array_values($formattedMessages);

    return response()->json([
        'message' => 'Message list retrieved successfully',
        'data' => $formattedMessages,
    ]);
}



public function getMessages(Request $request)
{
    $selfId = Auth::id();
    $userId = $request->query('user_id');
 
    $messages = MessageManage::where(function ($query) use ($selfId, $userId) {
            $query->where('sender_id', $selfId)
                    ->where('receiver_id', $userId);
        })
        ->orWhere(function ($query) use ($selfId, $userId) {
            $query->where('sender_id', $userId)
                    ->where('receiver_id', $selfId);
        })
        ->orderBy('id', 'ASC')
        ->get();


    $messages = $messages->map(function ($message) {
        $sender = Doctor::find($message->sender_id);
        $message->sender_name = $sender ? $sender->name : null; // Add sender name
        $message->sender_profile_image = $sender && !empty($sender->image)
            ? asset('storage/' . $sender->image)
            : null;

        $receiver = Doctor::find($message->receiver_id);
        $message->receiver_name = $receiver ? $receiver->name : null; // Add receiver name

        if ($message->status === 'deleted') {
            $message->message = "This message is deleted"; // Placeholder for deleted message
            $message->file_url = null; // Clear file URL if it exists
            $message->message_type = 'deleted'; // Mark the message type as 'deleted'
        } else {
            if (empty($message->file_url)) {
                $message->file_url = null;
                $message->message_type = 'text';
            } else {
                $fileExtension = strtolower(pathinfo($message->file_url, PATHINFO_EXTENSION));
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'])) {
                    $message->message_type = 'image';
                } elseif (in_array($fileExtension, ['mp4', 'avi', 'mkv', 'mov'])) {
                    $message->message_type = 'video';
                } elseif (in_array($fileExtension, ['pdf', 'doc', 'docx', 'txt', 'zip'])) {
                    $message->message_type = 'document';
                } elseif (in_array($fileExtension, ['mp3', 'wav', 'ogg', 'aac'])) {
                    $message->message_type = 'voice';
                } else {
                    $message->message_type = 'file';
                }
                $message->file_url = $message->file_url;
            }
        }

        return $message;
    });

    return response()->json([
        'message' => 'Messages retrieved successfully',
        'data' => $messages,
    ]);
}

}
