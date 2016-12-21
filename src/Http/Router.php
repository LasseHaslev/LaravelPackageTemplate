<?php

namespace %namespace%\Http;

use LasseHaslev\LaravelPackageRouter\PackageRouter;

/**
 * Class ImageRouter
 * @author Lasse S. Haslev
 */
class Router extends PackageRouter
{

    /**
     * @param mixed
     */
    public function __construct()
    {
        $this->createWebRoutes();
        $this->createApiRoutes();
    }

    /**
     * Create web routes
     *
     * @return void
     */
    public function createWebRoutes()
    {
        $this->add( 'web.%packagename%.index', [
            'uri'=>'%packagename%',
            'method'=>'get',
            'as'=>'%packagename%.index',
            // 'uses'=>'\\' .Controller::class . '@index',
            'uses'=>function() {
                return 'Hello mr %packagename%';
                // return view( '%packagename%::index' );
            }
        ] );
    }
    /**
     * Create api routes
     *
     * @return void
     */
    public function createApiRoutes()
    {
        $this->add( 'api.%packagename%.index', [
            'uri'=>'%packagename%',
            'method'=>'get',
            'as'=>'%packagename%.index',
            // 'uses'=>'\\' .ApiController::class . '@index',
            'uses'=>function() {
                return 'Hello mr api of %packagename%';
                // return view( '%packagename%::index' );
            }
        ] );
    }

}
