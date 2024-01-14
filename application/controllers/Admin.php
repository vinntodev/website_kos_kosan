<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost:8080/kosan/admin/index';
        $config['total_rows'] = $this->menu->halaman();
        $config['per_page'] = 10;

        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);


        $data['totali'] = $this->menu->total();
        $data['tagihann'] = $this->menu->jumlahTagihan();
        $data['kako'] = $this->menu->kamarKosong();
        $data['jupeng'] = $this->menu->jumlahPenghuni();
        $data['menu'] = $this->menu->totalPenghuni($config['per_page'], $data['start']);
        $this->load->view('halaman/header', $data);
        $this->load->view('halaman/sidebar', $data);
        $this->load->view('halaman/topadmin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('halaman/footer');
    }

    public function manggil_no()
    {
        $query = $this->db->query("SELECT no_hp FROM pembayaran where nomor_kamar='201'");

        foreach ($query->result_array() as $row) {
            echo $row['no_hp'] . ',';
        }
    }


    public function pesan()
    {

        $chat_id = '-960071087';
        $token = '6127198885:AAFr_nvXltJ_m2xwEL6NGXIU_T-UyHZZbd4';
        $url = 'https://api.telegram.org/bot' . $token . '/sendmessage?chat_id=' . $chat_id . '&text=Test';

        file_get_contents($url);
    }



    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('halaman/header', $data);
        $this->load->view('halaman/sidebar', $data);
        $this->load->view('halaman/topbar', $data);
        $this->load->view('admin/v_role', $data);
        $this->load->view('halaman/footer');
    }

    public function pembayaran()
    {


        $data['title'] = 'Pembayaran';
        $this->load->model('Menu_model', 'menu');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->menu->getPembayarann();
        $data['menu'] = $this->db->get('pembayaran')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pembayaran', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
}
