<?php
use \CdkeyClient\HttpApi;

class GameApi extends HttpApi
{
    /**
     * 获取url地址
     * @param string $action
     * @param array $data
     * @return string
     */
    public function url($action, $data = [])
    {
        $time = time();
        $data['time'] = $time;
        $data['sign'] = $this->sign($time, $this->token);
        return $this->host . '/' . $action . '?' . http_build_query($data);
    }
    /**
     * 计算接口sign
     * @param int $time
     * @param string $token
     * @return string
     */
    public function sign($time, $token)
    {
        return md5($time . $token);
    }
}