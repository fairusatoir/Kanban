<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Product extends CI_Model
{
    public function getAll()
    {
        return $this->db->get("product")->result();
    }

    public function get($id)
    {
        return $this->db->where("id", $id)
                        ->get("product")->result();
    }

    public function insert($data)
    {
        return $this->db->insert("product", $data);
    }
}