<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Component extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_User");
        $this->load->model("M_Product");
        $this->load->model("M_Component");
    }

    public function index()
    {
        $components = $this->M_Component->getAll();
        echo json_encode($components);
    }

    public function get_by_product($id)
    {
        $components = $this->M_Component->getByProductId($id);
        echo json_encode($components);
    }

    public function get_order_fabrication($id)
    {
        $components = $this->M_Component->getByProductIdFabrication($id);
        echo json_encode($components);
    }

    public function update()
    {
        $id = $this->input->post("id");
        $data = [
            "stock" => $this->input->post("stock")
        ];
        echo $this->M_Component->update($id, $data);
    }

    public function orderPart()
    {
        $id = $this->input->post("id");
        $data = [
            "component_id" => $id,
            "quantity" => $this->input->post("stock"),
            "status" => "waiting",
            "visible" => 1
        ];
        echo $this->M_Component->orderPart($data);
    }
}
