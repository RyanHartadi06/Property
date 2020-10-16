<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Kategori extends CI_Controller{
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
            $data['dataku'] = $this->v->getData2('kategori');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Kategori" , $data);
            $this->load->view("template/footer");
        }
        public function add(){
            $this->form_validation->set_rules('kategori' , 'Kategori' , 'required');
            $kode = $this->v->randomkode(32);
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Kategori");
                $this->load->view("template/footer");
            }else {
                $insert = array(
                    'id' => $kode,
                    'name' => $this->input->post('kategori'),
                    'status' => '1'
                );
                if ($this->v->insert('kategori' ,$insert)) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Kategori Berhasil Ditambahkan
                    </div>');
                    redirect('Kategori');
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
                    redirect('Kategori');
                }	
            }
        }
        public function edit($id){
            $this->form_validation->set_rules('kategori' , 'Kategori' , 'required');
           
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getDetailProf('kategori' , 'id' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Edit_Kategori",$data);
                $this->load->view("template/footer");
            }else {
                $update = $this->v->ubahdata2(array(
                    'name' => $this->input->post("kategori"),
                ),"id","kategori", $id);
                if($update){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Kategori');
                }else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Kategori');
                }
            }
        }
        public function hapus($id){
            // $update = $this->v->ubahdata2(array(
            //     'status' => 2,
            // ),"id","kategori", $id);
            // if($update){
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            //     Berhasil Hapus Data!
            //     </div>');
            //     redirect('Kategori');
            // }else {
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            //     Gagal Hapus Data!
            //     </div>');
            //     redirect('Kategori');
            // }
            echo "hqwe";
        }
}
?>