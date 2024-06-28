<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class Cv_model extends CI_Model{
    public function insert_Cv($data){
        return $this->db->insert('cv', $data);
    }

    public function insert_cvPoint($data){
        return $this->db->insert('cvPoint', $data);
    }

    public function idCv_farany(){
        $this->db->select('max(id) as idfarany');
        $this->db->from('cv');
        $query = $this->db->get();
        $result = $query->row();
        return $result->idfarany;
    }
    

    public function selectCV(){
        $this->db->select('*');
        $this->db->from('cvdetail');  
        $query = $this->db->get();
        return $query->result_array();
    }

    public function selectPointCv(){
        $this->db->select('*');
        $this->db->from('cvpoint');  
        $query = $this->db->get();
        return $query->result_array();
    }

    public function selectCv_id($idcv) {
        $this->db->select('*');
        $this->db->from('cvdetail');
        $this->db->where_in('id', $idcv); // Utilisation de where_in pour sélectionner plusieurs IDs
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function passwordCv($idcv){
        $this->db->select('motdepasse');
        $this->db->from('cvdetail');  
        $this->db->where('id',$idcv);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function deteteCv($id){
        $this->db->where('id', $id); 
        $this->db->delete('cv');
    }

    public function updateEtatCv($idCv,$etat) {
        $mise_a_jour = array(
            'etat' => $etat
        );
        $this->db->where('id', $idCv);
        $this->db->update('cv', $mise_a_jour);
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}
?>
