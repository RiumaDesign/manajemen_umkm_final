<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('level') != 'Admin') {
            redirect('home');
        }
        $this->load->model('Laporan_model');
    }

    public function index() {
        $bulan = $this->input->get('bulan') ?? date('m');
        $tahun = $this->input->get('tahun') ?? date('Y');
        $status = $this->input->get('status') ?? 'Selesai';

        $data['title'] = 'Laporan Penjualan Bulanan';
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['status'] = $status;
        $data['laporan'] = $this->Laporan_model->get_laporan_bulanan($bulan, $tahun, $status);

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporan/index', $data);
        $this->load->view('admin/templates/footer');
    }
}
