<?php

function __autoload($class_name) {  

    if(file_exists(realpath(__DIR__).'/'.$class_name.'.php') ) {
         require_once(realpath(__DIR__).'/'.$class_name.'.php');
    }else if(file_exists(realpath(__DIR__).'/service/'.$class_name.'.php') ) {
         require_once(realpath(__DIR__).'/service/'.$class_name.'.php');
    }else if(file_exists(realpath(__DIR__).'/model/'.$class_name.'.php') ) {
         require_once(realpath(__DIR__).'/model/'.$class_name.'.php');
    }
    return false;
}  

$order = Model::query("SELECT * FROM order_demo ");

$stateId = $order[0]["state_id"];;
//查看uml图
$stateObj = new StateOrder($stateId); //初始化开始
$processObj = new OrderProcess($stateObj);
$script = $processObj->getProcess();
echo $script;
$processObj->request(3);
$processObj->request(5);
