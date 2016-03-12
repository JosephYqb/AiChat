<?php
require_once './Workerman/Autoloader.php';
use Workerman\Worker;


$worker = new Worker('websocket://0.0.0.0:5555');
$worker->onConnect =function($connect){
    $connect->ip = explode(' ',$_SERVER['SSH_CONNECTION'])[0];
};
$worker->onMessage =function($connect,$data){
	  global $worker;
    foreach($worker->connections as $connection){
        $connection->send($connect->ip .':'. htmlspecialchars($data));
    }

};
Worker::runAll();