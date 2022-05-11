<?php

namespace app\model;

use think\facade\Cache;

/**
 * 系统配置
 */
class SystemConfig extends BaseModel
{
    static public function initialization()
    {
        // 默认配置
        $list = [
            'website.name'
            => ['支付中心', '网站名称'],
        ];

        foreach ($list as $k => $v) {
            try {
                // 查询系统配置
                if (!SystemConfig::where('name', $k)->find()) {  // 不存在
                    // 新增该配置
                    SystemConfig::create([
                        'name'          => $k,
                        'value'         => $v[0],
                        'remarks'       => $v[1],
                    ]);
                }
            } catch (\Exception $e) {
                exit('系统无法运行，因为系统配置初始化失败！ERROR：' . $e->getMessage());
            }
        }
    }

    /**
     * 获取系统配置
     * @param string $name
     */
    static public function getConfig($name)
    {
        // 查询系统配置
        $config = self::where('name', $name)
            ->cache(generateDatabaseCacheKey('SystemConfig', $name), 86400, generateDatabaseCacheTag('SystemConfig'))
            ->find();

        // 系统配置不存在
        if (!$config) {
            // 尝试初始化配置
            self::initialization();
            // 再次查询
            $config = self::where('name', $name)
                ->cache(generateDatabaseCacheKey('SystemConfig', $name), 86400, generateDatabaseCacheTag('SystemConfig'))
                ->find();
        }

        // 配置应该不存在
        if (!$config) return null;

        // 返回结果
        return $config->value;
    }

    /**
     * 设置系统配置
     * @param string $name
     * @param string $value
     * @param string $remarks
     */
    static public function setConfig($name, $value, $remarks = null)
    {
        // 系统配置新值
        $data = [
            'value' => $value
        ];
        if ($remarks !== null) $data['remarks'] = $remarks;

        // 更新系统配置
        $ret = self::update($data, [
            'name' => $name
        ]);

        // 清除数据库缓存
        Cache::delete(generateDatabaseCacheKey('SystemConfig', $name));

        return $ret;
    }
}
