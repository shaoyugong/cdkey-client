<?php
use CdkeyClient\Apifactory;

try
{
    $config = [
        "host"  => "http://127.0.0.1:9899",
        "token" => "123456",
    ];
    $where = [
        "code" => "OWEURIO123",
        "pid"  => 123,
    ];

    $doQuery = Apifactory::getInstance($config)->useCdkey($where);
    $data    = json_decode($doQuery->body, true);

    if (200 != $doQuery->headers['Status-Code'] || true !== $data['status']) {
        throw new Exception($data['msg'] ? $data['msg'] : __('request failed'));
    }

    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['status' => false, 'msg' => $e->getCode()]);
}