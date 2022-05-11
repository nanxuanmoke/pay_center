<?php

namespace app\middleware;

use app\util\util_common_view;
use think\facade\View;

class Initialize
{
    public function handle($request, \Closure $next)
    {
        View::assign('request', $request);

        if ($内容 = session('jsCode_alert_primary')) {
            util_common_view::alert_primary($内容);
        }
        if ($内容 = session('隐式传参_alert_info')) {
            util_common_view::alert_info($内容);
        }
        if ($内容 = session('隐式传参_alert_success')) {
            util_common_view::alert_success($内容);
        }
        if ($内容 = session('隐式传参_alert_warning')) {
            util_common_view::alert_warning($内容);
        }
        if ($内容 = session('隐式传参_alert_danger')) {
            util_common_view::alert_danger($内容);
        }
        if ($内容 = session('隐式传参_alert_secondary')) {
            util_common_view::alert_danger($内容);
        }
        if ($内容 = session('隐式传参_alert_light')) {
            util_common_view::alert_danger($内容);
        }
        if ($内容 = session('隐式传参_alert_dark')) {
            util_common_view::alert_danger($内容);
        }


        return $next($request);
    }
}
