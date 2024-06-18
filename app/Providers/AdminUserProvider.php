<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Auth\EloquentUserProvider; // Add this line

class AdminUserProvider extends ServiceProvider
{
    public function boot()
    {
        Auth::provider('admin', function ($app, array $config) {
            return new EloquentUserProvider($app['hash'], Admin::class);
        });
    }

    public function register()
    {
        //
    }
}
