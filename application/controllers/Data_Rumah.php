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
        $this->load->helper('form', 'url');
    }
    public function index()
    {
        $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
        $this->session->userdata('id_pengguna')])->row_array();

        $this->db->order_by('createdDate', 'DESC');
        $data['rumah'] = $this->db->get('rumah')->result();
        $data['kategori'] = $this->v->getData('kategori');
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/header", $data);
        $this->load->view("Admin/Data_Rumah", $data);
        $this->load->view("template/footer");
    }

    public function maintenance()
    {
        $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
        $this->session->userdata('id_pengguna')])->row_array();
        // $data['data'] = $this->v->getdata('rumah');

        $data['kategori'] = $this->v->getData('kategori');
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/header", $data);
        $this->load->view("Admin/Data_Rumah", $data);
        $this->load->view("template/footer");
    }

    public function data_awal()
    {
        $this->db->order_by('createdDate', 'DESC');
        $query = $this->db->get('rumah')->result();
        echo json_encode($query);
    }
    public function data_detail($id)
    {
        $query = $this->db->query("SELECT * FROM detail_rumah WHERE id_rumah = '$id'")->result();
        echo json_encode($query);
    }
    public function add_punya_masega()
    {
        $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
        $this->session->userdata('id_pengguna')])->row_array();
        $data['data'] = $this->v->getdata('rumah');
        $data['kat'] = $this->v->getdata('kategori');
        $data['agent'] = $this->v->getdata('agent');
        $this->db->order_by('id_rumah', 'DESC');
        $no = $this->db->get('rumah')->row_array();
        $data['kode'] = $no['id_rumah'] + 1;
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/header", $data);
        $this->load->view("Admin/Tambah_Rumah", $data);
        $this->load->view("template/footer");
    }
    public function add()
    {
        $this->form_validation->set_rules('nama_pemilik_rumah', 'Property', 'required');
        // $this->form_validation->set_rules('alamat_lengkap', 'Alamat Property', 'required');
        // $this->form_validation->set_rules('desc', 'Deskripsi Property', 'required');
        // $this->form_validation->set_rules('harga', 'Harga Property', 'required');
        // $this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar ', 'required');
        // $this->form_validation->set_rules('kamar_mandi', 'Kamar Mandi Property', 'required');
        // $this->form_validation->set_rules('isi','Isi','required');
        $kode = $this->v->randomkode(32);
        if ($this->form_validation->run() == false) {

            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['data'] = $this->v->getdata('rumah');
            $data['kat'] = $this->v->getdata('kategori');
            $data['agent'] = $this->v->getdata('agent');
            $data['kode'] = rand(111, 999);
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Tambah_Rumah", $data);
            $this->load->view("template/footer");
        } else {
            $kd = $this->input->post('id_rumah');
            $gambar = $_FILES['gambar']['name'];

            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = '7748';
            $config['upload_path'] = './uploads/rumah';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto_namaBaru = $this->upload->data('file_name');
                $insert = array(
                    'id_rumah' => $kd,
                    'nama_pemilik_rumah' => $this->input->post('nama_pemilik_rumah'),
                    'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                    'no_telp' =>'',
                    'deskripsi' => $this->input->post('desc'),
                    'jumlah_kamar' => $this->input->post('jumlah_kamar'),
                    'luas_tanah' =>  $this->input->post('luas_tanah'),
                    'luas_bangunan' =>  $this->input->post('luas_bangunan'),
                    'harga' => $this->input->post('harga'),
                    'kamar_mandi' => $this->input->post('kamar_mandi'),
                    'banner' => $foto_namaBaru,
                    'populer' => 0,
                    'id_agent' => $this->input->post('agent'),
                    'id_kategori' => $this->input->post('kat'),
                    'sertifikat' => '',
                    'air' => '',
                    'listrik' => '',
                    'kondisi' => '',
                    'status_property' => $this->input->post('status_property'),
                    'createdDate' => date('Y-m-d'),
                    'status' => 1,
                );
                if ($this->v->insert('rumah', $insert)) {
                    // $this->add_image($kd);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Rumah Berhasil Ditambahkan
                        </div>');
                    redirect('Data_Rumah');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Karena Tanpa Gambar</div>');
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
    public function tambah_rumah_punya_masega()
    {
        $post = $this->input->post();
        $data = array(
            'id_rumah' => rand(1111,9999),
            'nama_pemilik_rumah' => $post['nama_pemilik_rumah'],
            'alamat_lengkap' => $post['alamat_lengkap'],
            'no_telp' => '',
            'deskripsi' => $post['desc'],
            'jumlah_kamar' => $post['jumlah_kamar'],
            'luas_tanah' =>  $post['luas_tanah'],
            'luas_bangunan' =>  $post['luas_bangunan'],
            'harga' => $post['harga'],
            'kamar_mandi' => $post['kamar_mandi'],
            'banner' => $this->uploadFoto(),
            'populer' => 0,
            'id_agent' => $post['agent'],
            'id_kategori' => $post['kat'],
            'sertifikat' => '',
            'air' => '',
            'listrik' => '',
            'kondisi' => '',
            'status_property' => $post['status_property'],
            'createdDate' => date('Y-m-d'),
            'status' => 1
        );

        $rmh = $this->db->insert('rumah', $data);
        if ($rmh) {
            $this->session->set_flashdata(
                'message',
                'success'
            );

            $this->session->set_flashdata(
                'id_rumah',
                $post['id_rumah']
            );

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">Rumah Berhasil Ditambahkan!, <b>Upload foto sekarang?</b></div><br>'
            );
            redirect('Data_Rumah/add');
        }
        // redirect('Data_Rumah');
    }

    public function uploadFoto()
    {

        $config['upload_path']          = './uploads/rumah';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = md5(date('l, d-M-Y / H:i:s a'));

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        return "store.png";
    }

    public function fotoRumah()
    {
        $post = $this->input->post();
        $jumlahData = count($_FILES['gambar']['name']);

        // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
        for ($i = 0; $i < $jumlahData; $i++) :

            // Inisialisasi Nama,Tipe,Dll.
            $_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
            $_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
            $_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

            // Konfigurasi Upload
            $config['upload_path']          = './uploads/rumah/';
            $config['allowed_types']        = 'jpeg|gif|jpg|png|pdf|JPG|PNG|JPEG';
            $config['max_size'] = 15248;
            $config['overwrite'] = false;

            // Memanggil Library Upload dan Setting Konfigurasi
            $this->load->library('upload', $config);
            $this->upload->initialize($config);



            if ($this->upload->do_upload('file')) { // Jika Berhasil Upload

                $fileData = $this->upload->data(); // Lakukan Upload Data
                // Membuat Variable untuk dimasukkan ke Database
                $uploadData[$i]['id_rumah'] =  $this->input->post('id_rumah');
                $uploadData[$i]['gambar'] = $fileData['file_name'];
                $arr[] = $uploadData[$i]['gambar'];
                // $this->resizeCok($fileData['file_name']);
            }
        endfor; // Penutup For
        $bang = json_encode($arr);
        $this->resizeCok($fileData['file_name']);
        if ($uploadData !== null) { // Jika Berhasil Upload

            // Insert ke Database 
            $insert = $this->v->upload($uploadData);

            if ($insert) { // Jika Berhasil Insert
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil
                </div>');
                redirect('Data_Rumah');
                // echo "
                //     Sukses Ditambahkan</br>
                //     <a href='".base_url()."Data_Rumah'>Kembali</a>
                // ";
            } else { // Jika Tidak Berhasil Insert
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal Upload Foto
                </div>');
                redirect('Data_Rumah');
                // echo "
                //     Gagal Ditambahkan</br>
                //     <a href='".base_url()."Data_Rumah'>Kembali</a>
                // ";
            }
        }
    }

    public function editStatus()
    {
        // $post = $this->input->post();
        $this->db->set('status', $this->input->post('status'));
        $this->db->where('id_rumah', $this->input->post('id_rumah'));
        $qry = $this->db->update('rumah');
        if ($qry) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah
            </div>');
            redirect('Data_Rumah');
        }else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Gagal Ubah Status
            </div>');
            redirect('Data_Rumah');
        }
    }


    public function detail_rumah($id)
    {
        $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
        $this->session->userdata('id_pengguna')])->row_array();
        $data['data'] = $this->v->getDetailDataRumah($id);
        $data['rumah'] = $this->v->getDataGambar('detail_rumah', $id);
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/header", $data);
        $this->load->view("Admin/Detail_Rumah", $data);
        $this->load->view("template/footer");
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('desc', 'Description', 'required');
        if ($this->form_validation->run() == false) {
            $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
            $this->session->userdata('id_pengguna')])->row_array();
            $data['data'] = $this->v->getDetailDataRumah($id);
            $data['rumah'] = $this->v->getDataGambar('detail_rumah', $id);
            $data['kategori'] = $this->v->getData('kategori');
            $data['agent'] = $this->v->getData('agent');
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Update_Rumah", $data);
            $this->load->view("template/footer");
        } else {

            $update = $this->v->ubahdata2(array(
                'nama_pemilik_rumah' => $this->input->post("nama"),
                'alamat_lengkap' => $this->input->post("alamat"),
                'deskripsi' => $this->input->post("desc"),
                'jumlah_kamar' => $this->input->post("kamar"),
                'kamar_mandi' => $this->input->post("kamar_mandi"),
                'luas_tanah' =>  $this->input->post('luas_tanah'),
                'luas_bangunan' =>  $this->input->post('luas_bangunan'),
                'harga' => $this->input->post("harga"),
                'no_telp' => '',
                'sertifikat' => '',
                'air' => '',
                'listrik' => '',
                'kondisi' => '',
                'id_agent' => $this->input->post("agent"),
                'id_kategori' => $this->input->post("kategori"),
                'status_property' => $this->input->post("status_property"),
                'populer' => 0
            ), "id_rumah", "rumah", $id);

            if ($update) {
                $ubahfoto = $_FILES['logo']['name'];

                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/rumah/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('logo')) {
                        $user = $this->db->get_where('rumah', ['id_rumah' => $id])->row_array();
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
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal Mengubah Data!
                </div>');
                redirect('Data_Rumah');
            }
        }
    }
    public function filter()
    {
        $status = $_GET['dataStatus'];
        $query = $this->db->query("SELECT * FROM rumah WHERE status = '$status' ORDER BY id DESC ")->result();
        echo json_encode($query);
    }
    public function filterkat()
    {
        $datakategori = $_GET['datakategori'];
        $query = $this->db->query("SELECT * FROM rumah WHERE id_kategori = '$datakategori' ORDER BY id DESC ")->result();
        echo json_encode($query);
    }
    public function accepted($id)
    {
        $update = $this->v->ubahdata2(array(
            'status' => 2,
            'createdDate' => date('Y-m-d'),
        ), "id_rumah", "rumah", $id);
        if ($update) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Rumah Ditandai Sebagai Terjual
            </div>');
            redirect('Data_Rumah');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gagal Mengubah Data!
            </div>');
            redirect('Data_Rumah');
        }
    }
    public function add_image($id){
        $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
        $this->session->userdata('id_pengguna')])->row_array();
        $data['data'] = $this->v->getDetail($id);
        $data['rumah'] = $this->v->getDataGambar('detail_rumah', $id);
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/header", $data);
        $this->load->view("Admin/Tambah_Gambar", $data);
        $this->load->view("template/footer");
    }
    public function add_imagessss($id)
    {
        $this->form_validation->set_rules('id_rumah', 'Pemilik Rumah', 'required');
        $kode = $this->v->randomkode(32);
        if ($this->form_validation->run() == false) {
            $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
            $this->session->userdata('id_pengguna')])->row_array();
            $data['data'] = $this->v->getDetail($id);
            $data['rumah'] = $this->v->getDataGambar('detail_rumah', $id);
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Tambah_Gambar", $data);
            $this->load->view("template/footer");
        } else {
            $jumlahData = count($_FILES['gambar']['name']);

            // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
            for ($i = 0; $i < $jumlahData; $i++) :

                // Inisialisasi Nama,Tipe,Dll.
                $_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
                $_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                $_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

                // Konfigurasi Upload
                $config['upload_path']          = './uploads/rumah/';
                $config['allowed_types']        = 'jpeg|gif|jpg|png|pdf|JPG|PNG|JPEG';
                $config['max_size'] = 15248;
                $config['overwrite'] = false;

                // Memanggil Library Upload dan Setting Konfigurasi
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) { // Jika Berhasil Upload

                    $fileData = $this->upload->data(); // Lakukan Upload Data
                    // Membuat Variable untuk dimasukkan ke Database
                    
                    $uploadData[$i]['id_rumah'] = $id;
                    $uploadData[$i]['gambar'] = $fileData['file_name'];
                    $arr[] = $uploadData[$i]['gambar'];
                    // $this->resizeCok($fileData['file_name']);
                }
            endfor; // Penutup For
            $bang = json_encode($arr);
            $this->resizeCok($fileData['file_name']);
            if ($uploadData !== null) { // Jika Berhasil Upload

                // Insert ke Database 
                $insert = $this->v->upload($uploadData);

                if ($insert) { // Jika Berhasil Insert
                    redirect('Data_Rumah/add_image/' . $id);
                    // echo "
                    //     Sukses Ditambahkan</br>
                    //     <a href='".base_url()."Data_Rumah'>Kembali</a>
                    // ";
                } else { // Jika Tidak Berhasil Insert
                    redirect('Data_Rumah/add_image/' . $id);
                    // echo "
                    //     Gagal Ditambahkan</br>
                    //     <a href='".base_url()."Data_Rumah'>Kembali</a>
                    // ";
                }
            }
        }
    }
    public function unggahGambar($id)
    {
   
        $countfiles = count($_FILES['files']['name']);
    
        for($i=0;$i<$countfiles;$i++){
    
          if(!empty($_FILES['files']['name'][$i])){
    
            // Define new $_FILES array - $_FILES['file']
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];
   
            // Set preference
            $config['upload_path'] = './uploads/rumah'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '5000'; // max_size in kb
            $config['file_name'] = $_FILES['files']['name'][$i];
    
            //Load upload library
            $this->load->library('upload',$config); 
            $this->upload->initialize($config);
            $arr = array('msg' => 'terjadi kesalahan tidak diduga, ulangi kembali', 'success' => false);
            // File upload
            if($this->upload->do_upload('file')){
             
             $data = $this->upload->data(); 
          //   $insert['gambar'] = $data['file_name'];
          //   $insert['id_detail_rumah'] = "";
          //   $insert['id_rumah'] = $this->uri->segment(3);
             
             $insert = [
                 'gambar' => $data['file_name'],
                 'id_rumah' => $id
                 ];
             $save = $this->db->insert('detail_rumah', $insert);
             if($save) {
             $arr = array('msg' => 'Foto Berhasil Diunggah', 'success' => true);
              // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
              // Gambar Berhasil Ditambah
              // </div>');
              // redirect('Data_Rumah');
             } else {
               $arr = array('msg' => 'terjadi kesalahan tidak diduga saat insert database pada id rumah => '.$id.', ulangi kembali ', 'success' => false); 
              // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
              // terjadi kesalahan
              // </div>');
              // redirect('Data_Rumah');
                 
             }
            }
          }
    
        }
        echo json_encode($arr);
    
    }
    //     public function resize($path, $file) => GHAIB LUR
    // {
    //     $sizes = array(200, 70, 40);

    //     $this->load->library('image_lib');

    //     foreach($sizes as $size)
    //     { 
    //       $config['image_library']    = 'gd2';
    //       $config['source_image']     = $path;
    //       $config['create_thumb']     = true;
    //       $config['maintain_ratio']   = true;
    //       $config['width']            = $size;
    //       $config['height']           = $size;   
    //       $config['new_image']        = './uploads/rumah/' . $size . $file;

    //       $this->image_lib->clear();
    //       $this->image_lib->initialize($config);
    //       $this->image_lib->resize();
    //     }
    // }

    public function kompres($filename)
    {
        $haha = json_decode($filename, true);
        for ($i = 0; $i < count($haha); $i++) {
            $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/rumah/' . $haha[$i];
            $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/rumah_compress/';
            $config_manip = array(
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path,
                'maintain_ratio' => TRUE,
                'width' => 500,
            );

            $this->load->library('image_lib', $config_manip);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }

            $this->image_lib->clear();
        }
    }

    public function resizeCok($filename)
    {
        $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/rumah/' . $filename;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/rumah/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'width' => 500,
        );

        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }

        $this->image_lib->clear();
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
