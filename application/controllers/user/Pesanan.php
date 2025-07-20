<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('level') !== 'User') {
            redirect('home');
        }
        $this->load->model('M_model');
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Riwayat Pembelian';

        $data['pesanan'] = $this->db
            ->where('id_user', $id_user)
            ->order_by('created_at', 'DESC')
            ->get('tb_order')->result();

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/pesanan/index', $data);
        $this->load->view('user/templates/footer');
    }
}
