<?php

namespace app\controller\admin;

use think\facade\View;

class Login extends BaseController
{
    public function index()
    {
        $this->setPageTitle('登入');
        return View::fetch('');
    }
}
