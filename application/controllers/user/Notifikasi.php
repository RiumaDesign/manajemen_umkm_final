<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        if ($this->session->userdata('level') !== 'User') {
            redirect('home');
        }

        $this->load->model('Notifikasi_model');
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');

        $data['title'] = 'Notifikasi';
        $data['notifikasi'] = $this->Notifikasi_model->get_by_user($id_user);

        $this->Notifikasi_model->tandai_dibaca($id_user);

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/notifikasi', $data);
        $this->load->view('user/templates/footer');
    }
}
