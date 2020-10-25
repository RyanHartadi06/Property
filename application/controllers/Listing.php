<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Muser', 'm');
    }

    public function index() {
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
		$mau_ke			= $this->uri->segment(3);
        $idu			= $this->uri->segment(2);
		$data['listing'] = $this->db->query("SELECT * FROM rumah LIMIT $awal, $akhir ")->result();
		
		if($mau_ke = "index") {
			$this->load->view("template_user/header_two.php",$data);
			$this->load->view("User/Listing.php",$data);
			$this->load->view("template_user/footer.php");
		} else {
			$this->load->view("template_user/header_two.php",$data);
			$this->load->view("User/Listing.php",$data);
			$this->load->view("template_user/footer.php");
		}
    }

}