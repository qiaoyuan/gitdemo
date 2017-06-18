<?php
class EventDefine {
    
    const CMD_A_TO_B  = 1;//正常授信，一次返回一个产品
    const CMD_B_TO_A  = 2;//老用户增信接口
    const CMD_B_TO_C  = 3;//老用户增信接口
    const CMD_STOP    = 4;//老用户增信接口
    const CMD_C_TO_A  = 5;//老用户增信接口

    private static $fileterConfig = array(
        self:: CMD_A_TO_B  => array(),
        self:: CMD_B_TO_A  => array(),
        self:: CMD_B_TO_C  => array(),
        self:: CMD_STOP    => array(),
        self:: CMD_C_TO_A  => array(),
    );


    public static $CONF_FUN = array(
       self::  CMD_A_TO_B  => 'cmdAToB',//正常授信，一次返回一个产品
       self::  CMD_B_TO_A  => 'cmdBToA',//老用户增信接口
       self::  CMD_B_TO_C  => 'cmdBToC',//老用户增信接口
       self::  CMD_STOP    => 'cmdStop',//老用户增信接口
       self::  CMD_C_TO_A  => 'cmdCToA',//老用户增信接口
    );

    public static function cmdAToB($param=array()) {

        echo "操作cmdAToB";
        return true;
    
    }

    public static function cmdBToA($param=array()) {

        echo "操作cmdBToA";
        return true;
    
    }

    public static function cmdBToC($param=array()) {

        echo "操作cmdBToC";
        return true;
    
    }

    public static function cmdStop($param=array()) {

        echo "操作cmdStop";
        return true;
    
    }

    public static function cmdCToA($param=array()) {
    
        echo "操作cmdCToA";
        return true;
    }

}
