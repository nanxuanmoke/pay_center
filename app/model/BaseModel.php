<?php

namespace app\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 基础模型类
 * 该类中的方法统一由 _base_ 开头
 */

abstract class BaseModel extends Model
{
    /**
     * 开启自动时间戳
     */
    protected $autoWriteTimestamp = 'timestamp';
    // 关闭自动时间戳
    // protected $autoWriteTimestamp = false;

    /**
     * 开启软删除
     */
    use SoftDelete;

    /**
     * 指定软删除字段
     */
    protected $deleteTime = 'delete_time';

    /**
     * 软删除字段默认值
     */
    protected $defaultSoftDelete = '0000-00-00 00:00:00';
}
