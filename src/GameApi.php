<?php
namespace CdkeyClient;

class GameApi extends HttpApi
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
        $time  = time();
        $query = "";
        
        switch ($type) {
            case HttpApi::METHOD_GET:
                $sign  = $this->sign($time, $this->token);
                $query = $data;
                $query['time'] = $time;
                $query['sign'] = $sign;
                break;
            case HttpApi::METHOD_POST:
                $sign  = $this->sign($time, $this->token, $data);
                $query = ['time' => $time, 'sign' => $sign];
                break;
        }

        return $this->host . '/' . $action . '?' . http_build_query($query);
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
        $signStr = (is_array($data) && $data) ? implode("", $data) : "";
        return md5($signStr . $time . $token);
    }
}