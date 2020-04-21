<?php
defined("BASEPATH") or exit("No Direct Script");
date_default_timezone_set("Asia/Jakarta");

class M_product extends CI_Model{
    private $tbl_name = "";
    private $id_submit_product;
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
        $this->id_acc_created = $this->session->id_submit_acc;
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

    }
    public function set_id_submit_product($id_submit_product){
        if($id_submit_product != ""){
            $this->id_submit_product = $id_submit_product;
        }
        else{
            return false;
        }
    }
    public function set_product_name($product_name){
        if($product_name != ""){
            $this->product_name = $product_name;
        }
        else{
            return false;
        }
    }
    public function set_product_desc($product_desc){
        if($product_desc != ""){
            $this->product_desc = $product_desc;
        }
        else{
            return false;
        }
    }
    public function set_product_stock($product_stock){
        if($product_stock != ""){
            $this->product_stock = $product_stock;
        }
        else{
            return false;
        }
    }
    public function set_product_img($product_img){
        if($product_img != ""){
            $this->product_img = $product_img;
        }
        else{
            return false;
        }
    }
    public function set_product_price($product_price){
        if($product_price != ""){
            $this->product_price = $product_price;
        }
        else{
            return false;
        }
    }
    public function set_product_spc_price($product_spc_price){
        if($product_spc_price != ""){
            $this->product_spc_price = $product_spc_price;
        }
        else{
            return false;
        }
    }
    public function set_product_spc_price_end_date($product_spc_price_end_date){
        if($product_spc_price_end_date != ""){
            $this->product_spc_price_end_date = $product_spc_price_end_date;
        }
        else{
            return false;
        }
    }
    public function set_product_status($product_status){
        if($product_status != ""){
            $this->product_status = $product_status;
        }
        else{
            return false;
        }
    }
    public function get_id_submit_product(){
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
