<?php
class Page_generator{
    private $CI;
    public function __construct(){
        $this->CI = get_instance();
    }
    public function head(){
        $this->CI->load->view("req_include/head");
    }
    public function page_open(){
        $this->CI->load->view("req_include/page_open");
    }
    public function navbar(){
        $this->CI->load->view("req_include/navbar");
    }
    public function page_close(){
        $this->CI->load->view("req_include/page_close");
        $this->CI->load->view("req_include/script");
    }
}
?>