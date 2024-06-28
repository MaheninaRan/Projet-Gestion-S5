<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class DiplomeService_model extends CI_Model{

    public function insert_Diplomes($data){
        return $this->db->insert('diplomeservice', $data);
    }

    public function selectDiplomeService($id){
        $this->db->select('diplome,min(points)');
        $this->db->from('diplomeservice');
        $this->db->where('idservice',$id);   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function selectCV(){
        $this->db->select('*');
        $this->db->from('cvdetail');  
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pointDiplome($diplome){
        $this->db->select('points');
        $this->db->from('diplome');
        $this->db->where('nom',$diplome);
        $query = $this->db->get();
        $result = $query->row();
        return $result->points;
    }

    public function allDiplome(){
        $this->db->select('*');
        $this->db->from('diplome');   
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
