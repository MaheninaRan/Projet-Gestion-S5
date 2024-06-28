<?php

class ProvinceService_model extends CI_Model {
    public function insert_Provinces($data) {
        return $this->db->insert('provinceservice', $data);
    }

    public function selectProvinces(){
        $this->db->select('*');
        $this->db->from('provinces');   
        $query = $this->db->get();
        return $query->result_array();
    }
}