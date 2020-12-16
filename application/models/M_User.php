<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function getAll()
    {
        return $this->db->get("user")->result();
    }

    public function get($id)
    {
        return $this->db->where("id", $id)
                        ->get("user")->result();
    }

    public function cekLogin($username, $password)
    {
        $data = $this->db->where("username", $username)
                        ->where("password", md5($password))
                        ->get("user")->result();
        if($data) {
            return $data[0];
        } else {
            return null;
        }
    }

    public function insert($data)
    {
        return $this->db->insert("user", $data);
    }
}