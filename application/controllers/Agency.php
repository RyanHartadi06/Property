<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Agency extends CI_Controller{
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
            $data['dataku'] = $this->v->getData('agent');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Agency" , $data);
            $this->load->view("template/footer");
        }
        public function add(){
            $this->form_validation->set_rules('nama' , 'Nama' , 'required');
            $kode = $this->v->randomkode(32);
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Agent");
                $this->load->view("template/footer");
            }else {
                $insert = array(
                    'id_agent' => $kode,
                    'nama_agent' => $this->input->post('nama'),
                    'no_wa' => $this->input->post('no'),
                    'instagram' => $this->input->post('ig'),
                    'facebook' => $this->input->post('facebook'),
                    'email' => $this->input->post('email'),
                );
                if ($this->v->insert('agent' ,$insert)) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Agency Berhasil Ditambahkan
                    </div>');
                    redirect('Agency');
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
                    redirect('Agency');
                }	
            }
        }
        public function edit($id){
            $this->form_validation->set_rules('nama' , 'Nama' , 'required');
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getDetailProf('agent' , 'id_agent' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Edit_Agent",$data);
                $this->load->view("template/footer");
            }else {
                $update = $this->v->ubahdata2(array(
                    'nama_agent' => $this->input->post('nama'),
                    'no_wa' => $this->input->post('no'),
                    'instagram' => $this->input->post('ig'),
                    'facebook' => $this->input->post('facebook'),
                    'email' => $this->input->post('email'),
                ),"id_agent","agent", $id);
                if($update){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Agency');
                }else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Agency');
                }
            }
        }
        public function hapus($id){
            $hapusku = $this->v->hapusdata("id_agent","agent",$id);
            if($hapusku){
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                </div>');
                redirect('Agency');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                            Data Gagal Dihapus
                </div>');
                redirect('Agency');
            }
        }
}
?>