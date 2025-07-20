<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // WAJIB jika database tidak di-autoload
    }

    /**
     * Ambil semua produk wishlist milik user
     */
    public function getWishlistByUser($id_user) {
        $this->db->select('w.id, p.nama_produk, p.foto, p.harga');
        $this->db->from('tb_wishlist w');
        $this->db->join('tb_produk p', 'p.id = w.id_produk');
        $this->db->where('w.id_user', $id_user);
        return $this->db->get()->result();
    }

    /**
     * Cek apakah produk sudah ada di wishlist user
     */
    public function isInWishlist($id_user, $id_produk) {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_produk', $id_produk);
        return $this->db->get('tb_wishlist')->num_rows() > 0;
    }

    /**
     * Tambahkan ke wishlist jika belum ada
     */
    public function addToWishlist($id_user, $id_produk) {
        if (!$this->isInWishlist($id_user, $id_produk)) {
            $data = [
                'id_user' => $id_user,
                'id_produk' => $id_produk,
                'tanggal_ditambahkan' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('tb_wishlist', $data);
            return true;
        }
        return false; // sudah ada
    }

    /**
     * Hapus wishlist berdasarkan ID baris
     */
    public function deleteFromWishlist($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_wishlist');
    }
}
