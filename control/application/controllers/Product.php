<?php
defined("BASEPATH") or exit("No Direct Script");
class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->user_verification->is_logged_on($this->session->id_submit_acc)){
            redirect("welcome/dashboard");
        }
    }
    public function index(){
        $this->page_generator->head();
        $this->page_generator->page_open();
        $this->page_generator->navbar($this->session->id_submit_acc,"product");
        
        $this->load->view("product/page_open");
        $this->load->model("m_product");
        
        $data["col"] = $this->m_product->column();
        
        $this->load->view("product/content",$data);
        
        $this->load->view("product/page_close");
        $this->page_generator->page_close();
    }
}