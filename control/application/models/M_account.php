<?php
defined("BASEPATH") or exit("No Direct Script Allowed");
date_default_timezone_set("Asia/Jakarta");

class M_Account extends CI_Model{
    private $id_submit_acc = 0;
    private $acc_name = "";
    private $acc_email = "";
    private $acc_pswd = "";
    private $acc_phone = "";
    private $acc_last_modified = "";
    private $id_last_modified = 0;

    public function __construct(){
        parent::__construct();
        $this->acc_last_modified = date("Y-m-d H:i:s");
        $this->id_last_modified = $this->session->id_submit_acc;
    }
    public function login(){
        $where = array(
            "acc_email" => $this->acc_email,
            "acc_status" => "ACTIVE"
        );
        $field = array(
            "id_submit_acc","acc_name", "acc_pswd"
        );
        $result = selectRow("mstr_acc",$where,$field);
        if($result->num_rows() > 0){
            $result = $result->result_array();
            if (password_verify($this->acc_pswd, $result[0]["acc_pswd"])){
                $data = array(
                    "id" => $result[0]["id_submit_acc"],
                    "name" => $result[0]["acc_name"],
                    "email" => $email 
                );
                return $data;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function insert(){
        $data = array(
            "acc_name"  => $this->acc_name,
            "acc_email" => $this->acc_email,
            "acc_pswd" => password_hash($this->acc_pswd,PASSWORD_DEFAULT),
            "acc_phone" => $this->acc_phone,
            "acc_status" => "ACTIVE",
            "acc_last_modified" => $this->acc_last_modified,
            "id_last_modified" => $this->id_last_modified,
        );
        return insertRow("mstr_acc",$data);
    }
    public function list(){
        $where = array(
            "acc_status !=" => "DELETED"
        );
        $field = array(
            "acc_name","acc_email","acc_phone","acc_status","acc_last_modified"
        );
        $result = selectRow("mstr_acc",$where,$field);
        return $result;
    }
    #setter & getter
    public function set_id_submit_acc($id_submit_acc){
        if($id_submit_acc != "" && is_numeric($id_submit_acc)){
            $this->id_submit_acc = $id_submit_acc;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_acc_name($acc_name){
        if($acc_name != ""){
            $this->acc_name = $acc_name;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_acc_email($acc_email){
        if($acc_email != ""){
            $this->acc_email = $acc_email;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_acc_pswd($acc_pswd){
        if($acc_pswd != ""){
            $this->acc_pswd = $acc_pswd;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_acc_phone($acc_phone){
        if($acc_phone != ""){
            $this->acc_phone = $acc_phone;
            return true;
        }
        else{
            return false;
        }
    }
    public function get_id_submit_acc(){
        return $this->id_submit_acc;
    }
    public function get_acc_name(){
        return $this->acc_name;
    }
    public function get_acc_email(){
        return $this->acc_email;
    }
    public function get_acc_pswd(){
        return $this->acc_pswd;
    }
    public function get_acc_phone(){
        return $this->acc_phone;
    }
}
?>