<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_model');
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 'Admin') {
            redirect('admin/dashboard');
        } elseif ($this->session->userdata('level') == 'User') {
            redirect('user/dashboard');
        }

        $data['title'] = 'Login';
        $this->load->view('login', $data);
    }

    public function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->M_model->get_where('tb_user', ['username' => $username]);

        if ($cek->num_rows() > 0) {
            $row = $cek->row_array();

            if (md5($password) == $row['password']) {
                if ($row['login'] == 'Ya') {
                    $this->session->set_userdata([
                        'id_user' => $row['id'], 
                        'nama'    => $row['nama'],
                        'level'   => $row['level']
                    ]);

                    $this->M_model->insert('tb_log', [
                        'id_user'   => $row['id'], 
                        'status'    => 'Login',
                        'ipAddress' => $_SERVER['REMOTE_ADDR'],
                        'device'    => $_SERVER['HTTP_USER_AGENT'],
                        'terdaftar' => date('Y-m-d H:i:s')
                    ]);

                    if ($row['level'] == 'Admin') {
                        redirect('admin/dashboard');
                    } elseif ($row['level'] == 'User') {
                        redirect('user/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('pesan', 'Akun tidak aktif.');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Password salah.');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Username tidak ditemukan.');
        }

        redirect('home');
    }
    public function register()
    {
    $this->load->view('register'); // Buat file views/register.php
    }
    public function register_aksi()
    {
    $nama      = $this->input->post('nama');
    $username  = $this->input->post('username');
    $password  = $this->input->post('password');
    $konf      = $this->input->post('konfirmasi');

    if ($password != $konf) {
        $this->session->set_flashdata('pesan', 'Konfirmasi password tidak cocok.');
        redirect('home/register');
    }

    $cek = $this->M_model->get_where('tb_user', ['username' => $username]);
    if ($cek->num_rows() > 0) {
        $this->session->set_flashdata('pesan', 'Username sudah digunakan.');
        redirect('home/register');
    }

    $data = [
        'nama'     => $nama,
        'username' => $username,
        'password' => md5($password),
        'level'    => 'User',
        'login'    => 'Ya'
    ];

    $this->M_model->insert('tb_user', $data);
    $this->session->set_flashdata('pesan', 'Registrasi berhasil. Silakan login.');
    redirect('home');
    }


    public function logout()
    {
        $this->M_model->insert('tb_log', [
            'id_user'   => $this->session->userdata('id_user'),
            'status'    => 'Logout',
            'ipAddress' => $_SERVER['REMOTE_ADDR'],
            'device'    => $_SERVER['HTTP_USER_AGENT'],
            'terdaftar' => date('Y-m-d H:i:s')
        ]);

        $this->session->sess_destroy();
        redirect('home');
    }
}
