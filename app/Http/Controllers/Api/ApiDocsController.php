<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Pasabuyan API",
 *     version="1.0.0",
 *     description="API Documentation for Pasabuyan Application",
 *     @OA\Contact(
 *         email="admin@pasabuyan.com",
 *         name="Pasabuyan Support"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * 
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="API Server"
 * )
 * 
 * @OA\Tag(
 *     name="Authentication",
 *     description="API Endpoints for user authentication"
 * )
 * 
 * @OA\Tag(
 *     name="User",
 *     description="API Endpoints for user management"
 * )
 */
class ApiDocsController extends Controller
{
    // This controller exists purely for Swagger annotations
    // No methods needed
}