<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();  // ✅ Load database agar $this->db aktif
    }

    public function get_laporan_bulanan($bulan, $tahun, $status = 'Selesai') {
    $this->db->select('p.nama_produk, p.harga, od.jumlah, (p.harga * od.jumlah) as subtotal, o.created_at');
    $this->db->from('tb_order_detail od');
    $this->db->join('tb_order o', 'od.id_order = o.id');
    $this->db->join('tb_produk p', 'p.id = od.id_produk');
    $this->db->where('MONTH(o.created_at)', $bulan);
    $this->db->where('YEAR(o.created_at)', $tahun);
    $this->db->where('o.status', $status);
    return $this->db->get()->result();
}


}
