<?php

class DetailProvince_model extends CI_Model {
    public function selectdiplomedetail() {
        $query = $this->db->query(
            'select * from detailprovince'
        );
        return $query->result_array();
    }

    public function provinceService($idservice){
        $this->db->select('prov');
        $this->db->from('detailprovince');
        $this->db->where('id',$idservice);
        $query = $this->db->get();
        return $query->result_array();
    }

}