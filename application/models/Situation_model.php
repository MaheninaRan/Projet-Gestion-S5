<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class Situation_model extends CI_Model{
    public function insert_Situation($data){
        return $this->db->insert('situation', $data);
    }

    public function selectSituation($id, $situation){
        $this->db->select($situation);
        $this->db->from('situation');
        $this->db->where('idservice',$id);   
        $query = $this->db->get();
        return $query->result_array();
    }
    public function listeSituation(){
        $this->db->select("*");
        $this->db->from('listesituation');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
