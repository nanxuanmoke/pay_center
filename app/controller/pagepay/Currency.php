<?php

namespace app\controller\pagepay;

use app\model\PayOrder;
use app\util\util_common_view;
use think\facade\View;

/**
 * 页面二维码支付
 */
class Currency extends BaseController
{
    protected $middleware = [
        \app\middleware\pagepay\Currency::class
    ];

    /**
     * 账单模型
     * @var PayOrder
     */
    private $billModel;

    /**
     * 设置网页网页标题
     * @param string $title 标题
     */
    protected function setPageTitle($title)
    {
        parent::setPageTitle($title . '_通用二维码');
    }

    /**
     * 初始化
     */
    protected function init()
    {
        // 账单号
        $billNo = $this->request->get('payOrderId', '');
        // 同步通知地址
        $returnUrl = $this->request->get('return_url', '');

        // 查询账单
        $this->billModel = PayOrder::where('number', $billNo)->find();

        // 账单不存在
        if (!$this->billModel) {
            if ($returnUrl) {
                // 重定向到同步通知地址
            }
        }
    }

    /**
     * 通用页面
     */
    public function currencyPage()
    {
        View::assign('billModel', $this->billModel);

        $this->setPageTitle(
            '付款'
                . $this->billModel->getCurrencySymbol()
                . "{$this->billModel->amount}元"
        );
        return View::fetch('');
    }
}
