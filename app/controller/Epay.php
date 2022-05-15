<?php

namespace app\controller;


class Epay extends BaseController
{
    // 页面跳转支付
    public function submit(): string
    {
        // 接收参数
        $params = [
            // 商户ID
            'pid' => '',
            // 支付方式
            'type' => '',
            // 商户订单号
            'out_trade_no' => '',
            // 服务器异步通知地址
            'notify_url' => '',
            // 页面跳转通知地址
            'return_url' => '',
            // 商品名称
            'name' => '',
            // 商品金额
            'money' => '',
            // 业务扩展参数 支付后原样返回
            'param' => '',
            // 签名字符串
            'sign' => '',
            // 签名类型
            'sign_type' => '',
        ];
        foreach (array_keys($params) as $name) {
            $params[$name] = $this->request->post($name, '');
        }

        return;
    }

    // API接口支付
    public function mapi()
    {
    }

    // API接口
    public function api()
    {
    }
}
