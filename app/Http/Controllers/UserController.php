<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CountriesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Services\Services;
use Illuminate\Support\Facades\Hash;

use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    private $services;
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.pages.users.index', compact('users'));
    }

 

    public function store(Request $request)
    {
        // Validate the request

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string',
            'phone' => 'nullable',
            'role' => 'nullable|string',
            'status' => 'required',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        // Gather input data
        $input = $request->except('profile_picture'); // Exclude profile_picture from $input
        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $profileImage = $this->services->imageUpload($request->file('profile_picture'), 'profile_picture/');
            $input['profile_picture'] = 'profile_picture/' . $profileImage;
        }

        // Handle password and email verification timestamp
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }
        $input['email_verified_at'] = now(); // Use Carbon's now() for current timestamp

        $input['role'] = $request->role;
        // Create user with input data
        User::create($input);

        if ($request->route()->getName() == 'userRegister.store') {
            return redirect()->route('login.index')->with('success', 'User created successfully.');
        }
        // Redirect with success message
        return redirect()->route('usersIndex')->with('success', 'User created successfully.');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.users.edit', [
            'user' => $user
        ]);
    }


  public function update(Request $request, $id)
{
    // Validate basic fields
    $validator = Validator::make($request->all(), [
        'name'             => 'required|string',
        'current_password' => 'nullable|required_with:new_password', // Only required if new_password is provided
        'new_password'     => 'nullable|min:8|confirmed', // At least 8 characters and must match the confirmation
    ]);

    if ($validator->fails()) {
        return Redirect::back()->withInput()->withErrors($validator);
    }

    $user = User::findOrFail($id);

    // Handle password update
    if ($request->filled('current_password') && $request->filled('new_password')) {
        // Check if the current password matches the user's stored password
        if (Hash::check($request->input('current_password'), $user->password)) {
            // Update the password if current password is correct
            $user->password = Hash::make($request->input('new_password'));
        } else {
            // Return error if the current password is incorrect
            return Redirect::back()->withInput()->withErrors(['current_password' => 'Current password is incorrect']);
        }
    }

    // Handle profile picture update
    $input = $request->except(['current_password', 'new_password', 'new_password_confirmation']); // Exclude password-related fields
    if ($request->hasFile('profile_picture')) {
        // Delete old profile picture
        $this->services->imageDestroy($user->profile_picture, 'profile_picture/');

        // Upload new profile picture
        $profileImage = $this->services->imageUpload($request->file('profile_picture'), 'profile_picture/');
        $input['profile_picture'] = 'profile_picture/' . $profileImage;
    }

    // Update the user's details
    $user->update($input);

    return redirect()->route('usersIndex')->with('success', 'User updated successfully.');
}




    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('usersIndex')->with('success', 'User deleted successfully.');
    }

    public function verifyLogin(Request $request)
    {
       
        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $credentials = $request->only('email', 'password');
    
        // Attempt to create a token for the user
        if ($token = JWTAuth::attempt($credentials)) {
            $user = JWTAuth::user();
    
            // Check if the user's status is 'active'
            if ($user->status == 'active') {
    
                // Check if the user is an admin
                if ($user->role == 'admin') {
                    // If the user is an admin, put the token in the session and redirect to dashboard
                    $request->session()->put('token', $token);
                    return redirect()->route('dashboard');
                } else {
                    // If the user is not an admin, invalidate the token and return an error
                    return redirect()->back()->with('status', 'You do not have permission to access this page');
                }
    
            } else {
                // If the user's account is not active, invalidate the token
                JWTAuth::invalidate(JWTAuth::getToken());
                return redirect()->back()->with('status', 'Your Account is Pending');
            }
        }
    
        // If the token creation fails, check if the email exists in the database
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            // If the email exists but the password is incorrect, return an error
            return redirect()->back()->withInput()->withErrors(['password' => 'Incorrect password']);
        } else {
            // If the email doesn't exist in the database, return an error
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email']);
        }
    }
    




}
