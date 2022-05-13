<?php

namespace app\model;

/**
 * 支付订单
 */
class PayOrder extends BaseModel
{
    /**
     * 生成唯一订单号
     * @return integer 
     */
    static public function generateNumbe()
    {
        // 循环生成订单号，直到数据库中不存在为止
        do {
            // 生成订单号
            $number = date('YmdHis') . substr(microtime(), 2, 3) . mt_rand(0, 999);
        } while (self::where('number', $number)->find());

        // 返回
        return $number;
    }

    /**
     * 获取当前支付订单的货币符号
     * @return string 货币符号
     */
    public function getCurrencySymbol()
    {
        switch (strtoupper($this->getAttr('currency'))) {
                // 人民币
            case 'RMB':
                return '￥';
                // 美元
            case 'USD':
                return '$';
                // 欧元
            case 'EUR':
                return '€';
        }

        return $this->getAttr('currency');
    }

    /**
     * 新增变更记录
     * @param string $info 说明
     */
    public function addChangeLog($info, $type = 'info')
    {
        // 保存到变量
        $log = $this->getAttr('change_log');
        // 如果log不为空 则换行
        if ($log) {
            $log .= ",\n";
        }
        // 新增一条记录
        $log .= json_encode([
            'time'  => date('Y-m-d H:i:s'),
            'type'  => $type,
            'msg'   => $info
        ], JSON_UNESCAPED_UNICODE);

        // 更新
        $this->change_log = $log;
        $this->save();
    }
}
