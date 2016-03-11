<?php
require_once './Workerman/Autoloader.php';
use Workerman\Worker;


$worker = new Worker('websocket://0.0.0.0:8484');

//$worker->onConnect = 'man_count';

function man_count($connect){
    global $worker;
   // foreach ($worker->connections as $connect){
        $connect->send(count($worker->connections));
   // }
};


//$worker->onClose = 'man_count';

$worker->onMessage ='man_count';
Worker::runAll();