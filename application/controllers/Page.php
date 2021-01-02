<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Page extends CI_Controller{
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
            $data['page'] = $this->v->getData('page');
            // $data['title'] = "MyHouse - Property Group";
            // $data['page'] = $this->db->query("SELECT * FROM pages WHERE id = '$id'")->row_array();
            $this->load->view('template_user/header_two');
            $this->load->view('User/Page');
            $this->load->view('template_user/footer',$data);
        }
        public function detail($id){
            $data['title'] = "MyHouse - Property Group";
            $data['page'] = $this->v->getData('page');
            $data['page_detail'] = $this->db->get_where('page', ['id' => $id])->result();
            $this->load->view('template_user/header_two',$data);
            $this->load->view('User/Page' , $data);
            $this->load->view('template_user/footer',$data);
        }
       
    }
?>