<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('Muser', 'm');
		$this->load->model('Maksi' , 'v');
    }

    public function index() {
        $data['title'] = "MyHouse - Property Group";
        $this->load->library('pagination');
		$total_rows		= $this->db->query("SELECT * FROM agent")->num_rows();
		
		$config['base_url'] 	= base_URL().'agent/index/';
		$config['total_rows'] 	= $total_rows;
		$config['uri_segment'] 	= 3;
		$config['per_page'] 	= 12; 
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config); 
		
		$awal	= $this->uri->segment(3); 
		if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $config['per_page'];
		
		$data['pagi']	= $this->pagination->create_links();
		$mau_ke			= $this->uri->segment(3);
        $idu			= $this->uri->segment(2);
		$data['agent'] = $this->db->query("SELECT * FROM agent LIMIT $awal, $akhir ")->result_array();
		$data['page'] = $this->v->getData('page');
		if($mau_ke = "index") {
			$this->load->view("template_user/header_two",$data);
			$this->load->view("User/Agent",$data);
			$this->load->view("template_user/footer",$data);
		} else {
			$this->load->view("template_user/header_two",$data);
			$this->load->view("User/Agen",$data);
			$this->load->view("template_user/footer",$data);
		}
    }

}