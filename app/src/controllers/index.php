<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 03.11.2017
 * Time: 22:31
 */

namespace abcl\controllers;

use abcl\Controller;
use abcl\model\Matrix;
use abcl\View;


class index extends Controller
{

    public function requestData()
    {
        $fields = ['title', 'header', 'text'];
        $matrix = new Matrix();
        $matrix->read($this->app, '/c1', $fields);
        return $this;
    }

    public function requestView()
    {
        return View::getMatrix($this->app, $this->name, $this->data);
    }


}