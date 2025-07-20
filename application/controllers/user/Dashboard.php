<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if ($this->session->userdata('level') !== 'User') {
            redirect('home');
        }

        $this->load->model('M_model');
        $this->load->model('Notifikasi_model'); 
    }

    public function index()
    {
        $data['title'] = 'Dashboard User';
        $data['nama']  = $this->session->userdata('nama');
        $id_user = $this->session->userdata('id_user');

        $data['total_produk']    = $this->db->get('tb_produk')->num_rows();
        $data['total_keranjang'] = $this->db->where('id_user', $id_user)->get('tb_keranjang')->num_rows();
        $data['total_pesanan']   = $this->db->where('id_user', $id_user)->get('tb_order')->num_rows();

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('user/templates/footer');
    }

    // Method untuk menampilkan halaman notifikasi
    public function notifikasi()
    {
        $id_user = $this->session->userdata('id_user');

        $data['title'] = 'Notifikasi';
        $data['notifikasi'] = $this->Notifikasi_model->get_by_user($id_user);

        // Tandai semua sebagai dibaca saat dibuka
        $this->Notifikasi_model->tandai_dibaca($id_user);

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/notifikasi', $data);
        $this->load->view('user/templates/footer');
    }
}
