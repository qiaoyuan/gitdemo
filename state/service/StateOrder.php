<?php
class StateOrder {

    public $eventObj;
    public $stateId;
    public $ordeNo = 1;
    public function __construct($stateId = 1) {

        $this->eventObj = new EventOrder($stateId);
        $this->stateId = $stateId;
    
    }

    public function handle($stateId) {
        Model::save("UPDATE order_demo SET state_id = {$stateId} WHERE id = {$this->ordeNo}");
        return new SELF($stateId);
    
    }

    public function getEvent() {

        $eventIdArr = $this->eventObj->getByStateEvent();

        return $eventIdArr;
    
    }


    public function getGuardsAll(){

        return Model::query("SELECT * FROM order_guards_state "); 
    
    }

    public function getByStateEvent() {

        $data = Model::query("SELECT * FROM order_guards_state WHERE start_state = {$this->stateId} ");
        return $data;
    
    }

    public function getByIdName($id=0) {

        if($id == 0) {
            $id = $this->stateId;   
        }

        $data = Model::query("SELECT * FROM order_state WHERE id = {$id} ");
        if(empty($data[0])) {

            return "";
        
        }

        return $data[0]['name'];
    
    }

    

}
