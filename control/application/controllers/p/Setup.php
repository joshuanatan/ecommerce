<?php
defined("BASEPATH") or exit("No Direct Script");
class Setup extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->page_generator->head();
        $this->page_generator->page_open();
        $this->page_generator->navbar();
        $this->page_generator->page_close();
    }
}
?>