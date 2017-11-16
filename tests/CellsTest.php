<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 17.11.2017
 * Time: 0:07
 */
require_once "../vendor/autoload.php";
use abcl\model\Cells;
use PHPUnit\Framework\TestCase;

class CellsTest extends TestCase
{

    public function testReadCell()
    {
        $app = new \abcl\App();
        $cells = new Cells($app);
        $text = $cells->readCell('/c1', 'cell');
    }
}
