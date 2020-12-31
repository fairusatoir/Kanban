<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Order extends CI_Model
{
    public function getAll()
    {
        return $this->db->select("orders.id, component.name, quantity, start_date, end_date, status, product.name as product, product.id as product_id, component.id as component_id, stock, actual_start, actual_finish, visible, orders.level, done, component.alias as alias")
            ->join("component", "component.id = orders.component_id")
            ->join("product", "product.id = component.product_id")
            ->get("orders")->result();
    }

    public function getAllbyProduct($product)
    {
        return $this->db->select("orders.id, component.name, quantity, start_date, end_date, status, product.name as product, product.id as product_id, component.id as component_id, stock, actual_start, actual_finish, visible, orders.level, done, component.alias as alias")
            ->join("component", "component.id = orders.component_id")
            ->join("product", "product.id = component.product_id")
            ->where("component.product_id", $product)
            ->get("orders")->result();
    }

    public function get($id)
    {
        return $this->db->where("id", $id)
            ->get("orders")->result();
    }

    public function insert($data)
    {
        // echo json_encode($data);
        return $this->db->insert("orders", $data);
    }

    public function delete($id)
    {
        return $this->db->where("id", $id)
            ->delete("orders");
    }

    public function update($id, $data)
    {
        echo json_encode($data);
        return $this->db->where("id", $id)
            ->update("orders", $data);
    }

    public function getReport($id)
    {
        return $this->db->select("component.name as component_name, orders.status as status, count(*) as jumlah")
            ->join("orders", "component.id = orders.component_id")
            ->where("component.id", $id)
            ->group_by("orders.status")
            ->get("component")
            ->result();
    }


    public function getAllOrderFabrication()
    {
        return $this->db->select("orders_to_fabrication.id, component.name, quantity, status, product.name as product, product.id as product_id, component.id as component_id, stock, visible, done, component.alias as alias")
            ->join("component", "component.id = orders_to_fabrication.component_id")
            ->join("product", "product.id = component.product_id")
            ->get("orders_to_fabrication")->result();
    }

    public function updateOrderFabrication($id, $data)
    {
        // echo json_encode($data);
        return $this->db->where("id", $id)
            ->update("orders_to_fabrication", $data);
    }

    public function deleteOrderFabrication($id)
    {
        return $this->db->where("id", $id)
            ->delete("orders_to_fabrication");
    }

    public function getOrderFabrication($id)
    {
        return $this->db->where("id", $id)
            ->get("orders_to_fabrication")->result();
    }
}
