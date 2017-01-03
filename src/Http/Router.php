<?php

namespace %namespace%\Http;

use LasseHaslev\LaravelPackageRouter\PackageRouter;
use Illuminate\Support\Facades\Route;

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
        Route::get( '%packagename%', '\\' .Controller::class . '@index' )
            ->name( '%packagename%.index' );
    }

}
