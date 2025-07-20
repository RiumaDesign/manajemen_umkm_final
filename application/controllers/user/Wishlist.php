<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); 
        $this->load->model('Wishlist_model');

        
        if ($this->session->userdata('level') !== 'User') {
            redirect('home');
        }
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');
        $data['title'] = 'Wishlist Anda';
        $data['wishlist'] = $this->Wishlist_model->getWishlistByUser($id_user);

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/templates/sidebar');
        $this->load->view('user/wishlist', $data);
        $this->load->view('user/templates/footer');
    }

    public function tambah($id_produk) {
        $id_user = $this->session->userdata('id_user');
        $this->Wishlist_model->addToWishlist($id_user, $id_produk);
        redirect('user/produk/detail/' . $id_produk);
    }

    public function tambah_ajax() {
        $id_user = $this->session->userdata('id_user');
        $id_produk = $this->input->post('id_produk');

        $success = $this->Wishlist_model->addToWishlist($id_user, $id_produk);
        echo json_encode(['status' => $success ? 'success' : 'duplicate']);
    }

    public function hapus($id) {
        $this->Wishlist_model->deleteFromWishlist($id);
        redirect('wishlist');
    }

    public function hapus_ajax() {
        $id = $this->input->post('id');
        $this->Wishlist_model->deleteFromWishlist($id);
        echo json_encode(['status' => 'deleted']);
    }
}
