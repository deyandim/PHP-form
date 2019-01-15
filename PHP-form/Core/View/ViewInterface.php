<?php
/**
 * Created by PhpStorm.
 * User: BGDEDIM3
 * Date: 2019-01-12
 * Time: 12:44
 */

namespace Core\View;


interface ViewInterface
{
    public function render($templateName = null, $model = null);

}