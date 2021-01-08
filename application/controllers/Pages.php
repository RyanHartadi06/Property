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
            $this->load->helper('text');
        }
        public function index()
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['dataku'] = $this->db->query("SELECT * FROM page ORDER BY tgl_input DESC")->result_array();
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Pages" , $data);
            $this->load->view("template/footer");
        }
        public function detail($id)
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['dataku'] = $this->db->query("SELECT * FROM page WHERE id = '$id'")->result_array();
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/DetailPages" , $data);
            $this->load->view("template/footer");
        }
        public function add(){
            $this->form_validation->set_rules('nama' , 'Nama' , 'required');
            $this->form_validation->set_rules('desc' , 'description' , 'required');
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
                $this->session->userdata('id_pengguna')])->row_array(); 
                $data['dataku'] = $this->v->getData('content');
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Tambah_Pages" , $data);
                $this->load->view("template/footer");
            }else {
                $gambar = $_FILES['foto']['name'];

                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './uploads/artikel';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto_namaBaru = $this->upload->data('file_name');
                    $insert = array(
                        'id' => rand(111,999),
                        'name' => $this->input->post('nama'),
                        'description' => $this->input->post('desc'),
                        'gambar' => $foto_namaBaru,
                        'tgl_input' => date('Y-m-d H:i:s')
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
                }else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
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
                $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
                $this->session->userdata('id_pengguna')])->row_array(); 
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
                    $ubahfoto = $_FILES['foto']['name'];
        
                    if ($ubahfoto) {
                        $config['allowed_types'] = 'jpg|png|gif';
                        $config['max_size'] = '2048';
                        $config['upload_path'] = './uploads/artikel/';
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload('foto')) {
                            $user = $this->db->get_where('page', ['id'=>$id])->row_array();
                            $fotolama = $user['image'];
                            if ($fotolama) {
                                unlink(FCPATH . '/uploads/artikel/' . $fotolama);
                            }
                            $fotobaru = $this->upload->data('file_name');
                            $this->db->set('gambar', $fotobaru);
                            $this->db->where('id', $id);
                            $this->db->update('page');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                            . $this->upload->display_errors() .
                            '</div>');
                            // redirect('user/editprofile');
                            redirect('Pages');
                        }
                    }
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Pages');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Pages');
                }
            }
            
            
        }
        function upload_image(){
    		if(isset($_FILES["image"]["name"])){
    			$config['upload_path'] = './uploads/artikel/';
    			$config['allowed_types'] = 'jpg|jpeg|png|gif';
    			$this->upload->initialize($config);
    			if(!$this->upload->do_upload('image')){
    				$this->upload->display_errors();
    				return FALSE;
    			}else{
    				$data = $this->upload->data();
    		        //Compress Image
    		        $config['image_library']='gd2';
    		        $config['source_image']='./uploads/artikel/'.$data['file_name'];
    		        $config['create_thumb']= FALSE;
    	            $config['maintain_ratio']= TRUE;
    	            $config['quality']= '60%';
    	            $config['width']= 800;
    	            $config['height']= 800;
    	            $config['new_image']= './uploads/artikel/'.$data['file_name'];
    	            $this->load->library('image_lib', $config);
    	            $this->image_lib->resize();
    				echo base_url().'uploads/artikel/'.$data['file_name'];
    			}
    		}
    	}
    
    	//Delete image summernote
    	function delete_image(){
    		$src = $this->input->post('src');
    		$file_name = str_replace(base_url(), '', $src);
    		if(unlink($file_name)){
    	        echo 'File Delete Successfully';
    	    }
    	}
    }
?>