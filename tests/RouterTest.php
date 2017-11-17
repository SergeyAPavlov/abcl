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
        $res = $router->selectRout('/c1/inn1');
        $res1 = $router->selectRout('/c1/c22');
        $res3 = $router->selectRout('/c1/c22/c31');

    }

    public function testProblemSelect()
    {
        $app = new \abcl\App();
        $router = new Router($app);
        $router->routList = [
            'c1' => 'index',
            'c1/*' => 'node'
        ];

        $res1 = $router->selectRout('c22');
    }
}
