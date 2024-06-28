<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class Societe_model extends CI_Model{
    public function get_admin($email, $password) {
        $this->db->select('id');
        $this->db->from('societe');
        $this->db->where('email' , $email);
        $this->db->where('motdepasse', $password);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $result = $query->row();
            return $result->id;
        } else {
            return false;
        }
    }
}
?>



