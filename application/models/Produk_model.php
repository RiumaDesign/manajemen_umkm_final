<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Contoh: Ambil produk berdasarkan ID
    public function get_produk($id) {
        return $this->db->get_where('tb_produk', ['id' => $id])->row_array();
    }

    // Contoh: Ambil semua produk
    public function get_all() {
        return $this->db->get('tb_produk')->result_array();
    }
}
