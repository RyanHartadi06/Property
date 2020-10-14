<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Data_Rumah extends CI_Controller{
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
            $data['data'] = $this->v->getdata('rumah');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Data_Rumah",$data);
            $this->load->view("template/footer");
        }
        public function add()
        {
            $this->form_validation->set_rules('nama_pemilik_rumah','Pemilik Rumah','required');
            // $this->form_validation->set_rules('isi','Isi','required');
            $kode = $this->v->randomkode(32);
            if ($this->form_validation->run() == false) {

                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['data'] = $this->v->getdata('rumah');
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Rumah",$data);
                $this->load->view("template/footer");
            }else {
                
                // $gambar = $_FILES['gambar']['name'];

                // $config['allowed_types'] = 'jpg|png|gif|jpeg';
                // $config['max_size'] = '2048';
                // $config['upload_path'] = './uploads/berita';

                
                // $this->load->library('upload' , $config);

                // if ($this->upload->do_upload('gambar')) {
                    
                // } else {
                //     $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">'
                //     . $this->upload->display_errors() .
                //     '</div>');
                //     redirect('berita');
                // }
                // $foto_namaBaru = $this->upload->data('file_name');
                    $insert = array(
                        'id_rumah' => $kode,
                        'nama_pemilik_rumah' => $this->input->post('nama_pemilik_rumah'),
                        'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'jumlah_kamar' => $this->input->post('jumlah_kamar'),
                        'luas_tanah' => $this->input->post('luas_tanah'),
                        'luas_bangunan' => $this->input->post('luas_bangunan'),
                        'harga' => $this->input->post('harga'),
                        'no_telp' => $this->input->post('no_telp'),
                        'createdDate' => date('Y-m-d'),
                        'status' => 1,
                    );
                    if ($this->v->insert('rumah' ,$insert)) {
                        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                        Berita Berhasil Ditambahkan
                        </div>');
                        redirect('Data_Rumah');
                    }else{
                        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
                        redirect('Data_Rumah');
                    }	
            }
        }
        public function add_image($id){
            $this->form_validation->set_rules('id_rumah','Pemilik Rumah','required');
            $kode = $this->v->randomkode(32);
            $data['data'] = $this->v->getDetail($id);
            $data['rumah'] = $this->v->getData('detail_rumah');
            
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Gambar",$data);
                $this->load->view("template/footer");
            }else {
                // echo 'sukses';
                $gambar = $_FILES['gambar']['name'];

                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './uploads/rumah';
                $this->load->library('upload' , $config);

                if ($this->upload->do_upload('gambar')) {
                    $foto_namaBaru = $this->upload->data('file_name');
                    $insert = array(
                        'id_detail_rumah' => $kode,
                        'id_rumah' => $this->input->post('id_rumah'),
                        'gambar' => $foto_namaBaru
                    );
                    if ($this->v->insert('detail_rumah' ,$insert)) {
                        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                        Berita Berhasil Ditambahkan
                        </div>');
                        redirect('Data_Rumah');
                    }else{
                        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
                        redirect('Data_Rumah');
                    }
                } else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                    redirect('Data_Rumah');
                }
              	
            
        }
    }
    }
?>