<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;

/**
 * @group Trip Management
 *
 * APIs for managing trips
 */
class TripController extends Controller
{

    /**
     * Get All Trips
     *
     * Retrieve a list of all trips.
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "user_id": 1,
     *       "origin_city": "New York",
     *       "origin_country": "USA",
     *       "destination_city": "Paris",
     *       "destination_country": "France",
     *       "departure_date": "2023-10-01T12:00:00.000000Z",
     *       "arrival_date": "2023-10-07T12:00:00.000000Z",
     *       "transportation_mode": "air",
     *       "max_weight_kg": 20.5,
     *       "max_volume_l": 50.0,
     *       "notes": "Fragile items included",
     *       "status": "pending"
     *     }
     *   ]
     * }
     * @response 404 {
     *   "message": "No trips found"
     * }
     */
    public function index()
    {
        $trips = Trip::all(); // Fetch all users
        if ($trips->isEmpty()) {
            return response()->json(['message' => 'No users found'], 404);
        }
        return response()->json($trips);
    }

    /**
     * Create a Trip
     *
     * Store a newly created trip in the database.
     *
     * @bodyParam user_id integer required The ID of the user creating the trip. Example: 1
     * @bodyParam origin_city string required The origin city of the trip. Example: New York
     * @bodyParam origin_country string required The origin country of the trip. Example: USA
     * @bodyParam destination_city string required The destination city of the trip. Example: Paris
     * @bodyParam destination_country string required The destination country of the trip. Example: France
     * @bodyParam departure_date string required The departure date of the trip (ISO 8601 format). Example: 2023-10-01T12:00:00Z
     * @bodyParam arrival_date string required The arrival date of the trip (ISO 8601 format). Example: 2023-10-07T12:00:00Z
     * @bodyParam transportation_mode string required The mode of transportation. Example: air
     * @bodyParam max_weight_kg float required The maximum weight allowed in kilograms. Example: 20.5
     * @bodyParam max_volume_l float required The maximum volume allowed in liters. Example: 50.0
     * @bodyParam notes string nullable Additional notes about the trip. Example: Fragile items included
     * @bodyParam status string required The status of the trip. Example: pending
     *
     * @response 201 {
     *   "message": "Trip created successfully",
     *   "data": {
     *     "id": 1,
     *     "user_id": 1,
     *     "origin_city": "New York",
     *     "origin_country": "USA",
     *     "destination_city": "Paris",
     *     "destination_country": "France",
     *     "departure_date": "2023-10-01T12:00:00.000000Z",
     *     "arrival_date": "2023-10-07T12:00:00.000000Z",
     *     "transportation_mode": "air",
     *     "max_weight_kg": 20.5,
     *     "max_volume_l": 50.0,
     *     "notes": "Fragile items included",
     *     "status": "pending"
     *   }
     * }
     * @response 422 {
     *   "message": "Validation failed",
     *   "errors": {
     *     "user_id": [
     *       "The user ID field is required."
     *     ],
     *     "departure_date": [
     *       "The departure date must be a valid date."
     *     ]
     *   }
     * }
     */
    public function store(Request $request)
    {

    }

    /**
     * Get a Single Trip
     *
     * Retrieve details of a specific trip by its ID.
     *
     * @urlParam id integer required The ID of the trip. Example: 1
     *
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "trip": {
     *       "id": 1,
     *       "user_id": 1,
     *       "origin_city": "New York",
     *       "origin_country": "USA",
     *       "destination_city": "Paris",
     *       "destination_country": "France",
     *       "departure_date": "2023-10-01T12:00:00.000000Z",
     *       "arrival_date": "2023-10-07T12:00:00.000000Z",
     *       "transportation_mode": "air",
     *       "max_weight_kg": 20.5,
     *       "max_volume_l": 50.0,
     *       "notes": "Fragile items included",
     *       "status": "pending"
     *     }
     *   }
     * }
     * @response 404 {
     *   "message": "Trip not found"
     * }
     */
    public function show(string $id)
    {
        //
        $trip = Trip::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => [
                'trip' => $trip,
                // 'stats' => $stats
            ]
        ]);
    }

    /**
     * Update a Trip
     *
     * Update the details of a specific trip by its ID.
     *
     * @urlParam id integer required The ID of the trip. Example: 1
     * @bodyParam user_id integer optional The ID of the user updating the trip. Example: 1
     * @bodyParam origin_city string optional The origin city of the trip. Example: Los Angeles
     * @bodyParam origin_country string optional The origin country of the trip. Example: USA
     * @bodyParam destination_city string optional The destination city of the trip. Example: Tokyo
     * @bodyParam destination_country string optional The destination country of the trip. Example: Japan
     * @bodyParam departure_date string optional The departure date of the trip (ISO 8601 format). Example: 2023-11-01T12:00:00Z
     * @bodyParam arrival_date string optional The arrival date of the trip (ISO 8601 format). Example: 2023-11-10T12:00:00Z
     * @bodyParam transportation_mode string optional The mode of transportation. Example: sea
     * @bodyParam max_weight_kg float optional The maximum weight allowed in kilograms. Example: 25.0
     * @bodyParam max_volume_l float optional The maximum volume allowed in liters. Example: 60.0
     * @bodyParam notes string optional Additional notes about the trip. Example: Handle with care
     * @bodyParam status string optional The status of the trip. Example: completed
     *
     * @response 200 {
     *   "message": "Trip updated successfully",
     *   "data": {
     *     "id": 1,
     *     "user_id": 1,
     *     "origin_city": "Los Angeles",
     *     "origin_country": "USA",
     *     "destination_city": "Tokyo",
     *     "destination_country": "Japan",
     *     "departure_date": "2023-11-01T12:00:00.000000Z",
     *     "arrival_date": "2023-11-10T12:00:00.000000Z",
     *     "transportation_mode": "sea",
     *     "max_weight_kg": 25.0,
     *     "max_volume_l": 60.0,
     *     "notes": "Handle with care",
     *     "status": "completed"
     *   }
     * }
     * @response 404 {
     *   "message": "Trip not found"
     * }
     * @response 422 {
     *   "message": "Validation failed",
     *   "errors": {
     *     "departure_date": [
     *       "The departure date must be a valid date."
     *     ]
     *   }
     * }
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Delete a Trip
     *
     * Remove a specific trip by its ID.
     *
     * @urlParam id integer required The ID of the trip. Example: 1
     *
     * @response 200 {
     *   "message": "Trip deleted successfully"
     * }
     * @response 404 {
     *   "message": "Trip not found"
     * }
     */
    public function destroy(string $id)
    {
        //
    }
}
