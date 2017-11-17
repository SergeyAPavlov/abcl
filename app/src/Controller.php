<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 03.11.2017
 * Time: 11:14
 */

namespace abcl;

abstract class Controller
{
    protected $app;
    /** @var string  */
    public $route;
    public $params = [];
    public $data = [];
    public $viewText;

    public $name;

    /**
     * Controller constructor.
     * @param string $route
     * @param App $app
     */
    public function __construct($app, $route = null)
    {
        $this->app = $app;
        $this->name = Helper::shortClassName($this);
        if ($route) {
            $this->route = $route;
        }

    }

    public function requestRoute($path)
    {
        if (empty($this->route)){
            $this->route = (new Router($this->app, $path))->rout;
        }

        return $this;

    }

    public function requestParams()
    {
        return $this;
    }
    public function requestData()
    {
        return $this;
    }

    public function requestView()
    {
        return View::prepare($this->app, $this->route, $this->data);
    }

    public function requestAll($path)
    {
        return $this->requestRoute($path)->requestParams()->requestData()->requestView();
    }


}