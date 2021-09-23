<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("Model_Login");
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view("login/index");
	}

	function auth()
	{
		$username = $this->input->post('username');
		$pass     = md5($this->input->post('password'));

		$cek=$this->Model_Login->cari_user($username,$pass);

		if ($cek->num_rows()>0)
		{
			$user=$cek->row();
			$sesi=array('username'	   => $user->username,
						'email'		   => $user->email,
						'nama'		   => $user->nama,
						'avatar'	   => $user->avatar,
						'role'		   => $user->role,
						'kode_wilayah' => $user->kode_wilayah,
						'verified'	   => $user->verified,
						'userid'	   => $user->rowID,
						'logged'	   => true
					);
			$this->session->set_userdata($sesi);
			if ($this->session->verified == "Tidak")
			{
				$this->session->set_flashdata('verify','Akun Anda belum di verifikasi!');
				redirect("Login");
			} else {
				if ($this->session->role == "User")
				{
					redirect('DataDiri');
				} elseif ($this->session->role == "Cabang") {
					redirect('Dashboard/cabang');
				} elseif ($this->session->role == "Pusat") {
					redirect('Caleg');
				}
				redirect('Dashboard');
			}
		}
		else
		{
			//tidak ditemukan
			$this->session->set_flashdata('tampil','Username atau Password Salah!');
			redirect("Login");
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}

?>