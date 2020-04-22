<?php
defined("BASEPATH") or exit("No Direct Script");
date_default_timezone_set("Asia/Jakarta");

class M_product extends CI_Model{
    private $tbl_name = "mstr_product";
    private $id_submit_product;
    private $product_code;
    private $product_name;
    private $product_desc;
    private $product_stock;
    private $product_img;
    private $product_price;
    private $product_spc_price;
    private $product_spc_price_end_date;
    private $product_status;

    private $product_created_date;
    private $product_last_modified;
    private $id_last_modified;
    private $id_acc_created;

    public function __construct(){
        parent::__construct();
        $this->product_created_date = date("Y-m-d H:i:s"); 
        $this->product_last_modified = date("Y-m-d H:i:s"); 
        $this->id_last_modified = $this->session->id_submit_acc; 
        return true;
        $this->id_acc_created = $this->session->id_submit_acc;
        return true;
    }
    public function install(){
        $query = "
        CREATE TABLE mstr_product(
            id_submit_product int primary key auto_increment,
            product_code varchar(32),
            product_name varchar(100),
            product_desc varchar(300),
            product_stock int,
            product_img varchar(100),
            product_price int,
            product_spc_price int,
            product_spc_price_end_date datetime,
            product_status varchar(10),
            product_created_date datetime,
            product_last_modified datetime,
            id_last_modified int,
            id_acc_created int
        );
        CREATE TABLE mstr_product_log(
            id_submit_mstr_product_log int primary key auto_increment,
            executed_action varchar(30),
            id_submit_product int,
            product_code varchar(32),
            product_name varchar(100),
            product_desc varchar(300),
            product_stock int,
            product_img varchar(100),
            product_price int,
            product_spc_price int,
            product_spc_price_end_date datetime,
            product_status varchar(10),
            product_created_date datetime,
            product_last_modified datetime,
            id_last_modified int,
            id_acc_created int
        );
        DROP TRIGGER IF EXISTS LOG_BEFORE_UPDATE_PRODUCT;
        DELIMITER $$	
            CREATE TRIGGER LOG_BEFORE_UPDATE_PRODUCT
            BEFORE UPDATE
            ON mstr_product FOR EACH ROW
            begin
            INSERT INTO mstr_product_log(id_submit_product,executed_action,product_code,product_name,product_desc,product_stock,product_img,product_price,product_spc_price,product_spc_price_end_date,product_status,product_created_date,product_last_modified,id_last_modified,id_acc_created) VALUES (OLD.id_submit_product,'BEFORE UPDATE',OLD.product_code,OLD.product_name,OLD.product_desc,OLD.product_stock,OLD.product_img,OLD.product_price,OLD.product_spc_price,OLD.product_spc_price_end_date,OLD.product_status,OLD.product_created_date,OLD.product_last_modified,OLD.id_last_modified,OLD.id_acc_created);
            end$$
        DELIMITER ;
        
        DROP TRIGGER IF EXISTS LOG_BEFORE_DELETE_PRODUCT;
        DELIMITER $$
            CREATE TRIGGER LOG_BEFORE_DELETE_PRODUCT
            BEFORE DELETE
            ON mstr_product FOR EACH ROW
            begin
            INSERT INTO mstr_product_log(id_submit_product,executed_action,product_code,product_name,product_desc,product_stock,product_img,product_price,product_spc_price,product_spc_price_end_date,product_status,product_created_date,product_last_modified,id_last_modified,id_acc_created) VALUES (OLD.id_submit_product,'BEFORE DELETE',OLD.product_code,OLD.product_name,OLD.product_desc,OLD.product_stock,OLD.product_img,OLD.product_price,OLD.product_spc_price,OLD.product_spc_price_end_date,OLD.product_status,OLD.product_created_date,OLD.product_last_modified,OLD.id_last_modified,OLD.id_acc_created);
            end$$
        DELIMITER ;
        ";
        $this->db->query($query);
    }
    public function insert(){
        $where = array(
            "product_name" => $this->product_name
        );
        if(!isExistsInTable("mstr_product",$where)){
            $data = array(
                "product_code" => $this->product_code,
                "product_name" => $this->product_name,
                "product_desc" => $this->product_desc,
                "product_stock" => $this->product_stock,
                "product_img" => $this->product_img,
                "product_price" => $this->product_price,
                "product_spc_price" => $this->product_spc_price,
                "product_spc_price_end_date" => $this->product_spc_price_end_date,
                "product_status" => $this->product_status,
                "product_created_date" => $this->product_created_date,
                "product_last_modified" => $this->product_last_modified,
                "id_last_modified" => $this->id_last_modified,
                "id_acc_created" => $this->id_acc_created
            );
            insertRow("mstr_product",$data);
            return true;
        }
        else{
            return false;
        }
    }   
    public function update(){
        $where = array(
            "id_submit_product !=" => $this->id_submit_product,
            "product_name" => $this->product_name,
            "product_status" => "ACTIVE"
        );
        if(!isExistsInTable("mstr_product",$where)){
            $where = array(
                "id_submit_product" => $this->id_submit_product,
            );
            $data = array(
                "product_code" => $this->product_code,
                "product_name" => $this->product_name,
                "product_desc" => $this->product_desc,
                "product_stock" => $this->product_stock,
                "product_img" => $this->product_img,
                "product_price" => $this->product_price,
                "product_spc_price" => $this->product_spc_price,
                "product_spc_price_end_date" => $this->product_spc_price_end_date,
                "product_last_modified" => $this->product_last_modified,
                "id_last_modified" => $this->id_last_modified,
            );
            insertRow("mstr_product",$data);
            return true;
        }
        else{
            return false;
        }
    }
    public function delete(){
        $where = array(
            "id_submit_product" => $this->id_submit_product,
        );
        $data = array(
            "product_status" => "NOT ACTIVE",
            "product_last_modified" => $this->product_last_modified,
            "id_last_modified" => $this->id_last_modified,
        );
        insertRow("mstr_product",$data);
        return true;
    }
    public function get_last_product_id(){
        $where = array(
            "id_submit_product >" => 0
        );
        return getLastId($this->tbl_name,"id_submit_product",$where);
    }
    public function generate_product_code($id_submit_product){
        if($id_submit_product != ""){
            return md5("ITMNO-".$id_submit_product);
        }
        else{
            return false;
        }
    }
    public function set_id_submit_product($id_submit_product){
        if($id_submit_product != ""){
            $this->id_submit_product = $id_submit_product;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_code($product_code){
        if($product_code != ""){
            $this->product_code = $product_code;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_name($product_name){
        if($product_name != ""){
            $this->product_name = $product_name;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_desc($product_desc){
        if($product_desc != ""){
            $this->product_desc = $product_desc;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_stock($product_stock){
        if($product_stock != ""){
            $this->product_stock = $product_stock;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_img($product_img){
        if($product_img != ""){
            $this->product_img = $product_img;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_price($product_price){
        if($product_price != ""){
            $this->product_price = $product_price;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_spc_price($product_spc_price){
        if($product_spc_price != ""){
            $this->product_spc_price = $product_spc_price;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_spc_price_end_date($product_spc_price_end_date){
        if($product_spc_price_end_date != ""){
            $this->product_spc_price_end_date = $product_spc_price_end_date;
            return true;
        }
        else{
            return false;
        }
    }
    public function set_product_status($product_status){
        if($product_status != ""){
            $this->product_status = $product_status;
            return true;
        }
        else{
            return false;
        }
    }
    public function get_id_submit_product(){
        return $this->id_submit_product;
    }
    public function get_product_code(){
        return $this->id_submit_product;
    }
    public function get_product_name(){
        return $this->product_name;
    }
    public function get_product_desc(){
        return $this->product_desc;
    }
    public function get_product_stock(){
        return $this->product_stock;
    }
    public function get_product_img(){
        return $this->product_img;
    }
    public function get_product_price(){
        return $this->product_price;
    }
    public function get_product_spc_price(){
        return $this->product_spc_price;
    }
    public function get_product_spc_price_end_date(){
        return $this->product_spc_price_end_date;
    }
    public function get_product_status(){
        return $this->product_status;
    }
}
?>
