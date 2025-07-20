<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // Cek apakah user sudah login dan berlevel 'User'
        if ($this->session->userdata('level') !== 'User') {
            redirect('home');
        }

        $this->load->model('Review_model');
        $this->load->model('M_model'); 
    }

    
    public function form($id_produk) {
        $id_user = $this->session->userdata('id_user');

        
        $cek = $this->Review_model->check_purchased($id_user, $id_produk);
        if (!$cek) {
            $this->session->set_flashdata('pesan', 'Kamu hanya bisa review produk yang pernah dibeli.');
            redirect('user/produk/detail/' . $id_produk);
        }

        
        $existing = $this->Review_model->get_user_review($id_user, $id_produk);

        $data['title'] = 'Beri Ulasan';
        $data['produk'] = $this->M_model->get_where('tb_produk', ['id' => $id_produk])->row();
        $data['review'] = $existing;

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/review_form', $data);
        $this->load->view('user/templates/footer');
    }

    
    public function simpan() {
        $id_user = $this->session->userdata('id_user');
        $id_produk = $this->input->post('id_produk');
        $rating = $this->input->post('rating');
        $komentar = $this->input->post('komentar');

        if ($rating < 1 || $rating > 5) {
            $this->session->set_flashdata('pesan', 'Rating tidak valid.');
            redirect('user/review/form/' . $id_produk);
        }

        $this->Review_model->save_review($id_user, $id_produk, $rating, $komentar);

        $this->session->set_flashdata('pesan', 'Ulasan berhasil dikirim.');
        redirect('user/produk/detail/' . $id_produk);
    }

    
    public function lihat($id_produk) {
        $data['title'] = 'Ulasan Produk';
        $data['produk'] = $this->M_model->get_where('tb_produk', ['id' => $id_produk])->row();
        $data['review_list'] = $this->Review_model->get_reviews($id_produk);

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/review_list', $data);
        $this->load->view('user/templates/footer');
    }
}
