<?php

class Employer_model extends CI_Model {

    public function employer($idbesoin){
        $this->db->select('*');
        $this->db->from('employerdetail');
        $this->db->where('idBesoin' ,$idbesoin);
        $query = $this->db->get();
        return $query->result_array();  
    } 

    public function All_employer(){
        $this->db->select('*');
        $this->db->from('employerdetail');
        $query = $this->db->get();
        return $query->result_array();  
    } 

    public function employerId($idEmployer){
        $this->db->select('*');
        $this->db->from('employerdetail');
        $this->db->where('id' ,$idEmployer);
        $query = $this->db->get();
        return $query->result_array();
    } 

    public function congeEmployer($idEmployer){
        $this->db->select('*');
        $this->db->from('detailconger');
        $this->db->where('idEmp' ,$idEmployer);
        $query = $this->db->get();
        return $query->result_array();
    } 

    
    public function insert_Conger($data){
        return $this->db->insert('conge', $data);
    }

    public function indert_HeureSupplementaire($data){
        return $this->db->insert('heureSupplementaire', $data);
    }
    public function indert_Abscence($data){
        return $this->db->insert('absence', $data);
    }

    function congeEtat($etat){
        $this->db->select('*');
        $this->db->from('detailconger');
        $this->db->where('etat' ,$etat);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function changeEtat_Conge($idconge,$etat) {
        $mise_a_jour = array(
            'etat' => $etat
        );
        $this->db->where('id', $idconge);
        $this->db->update('conge', $mise_a_jour);
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function heureSupplementaire($idEmployer){
        $this->db->select('*');
        $this->db->from('heureSupplementaire');
        $this->db->where('idEmp' ,$idEmployer);
        $query = $this->db->get();
        return $query->result_array();
    }
    
}