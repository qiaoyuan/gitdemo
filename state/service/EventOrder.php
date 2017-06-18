<?php
class EventOrder {

    public $stateId;

    public function __construct($stateId) {

        $this->stateId = $stateId;

    }


    public function getByIdName($id) {

        $data = Model::query("SELECT * FROM order_event WHERE id = {$id} LIMIT 1");

        return $data[0]['name'];
    
    }



}
