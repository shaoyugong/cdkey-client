<?php
use \CdkeyClient\HttpApi;

class ConsoleApi extends HttpApi
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
        $sign = $this->sign($time, $this->token, $data);
        $data['time'] = $time;
        $data['sign'] = $sign;
        return $this->host . '/' . $action . '?' . http_build_query($data);
    }
    /**
     * 计算接口sign
     * @param int $time
     * @param string $token
     * @return string
     */
    public function sign($time, $token, $data = [])
    {
        return md5($time . $token);
    }
}