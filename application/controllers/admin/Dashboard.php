<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();

        // Validasi akses admin
        if ($this->session->userdata('level') !== 'Admin') {
            redirect('home');
        }
    }

    public function index()
    {
        $data = [
            'title'           => 'Dashboard Admin',
            'total_user'      => $this->db->count_all('tb_user'),
            'total_produk'    => $this->db->count_all('tb_produk'),
            'total_kategori'  => $this->db->count_all('tb_kategori'),
            'total_pesanan'   => $this->db->count_all('tb_order'),
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/templates/footer');
    }
}
