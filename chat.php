<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/11
 * Time: 17:26
 */
require_once './Workerman/Autoloader.php';
use Workerman\Worker;


$chat_work = new Worker('websocket://0.0.0.0:6666');
$chat_work->onMessage = function($connect,$data){
  global $chat_work;
    foreach($chat_work->connections as $connection){
        $connection->send($data);
    }
};
$chat_work::runAll();