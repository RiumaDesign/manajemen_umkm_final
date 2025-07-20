<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database aktif
    }

    /**
     * Ambil data pembayaran berdasarkan ID order
     */
    public function get_by_order($id_order) {
        return $this->db->get_where('tb_pembayaran', ['id_order' => $id_order])->row();
    }

    /**
     * Simpan data pembayaran baru
     */
    public function insert($data) {
        return $this->db->insert('tb_pembayaran', $data);
    }

    /**
     * Update data pembayaran berdasarkan id_order
     */
    public function update($id_order, $data) {
        $this->db->where('id_order', $id_order);
        return $this->db->update('tb_pembayaran', $data);
    }

    /**
     * Konfirmasi pembayaran (misalnya oleh admin)
     */
    public function konfirmasi($id_order) {
        return $this->update($id_order, [
            'status' => 'Dikonfirmasi',
            'waktu_pembayaran' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Ambil semua data pembayaran
     */
    public function get_all() {
        return $this->db->get('tb_pembayaran')->result();
    }

    /**
     * Ambil semua pembayaran milik user tertentu
     * (opsional: digunakan di halaman riwayat user)
     */
    public function get_by_user($id_user) {
        $this->db->select('p.*, o.kode_order, o.created_at');
        $this->db->from('tb_pembayaran p');
        $this->db->join('tb_order o', 'p.id_order = o.id');
        $this->db->where('o.id_user', $id_user);
        return $this->db->get()->result();
    }

    /**
     * Ambil data pembayaran lengkap untuk admin (dengan user & order)
     * (opsional: untuk tabel admin verifikasi)
     */
    public function get_with_order_user() {
        return $this->db
            ->select('p.*, o.kode_order, u.nama')
            ->from('tb_pembayaran p')
            ->join('tb_order o', 'p.id_order = o.id')
            ->join('tb_user u', 'o.id_user = u.id')
            ->order_by('p.waktu_pembayaran', 'DESC')
            ->get()
            ->result();
    }
}
