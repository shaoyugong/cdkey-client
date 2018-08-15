<?php
use \CdkeyClient\HttpApi;

class ConsoleApi extends HttpApi
{
    /**
     * 获取url地址
     * @param $action
     * @param $type
     * @param array $data
     * @return mixed|string
     */
    public function url($action, $type, $data = [])
    {
        $time = time();
        $sign = $this->sign($time, $this->token, $data);
        $data['time'] = $time;
        $data['sign'] = $sign;
        return $this->host . '/' . $action . '?' . http_build_query($data);
    }

    /**
     * 计算接口sign
     * @param $time
     * @param $token
     * @param array $data
     * @return mixed|string
     */
    public function sign($time, $token, $data = [])
    {
        return md5($time . $token);
    }
}