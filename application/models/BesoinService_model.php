<?php

class Besoinservice_model extends CI_Model {
    public function insert_Besoin($data) {
        return $this->db->insert('besoinservice', $data);
    }
    public function IdService() {
        $query = $this->db->query(
            'select max(id) from besoinservice'
        );
        return $query->result_array();
    }
    
    public function besoinEtat($idservice,$etat){
        $this->db->select('*');
        $this->db->from('besoinservicecomplet');
        $this->db->where('idservice' , $idservice);
        $this->db->where('etat' , $etat);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function allBesoinEtat($etat){
        $this->db->select('*');
        $this->db->from('besoinservicecomplet');
        $this->db->where('etat' , $etat);
        $query = $this->db->get();
        return $query->result_array();
    }


   
    public function allBesoinPourUnService($idservice) {
        $this->db->select('*');
        $this->db->from('besoinservicecomplet');
        $this->db->where('idservice' , $idservice);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function BesoinSelectCV($idbesoin) {
        $this->db->select('*');
        $this->db->from('besoinservicecomplet');
        $this->db->where('id' , $idbesoin);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function allBesoin() {
        $this->db->select('*');
        $this->db->from('besoinservicecomplet');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteBesoin($id){
        $this->db->where('id', $id); 
        $this->db->delete('besoinservice');
    }
    public function updateEtatBesoin($idBesoin,$etat) {
        $mise_a_jour = array(
            'etat' => $etat
        );
        $this->db->where('id', $idBesoin);
        $this->db->update('besoinservice', $mise_a_jour);
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    public function get_pointBesoin($id) {
        $this->db->select('SUM(ptprovince + dippoints + expepoints + ptSit + ptSexe + ptnation) as total');
        $this->db->from('besoinservicecomplet');
        $this->db->where('id' , $id);
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) {
            $result = $query->row();
            return $result->total;
        } else {
            return false;
        }
    }

    public function employer($idbesoin){
        $this->db->select('*');
        $this->db->from('employerdetail');
        $this->db->where('idBesoin' ,$idbesoin);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}