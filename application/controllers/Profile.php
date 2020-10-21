<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Profile extends CI_Controller{
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
            $data['dataku'] = $this->v->getData('profile');
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Profile" , $data);
            $this->load->view("template/footer");
        }
        public function edit($id){
            $this->form_validation->set_rules('desc' , 'Deskripsi' , 'required');
            $this->form_validation->set_rules('visi' , 'Visi' , 'required');
            $this->form_validation->set_rules('misi' , 'Misi' , 'required');
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getDetailProf('profile' , 'id_profile' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Edit_Profile",$data);
                $this->load->view("template/footer");
            }else {
                $update = $this->v->ubahdata(array(
                    'visi' => $this->input->post("visi"),
                    'misi' => $this->input->post("misi"),
                    'deskripsi' => $this->input->post("desc")
                ), $id);
    
                if($update){
                    $ubahfoto = $_FILES['logo']['name'];
        
                    if ($ubahfoto) {
                        $config['allowed_types'] = 'jpg|png|gif';
                        $config['max_size'] = '2048';
                        $config['upload_path'] = './uploads/rumah/';
        
                        $this->load->library('upload', $config);
        
                        if ($this->upload->do_upload('logo')) {
                            $user = $this->db->get_where('profile', ['id_profile'=>$id])->row_array();
                            $fotolama = $user['logo_brand'];
                            if ($fotolama) {
                                unlink(FCPATH . '/uploads/rumah/' . $fotolama);
                            }
                            $fotobaru = $this->upload->data('file_name');
                            $this->db->set('logo_brand', $fotobaru);
                            $this->db->where('id_profile', $id);
                            $this->db->update('profile');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                            . $this->upload->display_errors() .
                            '</div>');
                            // redirect('user/editprofile');
                            redirect('Profile');
                        }
                    }
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Profile');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Profile');
                }
                
        
                }	
            }
         
        }
    
?>