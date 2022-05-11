<?php

namespace app\util;

use think\facade\View;

class util_common_view
{
    static private $info = '';

    /**
     * 重定向并显示信息提示框
     * @param string $url 要重定向的地址
     * @param string $type info|success|warning|danger
     * @param string $content 内容
     * @param boolean $send 是否立即重定向
     */
    static public function redirect_alert($url, $type, $content, $send = false)
    {
        $url = (string)$url;
        if ($type == 'error') $type = 'danger';

        switch ($type) {
            case 'primary':
                if ($send) return redirect($url)->with('jsCode_alert_primary', $content)->send();
                return redirect($url)->with('jsCode_alert_primary', $content);
            case 'info':
                if ($send) return redirect($url)->with('jsCode_alert_info', $content)->send();
                return redirect($url)->with('jsCode_alert_info', $content);
            case 'success':
                if ($send) return redirect($url)->with('jsCode_alert_success', $content)->send();
                return redirect($url)->with('jsCode_alert_success', $content);
            case 'warning':
                if ($send) return redirect($url)->with('jsCode_alert_warning', $content)->send();
                return redirect($url)->with('jsCode_alert_warning', $content);
            case 'danger':
                if ($send) return redirect($url)->with('jsCode_alert_danger', $content)->send();
                return redirect($url)->with('jsCode_alert_danger', $content);
            case 'secondary':
                if ($send) return redirect($url)->with('jsCode_alert_secondary', $content)->send();
                return redirect($url)->with('jsCode_alert_secondary', $content);
            case 'light':
                if ($send) return redirect($url)->with('jsCode_alert_light', $content)->send();
                return redirect($url)->with('jsCode_alert_light', $content);
            case 'dark':
                if ($send) return redirect($url)->with('jsCode_alert_dark', $content)->send();
                return redirect($url)->with('jsCode_alert_dark', $content);
        }
    }

    /**
     * Bootstrap 信息提示框
     * @param string $type 类型 primary|info|success|warning|danger|secondary|light|dark
     * @param string $info 要提示的信息
     */
    static public function alert($type, $info)
    {
        $info = "<div class=\"alert alert-{$type} text-center m-0 pt-1 pb-1\" style=\"border-radius: 0;\">{$info}</div>";

        // 如果存在重复
        // 则不再添加
        if (strstr(self::$info, $info)) {  // 存在重复
            // 停止执行
            return;
        }

        // 多个信息提示框
        self::$info .= $info;

        // 模板变量赋值
        View::assign('jsCode_alert', self::$info);
    }

    /**
     * Bootstrap 信息提示框 primary
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_primary($info, $icon = false)
    {
        if ($icon) $info = '<i class="bi bi-info-circle"></i> ' . $info;
        self::alert('primary', $info);
    }

    /**
     * Bootstrap 信息提示框 info
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_info($info, $icon = false)
    {
        if ($icon) $info = '<i class="bi bi-info-circle"></i> ' . $info;
        self::alert('info', $info);
    }

    /**
     * Bootstrap 信息提示框 success
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_success($info, $icon = false)
    {
        if ($icon) $info = '<i class="bi bi-check-circle"></i> ' . $info;
        self::alert('success', $info);
    }

    /**
     * Bootstrap 信息提示框 warning
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_warning($info, $icon = false)
    {
        if ($icon) $info = '<i class="bi bi-exclamation-circle"></i> ' . $info;
        self::alert('warning', $info);
    }

    /**
     * Bootstrap 信息提示框 danger
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_danger($info, $icon = false)
    {
        if ($icon) $info = '<i class="bi bi-x-circle"></i> ' . $info;
        self::alert('danger', $info);
    }

    /**
     * Bootstrap 信息提示框 secondary
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_secondary($info, $icon = false)
    {
        if ($icon) $info = '' . $info;
        self::alert('secondary', $info);
    }

    /**
     * Bootstrap 信息提示框 light
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_light($info, $icon = false)
    {
        if ($icon) $info = '' . $info;
        self::alert('light', $info);
    }

    /**
     * Bootstrap 信息提示框 dark
     * @param string $info 要提示的信息
     * @param boolean $icon True显示图标 Flase不显示图标
     */
    static public function alert_dark($info, $icon = false)
    {
        if ($icon) $info = '' . $info;
        self::alert('dark', $info);
    }
}
