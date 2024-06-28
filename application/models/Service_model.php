<?php

class Service_model extends CI_Model {
    public function insert_Services($data) {
        return $this->db->insert('services', $data);
    }
    public function IdService() {
        $query = $this->db->query(
            'select max(id) from services'
        );
        return $query->result_array();
    }

    public function detailService() {
        $query = $this->db->query(
            'select * from detailservice'
        );
        return $query->result_array();
    }

    public function Uneservice($id) {
        $this->db->select('*');
        $this->db->from('detailservice');
        $this->db->where('id' , $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteService($id){
        $this->db->where('id', $id); 
        $this->db->delete('services');
    }

    public function connexionService($email, $password) {
        $this->db->select('id');
        $this->db->from('services');
        $this->db->where('email' , $email);
        $this->db->where('motdepasse', $password);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $result = $query->row();
            return $result->id; 
        }else {
            return false;
        }
    }
}