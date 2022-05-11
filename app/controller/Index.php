<?php

namespace app\controller;

use app\controller\BaseController as ControllerBaseController;
use think\facade\View;

class Index extends ControllerBaseController
{
    public function index()
    {
        $this->setPageTitle('项目介绍');
        return View::fetch('');
    }
}
