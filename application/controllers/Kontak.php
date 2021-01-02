<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Kontak extends CI_Controller{
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
            $this->form_validation->set_rules('nama' , 'Name' , 'required');
            $this->form_validation->set_rules('email' , 'email' , 'required');
            $this->form_validation->set_rules('subject' , 'subject' , 'required');
            $this->form_validation->set_rules('pesan' , 'pesan' , 'required');
            // $kode = $this->v->randomkode(32);
            $data['title'] = "MyHouse - Property Group";
            $data['page'] = $this->v->getData('page');
            if ($this->form_validation->run() == false) {
                $data['kontak'] = $this->v->getData('pengguna');
                $this->load->view('template_user/header_two', $data);
                $this->load->view('User/Contact',$data);
                $this->load->view('template_user/footer',$data);
            }else {
                $insert = array(
                    'id_feedback' => rand(111,999),
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'subjek' => $this->input->post('subject'),
                    'pesan' => $this->input->post('pesan'),
                    'createdDate' => date("Y-m-d"),
                    'status' => 1,
                );
                if ($this->v->insert('feedback' ,$insert)) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Feedback Berhasil Dikirim
                    </div>');
                    redirect('Kontak');
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
                    redirect('Kontak');
                }	
            }
        }
        
    }
?>