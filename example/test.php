<?php

try
{
    $test = \ApiFactory::getInstance('lqwy', 'console', 'http://127.0.0.1:9899/api/', 'lqwy');
    $doRequest = $test->createGiftbag([
        'name'                => '100cdkey',
        'items'               => 'test100',
        'type'                => 12,
        'produce_count'       => 100,
        'create_admin_id'     => 1,
        'start_time'          => 1517155200,
        'end_time'            => 1543593600,
        'receive_only_once'   => 1,
        'band_only_once'      => 1,
        'use_only_once'       => 1,
        'code_auto_produce'   => 1,
        'receive_produce'     => 1,
        'receive_random_gift' => 1,
        'status'              => 1,
    ]);

    echo $doRequest;
} catch (Exception $e) {
    echo json_encode(['status' => false, 'msg' => 'inner error']);
}

