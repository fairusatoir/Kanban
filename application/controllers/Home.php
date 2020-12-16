<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_User");
        $this->load->model("M_Product");
        $this->load->model("M_Component");
        $this->load->model("M_Order");
    }

    function is_login()
    {
        if(!$this->session->has_userdata("user")) {
            redirect("login");
        }
    }

	public function index()
	{
        $this->is_login();
        $menu = "dashboard";
        $footer = null;
        if($this->input->get("page")) {
            $menu = $this->input->get("page");
        }
        
		$this->load->view('v_home', [
            "menu" => $menu,
            "footer" => $footer
        ]);
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("login");
    }
}
