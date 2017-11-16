<?php
require_once "../vendor/autoload.php";
use PHPUnit\Framework\TestCase;
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 20:53
 */
class testPath extends TestCase
{

    public function testSelf()
    {
        $path = new \abcl\model\Paths('C:\OSPanel\domains\abcl\web');
        $this->assertEquals(true, $path->checkRoot());
    }

    public function testRel2abc()
    {
        $path = new \abcl\model\Paths('C:\OSPanel\domains\abcl\web');
        $abs = $path->rel2real('/test.html');

        $this->assertEquals(true, $path->checkRoot());
    }

    public function testHpath()
    {
        $paths = new \abcl\model\Paths('C:\OSPanel\domains\abcl\web');
        $path = $paths->absPath('\..\..\abcl\app/src');

        $this->assertEquals(true, $paths->checkRoot($path));
    }

}
