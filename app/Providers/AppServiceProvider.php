<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('nuhsa', function($field,$value,$parameters){
            if (strlen($value)!=12  || substr($value,0,2)!="AN" || !is_numeric(substr($value,-10))){
                return false;
            }
            $b = (float) substr($value,2,8);
            $c = (float) substr($value,10, 2);
            if ($b < 10000000) {
                $d = $b + 60 * 10000000;
            }
            else {
                $d = (float) "60" . substr($value, 2, 8);
            }
            return $d % 97 == $c;
        });
        Validator::replacer('nuhsa', function ($message, $attribute, $rule, $parameters) {
            return "NUHSA incorrecto. AN y 10 dígitos. AN1234567890";
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
