<?php
defined("BASEPATH") or exit("No Direct Script");
date_default_timezone_set("Asia/Jakarta");

class M_product_cat extends CI_Model{
    private $tbl_name = "";
    private $id_submit_product_cat;
    private $id_product;
    private $id_category;

    private $product_cat_status;
    private $product_cat_created_date;
    private $product_cat_last_modified;
    private $id_last_modified;
    private $id_acc_created;

    public function __construct(){
        parent::__construct();
        $this->product_cat_created_date = date("Y-m-d H:i:s"); 
        $this->product_cat_last_modified = date("Y-m-d H:i:s"); 
        $this->id_last_modified = $this->session->id_submit_acc; 
        $this->id_acc_created = $this->session->id_submit_acc;
    }
}
?>
