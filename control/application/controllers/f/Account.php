<?php
defined("BASEPATH") or exit("No Direct Script");

class Account extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library("pagination");
    }
    public function list(){
        $respond["status"] = "SUCCESS";
        $respond["content"] = array();

        $order_by = $this->input->get("orderBy");
        $order_direction = $this->input->get("orderDirection");
        $page = $this->input->get("page");
        $search_key = $this->input->get("searchKey");

        $this->load->model("m_account");
        $data_per_page = 10;

        $result = $this->m_account->list($page,$order_by,$order_direction,$search_key,$data_per_page);
        if($result->num_rows() > 0){
            $result = $result->result_array();
            for($a = 0; $a<count($result); $a++){
                $respond["content"][$a]["id"] = $result[$a]["id_submit_acc"];
                $respond["content"][$a]["name"] = $result[$a]["acc_name"];
                $respond["content"][$a]["email"] = $result[$a]["acc_email"];
                $respond["content"][$a]["phone"] = $result[$a]["acc_phone"];
                $respond["content"][$a]["status"] = $result[$a]["acc_status"];
                $respond["content"][$a]["level"] = $result[$a]["acc_level"];
            }
        }
        else{
            $respond["status"] = "ERROR";
        }

        $total_data = $this->m_account->total_data();
        $respond["page"] = $this->pagination->generate_pagination_rules($page,$total_data,$data_per_page);

        echo json_encode($respond);
    }
    public function detail(){
        $this->load->model("");
    }
    public function register(){
        $this->load->model("");
    }
    public function update(){
        $this->load->model("");
    }
    public function delete(){
        $this->load->model("");
    }
}