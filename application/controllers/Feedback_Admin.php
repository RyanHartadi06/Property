<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Feedback_Admin extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            // $this->load->library('curl');
            belumlogin();
        }
        public function index() {
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['dataku'] = $this->v->feedBack(1);
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Feedback" , $data);
            $this->load->view("template/footer");
        }
        public function lama(){
            $data['Pengguna'] = $this->db->get_where('pengguna',['id_pengguna' => 
            $this->session->userdata('id_pengguna')])->row_array(); 
            $data['dataku'] = $this->v->feedBack(2);
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Feedback_lama" , $data);
            $this->load->view("template/footer");
        }
        public function hapus($id)
        {
            $hapusku = $this->v->hapusdata("id_feedback", "feedback", $id);
            if ($hapusku) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                Data Berhasil Dihapus
                    </div>');
                redirect('Feedback_Admin');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                Data Gagal Dihapus
                    </div>');
                redirect('Feedback_Admin');
            }
        }
        public function hapus_lama($id)
        {
            $hapusku = $this->v->hapusdata("id_feedback", "feedback", $id);
            if ($hapusku) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                Data Berhasil Dihapus
                    </div>');
                redirect('Feedback_Admin/lama');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                Data Gagal Dihapus
                    </div>');
                redirect('Feedback_Admin/lama');
            }
        }
        public function detail($id)
        {
            $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
            $this->session->userdata('id_pengguna')])->row_array();
            $data['feedback'] = $this->v->getDetailProf('feedback','id_feedback', $id);

            $this->db->set('status', 2);
            $this->db->where('id_feedback', $id);
            $this->db->update('feedback');
            
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Detail_Feedback", $data);
            $this->load->view("template/footer");
        }
        public function detaillama($id)
        {
            $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
            $this->session->userdata('id_pengguna')])->row_array();
            $data['feedback'] = $this->v->getDetailProf('feedback','id_feedback', $id);

           
            
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/header", $data);
            $this->load->view("Admin/Detail_Feedbacklama", $data);
            $this->load->view("template/footer");
        }
    }
