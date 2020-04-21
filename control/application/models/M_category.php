<?php
defined("BASEPATH") or exit("No Direct Script");
date_default_timezone_set("Asia/Jakarta");

class M_category extends CI_Model{
    private $tbl_name = "";
    private $id_submit_cat;
    private $category_name;
    
    private $category_status;
    private $category_created_date;
    private $category_last_modified;
    private $id_last_modified;
    private $id_acc_created;

    public function __construct(){
        parent::__construct();
        $this->category_created_date = date("Y-m-d H:i:s"); 
        $this->category_last_modified = date("Y-m-d H:i:s"); 
        $this->id_last_modified = $this->session->id_submit_acc; 
        $this->id_acc_created = $this->session->id_submit_acc;
    }
}
?>
