<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Register a new user.
     *
     * @group Authentication
     *
     * @bodyParam name string required The name of the user. Example: Leonardo da Vinci
     * @bodyParam email string required The email of the user. Example: leo@davinci.com
     * @bodyParam password string required The password of the user. Must be at least 8 characters long. Example: Le0DaV!nc!
     * @bodyParam password_confirmation string required The password confirmation. Must match the `password` field. Example: Le0DaV!nc!
     * @bodyParam phone_number optional The phone number of the user. Must be 8 to 11 digits long. Example: 123-456-7890
     * @bodyParam about optional Info of the user. Tell us a little about yourself... Example: Professional overthinker, amateur napper, and certified snack enthusiast..
     *
     * @response 201 {
     *   "message": "User registered successfully",
     *   "user": {
     *       "id": 1,
     *       "name": "Leonardo da Vinci",
     *       "email": "leo@davinci.com"
     *   }
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *       "email": ["The email has already been taken."]
     *   }
     * }
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'password_confirmation' => 'required|string|min:8', 
            'phone_number' => [
                'nullable',
                'string', // Ensure the input is treated as a string
                'regex:/^[0-9+\- ]+$/', // Allow digits, +, -, and spaces
                'min:8', // Minimum length
                'max:20', // Adjust max length to accommodate special characters
            ],
            'about' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'about' => $request->about,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'data' => [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid login credentials'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully'
        ]);
    }

}