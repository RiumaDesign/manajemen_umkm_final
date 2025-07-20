<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->M_model->get_where('tb_user', ['id' => $id_user])->row();

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/profil/index', $data);
        $this->load->view('user/templates/footer');
    }

public function update_password() {
    $id = $this->session->userdata('id_user');
    $password_baru = $this->input->post('password');
    $konfirmasi    = $this->input->post('konfirmasi_password');

    if (empty($password_baru)) {
        $this->session->set_flashdata('pesan', 'Password tidak boleh kosong');
    } elseif ($password_baru !== $konfirmasi) {
        $this->session->set_flashdata('pesan', 'Konfirmasi password tidak sesuai');
    } else {
        $this->M_model->update(['id' => $id], ['password' => md5($password_baru)], 'tb_user');
        $this->session->set_flashdata('pesan', 'Password berhasil diubah');
    }

    redirect('user/profil');
}

}
