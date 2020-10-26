<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            // $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            $this->load->model('Muser' , 'm');
            // $this->load->library('curl');
            // belumlogin();
        }
        public function index(){
            $this->form_validation->set_rules('search', 'Search', 'required');
            if ($this->form_validation->run() == false) {
                $data['kategori'] = $this->v->getData('kategori');
                $data['terbaru'] = $this->m->getTerbaru();
                $data['populer'] = $this->m->getPopuler();
                $this->load->view("template_user/header");
                $this->load->view("User/Home",$data);
                $this->load->view("template_user/footer");
            }else {  
                $search = $this->input->post('search');
                $category = $this->input->post('category');
                $data['title'] = "MyHouse - Property Group";
                $this->load->library('pagination');
                $total_rows		= $this->db->query("SELECT * FROM rumah")->num_rows();
                
                $config['base_url'] 	= base_URL().'listing/index/';
                $config['total_rows'] 	= $total_rows;
                $config['uri_segment'] 	= 3;
                $config['per_page'] 	= 2; 
                $config['first_link']       = '<i class="fa fa-angle-right"></i>';
                $config['last_link']        = 'Last';
                $config['next_link']        = '<i class="fa fa-angle-right"></i>';
                $config['prev_link']        = 'Prev';
                $config['full_tag_open']    = '<ul class="pagination p-center">';
                $config['full_tag_close']   = '</ul>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '</span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '</span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span></li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                $this->pagination->initialize($config); 
                $awal	= $this->uri->segment(3); 
                if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
                $akhir	= $config['per_page'];
                $data['pagi']	= $this->pagination->create_links();

                $data['listing'] = $this->db->query("SELECT * FROM rumah , kategori WHERE (nama_pemilik_rumah LIKE '$search%' OR alamat_lengkap LIKE '$search%' OR kondisi LIKE '$search%' OR harga LIKE '$search%' OR name LIKE '$search%') AND rumah.id_kategori = kategori.id AND status_property = '$category'")->result();
                // echo $category;
                $this->load->view("template_user/header_two.php",$data);
                $this->load->view("User/Listing.php",$data);
                $this->load->view("template_user/footer.php");
            }
        }
        public function kategori($id){
            $data['title'] = "MyHouse - Property Group";
            $this->load->library('pagination');
            $total_rows		= $this->db->query("SELECT * FROM rumah")->num_rows();
            
            $config['base_url'] 	= base_URL().'listing/index/';
            $config['total_rows'] 	= $total_rows;
            $config['uri_segment'] 	= 3;
            $config['per_page'] 	= 2; 
            $config['first_link']       = '<i class="fa fa-angle-right"></i>';
            $config['last_link']        = 'Last';
            $config['next_link']        = '<i class="fa fa-angle-right"></i>';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<ul class="pagination p-center">';
            $config['full_tag_close']   = '</ul>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '</span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '</span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span></li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $this->pagination->initialize($config); 
            $awal	= $this->uri->segment(3); 
            if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
            $akhir	= $config['per_page'];
            $data['pagi']	= $this->pagination->create_links();

            $data['listing'] = $this->db->query("SELECT * FROM rumah , kategori WHERE rumah.id_kategori = '$id' AND rumah.id_kategori = kategori.id")->result();
            // echo $category;
            $this->load->view("template_user/header_two.php",$data);
            $this->load->view("User/Listing.php",$data);
            $this->load->view("template_user/footer.php");
        }
        public function terbaru() {
            $data['title'] = "MyHouse - Property Group";
            $this->load->library('pagination');
            $total_rows		= $this->db->query("SELECT * FROM rumah")->num_rows();
            
            $config['base_url'] 	= base_URL().'listing/index/';
            $config['total_rows'] 	= $total_rows;
            $config['uri_segment'] 	= 3;
            $config['per_page'] 	= 2; 
            $config['first_link']       = '<i class="fa fa-angle-right"></i>';
            $config['last_link']        = 'Last';
            $config['next_link']        = '<i class="fa fa-angle-right"></i>';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<ul class="pagination p-center">';
            $config['full_tag_close']   = '</ul>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '</span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '</span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span></li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $this->pagination->initialize($config); 
            $awal	= $this->uri->segment(3); 
            if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
            $akhir	= $config['per_page'];
            $data['pagi']	= $this->pagination->create_links();

            $data['listing'] = $this->db->query("SELECT * FROM rumah ORDER BY createdDate DESC")->result();
            // echo $category;
            $this->load->view("template_user/header_two.php",$data);
            $this->load->view("User/Listing.php",$data);
            $this->load->view("template_user/footer.php");
        }
        public function populer() {
            $data['title'] = "MyHouse - Property Group";
            $this->load->library('pagination');
            $total_rows		= $this->db->query("SELECT * FROM rumah")->num_rows();
            
            $config['base_url'] 	= base_URL().'listing/index/';
            $config['total_rows'] 	= $total_rows;
            $config['uri_segment'] 	= 3;
            $config['per_page'] 	= 2; 
            $config['first_link']       = '<i class="fa fa-angle-right"></i>';
            $config['last_link']        = 'Last';
            $config['next_link']        = '<i class="fa fa-angle-right"></i>';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<ul class="pagination p-center">';
            $config['full_tag_close']   = '</ul>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '</span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '</span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span></li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $this->pagination->initialize($config); 
            $awal	= $this->uri->segment(3); 
            if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
            $akhir	= $config['per_page'];
            $data['pagi']	= $this->pagination->create_links();

            $data['listing'] = $this->db->query("SELECT * FROM rumah  ORDER BY populer DESC")->result();
            // echo $category;
            $this->load->view("template_user/header_two.php",$data);
            $this->load->view("User/Listing.php",$data);
            $this->load->view("template_user/footer.php");
        }
        public function updatePopuler($id){
            $data = $this->db->query("SELECT * FROM rumah where id_rumah = '$id'")->row();
            $populer = $data->populer;
            $hitung = $populer + 1;
            // echo $hitung;
            $this->db->set('populer', $hitung);
            $this->db->where('id_rumah', $id);
            $this->db->update('rumah');
            redirect('Product/detail/'.$id);
        }
    }
