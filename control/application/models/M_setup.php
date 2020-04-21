<?php
defined("BASEPATH") or exit("No Direct Script");

class M_setup extends CI_Model{
    private $tbl_name = "";
    private $id_submit_setup;
    private $shop_name;
    private $shop_desc;
    private $shop_vision;
    private $shop_mission;
    private $shop_logo;
    
    private $setup_status;
    private $setup_created_date;
    private $setup_last_modified;
    private $id_last_modified;
    private $id_acc_created;

    public function __contruct(){
        parent::__construct();
        $this->setup_created_date = date("Y-m-d H:i:s"); 
        $this->setup_last_modified = date("Y-m-d H:i:s"); 
        $this->id_last_modified = $this->session->id_submit_acc; 
        $this->id_acc_created = $this->session->id_submit_acc;
    }
    public function list(){

    }
    public function insert(){

    }
    public function update(){
        $this->log();
    }
    public function delete(){
        $this->log();
    }
    private function log(){
        //do insert current data to log table before doing changes
    }
    public function set_id_submit_setup($id_submit_setup = ""){
        if($id_submit_setup != ""){
            $this->id_submit_setup = $id_submit_setup;
        }
        else{
            return false;
        }
    }
    public function set_shop_name($shop_name = ""){
        if($shop_name != ""){
            $this->shop_name = $shop_name;
        }
        else{
            return false;
        }
    }
    public function set_shop_desc($shop_desc = ""){
        if($shop_desc != ""){
            $this->shop_desc = $shop_desc;
        }
        else{
            return false;
        }
    }
    public function set_shop_vision($shop_vision = ""){
        if($shop_vision != ""){
            $this->shop_vision = $shop_vision;
        }
        else{
            return false;
        }
    }
    public function set_shop_mission($shop_mission = ""){
        if($shop_mission != ""){
            $this->shop_mission = $shop_mission;
        }
        else{
            return false;
        }
    }
    public function set_shop_logo($shop_logo = ""){
        if($shop_logo != ""){
            $this->shop_logo = $shop_logo;
        }
        else{
            return false;
        }
    }
    public function set_setup_status(){
        if($setup_status != ""){
            $this->setup_status = $setup_status;
        }
        else{
            return false;
        }
    }
    public function get_id_submit_setup($id_submit_setup){
        return $this->id_submit_setup;
    }
    public function get_shop_name($shop_name){
        return $this->shop_name;
    }
    public function get_shop_desc($shop_desc){
        return $this->shop_desc;
    }
    public function get_shop_vision($shop_vision){
        return $this->shop_vision;
    }
    public function get_shop_mission($shop_mission){
        return $this->shop_mission;
    }
    public function get_shop_logo($shop_logo){
        return $this->shop_logo;
    }
    public function get_setup_status($setup_status){
        return $this->setup_status;
    }
}
?>