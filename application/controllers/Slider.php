<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Slider extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            belumlogin();
        }
        public function index()
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['dataku'] = $this->v->getData('slide');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Slider" , $data);
            $this->load->view("template/footer");
        }
        public function tambah(){
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Tambah_Slider");
            $this->load->view("template/footer");
        }
        public function tambahdata(){
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/slider';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto_namaBaru = $this->upload->data('file_name');
                $insert = array(
                    'gambar' => $foto_namaBaru
                );
                if ($this->v->insert('slide' ,$insert)) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Data Berhasil Ditambahkan
                    </div>');
                    redirect('Slider');
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Gagal Ditambahkan</div>');
                    redirect('Slider');
                }	
            }else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                . $this->upload->display_errors() .
                '</div>');
                redirect('Slider');
              
            }
        }
        public function edit($id){
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['data'] = $this->db->query("SELECT * FROM slide WHERE id_slide = '$id'")->result_array();
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Edit_Slider",  $data);
            $this->load->view("template/footer");
        }
        public function editdata(){
            $id = $this->input->post('id');
            $ubahfoto = $_FILES['foto']['name'];
            if ($ubahfoto) {
                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './uploads/slider';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    // $user = $this->db->get_where('slide', ['id_slide' => $id])->row_array();
                    // $fotolama = $user['foto'];
                    // if ($fotolama) {
                    //     unlink(FCPATH . '/uploads/slider/' . $fotolama);
                    // }
                    $fotobaru = $this->upload->data('file_name');
                    $this->db->set('gambar', $fotobaru);
                    $this->db->where('id_slide', $id);
                    $this->db->update('slide');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Slider');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                    redirect('Slider');
                }
            }
           
        }
        public function hapus($id){
            $hapusku = $this->v->hapusdata("id_slide","slide",$id);
            if($hapusku){
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    Data Berhasil Dihapus
                </div>');
                redirect('Slider');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                    Data Gagal Dihapus
                </div>');
                redirect('Slider');
            }
        }
    }
?>