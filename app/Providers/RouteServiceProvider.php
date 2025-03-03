<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        // Configure rate limiting for API routes
        $this->configureRateLimiting();

        // Define the routes for the application
        $this->routes(function () {
            // Load API routes
            Route::middleware('api')
                ->prefix('api') // Prefix all API routes with `/api`
                ->group(base_path('routes/api.php')); // Load routes from `routes/api.php`

            // Load web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php')); // Load routes from `routes/web.php`
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        // Configure rate limiting for API routes
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}