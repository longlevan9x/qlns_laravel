<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->checkEmail();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function checkEmail()
    {
        Validator::extend('check_email', function($attribute, $value, $parameters) {
            if (!empty($value)) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                 return true;
            }
        });
    }
}
