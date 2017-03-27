<?php

namespace <% package.namespace %>\Http;

use LasseHaslev\LaravelPackageRouter\PackageRouter;
use Illuminate\Support\Facades\Route;
use <% package.namespace %>\Http\Controllers\<% model.plural %>Controller;

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
        Route::get( '<% model.instances.plural %>', '\\' .<% model.plural %>Controller::class . '@index' )
            ->name( '<% package.name %>.<% model.instances.plural %>.index' );
        Route::get( '<% model.instances.plural %>/create', '\\' .<% model.plural %>Controller::class . '@create' )
            ->name( '<% package.name %>.<% model.instances.plural %>.create' );
        Route::post( '<% model.instances.plural %>/store', '\\' .<% model.plural %>Controller::class . '@store' )
            ->name( '<% package.name %>.<% model.instances.plural %>.store' );
        Route::get( '<% model.instances.plural %>/{<% model.instances.single %>}', '\\' .<% model.plural %>Controller::class . '@show' )
            ->name( '<% package.name %>.<% model.instances.plural %>.show' );
        Route::get( '<% model.instances.plural %>/{<% model.instances.single %>}/edit', '\\' .<% model.plural %>Controller::class . '@edit' )
            ->name( '<% package.name %>.<% model.instances.plural %>.edit' );
        Route::put( '<% model.instances.plural %>/{<% model.instances.single %>}', '\\' .<% model.plural %>Controller::class . '@update' )
            ->name( '<% package.name %>.<% model.instances.plural %>.update' );
        Route::delete( '<% model.instances.plural %>/{<% model.instances.single %>}', '\\' .<% model.plural %>Controller::class . '@destroy' )
            ->name( '<% package.name %>.<% model.instances.plural %>.destroy' );
    }

}
