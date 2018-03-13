<?php
$server = new \swoole_websocket_server("local.ddb.com", 9502);

$server->on('open', function (\swoole_websocket_server $server, $request) {
    echo "server: handshake success with fd{$request->fd}\n";
});

$server->on('message', function (\swoole_websocket_server $server, $frame) {
    print_r(json_decode($frame->data));
    foreach(json_decode($frame->data) as $v){
        print_r("v:".$v);
    }
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "this is server");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();