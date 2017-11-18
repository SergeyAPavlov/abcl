<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 18.11.2017
 * Time: 20:47
 */

namespace abcl\model;


use abcl\App;

class Matrix
{
    public $data;
    public $fields;
    public function read (App $app, $path, $fields )
    {
        $paths = new Paths($app->config->content);
        $cells = $app->cells;
        $list = $paths->listNodes($path);
        $res = [];
        if (empty($list)) return [];
        foreach ($list as $node){
            $res[] = $cells->readCells($node, $fields);
            $this->fields = $fields;
        }
        $this->data = $res;
        return $this;
    }

    public function order($field)
    {
        usort($this->data, function ($a, $b) use ($field)  {return strcmp($a[$field], $b[$field]);} );
        return $this;
    }

    public function filter($filterFunction)
    {
        $res = [];
        foreach ($this->data as $row){
            if ($filterFunction($row)) $res[] = $row;
        }
        $this->data = $res;
        return $this;
    }

}