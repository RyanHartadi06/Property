<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            // $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            $this->load->model('Muser' , 'm');
            // $this->load->library('curl');
            // belumlogin();
        }
        public function index(){
            $data['kategori'] = $this->v->getData('kategori');
            $data['terbaru'] = $this->m->getTerbaru();
            $data['populer'] = $this->m->getPopuler();
            $this->load->view("template_user/header");
            $this->load->view("User/Home",$data);
            $this->load->view("template_user/footer");
        }
    }
    ?>