<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Component extends CI_Model
{
    public function getAll()
    {
        return $this->db->get("component")->result();
    }

    public function getByProductId($id)
    {
        return $this->db->where("product_id", $id)
            ->get("component")
            ->result();
    }

    public function getByProductIdFabrication($id)
    {
        return $this->db->select("name,alias,orders_to_fabrication.quantity as stock, orders_to_fabrication.status as status")
            ->join("orders_to_fabrication", "component.id = orders_to_fabrication.component_id")
            ->where("product_id", $id)
            ->get("component")
            ->result();
    }

    public function getProductByComponentId($id)
    {
        $product = $this->db->select("product.id as id, product.name as name")
            ->join("product", "component.product_id = product.id")
            ->where("component.id", $id)
            ->get("component")
            ->result();
        if (count($product) > 0) {
            return $product[0];
        }
        return null;
    }

    public function get($id)
    {
        return $this->db->where("id", $id)
            ->get("component")->result();
    }

    public function insert($data)
    {
        return $this->db->insert("component", $data);
    }

    public function update($id, $data)
    {
        return $this->db->where("id", $id)
            ->update("component", $data);
    }

    public function orderPart($data)
    {
        return $this->db->insert("orders_to_fabrication", $data);
    }
}
