<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Cek apakah user pernah membeli produk tertentu
     * (agar hanya user yang pernah beli bisa memberikan review)
     */
    public function check_purchased($id_user, $id_produk) {
    return $this->db
        ->from('tb_order_detail od')
        ->join('tb_order o', 'o.id = od.id_order')
        ->where('o.id_user', $id_user)
        ->where('od.id_produk', $id_produk)
        ->get()
        ->num_rows() > 0;
    }


    /**
     * Ambil review user tertentu untuk produk tertentu (jika sudah ada)
     */
    public function get_user_review($id_user, $id_produk) {
        return $this->db
            ->where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->get('tb_review')
            ->row();
    }

    /**
     * Simpan review baru atau update jika sudah ada
     */
    public function save_review($id_user, $id_produk, $rating, $komentar) {
        $existing = $this->get_user_review($id_user, $id_produk);

        $data = [
            'id_user'    => $id_user,
            'id_produk'  => $id_produk,
            'rating'     => $rating,
            'komentar'   => $komentar,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($existing) {
            // update
            $this->db->where('id', $existing->id);
            return $this->db->update('tb_review', $data);
        } else {
            // insert
            return $this->db->insert('tb_review', $data);
        }
    }

    /**
     * Ambil semua review dari produk tertentu
     */
    public function get_reviews($id_produk) {
        return $this->db
            ->select('tb_review.*, tb_user.nama') // asumsikan ada tb_user
            ->from('tb_review')
            ->join('tb_user', 'tb_user.id = tb_review.id_user')
            ->where('id_produk', $id_produk)
            ->order_by('created_at', 'DESC')
            ->get()
            ->result();
    }
}
