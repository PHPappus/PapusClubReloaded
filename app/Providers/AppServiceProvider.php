<?php

namespace papusclub\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('float', function($attribute, $value, $parameters, $validator) {
            /*validación de floats*/
            $re = "/^[+]?([0-9]+(?:[\\.,][0-9]*)?|[0-9]+)/";  
            return(preg_match($re, $value));
        });

        Validator::extend('alpha_spaces', function($attribute, $value)
        {
            return preg_match('/^[\pL\s]+$/u', $value);
        });
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
}
