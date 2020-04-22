<?php
defined("BASEPATH") or exit("No Direct Script");
class Account extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->user_verification->is_logged_on($this->session->id_submit_acc)){
            redirect("welcome/dashboard");
        }
    }
    public function index(){
        $this->page_generator->head();
        $this->page_generator->page_open();
        $this->page_generator->navbar($this->session->id_submit_acc,"account");
        
        $this->load->view("account/page_open");
        $this->load->model("m_account");
        
        $data["col"] = $this->m_account->column();
        
        $this->load->view("account/content",$data);
        
        $this->load->view("account/page_close");
        $this->page_generator->page_close();
    }
}