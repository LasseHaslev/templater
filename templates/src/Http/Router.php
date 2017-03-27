<?php

namespace %namespace%\Http;

use LasseHaslev\LaravelPackageRouter\PackageRouter;
use Illuminate\Support\Facades\Route;
use %namespace%\Http\Controllers\%model_plural%Controller;

/**
 * Class ImageRouter
 * @author Lasse S. Haslev
 */
class Router extends PackageRouter
{

    /**
     * Create web routes
     *
     * @return void
     */
    public function web()
    {
        Route::get( '%instance_plural%', '\\' .%model_plural%Controller::class . '@index' )
            ->name( '%packagename%.%instance_plural%.index' );
        Route::get( '%instance_plural%/create', '\\' .%model_plural%Controller::class . '@create' )
            ->name( '%packagename%.%instance_plural%.create' );
        Route::post( '%instance_plural%/store', '\\' .%model_plural%Controller::class . '@store' )
            ->name( '%packagename%.%instance_plural%.store' );
        Route::get( '%instance_plural%/{%instance%}', '\\' .%model_plural%Controller::class . '@show' )
            ->name( '%packagename%.%instance_plural%.show' );
        Route::get( '%instance_plural%/{%instance%}/edit', '\\' .%model_plural%Controller::class . '@edit' )
            ->name( '%packagename%.%instance_plural%.edit' );
        Route::put( '%instance_plural%/{%instance%}', '\\' .%model_plural%Controller::class . '@update' )
            ->name( '%packagename%.%instance_plural%.update' );
        Route::delete( '%instance_plural%/{%instance%}', '\\' .%model_plural%Controller::class . '@destroy' )
            ->name( '%packagename%.%instance_plural%.destroy' );
    }

}
