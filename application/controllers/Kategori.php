<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Kategori extends CI_Controller{
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
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['dataku'] = $this->v->getData('kategori');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Kategori" , $data);
            $this->load->view("template/footer");
        }
        public function add(){
            $this->form_validation->set_rules('kategori' , 'Kategori' , 'required');
            $kode = $this->v->randomkode(32);
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
                $this->session->userdata('id_pengguna')])->row_array(); 
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Kategori");
                $this->load->view("template/footer");
            }else {
                $gambar = $_FILES['gambar']['name'];

                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './uploads/kategori';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto_namaBaru = $this->upload->data('file_name');
                    $insert = array(
                        'id' => $kode,
                        'name' => $this->input->post('kategori'),
                        'image' => $foto_namaBaru,
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
                }else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                redirect('Kategori');
                }  
            }
        }
        public function edit($id){
            $this->form_validation->set_rules('kategori' , 'Kategori' , 'required');
           
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
                $this->session->userdata('id_pengguna')])->row_array(); 
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
                    $ubahfoto = $_FILES['logo']['name'];
        
                    if ($ubahfoto) {
                        $config['allowed_types'] = 'jpg|png|gif';
                        $config['max_size'] = '2048';
                        $config['upload_path'] = './uploads/kategori/';
        
                        $this->load->library('upload', $config);
        
                        if ($this->upload->do_upload('logo')) {
                            $user = $this->db->get_where('kategori', ['id'=>$id])->row_array();
                            $fotolama = $user['image'];
                            if ($fotolama) {
                                unlink(FCPATH . '/uploads/kategori/' . $fotolama);
                            }
                            $fotobaru = $this->upload->data('file_name');
                            $this->db->set('image', $fotobaru);
                            $this->db->where('id', $id);
                            $this->db->update('kategori');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                            . $this->upload->display_errors() .
                            '</div>');
                            // redirect('user/editprofile');
                            redirect('Kategori');
                        }
                    }
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Kategori');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Kategori');
                }
            }
        }
        public function hapus($id){
            $hapusku = $this->v->hapusdata("id","kategori",$id);
            if($hapusku){
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                </div>');
                redirect('Kategori');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                            Data Gagal Dihapus
                </div>');
                redirect('Kategori');
            }
        }
}
?>