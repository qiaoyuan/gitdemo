<?php

class OrderProcess {

    private $stateObj;
    private $script = "[*] -> A <br/>
                      ";

    public function __construct($stateObj) {
        $this->stateObj = $stateObj;    
    }

    public function setState($state) {

        $this->stateObj = $state;

    }
    public function getState() {
        return $this->stateObj; 
    }

    public function getProcessAll() {

        $stateArr = $this->getStateAll();
        foreach($stateArr as $data) {
            $start = $this->stateObj->getByIdName($data['start_state']);
            $end   = $this->stateObj->getByIdName($data['end_state']);
            $event = $this->stateObj->eventObj->getByIdName($data['event_id']);

            $flag = "->";
            if($data['end_state'] == 4) { //4 中止状态
                $flag = "-->";
            }

            $this->script .= "{$start} {$flag} {$end} : {$event} <br/>";
        }

        return "@startuml<br/>".str_replace("中止", "[*]" , $this->script)."@enduml";
    
    }

    public function getProcess() {
        $stateEventArr =  $this->stateObj->getByStateEvent();        
        $name =  $this->stateObj->getByIdName();
        $msg = "当前节点事件：{$name}<br/>";

        if(empty($stateEventArr)) {
            return $msg."<front style='color:red'>空</front>";

        }

        $msg .= "<lu>";
        foreach($stateEventArr as $data) {

            $msg  .=  "<li style='color:blue'><a href='?state_id={$data['end_state']}'>".$this->stateObj->eventObj->getByIdName($data['event_id'])."编号:{$data['event_id']}</li>";
        }
        $msg .= "</lu>";

        return $msg;
    
    }

    public function getStateAll() {
        return $this->stateObj->getGuardsAll();
    }


    public function request($eventId) {

        $stateEventArr =  $this->stateObj->getByStateEvent();        
        $eventIdArr = array();
        foreach($stateEventArr as $eventData ) {
            $eventIdArr[] = $eventData['event_id'];
        }
        if(!in_array($eventId, $eventIdArr ) ) {

            echo "当前事件{$eventId}不能执行";
            die;
        
        }
        

        $data = Model::query("SELECT * FROM order_event e, order_guards_state ogs WHERE
            e.id=ogs.event_id AND e.id = {$eventId} ");
        $funName = EventDefine::$CONF_FUN[$data[0]['eventFun']];
        $isOk = EventDefine::$funName();
        if($isOk) {

            $stateObj = $this->stateObj->handle($data[0]['end_state']);
            $this->setState($stateObj);
            echo "成功"; 

        } else {
            echo "失败"; 
        }
    
    }


}
