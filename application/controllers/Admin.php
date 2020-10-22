<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller{
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
            $data['totalAgent'] = $this->v->getTotal('agent');
            $data['tersedia'] = $this->v->getTotal2('rumah' , 1);
            $data['terjual'] = $this->v->getTotal2('rumah' , 2);
            $yearNOW = date('Y');
            $query =  $this->db->query("SELECT COUNT(`id_rumah`) as count,MONTHNAME(createdDate) as month_name FROM rumah  WHERE Status = '2' AND createdDate LIKE '$yearNOW%'
            GROUP BY MONTH(createdDate)")->result(); 
            //SELECT COUNT(`id_rumah`) as count,DAY(createdDate) as day FROM rumah WHERE Status = '2'GROUP BY DAY(createdDate)
            //SELECT COUNT(`id_rumah`) as count,YEAR(createdDate) as year FROM rumah WHERE Status = '2'GROUP BY YEAR(createdDate)
            foreach($query as $row) {
                $data['label'][] = $row->month_name;
                $data['data'][] = (int) $row->count;
            }
            $data['chart_data'] = json_encode($data);
            
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("template/dashboard",$data);
            $this->load->view("template/footer");
        }
        public function filterhari()
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
            $this->session->userdata('email')])->row_array(); 
            $data['totalAgent'] = $this->v->getTotal('agent');
            $data['tersedia'] = $this->v->getTotal2('rumah' , 1);
            $data['terjual'] = $this->v->getTotal2('rumah' , 2);
            $yearNOW = date('Y');
            $query =  $this->db->query("SELECT COUNT(`id_rumah`) as count,DAY(createdDate) as day , YEAR(createdDate) as year FROM rumah WHERE Status = '2' AND createdDate LIKE '$yearNOW%' GROUP BY DAY(createdDate)")->result(); 
            //SELECT COUNT(`id_rumah`) as count,DAY(createdDate) as day FROM rumah WHERE Status = '2'GROUP BY DAY(createdDate)
            // echo json_encode($query);
            //SELECT COUNT(`id_rumah`) as count,YEAR(createdDate) as year FROM rumah WHERE Status = '2'GROUP BY YEAR(createdDate)
            foreach($query as $row) {
                $data['label'][] = $row->day;
                $data['data'][] = (int) $row->count;
            }
            $data['chart_data'] = json_encode($data);
            
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("template/dashboard",$data);
            $this->load->view("template/footer");
        }
        public function filtertahun()
        {
            $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
            $this->session->userdata('email')])->row_array(); 
            $data['totalAgent'] = $this->v->getTotal('agent');
            $data['tersedia'] = $this->v->getTotal2('rumah' , 1);
            $data['terjual'] = $this->v->getTotal2('rumah' , 2);
            $query =  $this->db->query("SELECT COUNT(`id_rumah`) as count,YEAR(createdDate) as year FROM rumah WHERE Status = '2'GROUP BY YEAR(createdDate)")->result(); 
            //SELECT COUNT(`id_rumah`) as count,DAY(createdDate) as day FROM rumah WHERE Status = '2'GROUP BY DAY(createdDate)
            //SELECT COUNT(`id_rumah`) as count,YEAR(createdDate) as year FROM rumah WHERE Status = '2'GROUP BY YEAR(createdDate)
            foreach($query as $row) {
                $data['label'][] = $row->year;
                $data['data'][] = (int) $row->count;
            }
            $data['chart_data'] = json_encode($data);
            
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("template/dashboard",$data);
            $this->load->view("template/footer");
        }
        public function data(){
            $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
            $this->session->userdata('email')])->row_array(); 
    
            $this->load->view("template/sidebar" , $data);
            $this->load->view("template/header",$data);
            $this->load->view("Admin/Akun",$data);
            $this->load->view("template/footer");
        }
        public function edit($id){
            $this->form_validation->set_rules('email' , 'Email' , 'required');
            $this->form_validation->set_rules('alamat' , 'Alamat' , 'required');
            $this->form_validation->set_rules('no_telp' , 'Nomor Telepon' , 'required');
            $this->form_validation->set_rules('nama' , 'Nama Pengguna' , 'required');
            if ($this->form_validation->run() == false) {
                $data['Pengguna'] = $this->db->get_where('pengguna',['email' => 
                $this->session->userdata('email')])->row_array(); 
                $data['dataku'] = $this->v->getDetailProf('pengguna' , 'id_pengguna' , $id);
                $this->load->view("template/sidebar" , $data);
                $this->load->view("template/header",$data);
                $this->load->view("Admin/Edit_Admin",$data);
                $this->load->view("template/footer");
            }else {
                $update = $this->v->ubahdata2(array(
                    'nama_pengguna' => $this->input->post('nama'),
                    'email' =>  $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'createdDate' => date("Y-m-d H:i:s"),
                ),"id_pengguna","pengguna", $id);
                if($update){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Berhasil Mengubah Data!
                    </div>');
                    redirect('Admin/data');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Mengubah Data!
                    </div>');
                    redirect('Admin/data');
                }
                }	
            }
    }
?>