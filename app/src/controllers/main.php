<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 03.11.2017
 * Time: 11:34
 */

namespace abcl\controllers;

use abcl\Controller;
use abcl\Router;
use abcl\View;

class main extends Controller
{

    public function requestData()
    {

        $rout =  (new Router($this->app, $this->path))->rout;
        $controllerName = __NAMESPACE__ . '\\' . $rout;
        if (!class_exists($controllerName)) {
            $this->app->logIt('Для пути ' . $this->app->currentPath . 'не задан контроллер', 'lackController');
            Throw new \Exception('lack Controller in ' . $this->app->currentPath, 7330);
        } else {
            $controller = new $controllerName($this->app, $rout);
        }

        $this->data['content'] = $controller->requestAll();

        return $this;
    }
    public function requestView()
    {
        return View::prepare($this->app, 'main', $this->data);
    }
}