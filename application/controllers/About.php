<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class About extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            // $this->load->library('curl');
            // belumlogin();
        }
        public function index()
        {
            $data['title'] = "MyHouse - Property Group";
            $data['page'] = $this->v->getData('page');
            $data['page_profil'] = $this->db->get_where('profile', ['id_profile' => 1])->result();
            $this->load->view('template_user/header_two',$data);
            $this->load->view('User/About' , $data);
            $this->load->view('template_user/footer',$data);
        }
    }
?>