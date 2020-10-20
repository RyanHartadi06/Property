<?php 

    class Auth extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Maksi' , 'v');
            // $this->load->library('curl');
            // is_logged_in();
        }
        public function Login(){
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = "Login";
                $this->load->view('templates/auth_header',$data);
                $this->load->view('Admin/Login');
                $this->load->view('templates/auth_footer');
               
            }else {
                $this->_login();
                // $result = $this->curl->simple_get('http://example.com/');
                // var_dump($result);
            }
        }
        private function _login()
        {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
    
            //lakukan pengecekan apakah email dari user ada
            $user = $this->db->get_where('pengguna', ['email' => $email])->row_array();
           
            if ($user) { //jika user active
                if ($password === $user['password']) {
                    $data = [
                        'email' => $user['email'],
                        'id_pengguna' => $user['id_pengguna'],
                        'nama_pengguna' => $user['nama_pengguna'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('Admin');
                  
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                            Wrong password !
                    </div>');
                    // redirect('Admin');

                redirect('');
                }
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email Not Register
                </div>');
                redirect('');
            }
        }
        public function Register(){
            
            $this->form_validation->set_rules('nama_pengguna', 'Nama_Pengguna', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
                'is_unique' => 'Email Already Registered!'
            ]);
            $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]', [
                'matches' => 'Password Dont Match!',
                'min_length' => 'Password too short'
            ]);
            $this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('no_telp', 'Nomor_Telepon', 'required|trim');
            $kode = $this->v->randomkode(32);
            if ($this->form_validation->run() == false) {
                    $data['title'] = "Registration";
                    $this->load->view('templates/auth_header',$data);
                    $this->load->view('Admin/Register');
                    $this->load->view('templates/auth_footer');
            }else {
                $email = $this->input->post('email');
                $data = [
                    'id_pengguna' => $kode,
                    'nama_pengguna' => $this->input->post('nama_pengguna'),
                    'email' => $email,
                    'password' => md5($this->input->post('pass1')),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' =>$this->input->post('no_telp'),
                    'createdDate' => date("Y-m-d H:i:s"),
                ];

                // echo $data;
                $this->db->insert('pengguna', $data);
                
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your Account has been success created
            </div>');
                redirect('Auth/Login');
            }
        }
        public function logout()
        {
            $this->session->unset_userdata('Email');
            $this->session->unset_userdata('Status');
    
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been logged out!
            </div>');
            redirect('Auth/Login');
        }
    }
   


?>