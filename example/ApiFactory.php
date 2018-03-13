<?php
/**
 * Created by PhpStorm.
 * User: gongshaoyu
 * Date: 2018/3/8
 * Time: 下午12:22
 */

use CdkeyClient\HttpApi;

class ApiFactory
{
    /**
     * api对象
     * @var object
     */
    private static $instance = [];

    /**
     * 生成api对象
     * @param $host
     * @param $token
     * @return bool|CdkeyApi
     */
    public static function getInstance($host, $token)
    {
        if (self::$instance[$host]) {
            return self::$instance[$host];
        }

        $httpApi = new CdkeyApi($host, $token);

        if (!$httpApi instanceof HttpApi) {
            return false;
        }

        self::$instance[$type] = $httpApi;
        return $httpApi;
    }
}