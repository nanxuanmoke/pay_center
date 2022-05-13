<?php

use think\facade\Route;

// 对外开放的
Route::group('public', function () {
    // 页面支付
    Route::group('pagepay', function () {
        // 通用
        Route::get('currency', 'pagepay.Currency/currencyPage')->name('public_pagepay_currency');
        // 一码通用
        Route::get('currency_qrcode', 'pagepay.Currency/currencyPage')->name('public_pagepay_currency');
    });

    // 易支付接口路由
    // 码支付兼容易支付接口，所以可直接使用易支付接口
    Route::group('epay', function () {
        // 页面跳转支付
        Route::rule('submit', 'Epay/submit')->name('epay_submit');
        // API接口支付
        Route::post('mapi', 'Epay/mapi')->name('epay_mapi');
        // API接口
        Route::post('api', 'Epay/api')->name('epay_api');
    });
});
