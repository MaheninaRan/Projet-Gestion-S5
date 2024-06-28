<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class Genre_model extends CI_Model{
    public function insert_Genre($data){
        return $this->db->insert('genre', $data);
    }

    public function selectGenre($id, $genre){
        $this->db->select($genre);
        $this->db->from('genre');
        $this->db->where('idservice',$id);   
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>
