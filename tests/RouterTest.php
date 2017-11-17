<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 17.11.2017
 * Time: 16:11
 */
require_once "../vendor/autoload.php";
use abcl\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{

    public function testSelect()
    {
        $app = new \abcl\App();
        $router = new Router($app);
        $res = $router->selectRout('c1/inn1');
    }
}
