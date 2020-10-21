<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Konten extends CI_Controller{
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
            $data['dataku'] = $this->v->getData('content');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Konten" , $data);
            $this->load->view("template/footer");
        }
        public function add(){
            $this->form_validation->set_rules('title' , 'Title' , 'required');
            $this->form_validation->set_rules('desc' , 'description' , 'required');
            $this->form_validation->set_rules('icon' , 'Icon' , 'required');
            $kode = $this->v->randomkode(32);
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getData('content');
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Konten" , $data);
                $this->load->view("template/footer");
            }else {
                $insert = array(
                    'id' => $kode,
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('desc'),
                    'icon' => $this->input->post('icon'),
                );
                if ($this->v->insert('content' ,$insert)) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Konten Berhasil Ditambahkan
                    </div>');
                    redirect('Konten');
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
                    redirect('Konten');
                }	
            }
        }
        public function edit($id){
            $this->form_validation->set_rules('title' , 'Title' , 'required');
            $this->form_validation->set_rules('desc' , 'description' , 'required');
            $this->form_validation->set_rules('icon' , 'Icon' , 'required');
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getDetailProf('content' , 'id' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Edit_Konten",$data);
                $this->load->view("template/footer");
            }else {
                $update = $this->v->ubahdata2(array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('desc'),
                    'icon' => $this->input->post('icon'),
                ),"id","content", $id);
                if($update){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Konten');
                }else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Konten');
                }
            }
        }
        public function hapus($id){
            $hapusku = $this->v->hapusdata("id","content",$id);
            if($hapusku){
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                </div>');
                redirect('Konten');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                            Data Gagal Dihapus
                </div>');
                redirect('Konten');
            }
        }
    }
    ?>