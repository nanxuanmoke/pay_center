<?php

namespace app\controller\admin;

use app\controller\BaseController as ControllerBaseController;

/**
 * 后台控制器基础类
 */
class BaseController extends ControllerBaseController
{
    protected function setPageTitle($title)
    {
        parent::setPageTitle($title . '_后台');
    }
}
