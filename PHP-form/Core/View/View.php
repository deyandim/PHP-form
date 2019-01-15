<?php
/**
 * Created by PhpStorm.
 * User: BGDEDIM3
 * Date: 2019-01-12
 * Time: 12:46
 */

namespace Core\View;


class View implements ViewInterface
{
    const DEFAULT_TEMPLATE_FOLDER = "views";
    const DEFAULT_TEMPLATE_EXT = ".php";
    public function render($templateName = null, $model = null)
    {
        include self::DEFAULT_TEMPLATE_FOLDER
            . DIRECTORY_SEPARATOR
            . $templateName
            . self::DEFAULT_TEMPLATE_EXT;

    }
}