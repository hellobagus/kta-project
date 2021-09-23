<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Daftar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view("daftar/index");
	}

    public function anggota()
    {
        $this->load->view("daftar/anggota");
    }
	
	public function save()
    {
    	$callback = array(
    		'Data'	=> null,
    		'Error'	=> false,
    		'Pesan'	=> '',
    		'Status'=> 200
    	);

    	if ($_POST) 
        {
            $nama     		= $this->input->post('nama');
            $nik    		= $this->input->post('nik');
            $email 			= $this->input->post('email');
            $t_lahir    	= $this->input->post('t_lahir');
            $tgl_lahir     	= $this->input->post('tgl_lahir');
            $jns_kelamin    = $this->input->post('jns_kelamin');
            $no_wa     		= $this->input->post('no_wa');
            $lembaga_negara = $this->input->post('lembaga_negara');

            $data = array(
	            'nama' 	   		 => $nama,
	            'nik' 	   		 => $nik,
	            'email'    		 => $email,
	            't_lahir'  		 => $t_lahir,
	            'tgl_lahir' 	 => $tgl_lahir,
	            'jns_kelamin'    => $jns_kelamin,
                'no_wa'          => "62".$no_wa,
	            'lembaga_negara' => $lembaga_negara,
                'status_caleg'   => 'Unverified'
            );

            $insert = $this->db->insert('caleg', $data);
            if ($insert !="OK") {
                $callback['Error'] = true;
                $callback['Pesan'] = $insert;
            } else {
                $callback['Error'] = false;
                $callback['Pesan'] ="Data telah berhasil tersimpan";
            }
        } //tutup post
        else{
            $callback['Pesan'] = "Data validation is not valid";
        }
            
        echo json_encode($callback);
    }
}

?>