<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_Rumah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Maksi', 'v');
        // $this->load->library('curl');
        belumlogin();
        $this->load->helper('url');
    }
    public function index()
    {
        $data['Pengguna'] = $this->db->get_where('pengguna', ['email' =>
            $this->session->userdata('email')])->row_array();
        $data['data'] = $this->v->getdata('rumah');
        $data['kategori'] = $this->v->getData('kategori');
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/header", $data);
        $this->load->view("Admin/Data_Rumah", $data);
        $this->load->view("template/footer");
    }
    public function data_awal(){
	    $query = $this->db->query("SELECT * FROM rumah")->result();
		echo json_encode($query);
    }
    public function data_detail($id){
	    $query = $this->db->query("SELECT * FROM detail_rumah WHERE id_rumah = '$id'")->result();
		echo json_encode($query);
	}
    public function add()
    {
        $this->form_validation->set_rules('nama_pemilik_rumah', 'Pemilik Rumah', 'required');
        // $this->form_validation->set_rules('isi','Isi','required');
        $kode = $this->v->randomkode(32);
        if ($this->form_validation->run() == false) {

            $data['Pengguna'] = $this->db->get_where('pengguna', ['email' =>
                $this->session->userdata('email')])->row_array();
            $data['data'] = $this->v->getdata('rumah');
            $data['kat'] = $this->v->getdata('kategori');
            $data['agent'] = $this->v->getdata('agent');
            $data['kode'] = rand(111,999);
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Tambah_Rumah", $data);
            $this->load->view("template/footer");
        } else {
            $kd = $this->input->post('id_rumah');
            $gambar = $_FILES['gambar']['name'];

            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/rumah';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto_namaBaru = $this->upload->data('file_name');
                $insert = array(
                    'id_rumah' => $kd,
                    'nama_pemilik_rumah' => $this->input->post('nama_pemilik_rumah'),
                    'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                    'no_telp' => $this->input->post('no_telp'),
                    'deskripsi' => $this->input->post('desc'),
                    'jumlah_kamar' => $this->input->post('jumlah_kamar'),
                    'luas_tanah' => $this->input->post('luas_tanah'),
                    'luas_bangunan' => $this->input->post('luas_bangunan'),
                    'harga' => $this->input->post('harga'),
                    'banner' => $foto_namaBaru,
                    'id_agent' => $this->input->post('agent'),
                    'id_kategori' => $this->input->post('kat'),
                    'sertifikat' => $this->input->post('sertifikat'),
                    'air' => $this->input->post('air'),
                    'listrik' => $this->input->post('listrik'),
                    'kondisi' => $this->input->post('kondisi'),
                    'createdDate' => date('Y-m-d'),
                    'status' => 1,
                );
                if ($this->v->insert('rumah', $insert)) {
                    $this->add_image($kd);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Rumah Berhasil Ditambahkan
                        </div>');
                    redirect('Data_Rumah');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
                    redirect('Data_Rumah');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                redirect('Data_Rumah');
            }
        }
    }
    public function detail_rumah($id){
        $data['Pengguna'] = $this->db->get_where('pengguna', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['data'] = $this->v->getDetailDataRumah($id);
        $data['rumah'] = $this->v->getDataGambar('detail_rumah', $id);
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/header", $data);
        $this->load->view("Admin/Detail_Rumah", $data);
        $this->load->view("template/footer");
    }
    public function edit($id){
        $this->form_validation->set_rules('desc' , 'Description' , 'required');
        if ($this->form_validation->run() == false) {
            $data['Pengguna'] = $this->db->get_where('pengguna', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['data'] = $this->v->getDetailDataRumah($id);
            $data['rumah'] = $this->v->getDataGambar('detail_rumah', $id);
            $data['kategori'] = $this->v->getData('kategori');
            $data['agent'] = $this->v->getData('agent');
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Update_Rumah", $data);
            $this->load->view("template/footer");
        }else {
            
            $update = $this->v->ubahdata2(array(
                'nama_pemilik_rumah' => $this->input->post("nama"),
                'alamat_lengkap' => $this->input->post("alamat"),
                'deskripsi' => $this->input->post("desc"),
                'jumlah_kamar' => $this->input->post("kamar"),
                'luas_tanah' => $this->input->post("tanah"),
                'harga' => $this->input->post("harga"),
                'no_telp' => $this->input->post("no_telp"),
                'sertifikat' => $this->input->post("sertifikat"),
                'air' => $this->input->post("air"),
                'listrik' => $this->input->post("listrik"),
                'kondisi' => $this->input->post("kondisi"),
                'id_agent' => $this->input->post("agent"),
                'id_kategori' => $this->input->post("kategori"),
            ), "id_rumah","rumah", $id);

            if($update){
                $ubahfoto = $_FILES['logo']['name'];
    
                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|png|gif';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/rumah/';
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('logo')) {
                        $user = $this->db->get_where('rumah', ['id_rumah'=>$id])->row_array();
                        $fotolama = $user['banner'];
                        if ($fotolama) {
                            unlink(FCPATH . '/uploads/rumah/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('banner', $fotobaru);
                        $this->db->where('id_rumah', $id);
                        $this->db->update('rumah');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                        // redirect('user/editprofile');
                        redirect('Data_Rumah');
                    }
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Mengubah Data!
                </div>');
                redirect('Data_Rumah');
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal Mengubah Data!
                </div>');
                redirect('Data_Rumah');
            }
            
        }
    }
    public function filter(){
		$status = $_GET['dataStatus'];
		$query = $this->db->query("SELECT * FROM rumah WHERE status = '$status'")->result();
		echo json_encode($query);
    }
    public function filterkat(){
		$datakategori = $_GET['datakategori'];
		$query = $this->db->query("SELECT * FROM rumah WHERE id_kategori = '$datakategori'")->result();
		echo json_encode($query);
	}
    public function accepted($id){
        $update = $this->v->ubahdata2(array(
            'status' => 2,
            'createdDate' => date('Y-m-d'),
        ),"id_rumah","rumah", $id);
        if($update){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Rumah Ditandai Sebagai Terjual
            </div>');
            redirect('Data_Rumah');
        }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gagal Mengubah Data!
            </div>');
            redirect('Data_Rumah');
        }
    }
    public function add_image($id)
    {
        $this->form_validation->set_rules('id_rumah', 'Pemilik Rumah', 'required');
        $kode = $this->v->randomkode(32);
        if ($this->form_validation->run() == false) {
            $data['Pengguna'] = $this->db->get_where('pengguna', ['email' =>
                $this->session->userdata('email')])->row_array();
            $data['data'] = $this->v->getDetail($id);
            $data['rumah'] = $this->v->getDataGambar('detail_rumah', $id);
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Tambah_Gambar", $data);
            $this->load->view("template/footer");
        } else {
            $config['upload_path'] = './uploads/rumah/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5248;
            $config['max_width'] = 2048;
            $config['max_height'] = 1000;
            $config['max_width'] = 2048;
            $config['max_height'] = 1000;
            $config['encrypt_name'] = true;
            $config['image_library'] = 'gd2';
            $config['maintain_ratio'] = true;
            $config['width'] = 75;
            $config['overwrite'] = true;
            $config['height'] = 50;
            // $config['image_library'] = 'gd2';
            // $config['maintain_ratio'] = TRUE;
            // $config['width']         = 75;
            // $config['height']       = 50;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->load->library('upload', $config);
            $keterangan_berkas = $this->input->post('files');
            $jumlah_berkas = count($_FILES['files']['name']);

            if ($jumlah_berkas > 10) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                    Maaf! Maksimal Foto unggahan dibatasi sebanyak 10 foto.
                </div>');
            } else {

                for ($i = 0; $i < $jumlah_berkas; $i++) {
                    if (!empty($_FILES['files']['name'][$i])) {

                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                        if ($this->upload->do_upload('file')) {
                            // echo 'qweqe';
                            $uploadData = $this->upload->data();
                            $data['id_detail_rumah'] = rand(111, 999);
                            $data['id_rumah'] = $id;
                            $data['gambar'] = $uploadData['file_name'];
                            $this->db->insert('detail_rumah',$data);
                            // echo json_encode($data);
                            // "<pre>".print_r($data)."</pre>";
                            //  if($data){
                            //         $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                            //         Data Berhasil Ditambahkan
                            //         </div>');
                            //         redirect('Data_Rumah');
                            //     }else{
                            //         $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                            //         Berita Gagal Ditambahkan
                            //         </div>');
                            //         redirect('Data_Rumah');
                            //     }
                        }
                    }
                }

            }

        }
    }
    public function hapus($id)
    {
        $hapusku = $this->v->hapusdata("id_rumah", "rumah", $id);
        if ($hapusku) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                </div>');
            redirect('Data_Rumah');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                            Data Gagal Dihapus
                </div>');
            redirect('Data_Rumah');
        }
    }
    public function hapusdata($id)
    {
        $hapusku = $this->v->hapusdata("id_detail_rumah", "detail_rumah", $id);
        if ($hapusku) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                </div>');
            redirect('Data_Rumah');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                            Data Gagal Dihapus
                </div>');
            redirect('Data_Rumah');
        }
    }
}
