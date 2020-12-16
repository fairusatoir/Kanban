<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_User");
    }
    
    public function index()
	{
		$this->load->view('v_login');
    }
    
    public function cek_login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $user = $this->M_User->cekLogin($username, $password);
        if($user){
            $this->session->set_userdata("user", $user);
            redirect("home");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger'>Username atau Password salah</div>");
            redirect("login");
        }
    }
}
