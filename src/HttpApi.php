<?php
/**
 * Created by PhpStorm.
 * User: gongshaoyu
 * Date: 2018/3/8
 * Time: 下午12:22
 */

namespace CdkeyClient;

abstract class HttpApi extends Curl
{
    const METHOD_GET  = 0;
    const METHOD_POST = 1;

    /**
     * 接口地址
     * @var string
     */
    public $host;

    /**
     * 接口token
     * @var string
     */
    public $token;

    /**
     * HttpApi constructor.
     * @param $host
     * @param $port
     * @param $token
     */
    public function __construct($host, $token)
    {
        parent::__construct();
        $this->host  = $host;
        $this->token = $token;
    }

    /**
     * url地址
     * @param $action
     * @param array $data
     * @return mixed
     */
    abstract function url($action, $type, $data = []);

    /**
     * sign验证
     * @param $time
     * @param $token
     * @param array $data
     * @return mixed
     */
    abstract function sign($time, $token, $data = []);

    /**
     * 创建礼包
     * @param $data
     * @return CurlResponse
     */
    public function createGiftbag($data)
    {
        $url = $this->url("giftbag/add", self::METHOD_POST, $data);
        return $this->post($url, $data);
    }

    /**
     * 更新礼包信息
     * @param $data
     * @return CurlResponse
     */
    public function updateGiftbag($data)
    {
        $url = $this->url("giftbag/edit", self::METHOD_POST, $data);
        return $this->post($url, $data);
    }

    /**
     * 查询礼包
     * @param array $data
     * @return CurlResponse
     */
    public function giftbagList($data = [])
    {
        $url = $this->url('giftbag/list', self::METHOD_GET, $data);
        return $this->get($url, $data);
    }

    /**
     * 礼包详情
     * @param $data
     * @return CurlResponse
     */
    public function giftbagDetil($data)
    {
        $url = $this->url('giftbag/detail', self::METHOD_GET, $data);
        return $this->get($url, $data);
    }

    /**
     * 删除礼包
     * @param $data
     * @return bool|CurlResponse
     */
    public function deleteGiftbag($data)
    {
        $url = $this->url("giftbag/delete", self::METHOD_POST, $data);
        return $this->post($url, $data);
    }

    /**
     * 礼包追加礼券
     * @param $data
     * @return CurlResponse
     */
    public function increaseGiftbag($data)
    {
        $url = $this->url('giftbag/increase', self::METHOD_POST, $data);
        return $this->post($url, $data);
    }

    /**
     * 领取礼券
     * @param $data
     * @return CurlResponse
     */
    public function receiveCdkey($data)
    {
        $url = $this->url('cdkey/receive', self::METHOD_POST, $data);
        return $this->post($url, $data);
    }

    /**
     * 使用礼券
     * @param $data
     * @return CurlResponse
     */
    public function useCdkey($data)
    {
        $url = $this->url('cdkey/use', self::METHOD_POST, $data);
        return $this->post($url, $data);
    }

    /**
     * 礼券列表
     * @param $data
     * @return CurlResponse
     */
    public function cdkeyList($data)
    {
        $url = $this->url('cdkey/list', self::METHOD_GET, $data);
        return $this->get($url, $data);
    }

    /**
     * 礼券详情
     * @param $data
     * @return CurlResponse
     */
    public function cdkeyDetil($data)
    {
        $url = $this->url('cdkey/detail', self::METHOD_GET, $data);
        return $this->get($url, $data);
    }
}