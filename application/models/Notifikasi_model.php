<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Ambil semua notifikasi untuk user tertentu
    public function get_by_user($id_user) {
        return $this->db
            ->where('id_user', $id_user)
            ->order_by('dibuat', 'DESC')
            ->get('tb_notifikasi')
            ->result();
    }

    // Hitung jumlah yang belum dibaca
    public function jumlah_belum_dibaca($id_user) {
        return $this->db
            ->where('id_user', $id_user)
            ->where('dibaca', 0)
            ->count_all_results('tb_notifikasi');
    }

    // Tandai semua sebagai sudah dibaca
    public function tandai_semua_dibaca($id_user) {
        return $this->db
            ->where('id_user', $id_user)
            ->update('tb_notifikasi', ['dibaca' => 1]);
    }

    // Tambah notifikasi secara umum
    public function tambah($data) {
        return $this->db->insert('tb_notifikasi', $data);
    }

    // Tambah notifikasi dengan parameter langsung
    public function kirim_notif($id_user, $judul, $pesan) {
        return $this->tambah([
            'id_user' => $id_user,
            'judul' => $judul,
            'pesan' => $pesan,
            'dibaca' => 0,
            'dibuat' => date('Y-m-d H:i:s')
        ]);
    }

    // ✅ Metode yang dipanggil dari controller: kirim()
    public function kirim($data) {
        $data['dibaca'] = 0;
        $data['dibuat'] = date('Y-m-d H:i:s');
        return $this->db->insert('tb_notifikasi', $data);
    }

    // Metode lain untuk update status baca
    public function tandai_dibaca($id_user) {
        return $this->db
            ->where('id_user', $id_user)
            ->where('dibaca', 0)
            ->update('tb_notifikasi', ['dibaca' => 1]);
    }
}
