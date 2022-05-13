<?php

namespace app\middleware\pagepay;

use think\exception\ValidateException;
use think\facade\View;
use think\Response;

class Currency
{
    public function handle($request, \Closure $next)
    {
        try {
            validate(\app\validate\pagepay\Currency::class)
                ->scene('pay')
                ->check($request->get());
        } catch (ValidateException $e) {
            View::assign('msg', $e->getMessage());
            return Response::create(
                View::fetch('../view/parameter_exception.html'),
                'html',
                500
            );
        }

        // // 账单号
        // $billNo = $request->get('payOrderId', '');
        // // 同步通知地址
        // $returnUrl = $request->get('return_url', '');

        // 查询账单
        // $this->billModel = Bill::where('number', $billNo)->find();
        // // util_common_view::redirect_alert(url('home_page'), 'danger', '支付异常！', true);

        // // util_common_view::redirect_alert(url('home_page'), 'danger', '支付异常！', true);
        // // 账单不存在
        // if (!$this->billModel) {
        //     if ($returnUrl) {
        //         // 重定向到同步通知地址
        //         return redirect($returnUrl)->send();
        //     }
        // }
        return $next($request);
    }
}
