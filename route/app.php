<?php

use think\facade\Route;
use think\facade\View;
use think\Response;

Route::get('', 'Index/index')->name('home_page');

// 404页面
Route::miss(function () {
    return Response::create(View::fetch('../view/404.html'), 'html', 404);
});
