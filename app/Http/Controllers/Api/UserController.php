<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

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
     * Get a specific user by ID
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
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