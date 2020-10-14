<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller{

        public function index()
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
            $this->session->userdata('email')])->row_array(); 
    
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("template/dashboard",$data);
            $this->load->view("template/footer");
        }
    }
?>