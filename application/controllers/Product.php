<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mproduct', 'p');
        $this->load->model('Maksi', 'a');
        $this->load->model('Maksi', 'v');
    }

    public function index()
    {
        $data['title'] = "MyHouse - Property Group";
        $data['tipe_properti'] = $this->p->fetch_filter_type('id_kategori');
        $data['page'] = $this->v->getData('page');
        $data['tipe_kasur'] = $this->p->fetch_filter_type('jumlah_kamar');
        $data['tipe_kamar_mandi'] = $this->p->fetch_filter_type('kamar_mandi');
        $data['tipe_status_properti'] = $this->p->fetch_filter_type('status_property');
        $this->load->view('template_user/header_two', $data);
        $this->load->view('User/Product', $data);
        $this->load->view('template_user/footer');
    }

    public function terjual()
    {
        $data['title'] = "MyHouse - Property Group";
        $data['tipe_properti'] = $this->p->fetch_filter_type2('id_kategori');
        $data['page'] = $this->v->getData('page');
        $data['tipe_kasur'] = $this->p->fetch_filter_type2('jumlah_kamar');
        $data['tipe_kamar_mandi'] = $this->p->fetch_filter_type2('kamar_mandi');
        $data['tipe_status_properti'] = $this->p->fetch_filter_type2('status_property');
        $this->load->view('template_user/header_two', $data);
        $this->load->view('User/Terjual', $data);
        $this->load->view('template_user/footer');
    }

    public function fetch_data()
    {
        sleep(1);
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price = $this->input->post('maximum_price');
        $properti = $this->input->post('properti');
        $kasur = $this->input->post('kasur');
        $lokasi = $this->input->post('lokasi');
        $kamar_mandi = $this->input->post('kamar_mandi');
        $status_properti = $this->input->post('status_properti');
        $kategori = $this->input->post('kategori');
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->p->count_all($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = true;
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
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'product_list' => $this->p->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi),
        );
        echo json_encode($output);
    }

    public function fetch_data_terjual()
    {
        sleep(1);
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price = $this->input->post('maximum_price');
        $properti = $this->input->post('properti');
        $kasur = $this->input->post('kasur');
        $lokasi = $this->input->post('lokasi');
        $kamar_mandi = $this->input->post('kamar_mandi');
        $status_properti = $this->input->post('status_properti');
        $kategori = $this->input->post('kategori');
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = '#';
        $config['total_rows'] = $this->p->count_all_terjual($minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = true;
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
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link' => $this->pagination->create_links(),
            'product_list' => $this->p->fetch_data_terjual($config["per_page"], $start, $minimum_price, $maximum_price, $properti, $kasur, $kamar_mandi, $status_properti, $kategori, $lokasi),
        );
        echo json_encode($output);
    }

    public function detail($id)
    {
        $data['title'] = "MyHouse - Property Group";
        $data['detail'] = $this->a->getDetailData($id);
        $data['page'] = $this->v->getData('page');
        $data['rumah_detail'] = $this->db->get_where('detail_rumah', ['id_rumah' => $id])->result();
        $query = $this->db->get_where('rumah', ['id_rumah' => $id])->row_array();
        $sql = $this->db->get_where('rumah', ['id_rumah' => $id])->row_array();
        $data['harga'] = $query['harga'];
        $data['page'] = $this->v->getData('page');

        // Query
        // $this->db->join('agent', 'agent.id_agent=rumah.id_agent');
        $this->db->where('id_rumah', $id);
        $data['dtl'] = $this->db->get('rumah')->row();

        // Query
        $this->db->join('agent', 'agent.id_agent=rumah.id_agent');
        $this->db->where('id_rumah', $id);
        $data['a'] = $this->db->get('rumah')->row_array();


        $this->db->join('rumah', 'detail_rumah.id_rumah=rumah.id_rumah');
        $this->db->where('detail_rumah.id_rumah', $id);
        $data['galeri'] = $this->db->get('detail_rumah')->result();


        $this->load->view('template_user/header_two', $data);
        $this->load->view('User/Detail', $data);
        $this->load->view('template_user/footer', $data);
    }
}
