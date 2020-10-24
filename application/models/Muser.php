<?php 
    class Muser extends CI_Model {

        public function getTerbaru() {
            $query = $this->db->query("SELECT * FROM rumah ORDER BY createdDate DESC LIMIT 10")->result_array();
            return $query;
        }
        public function getPopuler() {
            $query = $this->db->query("SELECT * FROM rumah  ORDER BY populer DESC LIMIT 10")->result_array();
            return $query;
        }
    }