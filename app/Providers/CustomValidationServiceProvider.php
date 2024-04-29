<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('not_self_message', function ($attribute, $value, $parameters, $validator) {
            // Check if the sender id is not equal to the recipient id
            return auth()->id() != $value;
        });
    }
}
