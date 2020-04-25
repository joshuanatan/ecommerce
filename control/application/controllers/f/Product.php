<?php
defined("BASEPATH") or exit("No Direct Script");

class Product extends CI_Controller{
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
        $this->load->model("m_product");
        $data_per_page = 10;

        $result = $this->m_product->list($page,$order_by,$order_direction,$search_key,$data_per_page);
        if($result["data"]->num_rows() > 0){
            $result["data"] = $result["data"]->result_array();
            for($a = 0; $a<count($result["data"]); $a++){
                $respond["content"][$a]["id"] = $result["data"][$a]["id_submit_product"];
                $respond["content"][$a]["code"] = $result["data"][$a]["product_code"];
                $respond["content"][$a]["name"] = $result["data"][$a]["product_name"];
                $respond["content"][$a]["desc"] = $result["data"][$a]["product_desc"];
                $respond["content"][$a]["stock"] = $result["data"][$a]["product_stock"];
                $respond["content"][$a]["img"] = $result["data"][$a]["product_img"];
                $respond["content"][$a]["price"] = $result["data"][$a]["product_price"];
                $respond["content"][$a]["spc_price"] = $result["data"][$a]["product_spc_price"];
                $respond["content"][$a]["spc_price_end_date"] = $result["data"][$a]["product_spc_price_end_date"];
                $respond["content"][$a]["status"] = $result["data"][$a]["product_status"];
            }
        }
        else{
            $respond["status"] = "ERROR";
        }
        $respond["page"] = $this->pagination->generate_pagination_rules($page,$result["total_data"],$data_per_page);

        echo json_encode($respond);
    }
    public function register(){
        $respond["status"] = "SUCCESS";
        $config = array(
            array(
                "field" => "code",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "name",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "desc",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "stock",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "price",
                "label" => "",
                "rules" => "required"
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()){
            $code = $this->input->post("code");
            $name = $this->input->post("name");
            $desc = $this->input->post("desc");
            $stock = $this->input->post("stock");
            $price = $this->input->post("price");

            $upload_config["upload_path"] = "./assets/upload/products/";
            $upload_config["allowed_types"] = "jpeg|jpg|png";
            $upload_config["max_size"] = "4096";
            $this->load->library("upload",$upload_config);
            if(!$this->upload->do_upload("img")){
                $img = "default.jpg";
            }
            else{
                $img = $this->upload->data('file_name');
            }
            $this->load->model("m_product");
            $this->m_product->set_product_code($code);
            $this->m_product->set_product_name($name);
            $this->m_product->set_product_desc($desc);
            $this->m_product->set_product_stock($stock);
            $this->m_product->set_product_price($price);
            $this->m_product->set_product_img($img);
            $this->m_product->set_product_status("ACTIVE");
            $this->m_product->insert();

            if($this->m_product->insert()){
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
                "field" => "code",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "name",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "desc",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "stock",
                "label" => "",
                "rules" => "required"
            ),
            array(
                "field" => "price",
                "label" => "",
                "rules" => "required"
            ),
        );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run()){
            $id = $this->input->post("id");
            $code = $this->input->post("code");
            $name = $this->input->post("name");
            $desc = $this->input->post("desc");
            $stock = $this->input->post("stock");
            $price = $this->input->post("price");

            
            $this->load->model("m_product");
            $upload_config["upload_path"] = "./assets/upload/products/";
            $upload_config["allowed_types"] = "jpeg|jpg|png";
            $upload_config["max_size"] = "4096";
            $this->load->library("upload",$upload_config);
            
            $img = "-";
            if($this->upload->do_upload("img")){
                $img = $this->upload->data("file_name");
            }
            
            $this->m_product->set_product_img($img);
            $this->m_product->set_id_submit_product($id);
            $this->m_product->set_product_code($code);
            $this->m_product->set_product_name($name);
            $this->m_product->set_product_desc($desc);
            $this->m_product->set_product_stock($stock);
            $this->m_product->set_product_price($price);

            if($this->m_product->update()){
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
    
    public function delete($id_account){
        $response["status"] = "SUCCESS";
        if($id_account != "" && is_numeric($id_account)){
            $this->load->model("m_product");
            $this->m_product->set_id_submit_acc($id_account);
            $this->m_product->delete();
        }
        else{
            $response["status"] = "ERROR";
        }
        echo json_encode($response);
    }
}