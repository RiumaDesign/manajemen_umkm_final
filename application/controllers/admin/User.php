<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // Cek akses hanya untuk Admin
        if ($this->session->userdata('level') !== 'Admin') {
            redirect('home');
        }

        $this->load->model('M_model');
    }

    // Daftar semua user
    public function index() {
        $data['title'] = 'Manajemen User';
        $data['user']  = $this->M_model->get_all('tb_user')->result();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/index', $data);
        $this->load->view('admin/templates/footer');
    }

    
    public function tambah() {
        $data['title'] = 'Tambah User';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/tambah');
        $this->load->view('admin/templates/footer');
    }

    
    public function simpan() {
        $data = [
            'nama'     => $this->input->post('nama'),
            'email'    => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')), // Hashed
            'level'    => $this->input->post('level'),
            'login'    => $this->input->post('login')
        ];

        $this->M_model->insert('tb_user', $data);
        $this->session->set_flashdata('pesan', '✅ Data berhasil ditambahkan');
        redirect('admin/user');
    }

    
    public function edit($id) {
        $data['title'] = 'Edit User';
        $data['user']  = $this->M_model->get_where('tb_user', ['id' => $id])->row();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/user/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    
    public function update($id) {
        $data = [
            'nama'     => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'level'    => $this->input->post('level'),
            'login'    => $this->input->post('login')
        ];

        
        if ($this->input->post('password')) {
            $data['password'] = md5($this->input->post('password'));
        }

        $this->M_model->update(['id' => $id], $data, 'tb_user');
        $this->session->set_flashdata('pesan', '✅ Data berhasil diupdate');
        redirect('admin/user');
    }

    
    public function hapus($id) {
        $this->M_model->delete('tb_user', ['id' => $id]);
        $this->session->set_flashdata('pesan', '✅ Data berhasil dihapus');
        redirect('admin/user');
    }
}
