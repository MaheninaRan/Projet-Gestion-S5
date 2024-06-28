<?php

class NationService_model extends CI_Model {
    public function insert_Nation($data) {
        return $this->db->insert('nationbesoinservice', $data);
    }

    public function selectNation() {
        $query = $this->db->query(
            'select * from nation'
        );
        return $query->result_array();
    }
    


 
}