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
     * @param $action
     * @param array $data
     * @return mixed
     */
    abstract function url($action, $data = []);

    /**
     * @param $time
     * @param $token
     * @return mixed
     */
    abstract function sign($time, $token);

    /**
     * 创建礼包
     * @param $data
     * @return bool|CurlResponse
     */
    public function createGiftbag($data)
    {
        $url = $this->url("giftbag/add");
        return $this->post($url, $data);
    }

    /**
     * 更新礼包信息
     * @param $data
     * @return bool|CurlResponse
     */
    public function updateGiftbag($data)
    {
        $url = $this->url("giftbag/edit");
        return $this->post($url, $data);
    }

    /**
     * 查询礼包列表
     * @param array $data
     * @return CurlResponse
     */
    public function giftbagList($data = [])
    {
        $url = $this->url('giftbag/list', $data);
        return $this->get($url, $data);
    }

    /**
     * 礼包详情
     * @param $data
     * @return CurlResponse
     */
    public function giftbagDetil($data)
    {
        $url = $this->url('giftbag/detail', $data);
        return $this->get($url, $data);
    }

    /**
     * 礼包追加礼券
     * @param $data
     * @return CurlResponse
     */
    public function increaseGiftbag($data)
    {
        $url = $this->url('giftbag/increase', $data);
        return $this->post($url, $data);
    }

    /**
     * 领取礼券
     * @param $data
     * @return bool|CurlResponse
     */
    public function receiveCdkey($data)
    {
        $url = $this->url('cdkey/receive', $data);
        return $this->post($url, $data);
    }

    /**
     * 绑定礼券
     * @param $data
     * @return bool|CurlResponse
     */
    public function bandCdkey($data)
    {
        $url = $this->url('cdkey/band', $data);
        return $this->post($url, $data);
    }

    /**
     * 使用礼券
     * @param $data
     * @return bool|CurlResponse
     */
    public function useCdkey($data)
    {
        $url = $this->url('cdkey/use', $data);
        return $this->post($url, $data);
    }

    /**
     * 礼券列表
     * @param $data
     * @return CurlResponse
     */
    public function cdkeyList($data)
    {
        $url = $this->url('cdkey/list', $data);
        return $this->get($url, $data);
    }

    /**
     * 礼券下载
     * @param $data
     * @return CurlResponse
     */
    public function cdkeyDownload($data)
    {
        $url = $this->url('cdkey/download', $data);
        return $this->get($url, $data);
    }

    /**
     * 礼券详情
     * @param $data
     * @return CurlResponse
     */
    public function cdkeyDetil($data)
    {
        $url = $this->url('cdkey/detail', $data);
        return $this->get($url, $data);
    }
}