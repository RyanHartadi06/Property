<?php 
    class Maksi extends CI_Model {
       public function index($tabel , $level , $isActive){
          return $query = $this->db->query("SELECT * FROM $tabel WHERE level = $level AND is_actived=$isActive")->result_array();
       }
       public function getData($tb){
         return $query = $this->db->query("SELECT * FROM $tb")->result_array();
       }
       public function getData2($tb){
        return $query = $this->db->query("SELECT * FROM $tb WHERE status = 1")->result_array();
      }
       public function getDataGambar($tb , $id){
        return $query = $this->db->query("SELECT * FROM $tb WHERE id_rumah = '$id'")->result_array();
      }
      public function getDetailProf($tb , $column , $id){
        return $query = $this->db->query("SELECT * FROM $tb WHERE $column = '$id'")->result_array();
      }
      public function insert($tabel, $arr)
      {
          $cek = $this->db->insert($tabel, $arr);
          return $cek;
      }
      public function save_batch($data){
        return $this->db->insert_batch('detail_rumah', $data);
      }
       public function getDetail($id){
        $this->load->database();
        $this->db->where('id_rumah', $id);
        return $this->db->get("rumah")->result_array();
        // return $this->db->query("SELECT * FROM rumah r , detail_rumah d WHERE r.id_rumah = d.id_rumah AND r.id_rumah = '$id'")->result_array();
      }
      public function ubahdata($data = array() , $id){
        $this->load->database();
        $this->db->where('id_profile' , $id);
        return $this->db->update("profile", $data);
    }
    public function ubahdata2($data = array() , $column , $tb ,$id){
      $this->load->database();
      $this->db->where($column , $id);
      return $this->db->update($tb, $data);
  }
       public function randomkode($maxlength) {
        $chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
                        "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $return_str = "";
        for ( $x=0; $x<$maxlength; $x++ ) {
            $return_str .= $chary[rand(0, count($chary)-1)];
        }
        return $return_str;
      }
      
    }

?>