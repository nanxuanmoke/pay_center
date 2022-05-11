<?php

namespace app\controller\pagepay;

use think\facade\View;

/**
 * 页面二维码支付
 */
class QRcode extends BaseController
{
    protected function setPageTitle($title)
    {
        parent::setPageTitle($title . '_通用二维码');
    }
    /**
     * 通用页面
     */
    public function currencyPage()
    {
        $this->setPageTitle('付款￥120元');
        return View::fetch('');
    }
}
