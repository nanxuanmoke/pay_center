<?php

// +----------------------------------------------------------------------
// | 缓存设置
// +----------------------------------------------------------------------

return [
    // 默认缓存驱动
    'default' => env('cache.driver', 'file'),

    // 缓存连接方式配置
    'stores'  => [
        'file' => [
            // 驱动方式
            'type'       => 'File',
            // 缓存保存目录
            'path'       => '',
            // 缓存前缀
            'prefix'     => env('cache.prefix', 'payCenter_'),
            // 缓存有效期 0表示永久缓存
            'expire'     => env('cache.expire', 0),
            // 缓存标签前缀
            'tag_prefix' => 'tag:',
            // 序列化机制 例如 ['serialize', 'unserialize']
            'serialize'  => [],
        ],
        'redis' => [
            // 驱动方式
            'type'       => 'redis',
            // 地址
            'host'       => env('REDIS.host', '127.0.0.1'),
            // 端口
            'port'       => env('REDIS.port', 6379),
            // 缓存前缀
            'prefix'     => env('cache.prefix', 'payCenter_'),
            // 连接密码
            'password'   => env('REDIS.password', ''),
            // 缓存有效期 0表示永久缓存
            'expire'     => env('cache.expire', 0),
            // 选择数据库
            'select'     => env('REDIS.select', 1)
        ]
        // 更多的缓存连接
    ],
];
