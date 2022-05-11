<?php

use think\facade\Route;

// 后台
Route::group(env('admin.url', 'admin'), function () {
    Route::rule('login', 'admin.Login/index')->name('admin_login');
});
