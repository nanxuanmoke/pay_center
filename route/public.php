<?php

use think\facade\Route;

// 对外开放的
Route::group('public', function () {
    // 页面支付
    Route::group('pagepay', function () {
        Route::get('currency', 'pagepay.QRcode/currencyPage')->name('public_pagepay_currency');
    });
});
