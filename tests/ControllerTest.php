<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 17.11.2017
 * Time: 16:11
 */
require_once "../vendor/autoload.php";
use abcl\Controller;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{

    public function testMain()
    {
        $app = new \abcl\App();
        $router = new \abcl\controllers\main($app, '/c1/inn1');
        $done = $router->requestAll();

    }


}
