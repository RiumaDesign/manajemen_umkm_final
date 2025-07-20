<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        if ($this->session->userdata('level') !== 'User') {
            redirect('home');
        }

        $this->load->model('M_model');
        $this->load->model('Wishlist_model');
        $this->load->helper('text'); // untuk word_limiter
    }

    public function index() {
        $data['title'] = 'Produk UMKM';
        $data['kategori_all'] = $this->M_model->get_all('tb_kategori')->result();

        $filter = $this->input->get('kategori');

        if ($filter) {
            // Dengan filter kategori + rating
            $data['produk'] = $this->db
                ->select('p.*, AVG(r.rating) as avg_rating, COUNT(r.id) as total_review')
                ->from('tb_produk p')
                ->join('tb_produk_kategori pk', 'p.id = pk.id_produk')
                ->join('tb_review r', 'r.id_produk = p.id', 'left')
                ->where('pk.id_kategori', $filter)
                ->group_by('p.id')
                ->get()->result();
        } else {
            // Tanpa filter kategori + rating
            $data['produk'] = $this->db
                ->select('p.*, AVG(r.rating) as avg_rating, COUNT(r.id) as total_review')
                ->from('tb_produk p')
                ->join('tb_review r', 'r.id_produk = p.id', 'left')
                ->group_by('p.id')
                ->get()->result();
        }

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/produk/index', $data);
        $this->load->view('user/templates/footer');
    }

    public function detail($id) {
    $data['title'] = 'Detail Produk';
    $data['produk'] = $this->M_model->get_where('tb_produk', ['id' => $id])->row();

    if (!$data['produk']) {
        $this->session->set_flashdata('pesan', 'Produk tidak ditemukan.');
        redirect('user/produk');
        return;
    }

    
    $data['kategori'] = $this->db
        ->select('nama_kategori')
        ->from('tb_kategori')
        ->join('tb_produk_kategori', 'tb_kategori.id = tb_produk_kategori.id_kategori')
        ->where('tb_produk_kategori.id_produk', $id)
        ->get()->result();

    // Ambil rata-rata rating
    $avg = $this->db
        ->select_avg('rating')
        ->where('id_produk', $id)
        ->get('tb_review')->row();

    $data['produk']->avg_rating = $avg->rating ?? 0;

    
    $id_user = $this->session->userdata('id_user');
    $data['pernah_beli'] = $this->db
        ->from('tb_order_detail od')
        ->join('tb_order o', 'o.id = od.id_order')
        ->where('o.id_user', $id_user)
        ->where('od.id_produk', $id)
        ->get()->num_rows() > 0;

    // Tambahkan flag stok habis
    $data['stok_habis'] = $data['produk']->stok <= 0;

    $this->load->view('user/templates/header', $data);
    $this->load->view('user/templates/sidebar');
    $this->load->view('user/produk/detail', $data);
    $this->load->view('user/templates/footer');
    }
}
