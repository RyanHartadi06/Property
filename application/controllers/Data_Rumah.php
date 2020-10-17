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
            $this->load->helper('url');
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
                $data['kat'] = $this->v->getdata('kategori');
                $data['agent'] = $this->v->getdata('agent');
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Rumah",$data);
                $this->load->view("template/footer");
            }else {
                
                $gambar = $_FILES['gambar']['name'];

                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './uploads/rumah';

                
                $this->load->library('upload' , $config);

                if ($this->upload->do_upload('foto')) {
                    $foto_namaBaru = $this->upload->data('file_name');
                    $insert = array(
                        'id_rumah' => $kode,
                        'nama_pemilik_rumah' => $this->input->post('nama_pemilik_rumah'),
                        'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'jumlah_kamar' => $this->input->post('jumlah_kamar'),
                        'luas_tanah' => $this->input->post('luas_tanah'),
                        'luas_bangunan' => $this->input->post('luas_bangunan'),
                        'harga' => $this->input->post('harga'),
                        'banner' => $foto_namaBaru,
                        'id_agent' => $this->input->post('agent'),
                        'id_kategori' => $this->input->post('kat'),
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
                } else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                    redirect('Data_Rumah');
                }
                if($this->input->post('upload') != NULL ){
 
                    $data = array();
              
                    // Count total files
                    $countfiles = count($_FILES['files']['name']);
               
                    // Looping all files
                    for($i=0;$i<$countfiles;$i++){
               
                      if(!empty($_FILES['files']['name'][$i])){
               
                        // Define new $_FILES array - $_FILES['file']
                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];
              
                        // Set preference
                        $config['upload_path'] = 'uploads/rumah/'; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['max_size'] = '5000'; // max_size in kb
                        $config['file_name'] = $_FILES['files']['name'][$i];
               
                        //Load upload library
                        $this->load->library('upload',$config); 
               
                        // File upload
                        if($this->upload->do_upload('file')){
                          // Get data about the file
                          $uploadData = $this->upload->data();
                          $filename = $uploadData['file_name'];
              
                          // Initialize array
                          $data['filenames'][] = $filename;
                        }
                      }
               
                    }
               
                    // load view
                    // $this->load->view('user_view',$data);
                    echo "sukses";
                  }else{
                    echo "gagal";
                    // load view
                    // $this->load->view('user_view');
                  } 
                
            }
        }
        public function add_image($id){
            $this->form_validation->set_rules('id_rumah','Pemilik Rumah','required');
            $kode = $this->v->randomkode(32);
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['data'] = $this->v->getDetail($id);
                $data['rumah'] = $this->v->getDataGambar('detail_rumah' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Gambar",$data);
                $this->load->view("template/footer");
            }else {
                $config['upload_path']          = './uploads/rumah/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 500;
                $config['max_width']            = 2048;
                $config['max_height']           = 1000;
                $config['max_width']            = 2048;
                $config['max_height']           = 1000;
                $config['encrypt_name'] 		= true;
                $config['image_library'] = 'gd2';
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 75;
                $config['height']       = 50;
                // $config['image_library'] = 'gd2';
                // $config['maintain_ratio'] = TRUE;
                // $config['width']         = 75;
                // $config['height']       = 50;

                $this->load->library('image_lib', $config);
                // $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                // $this->image_lib->resize();
                $this->load->library('upload',$config);
                $keterangan_berkas = $this->input->post('files');
                $jumlah_berkas = count($_FILES['files']['name']);
                for($i = 0; $i < $jumlah_berkas;$i++)
                {
                    if(!empty($_FILES['files']['name'][$i])){

                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];
                        
                        if($this->upload->do_upload('file')){
                            echo 'qweqe';
                            $uploadData = $this->upload->data();
                            $data['id_detail_rumah'] = rand(111 , 999);
                            $data['id_rumah'] = $id;
                            $data['gambar'] = $uploadData['file_name'];
                            // $this->db->insert('detail_rumah',$data);
                            echo json_encode($data);
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
        public function hapus($id){
            $hapusku = $this->v->hapusdata("id_rumah","rumah",$id);
            if($hapusku){
                $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                </div>');
                redirect('Data_Rumah');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                            Data Gagal Dihapus
                </div>');
                redirect('Data_Rumah');
            }
        }
        }
    
?>