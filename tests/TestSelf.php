<?php
require_once "../vendor/autoload.php";
use PHPUnit\Framework\TestCase;
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 20:53
 */
class TestSelf extends TestCase
{

    public function test()
    {
        echo 'self';
        $this->assertEquals('1', '1');
    }




}
