<?php
namespace CdkeyClient;

class Apifactory
{
    // 后台接口类型
    const API_CONSOLE = 1;

    // 游戏接口类型
    const API_GAME    = 2;

    // 公用接口类型
    const API_PUBLIC  = 3;

    /**
     * api对象
     * @var object
     */
    public static $instance = [];

    /**
     * 生成api对象
     * @param $config
     * @param int $type
     * @return ConsoleApi|GameApi|PublicApi
     * @throws \Exception
     */
    public static function getInstance($config, $type = self::API_PUBLIC)
    {
        if (self::$instance[$type]) {
            return self::$instance[$type];
        }

        if (!$config['host'] || !$config['token']) {
            throw new \Exception('缺少接口配置');
        }

        switch ($type) {
            case self::API_CONSOLE:
                $httpApi = new ConsoleApi($config['host'], $config['token']);
                break;
            case self::API_GAME:
                $httpApi = new GameApi($config['host'], $config['token']);
                break;
            case self::API_PUBLIC:
                $httpApi = new PublicApi($config['host'], $config['token']);
                break;
            default:
                throw new \Exception('无相关类型接口');
        }

        if (!$httpApi instanceof HttpApi) {
            throw new \Exception('该类未继承HTTP接口类HttpApi，请检查');
        }

        self::$instance[$type] = $httpApi;
        return $httpApi;
    }
}