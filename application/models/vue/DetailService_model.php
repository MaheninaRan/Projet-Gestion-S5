<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class DetailService_model extends CI_Model {
    public function selectdetailService() {
        $query = $this->db->query(
            'select * from detailservice'
        );
        return $query->result_array();
    }

    public function IdserviceDetail($idservice){
        $this->db->select('*');
        $this->db->from('detailservice');
        $this->db->where('id',$idservice);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dernierService(){
        $query = $this->db->query('SELECT id FROM besoinservice ORDER BY id DESC LIMIT 1');
        $row = $query->row(); 
        if ($row) {
            return $row->id; 
        } else {
            return null; 
        }
    }
    



}