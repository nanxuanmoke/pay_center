<?php

namespace app\controller;


class Epay extends BaseController
{
    // 页面跳转支付
    public function submit()
    {
        // 接收参数
        $parms = [
            // 商户ID
            'pid'               => '',
            // 支付方式
            'type'              => '',
            // 商户订单号
            'out_trade_no'      => '',
            // 服务器异步通知地址
            'notify_url'        => '',
            // 页面跳转通知地址
            'return_url'        => '',
            // 商品名称
            'name'              => '',
            // 商品金额
            'money'             => '',
            // 业务扩展参数 支付后原样返回
            'param'             => '',
            // 签名字符串
            'sign'              => '',
            // 签名类型
            'sign_type'         => '',
        ];
        foreach (array_keys($parms) as $name) {
            $parms[$name] = $this->request->post($name, '');
        }

        
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
