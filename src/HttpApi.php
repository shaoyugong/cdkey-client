<?php
/**
 * Created by PhpStorm.
 * User: gongshaoyu
 * Date: 2018/3/8
 * Time: 下午12:22
 */
namespace CdkeyClient;

class HttpApi extends Curl
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
     * 获取url地址
     * @param string $action
     * @param array $data
     * @return string
     */
    public function getUrl($action, $data = [])
    {
        $time = time();
        $data['time'] = $time;
        $data['sign'] = $this->doSign($time, $this->token);
        return $this->host . '/' . $action . '?' . http_build_query($data);
    }

    /**
     * 计算接口sign
     * @param int $time
     * @param string $token
     * @return string
     */
    public function doSign($time, $token)
    {
        return md5($time . $token);
    }

    /**
     * 创建礼包
     * @param $data
     * @return bool|CurlResponse
     */
    public function createGiftbag($data)
    {
        $url = $this->getUrl("giftbag/add");
        return $this->post($url, $data);
    }

    /**
     * 更新礼包信息
     * @param $data
     * @return bool|CurlResponse
     */
    public function updateGiftbag($data)
    {
        $url = $this->getUrl("giftbag/edit");
        return $this->post($url, $data);
    }

    /**
     * 查询礼包列表
     * @param array $data
     * @return CurlResponse
     */
    public function giftbagList($data = [])
    {
        $url = $this->getUrl('giftbag/list', $data);
        return $this->get($url, $data);
    }

    /**
     * 礼包详情
     * @param $data
     * @return CurlResponse
     */
    public function giftbagDetil($data)
    {
        $url = $this->getUrl('giftbag/detail', $data);
        return $this->get($url, $data);
    }

    /**
     * 礼包追加礼券
     * @param $data
     * @return CurlResponse
     */
    public function increaseGiftbag($data)
    {
        $url = $this->getUrl('giftbag/increase', $data);
        return $this->post($url, $data);
    }

    /**
     * 领取礼券
     * @param $data
     * @return bool|CurlResponse
     */
    public function receiveCdkey($data)
    {
        $url = $this->getUrl('cdkey/receive', $data);
        return $this->post($url, $data);
    }

    /**
     * 绑定礼券
     * @param $data
     * @return bool|CurlResponse
     */
    public function bandCdkey($data)
    {
        $url = $this->getUrl('cdkey/band', $data);
        return $this->post($url, $data);
    }

    /**
     * 使用礼券
     * @param $data
     * @return bool|CurlResponse
     */
    public function useCdkey($data)
    {
        $url = $this->getUrl('cdkey/use', $data);
        return $this->post($url, $data);
    }

    /**
     * 礼券详情
     * @param $data
     * @return CurlResponse
     */
    public function cdkeyDetil($data)
    {
        $url = $this->getUrl('cdkey/detail', $data);
        return $this->get($url, $data);
    }
}