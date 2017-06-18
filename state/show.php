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

$stateId = 1;

//查看uml图
$stateObj = new StateOrder($stateId); //初始化开始
$processObj = new OrderProcess($stateObj);
$script = $processObj->getProcessAll();
echo $script;
