<?php
defined("BASEPATH") or exit("No Direct Script");

class User_verification{
    private $CI;
    public function __construct(){
        $this->CI = get_instance();
    }
    public function is_logged_on($id_submit_acc){
        if($id_submit_acc != ""){
            return true;
        }
        else{
            return false;
        }
    }
    public function get_user_level($id_submit_acc){
        if($id_submit_acc != ""){
            $this->CI->load->model("m_account");
            $this->CI->m_account->set_id_submit_acc($id_submit_acc);
            $result = $this->CI->m_account->detail();
            if($result->num_rows() > 0){
                $result = $result->result_array();
                return $result[0]["acc_level"];
            }
            else{
                return false;
            }
        }
    }
}