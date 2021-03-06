<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavlov
 * Date: 02.11.2017
 * Time: 13:00
 */

namespace abcl;


class View
{
    public static function display($app, $name, $params)
    {
        $templateFile = $app->root.DIRECTORY_SEPARATOR.$app->config->templateDir.DIRECTORY_SEPARATOR.$name.'.inc';
        extract($params);
        include $templateFile;
    }

    public static function prepare($app, $name, $params)
    {
        ob_start();
        self::display($app, $name, $params);
        $text = ob_get_contents();
        ob_end_clean();

        return $text;
    }

    public static function getMatrix($app, $name, $params)
    {
       $text = '';
        foreach ($params as $row){
            $text .= self::prepare($app, $name, $row);
        }
        return $text;
    }


}