<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
        $this->load->model('M_model');

        if ($this->session->userdata('level') !== 'Admin') {
            redirect('home');
        }
    }

    public function index() {
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->M_model->get_all('tb_kategori')->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/kategori/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah() {
        $data['title'] = 'Tambah Kategori';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/kategori/tambah');
        $this->load->view('admin/templates/footer');
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->tambah();
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori', TRUE),
                'terdaftar' => date('Y-m-d H:i:s')
            ];
            $this->M_model->insert('tb_kategori', $data);
            $this->session->set_flashdata('pesan', 'Kategori berhasil ditambahkan');
            redirect(site_url('admin/kategori'));
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->M_model->get_where('tb_kategori', ['id' => $id])->row();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/kategori/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori', TRUE)
            ];
            $this->M_model->update(['id' => $id], $data, 'tb_kategori');
            $this->session->set_flashdata('pesan', 'Kategori berhasil diupdate');
            redirect(site_url('admin/kategori'));
        }
    }

    public function hapus($id) {
        $this->M_model->delete('tb_kategori', ['id' => $id]);
        $this->db->delete('tb_produk_kategori', ['id_kategori' => $id]);
        $this->session->set_flashdata('pesan', 'Kategori berhasil dihapus');
        redirect(site_url('admin/kategori'));
    }
}
?>