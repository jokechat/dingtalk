<?php
namespace DingTalk\Util;
class Config
{
    /**
     * 获取统一化的配置信息
     * @return multitype:
     */
    public static function getConfig()
    {
        $config = include __DIR__."/../Config/dingtalk.php";
        return $config;
    }
}
?>