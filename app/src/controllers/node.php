<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 03.11.2017
 * Time: 22:31
 */

namespace abcl\controllers;

use abcl\Controller;


class node extends Controller
{

    public function requestData()
    {
        $fields = ['title', 'header', 'text'];
        $this->data = $this->app->cells->readCells($this->app->currentPath, $fields);
        return $this;
    }


}