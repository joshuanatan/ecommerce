<?php
defined("BASEPATH") or exit("No Direct Script");

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function detail(){
        $this->validate_token();
        $this->load->model("");
    }
    public function list(){
        $this->validate_token();
        $this->load->model("");
    }
    public function register(){
        $this->validate_token();
        $this->load->model("");
    }
    public function update(){
        $this->validate_token();
        $this->load->model("");
    }
    public function delete(){
        $this->validate_token();
        $this->load->model("");
    }
    private function validate_token(){

    }
}