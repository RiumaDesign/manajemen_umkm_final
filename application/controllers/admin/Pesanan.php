<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        if ($this->session->userdata('level') !== 'Admin') {
            redirect('home');
        }

        $this->load->model('M_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Notifikasi_model');
    }

    public function index() {
        $data['title'] = 'Manajemen Pesanan';

        // Ambil semua pesanan + nama user
        $this->db->select('o.*, u.nama AS nama_user');
        $this->db->from('tb_order o');
        $this->db->join('tb_user u', 'u.id = o.id_user');
        $data['pesanan'] = $this->db->get()->result();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pesanan/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function ubah_status($id) {
        $status = $this->input->post('status');

        // Update status pesanan
        $this->M_model->update(['id' => $id], ['status' => $status], 'tb_order');

        // Ambil data pesanan
        $pesanan = $this->db
            ->select('id_user' . (in_array('kode_order', $this->db->list_fields('tb_order')) ? ', kode_order' : ''))
            ->get_where('tb_order', ['id' => $id])
            ->row();

        // Siapkan notifikasi
        $judul = 'Status Pesanan Anda Diperbarui';
        $pesan = isset($pesanan->kode_order)
            ? "Pesanan dengan kode <b>{$pesanan->kode_order}</b> sekarang berstatus <b>{$status}</b>."
            : "Pesanan Anda sekarang berstatus <b>{$status}</b>.";

        // Kirim notifikasi
        $this->Notifikasi_model->kirim([
            'id_user' => $pesanan->id_user,
            'judul' => $judul,
            'pesan' => $pesan
        ]);

        // Redirect kembali ke halaman
        $this->session->set_flashdata('pesan', '✅ Status pesanan berhasil diperbarui.');
        redirect('admin/pesanan');
    }
    public function detail($id) {
    $data['title'] = 'Detail Pesanan';

    // Ambil data pesanan utama + nama dan email user
    $data['pesanan'] = $this->db
        ->select('o.*, u.nama AS nama_user, u.email')
        ->from('tb_order o')
        ->join('tb_user u', 'u.id = o.id_user')
        ->where('o.id', $id)
        ->get()->row();

    // Ambil detail produk dalam pesanan
    $data['detail'] = $this->db
        ->select('od.*, p.nama_produk, p.harga, p.foto')
        ->from('tb_order_detail od')
        ->join('tb_produk p', 'p.id = od.id_produk')
        ->where('od.id_order', $id)
        ->get()->result();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pesanan/detail', $data);
    $this->load->view('admin/templates/footer');
}



}
