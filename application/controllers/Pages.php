<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Pages extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            // $this->load->library('curl');
            belumlogin();
        }
        public function index()
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
            $this->session->userdata('email')])->row_array(); 
            $data['dataku'] = $this->v->getData('page');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Pages" , $data);
            $this->load->view("template/footer");
        }
        public function add(){

            $this->form_validation->set_rules('nama' , 'Nama' , 'required');
            $this->form_validation->set_rules('desc' , 'description' , 'required');
           
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getData('content');
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Pages" , $data);
                $this->load->view("template/footer");
            }else {
                $insert = array(
                    'id' => rand(111,999),
                    'name' => $this->input->post('nama'),
                    'description' => $this->input->post('desc'),
                );
                if ($this->v->insert('page' ,$insert)) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Pages Berhasil Ditambahkan
                    </div>');
                    redirect('Pages');
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
                    redirect('Pages');
                }	
            }
        }
        public function hapus($id){
            $hapusku = $this->v->hapusdata("id","page",$id);
            if($hapusku){
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                </div>');
                redirect('Pages');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                            Data Gagal Dihapus
                </div>');
                redirect('Pages');
            }
        }
        public function edit($id){
            $this->form_validation->set_rules('nama' , 'Nama' , 'required');
            $this->form_validation->set_rules('desc' , 'description' , 'required');
           
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getDetailProf('page' , 'id' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Edit_Pages",$data);
                $this->load->view("template/footer");
            }else {
                $update = $this->v->ubahdata2(array(
                    'name' => $this->input->post('nama'),
                    'description' => $this->input->post('desc'),
                ),"id","page", $id);
                if($update){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Pages');
                }else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Pages');
                }
            }
        }
    }
?>