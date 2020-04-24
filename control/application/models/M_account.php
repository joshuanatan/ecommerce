<?php
defined("BASEPATH") or exit("No Direct Script Allowed");
date_default_timezone_set("Asia/Jakarta");

class M_Account extends CI_Model{
    private $tbl_name = "mstr_acc";
    private $column_list = "";
    private $id_submit_acc = 0;
    private $acc_name = "";
    private $acc_email = "";
    private $acc_pswd = "";
    private $acc_phone = "";
    private $acc_level = "";
    private $acc_status = "";

    private $acc_last_modified = "";
    private $acc_created_date = "";
    private $id_last_modified = 0;
    private $id_acc_created = 0;

    public function __construct(){
        parent::__construct();
        $this->acc_last_modified = date("Y-m-d H:i:s");
        $this->acc_created_date = date("Y-m-d H:i:s");
        $this->id_last_modified = $this->session->id_submit_acc;
        $this->id_acc_created = $this->session->id_submit_acc;

        $this->column_list = array(
            array(
                "col_name" => "id_submit_acc",
                "col_disp" => "ID",
                "order_by" => true
            ),
            array(
                "col_name" => "acc_name",
                "col_disp" => "Account Name",
                "order_by" => false
            ),
            array(
                "col_name" => "acc_email",
                "col_disp" => "Account Email",
                "order_by" => false
            ),
            array(
                "col_name" => "acc_phone",
                "col_disp" => "Account Phone",
                "order_by" => false
            ),
            array(
                "col_name" => "acc_level",
                "col_disp" => "Account Level",
                "order_by" => false
            ),
            array(
                "col_name" => "acc_status",
                "col_disp" => "Status",
                "order_by" => false
            ),
        );
    }
    public function install(){
        $query = "
        create table mstr_acc(
            id_submit_acc int primary key auto_increment,
            acc_name varchar(50),
            acc_email varchar(100),
            acc_pswd varchar(255),
            acc_phone varchar(15),
            acc_level varchar(30),
            acc_status varchar(20),
            acc_last_modified datetime,
            acc_created_date datetime,
            id_last_modified int,
            id_acc_created int
        );
        create table mstr_acc_log(
            id_submit_mstr_acc_log int primary key auto_increment,
            id_submit_acc int,
            executed_action varchar(30),
            acc_name varchar(50),
            acc_email varchar(100),
            acc_pswd varchar(255),
            acc_phone varchar(15),
            acc_level varchar(30),
            acc_status varchar(20),
            acc_last_modified datetime,
            acc_created_date datetime,
            id_last_modified int,
            id_acc_created int
        );
        DROP TRIGGER IF EXISTS LOG_BEFORE_UPDATE_ACC;
        DELIMITER $$
            CREATE TRIGGER LOG_BEFORE_UPDATE_ACC
            BEFORE UPDATE 
            ON mstr_acc FOR EACH ROW 
            BEGIN
                INSERT INTO mstr_acc_log(id_submit_acc,executed_action,acc_name,acc_email,acc_pswd,acc_phone,acc_level,acc_status,acc_last_modified,acc_created_date,id_last_modified,id_acc_created) 
                VALUES(OLD.id_submit_acc,'BEFORE UPDATE',OLD.acc_name,OLD.acc_email,OLD.acc_pswd,OLD.acc_phone,OLD.acc_level,OLD.acc_status,OLD.acc_last_modified,OLD.acc_created_date,OLD.id_last_modified,OLD.id_acc_created);
            END$$
        DELIMITER ;
        DROP TRIGGER IF EXISTS LOG_BEFORE_DELETE_ACC;
        DELIMITER $$
            CREATE TRIGGER LOG_BEFORE_DELETE_ACC
            BEFORE UPDATE 
            ON mstr_acc FOR EACH ROW 
            BEGIN
                INSERT INTO mstr_acc_log(id_submit_acc,executed_action,acc_name,acc_email,acc_pswd,acc_phone,acc_level,acc_status,acc_last_modified,acc_created_date,id_last_modified,id_acc_created) 
                VALUES(OLD.id_submit_acc,'BEFORE DELETE',OLD.acc_name,OLD.acc_email,OLD.acc_pswd,OLD.acc_phone,OLD.acc_level,OLD.acc_status,OLD.acc_last_modified,OLD.acc_created_date,OLD.id_last_modified,OLD.id_acc_created);
            END$$
        DELIMITER ;
        ";
    }
    public function column(){
        return $this->column_list;
    }
    public function total_data(){
        $where = array(
            "acc_status" => "ACTIVE"
        );
        return getAmount($this->tbl_name,"id_submit_acc",$where);
    }
    public function detail(){
        $where = array(
            "id_submit_acc" => $this->id_submit_acc,
        );
        $field = array(
            "acc_name","acc_email","acc_phone","acc_status","acc_last_modified","acc_level"
        );
        $result = selectRow($this->tbl_name,$where,$field);
        return $result;
    }
    public function list($page = 1,$order_by = "acc_name", $order_direction = "ASC", $search_key = "",$data_per_page = ""){
        $order_by = $this->column_list[$order_by]["col_name"];
        $search_query = "";
        if($search_key != ""){
            $search_query .= "AND
            ( 
                id_submit_acc LIKE '%".$search_key."%' OR
                acc_name LIKE '%".$search_key."%' OR
                acc_pswd LIKE '%".$search_key."%' OR
                acc_phone LIKE '%".$search_key."%' OR
                acc_level LIKE '%".$search_key."%' OR
                acc_status LIKE '%".$search_key."%'
            )
            ";
        }
        $query = "
        SELECT id_submit_acc,acc_name,acc_email,acc_phone,acc_status,acc_last_modified,acc_level
        FROM ".$this->tbl_name." 
        WHERE acc_status != ? ".$search_query."  
        ORDER BY ".$order_by." ".$order_direction." 
        LIMIT 10 OFFSET ".($page-1)*$data_per_page;
        $args = array(
            "NOT ACTIVE"
        );
        $result["data"] = executeQuery($query,$args);
        
        $query = "
        SELECT id_submit_acc
        FROM ".$this->tbl_name." 
        WHERE acc_status != ? ".$search_query."  
        ORDER BY ".$order_by." ".$order_direction;
        $result["total_data"] = executeQuery($query,$args)->num_rows();
        return $result;
    }
    public function insert(){
        $where = array(
            "acc_email" => $this->acc_email,
            "acc_status" => "ACTIVE"
        );
        if(!isExistsInTable($this->tbl_name,$where)){
            $data = array(
                "acc_name"  => $this->acc_name,
                "acc_email" => $this->acc_email,
                "acc_pswd" => password_hash($this->acc_pswd,PASSWORD_DEFAULT),
                "acc_phone" => $this->acc_phone,
                "acc_level" => $this->acc_level,
                "acc_status" => $this->acc_status,
                "acc_last_modified" => $this->acc_last_modified,
                "acc_created_date" => $this->acc_created_date,
                "id_last_modified" => $this->id_last_modified,
                "id_acc_created" => $this->id_acc_created,
            );
            return insertRow($this->tbl_name,$data);
        }
        else{
            return false;
        }
    }
    public function update(){
        $where = array(
            "id_submit_acc !=" => $this->id_submit_acc,
            "acc_email" => $this->acc_email,
            "acc_status" => "ACTIVE"
        );
        if(!isExistsInTable($this->tbl_name,$where)){
            $where = array(
                "id_submit_acc" => $this->id_submit_acc,
            );
            $data = array(
                "acc_name"  => $this->acc_name,
                "acc_email" => $this->acc_email,
                "acc_phone" => $this->acc_phone,
                "acc_level" => $this->acc_level,
                "acc_status" => $this->acc_status,
                "acc_last_modified" => $this->acc_last_modified,
                "id_last_modified" => $this->id_last_modified,
            );
            updateRow($this->tbl_name,$data,$where);
            return true;
        }
        else{
            return false;
        } 
    }
    public function delete(){
        $where = array(
            "id_submit_acc" => $this->id_submit_acc,
        );
        $data = array(
            "acc_status" => "NOT ACTIVE",
            "acc_last_modified" => $this->acc_last_modified,
            "id_last_modified" => $this->id_last_modified,
        );
        updateRow($this->tbl_name,$data,$where);
        return true;
    }
    public function login(){
        $where = array(
            "acc_email" => $this->acc_email,
            "acc_status" => "ACTIVE"
        );
        $field = array(
            "id_submit_acc","acc_name", "acc_pswd"
        );
        $result = selectRow($this->tbl_name,$where,$field);
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
    public function set_acc_status($acc_status){
        if($acc_status != ""){
            $this->acc_status = $acc_status;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_acc_level($acc_level){
        if($acc_level != ""){
            $this->acc_level = $acc_level;
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
    public function get_acc_status(){
        return $this->acc_status;
    }
    public function get_acc_level(){
        return $this->acc_level;
    }
}
?>