<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('level') != 'Admin') {
            redirect('home');
        }
        $this->load->model('M_model');
        $this->load->helper(['text', 'url']);
    }

    public function index() {
        $data['title'] = 'Data Produk';
        $data['kategori_all'] = $this->M_model->get_all('tb_kategori')->result();

        $filter = $this->input->get('kategori');
        if ($filter) {
            $data['produk'] = $this->db
                ->select('tb_produk.*')
                ->from('tb_produk')
                ->join('tb_produk_kategori', 'tb_produk.id = tb_produk_kategori.id_produk')
                ->where('tb_produk_kategori.id_kategori', $filter)
                ->group_by('tb_produk.id')
                ->get()->result();
        } else {
            $data['produk'] = $this->M_model->get_all('tb_produk')->result();
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/produk/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah() {
        $data['title'] = 'Tambah Produk';
        $data['kategori'] = $this->M_model->get_all('tb_kategori')->result();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/produk/tambah', $data);
        $this->load->view('admin/templates/footer');
    }

    public function simpan() {
        $foto = $_FILES['foto']['name'];
        if ($foto != '') {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $config['file_name']     = time() . '-' . $foto;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                redirect('admin/produk/tambah');
                return;
            } else {
                $foto = $this->upload->data('file_name');
            }
        } else {
            $foto = null;
        }

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'harga'       => $this->input->post('harga'),
            'stok'        => max(0, (int) $this->input->post('stok')), // stok tidak boleh negatif
            'deskripsi'   => $this->input->post('deskripsi'),
            'foto'        => $foto
        ];

        $this->M_model->insert('tb_produk', $data);
        $id_produk = $this->db->insert_id();

        $kategori = $this->input->post('kategori');
        if ($kategori) {
            foreach ($kategori as $id_kategori) {
                $this->db->insert('tb_produk_kategori', [
                    'id_produk'   => $id_produk,
                    'id_kategori' => $id_kategori
                ]);
            }
        }

        $this->session->set_flashdata('pesan', 'Data produk berhasil ditambahkan');
        redirect('admin/produk');
    }

    public function edit($id) {
        $data['title']            = 'Edit Produk';
        $data['produk']           = $this->M_model->get_where('tb_produk', ['id' => $id])->row();
        $data['kategori']         = $this->M_model->get_all('tb_kategori')->result();
        $data['produk_kategori']  = array_column(
            $this->db->get_where('tb_produk_kategori', ['id_produk' => $id])->result_array(),
            'id_kategori'
        );

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/produk/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update($id) {
        $produk     = $this->M_model->get_where('tb_produk', ['id' => $id])->row();
        $foto_lama  = $produk->foto;
        $foto       = $_FILES['foto']['name'];

        if ($foto != '') {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $config['file_name']     = time() . '-' . $foto;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                if ($foto_lama && file_exists('./uploads/' . $foto_lama)) {
                    unlink('./uploads/' . $foto_lama);
                }
                $foto = $this->upload->data('file_name');
            } else {
                $foto = $foto_lama;
            }
        } else {
            $foto = $foto_lama;
        }

        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'harga'       => $this->input->post('harga'),
            'stok'        => max(0, (int) $this->input->post('stok')), // validasi stok tidak negatif
            'deskripsi'   => $this->input->post('deskripsi'),
            'foto'        => $foto
        ];

        $this->M_model->update(['id' => $id], $data, 'tb_produk');

        $this->db->delete('tb_produk_kategori', ['id_produk' => $id]);
        $kategori = $this->input->post('kategori');
        if ($kategori) {
            foreach ($kategori as $id_kategori) {
                $this->db->insert('tb_produk_kategori', [
                    'id_produk'   => $id,
                    'id_kategori' => $id_kategori
                ]);
            }
        }

        $this->session->set_flashdata('pesan', 'Data produk berhasil diupdate');
        redirect('admin/produk');
    }

    public function hapus($id) {
        $produk = $this->M_model->get_where('tb_produk', ['id' => $id])->row();

        if ($produk && $produk->foto && file_exists('./uploads/' . $produk->foto)) {
            unlink('./uploads/' . $produk->foto);
        }

        $this->db->delete('tb_produk_kategori', ['id_produk' => $id]);
        $this->M_model->delete('tb_produk', ['id' => $id]);

        $this->session->set_flashdata('pesan', 'Data produk berhasil dihapus');
        redirect('admin/produk');
    }
}
