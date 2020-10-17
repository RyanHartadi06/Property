<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            // $this->load->library('curl');
            // is_logged_in();
        }
        public function index()
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
            $this->session->userdata('email')])->row_array(); 
            $data['totalAgent'] = $this->v->getTotal('agent');
            $data['tersedia'] = $this->v->getTotal2('rumah' , 1);
            $data['terjual'] = $this->v->getTotal2('rumah' , 2);
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("template/dashboard",$data);
            $this->load->view("template/footer");
        }
        public function data(){
            $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
            $this->session->userdata('email')])->row_array(); 
    
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Akun",$data);
            $this->load->view("template/footer");
        }
        public function edit($id){
            $this->form_validation->set_rules('email' , 'Email' , 'required');
            $this->form_validation->set_rules('alamat' , 'Alamat' , 'required');
            $this->form_validation->set_rules('no_telp' , 'Nomor Telepon' , 'required');
            $this->form_validation->set_rules('nama' , 'Nama Pengguna' , 'required');
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getDetailProf('pengguna' , 'id_pengguna' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Edit_Admin",$data);
                $this->load->view("template/footer");
            }else {
                $update = $this->v->ubahdata2(array(
                    'nama_pengguna' => $this->input->post('nama'),
                    'email' =>  $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'createdDate' => date("Y-m-d H:i:s"),
                ),"id_pengguna","pengguna", $id);
    
                if($update){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Admin/data');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Admin/data');
                }
                
        
                }	
            }
    }
?>