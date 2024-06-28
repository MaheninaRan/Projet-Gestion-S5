<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class ExperienceService_model extends CI_Model{
    public function insert_Experience($data){
        return $this->db->insert('experienceservice', $data);
    }

    public function selectExperienceService($id){
        $this->db->select('experience,min(points)');
        $this->db->from('experienceservice');
        $this->db->where('idservice',$id);   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function allExper(){
        $this->db->select('*');
        $this->db->from('experience');   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pointExperience($exper){
        $this->db->select('points');
        $this->db->from('experience');
        $this->db->where('nom',$exper);
        $query = $this->db->get();
        $result = $query->row();
        return $result->points;
    }
}

?>
