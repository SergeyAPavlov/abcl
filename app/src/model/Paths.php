<?php

namespace abcl\model;
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 16.11.2017
 * Time: 21:18
 */
class Paths
{
    public $root;

    /**
     * Paths constructor.
     * @param $root
     */
    public function __construct($root)
    {
        $this->root = $root;
    }

    public function checkRoot($root = '')
    {
        if (!$root) $root = $this->root;
        return file_exists($root);
    }

    public function rel2real($path, $root = '')
    {
        if (!$root) $root = $this->root;
        return realpath($root.$path);
    }

    public function absPath($url)
        // url - путь от точки монтирования. Записывается начиная с /
    {
        $res = \abcl\Lib::canonicalize($this->root.$url);
        return ($res);
    }

}