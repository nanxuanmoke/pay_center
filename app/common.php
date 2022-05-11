<?php
// 应用公共文件

use app\model\SystemConfig;
use think\facade\Request;

function isDebug()
{
    return env('APP_DEBUG');
}

/**
 * 是否为Post请求
 * @return booleans
 */
function isPost()
{
    return Request::isPost();
}

/**
 * 是否为Gost请求
 * @return booleans
 */
function isGost()
{
    return Request::isGet();
}

/**
 * 生成数据库缓存标识
 * @param string $name 数据库名
 * @param string $key 唯一标识
 * @return string 唯一的缓存标识
 */
function generateDatabaseCacheKey($name, $key)
{
    return strtolower("database_cache_key_{$name}_{$key}");
}


/**
 * 生成数据库缓存标签
 * @return array 标签列表
 */
function generateDatabaseCacheTag()
{
    $tagList = [];
    foreach (func_get_args() as $v) {
        $tagList[] = strtolower("database_cache_tag_{$v}");
    }
    $tagList[] = 'database_cache';

    return $tagList;
}

/**
 * 读取系统配置
 * @param string $配置名
 * @return string 配置值
 */
function getSystemConfig($配置名)
{
    return SystemConfig::getConfig($配置名);
}
