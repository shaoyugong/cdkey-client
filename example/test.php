<?php

try
{
    $config = [
        "host"  => "http://127.0.0.1:9899",
        "token" => "123456",
    ];
    $where = [
        "limit"  => 100,
        "offset" => 0,
        "time"   => 1534213778,
        "sign"   => "84ff37b35072b0293aa7ed7f67b25c64",
    ];

    $doQuery = \Apifactory::getInstance($config)->giftbagList($where);
    $data    = json_decode($doQuery->body, true);

    if (200 != $doQuery->headers['Status-Code'] || true !== $data['status']) {
        throw new Exception($data['msg'] ? $data['msg'] : __('request failed'));
    }

    echo json_encode($data);
} catch (Exception $e) {
    echo json_encode(['status' => false, 'msg' => $e->getCode()]);
}