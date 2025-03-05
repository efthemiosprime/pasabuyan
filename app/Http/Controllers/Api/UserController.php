<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group User Management
 *
 * APIs for managing users
 */
class UserController extends Controller
{
    /**
     * Update User Password
     *
     * Update the authenticated user's password.
     *
     * @authenticated
     *
     * @bodyParam current_password string required The current password of the user. Example: OldPassword123!
     * @bodyParam password string required The new password for the user. Example: NewPassword123!
     * @bodyParam password_confirmation string required The confirmation of the new password. Example: NewPassword123!
     *
     * @response 200 {
     *   "success": true,
     *   "message": "Password updated successfully"
     * }
     * @response 401 {
     *   "success": false,
     *   "message": "Current password is incorrect"
     * }
     * @response 422 {
     *   "success": false,
     *   "errors": {
     *     "current_password": [
     *       "The current password field is required."
     *     ],
     *     "password": [
     *       "The password must be at least 8 characters."
     *     ]
     *   }
     * }
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect'
            ], 401);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully'
        ]);
    }

        /**
     * Get User Details
     *
     * Retrieve details of a specific user by their ID.
     *
     * @urlParam id integer required The ID of the user. Example: 1
     *
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "user": {
     *       "id": 1,
     *       "name": "John Doe",
     *       "email": "john.doe@example.com",
     *       "phone_number": "+1234567890",
     *       "about": "I am a software developer.",
     *       "profile_picture": "https://example.com/profile.jpg",
     *       "id_verified": true,
     *       "rating": 4.5
     *     }
     *   }
     * }
     * @response 404 {
     *   "success": false,
     *   "message": "User not found"
     * }
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->rating = $user->calculateRating();
        
        // Stats
        // $stats = [
        //     'completed_trips' => $user->trips()->where('status', 'completed')->count(),
        //     'delivered_packages' => $user->trips()
        //         ->whereHas('matches', function($query) {
        //             $query->where('status', 'completed');
        //         })->count(),
        //     'completed_deliveries' => $user->deliveryRequests()->where('status', 'delivered')->count(),
        //     'reviews_count' => $user->receivedReviews()->count(),
        //     'member_since' => $user->created_at->format('M Y')
        // ];
        
        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                // 'stats' => $stats
            ]
        ]);
    }


    /**
     * Get a Specific User by ID
     *
     * Retrieve details of a specific user by their ID.
     *
     * @urlParam id integer required The ID of the user. Example: 1
     *
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "id": 1,
     *     "name": "John Doe",
     *     "email": "john.doe@example.com",
     *     "phone_number": "+1234567890",
     *     "about": "I am a software developer.",
     *     "profile_picture": "https://example.com/profile.jpg",
     *     "id_verified": true,
     *     "rating": 4.5
     *   }
     * }
     * @response 404 {
     *   "success": false,
     *   "message": "User not found"
     * }
     */
    public function getUser($id)
    {
        try {
            $user = User::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
    }

        /**
     * Edit User Profile
     *
     * Update the authenticated user's profile information.
     *
     * @authenticated
     *
     * @bodyParam name string optional The name of the user. Example: John Doe
     * @bodyParam phone_number string optional The phone number of the user. Example: +1234567890
     * @bodyParam about string optional A short description about the user. Example: I am a software developer.
     *
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "user": {
     *       "id": 1,
     *       "name": "John Doe",
     *       "email": "john.doe@example.com",
     *       "phone_number": "+1234567890",
     *       "about": "I am a software developer.",
     *       "profile_picture": "https://example.com/profile.jpg",
     *       "id_verified": true,
     *       "rating": 4.5
     *     }
     *   },
     *   "message": "User profile updated successfully"
     * }
     * @response 422 {
     *   "success": false,
     *   "errors": {
     *     "name": [
     *       "The name field is required."
     *     ]
     *   }
     * }
     */
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'about' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        $user->update($validator->validated());

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user
            ],
            'message' => 'User profile updated successfully'
        ]);
    }
    
}