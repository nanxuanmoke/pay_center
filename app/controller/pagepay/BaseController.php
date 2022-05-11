<?php

namespace app\controller\pagepay;

use app\controller\BaseController as ControllerBaseController;

/**
 * 页面支付控制器基础类
 */
class BaseController extends ControllerBaseController
{
    protected function setPageTitle($title)
    {
        parent::setPageTitle($title . '_页面支付');
    }
}
