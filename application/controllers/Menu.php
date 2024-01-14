<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function kamar()
    {
        $data['title'] = 'Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['menu'] = $this->db->get('kamar')->result_array();

        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/kamar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_kamar' => $this->input->post('no_kamar'),
                'status' => $this->input->post('status'),
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function add_kamar()
    {
        $data['title'] = 'Tambah Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/kamar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_kamar' => $this->input->post('no_kamar'),
                'status' => $this->input->post('status')
            ];
            $this->db->insert('kamar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/kamar');
        }
    }

    public function edit_kamar($id)
    {
        $data['title'] = 'Update Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->query("SELECT * FROM kamar WHERE id=$id")->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/edit_kamar', $data);
        $this->load->view('templates/footer');
    }

    public function proses_kamar()
    {
        $id = $this->input->post('id');
        $no_kamar = $this->input->post('no_kamar');
        $status = $this->input->post('status');

        $data = array(
            'id' => $id,
            'no_kamar' => $no_kamar,
            'status' => $status

        );
        $where = array(
            'id' => $id
        );
        $this->db->set('no_kamar', $no_kamar);
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('kamar');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data film berhasil Dirubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('menu/kamar');
    }


    public function delete_kamar($id)
    {
        $this->db->delete('kamar', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil di Delete!</div>');
        redirect('menu/kamar');
    }


    public function penghuni()
    {
        $data['title'] = 'Penghuni';
        $this->load->model('Menu_model', 'peng');
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost:8080/kosan/admin/index';
        $config['total_rows'] = $this->peng->halaman();
        $config['per_page'] = 5;

        $data['start'] = $this->uri->segment(3);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->peng->totalPenghuni($config['per_page'], $data['start']);

        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('halaman/header', $data);
            $this->load->view('halaman/sidebar', $data);
            $this->load->view('halaman/topbar', $data);
            $this->load->view('menu/penghuni', $data);
            $this->load->view('halaman/footer');
        } else {
            $data = [
                'no_kamar' => $this->input->post('no_kamar'),
                'status' => $this->input->post('status'),
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function delete_penghuni($id)
    {
        $this->db->delete('penghuni', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil di Delete!</div>');
        redirect('admin/');
    }

    public function edit_penghuni($id)
    {
        $data['title'] = 'Update Benefit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penghuni'] = $this->db->query("SELECT * FROM penghuni WHERE id=$id")->result();
        $this->load->view('halaman/header', $data);
        $this->load->view('halaman/sidebar', $data);
        $this->load->view('halaman/topbar', $data);
        $this->load->view('menu/edit_penghuni', $data);
        $this->load->view('halaman/footer');
    }

    public function add_penghuni()
    {
        $data['title'] = 'Tambah Penguni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penghuni'] = $this->db->get('penghuni')->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('ktp', 'ktp', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required');
        $this->form_validation->set_rules('tanggap_pembayaran', 'tanggap_pembayaran', 'required');
        $this->form_validation->set_rules('no_kamar', 'no_kamar', 'required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required');


        if ($this->form_validation->run() ==  false) {
            $this->load->view('halaman/header', $data);
            $this->load->view('halaman/sidebar', $data);
            $this->load->view('halaman/topbar', $data);
            $this->load->view('menu/add_penghuni', $data);
            $this->load->view('halaman/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'ktp' => $this->input->post('ktp'),
                'alamat' => $this->input->post('alamat'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
                'no_kamar' => $this->input->post('no_kamar'),
                'pekerjaan' => $this->input->post('pekerjaan')
            ];
            $this->db->insert('penghuni', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('admin/portfolio');
        }
    }

    public function penghuni_add_proses()
    {

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $ktp = $this->input->post('ktp');
        $alamat = $this->input->post('alamat');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
        $no_kamar = $this->input->post('no_kamar');
        $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'ktp' => $ktp,
            'alamat' => $alamat,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'no_kamar' => $no_kamar,
            'pekerjaan' => $pekerjaan
        );
        $this->db->insert('penghuni', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data film berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin');
    }



    public function proses_penghuni()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penghuni'] = $this->db->get('penghuni')->result_array();

        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('halaman/header', $data);
            $this->load->view('halaman/sidebar', $data);
            $this->load->view('halaman/topbar', $data);
            $this->load->view('menu/edit_penghuni', $data);
            $this->load->view('halaman/footer');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $ktp = $this->input->post('ktp');
            $alamat = $this->input->post('alamat');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
            $no_kamar = $this->input->post('no_kamar');
            $pekerjaan = $this->input->post('pekerjaan');

            $this->db->set('nama', $nama);
            $this->db->set('ktp', $ktp);
            $this->db->set('alamat', $alamat);
            $this->db->set('tanggal_masuk', $tanggal_masuk);
            $this->db->set('tanggal_pembayaran', $tanggal_pembayaran);
            $this->db->set('no_kamar', $no_kamar);
            $this->db->set('pekerjaan', $pekerjaan);
            $this->db->where('id', $id);
            $this->db->update('penghuni');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('admin ');
        }
    }


    public function pembayaran()
    {
        $data['title'] = 'Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost:8080/kosan/menu/pembayaran';
        $config['total_rows'] = $this->menu->halamanPending();
        $config['per_page'] = 5;

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
        $data['menu'] = $this->menu->pembayaran($config['per_page'], $data['start']);
        $this->load->view('halaman/header', $data);
        $this->load->view('halaman/sidebar', $data);
        $this->load->view('halaman/topadmin', $data);
        $this->load->view('menu/pembayaran', $data);
        $this->load->view('halaman/footer');
    }
}
