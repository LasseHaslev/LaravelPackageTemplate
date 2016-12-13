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
        $this->add( '%packagename%.index', [
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

}
