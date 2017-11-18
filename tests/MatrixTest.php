<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 18.11.2017
 * Time: 21:23
 */
require_once "../vendor/autoload.php";
use abcl\model\Matrix;
use PHPUnit\Framework\TestCase;

class MatrixTest extends TestCase
{

    public function testRead()
    {
        $app = new \abcl\App();
        $matrix = new Matrix();
        $matrix->read($app, '/c1', ['header', 'title']);
    }

    public function testOrder()
    {
        $matrix = new Matrix();
        $matrix->data = [
            [1, 2, 3],
            [4, 5, 6],
            [1, 3, 3]
        ];
        $order = $matrix->order(1);
        $this->assertEquals([1,3,3], $order->data[1]);
    }

    public function testFilter()
    {
        $matrix = new Matrix();
        $matrix->data = [
            [1, 2, 3],
            [4, 5, 6],
            [1, 3, 3]
        ];
        $func = function ($x) {return $x[2]<6;};
        $order = $matrix->filter($func);
        $this->assertEquals(2, count($order->data));
    }

}
