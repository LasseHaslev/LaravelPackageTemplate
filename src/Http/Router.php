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
     * Overwrite create function and set the namespace for this global object
     *
     * @return static
     */
    public static function create(string $referenceId = NULL)
    {
        return parent::create( '%packagename%' );
    }

    /**
     * @param mixed
     */
    public function __construct()
    {
        parent::__construct();
        $this->buildRoutes();
    }

    /**
     * Build routes for this application
     *
     * @return void
     */
    public function buildRoutes()
    {
        $router->add( '%packagename%.index', [
            'uri'=>'%packagename%',
            'method'=>'get',
            'as'=>'%packagename%.index',
            // 'uses'=>'\\' .Controller::class . '@index',
        ] );
    }

}
