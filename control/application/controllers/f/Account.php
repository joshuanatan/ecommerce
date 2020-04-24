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
    public function register(){
        $respond["status"] = "SUCCESS";
        $config = array(
            array(
                "field" => "name",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "email",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "pswd",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "phone",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "level",
                "label" => "",
                "rules" => "required"
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()){
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $pswd = $this->input->post("pswd");
            $phone = $this->input->post("phone");
            $level = $this->input->post("level");

            $this->load->model("m_account");
            $this->m_account->set_acc_name($name);
            $this->m_account->set_acc_email($email);
            $this->m_account->set_acc_pswd($pswd);
            $this->m_account->set_acc_phone($phone);
            $this->m_account->set_acc_level($level);
            $this->m_account->set_acc_status("ACTIVE");
            if($this->m_account->insert()){
            }
            else{
                $respond["status"] = "ERROR";
                $respond["msg"] = "Setter Error";
            }
        }
        else{
            $respond["status"] = "ERROR";
            $respond["msg"] = validation_errors();
        }
        echo json_encode($respond);
    }
    public function update(){
        $respond["status"] = "SUCCESS";
        $config = array(
            array(
                "field" => "id",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "name",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "email",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "phone",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "status",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "level",
                "label" => "",
                "rules" => "required"
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()){
            $id = $this->input->post("id");
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $phone = $this->input->post("phone");
            $level = $this->input->post("level");
            $status = $this->input->post("status");

            $this->load->model("m_account");
            $this->m_account->set_id_submit_acc($id);
            $this->m_account->set_acc_name($name);
            $this->m_account->set_acc_email($email);
            $this->m_account->set_acc_phone($phone);
            $this->m_account->set_acc_level($level);
            $this->m_account->set_acc_status($status);
            if($this->m_account->update()){
            }
            else{
                $respond["status"] = "ERROR";
                $respond["msg"] = "Setter Error";
            }
        }
        else{
            $respond["status"] = "ERROR";
            $respond["msg"] = validation_errors();
        }
        echo json_encode($respond);
    }
    public function detail(){
        $this->load->model("");
    }
    public function delete(){
        $this->load->model("");
    }
}