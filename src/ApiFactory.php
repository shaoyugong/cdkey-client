<?php
/**
 * Created by PhpStorm.
 * User: gongshaoyu
 * Date: 2018/3/8
 * Time: 下午12:22
 */
namespace CdkeyClient;

class ApiFactory
{

    /**
     * api对象
     * @var object
     */
    private static $instance = [];

    /**
     * @param $project
     * @param $type
     * @param $host
     * @param $token
     * @return HttpApi
     */
    public static function getInstance($project, $type, $host, $token)
    {
        if (self::$instance[$project][$type]) {
            return self::$instance[$project][$type];
        }

        $httpApi = new HttpApi($host, $token);
        self::$instance[$project][$type] = $httpApi;
        return $httpApi;
    }
}