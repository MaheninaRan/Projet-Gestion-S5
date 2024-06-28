<?php

class Qcm_model extends CI_Model {
    public function insert_qcm($data) {
        return $this->db->insert('qcmservice', $data);
    }

    public function insert_Reponse($data){
        return $this->db->insert('reponseQcmCv', $data);
    }

    public function selectQcm(){
        $this->db->select('*');
        $this->db->from('qcm');   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function maxQuestionService($idbesoin){
        $query = $this->db->query(
            'select count(distinct question) AS nbrquest FROM qcmService where idbesoinservice=' . $idbesoin
        );
        $result = $query->row();
        if ($result) {
            return $result->nbrquest; 
        }
        return 0; 
    }
    public function maxReponse($question){
        $this->db->select('count(reponse) as nbrReponse');
        $this->db->from('qcmservice'); 
        $this->db->where("question='$question'");   
        $query = $this->db->get();
        $result = $query->row();
        return $result->nbrReponse; 
    }

    public function selectReponse($question){
        $this->db->select('reponse');
        $this->db->from('qcmservice'); 
        $this->db->where("question='$question'");   
        $query = $this->db->get();
        return $query->result_array();
    }


    public function selectQcmService($idBesoin){
        $this->db->select('*');
        $this->db->from('qcmservice'); 
        $this->db->where('idbesoinservice',$idBesoin);   
        $query = $this->db->get();
        return $query->result_array();
    }

    
    public function selectPointQcm($question){
        $this->db->select('distinct(points)');
        $this->db->from('qcmservice'); 
        $this->db->where("question = '$question'");   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function distinctQuestion($idbesoin){
        $this->db->select('distinct(question) as question');
        $this->db->from('qcmservice'); 
        $this->db->where('idbesoinservice',$idbesoin);   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function selectQuestion_pour_reponse($reponse){
        $this->db->select('*');
        $this->db->from('qcmservice');   
        $this->db->where("reponse='$reponse'");
        $query = $this->db->get();
        $result= $query->row();
        $result_aray=get_object_vars($result);
        return $result_aray;
    }

    public function selectPoint_QcmCv(){
        $this->db->select('sum(points) as points');
        $this->db->from('reponseqcmcv'); 
        $this->db->where('typereponse',1); 
        $query = $this->db->get();
        $result=$query->row();
        return $result->points;
    }
    public function selectReponseQcm(){
        $this->db->select('*');
        $this->db->from('detailReponseCv'); 
        $query = $this->db->get();
        return $query->result_array();
    }
    

    
}