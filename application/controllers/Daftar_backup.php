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

	public function get_provinsi()
    {
        echo "<option value=''>Pilih Provinsi</option>";

        //API
        $api = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi';
        $get_content = file_get_contents($api);
        $json = json_decode($get_content, TRUE);
        $provinsi = $json['provinsi'];
        
        //DB
        $query = $this->db->get('provinsi')->result_array();
        
        foreach ($query as $row) {
            echo "<option value='" . $row['id_prov'] . "'>" . $row['nama'] . "</option>";
        }
    }

    public function get_kabupaten()
    {
        $provinsi = $this->input->post('provinsi');
        echo "<option value=''>Pilih Kabupaten</option>";

        //API
        $api = "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=".$provinsi;
        $get_content = file_get_contents($api);
        $json = json_decode($get_content, TRUE);
        $kabupaten = $json['kota_kabupaten'];

        //DB
        $where = array('id_prov' => $provinsi);
        $query = $this->db->get_where('kabupaten', $where)->result_array();

        foreach ($query as $row) {
            echo "<option value='" . $row['id_kab'] . "'>" . $row['nama'] . "</option>";
        }
    }

    public function get_kecamatan()
    {
        $kabupaten = $this->input->post('kabupaten');
        echo "<option value=''>Pilih Kecamatan</option>";

        //API
        $api = "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=".$kabupaten;
        $get_content = file_get_contents($api);
        $json = json_decode($get_content, TRUE);
        $kecamatan = $json['kecamatan'];

        //DB
        $where = array('id_kab' => $kabupaten);
        $query = $this->db->get_where('kecamatan', $where)->result_array();

        foreach ($query as $row) {
            echo "<option value='" . $row['id_kec'] . "'>" . $row['nama'] . "</option>";
        }
    }

    public function get_kelurahan()
    {
        $kecamatan = $this->input->post('kecamatan');
        echo "<option value=''>Pilih Kelurahan</option>";

        //API
        $api = "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=".$kecamatan;
        $get_content = file_get_contents($api);
        $json = json_decode($get_content, TRUE);
        $kelurahan = $json['kelurahan'];

        //DB
        $where = array('id_kec' => $kecamatan);
        $query = $this->db->get_where('kelurahan', $where)->result_array();

        foreach ($query as $row) {
            echo "<option value='" . $row['id_kel'] . "'>" . $row['nama'] . "</option>";
        }
    }

	public function savepic()
    {
    	$nama  = $this->input->post('nama');
        $files = $_FILES;
        $picture = !empty($_FILES) ? $picture = $_FILES["userfile"] : '';
        if (!empty($picture["name"])) {
            $picname = str_replace(' ', '_', $picture["name"]);
            $picture = $_FILES["userfile"];
            $tmpName = $_FILES['userfile']['tmp_name'];
            $imgString = file_get_contents($tmpName);
            $imgData = bin2hex($imgString);
            $imgbin = "0x" . $imgData;
            $psn = '';
            $msg = '';
            $picture = array_filter($picture);

            $target_dir = "image/file_caleg/".$nama."/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir);
            }
            $target_file = $target_dir . str_replace(' ', '_', basename($_FILES["userfile"]["name"]));
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if ($_FILES["userfile"]["size"] > 5000000) {
                $msg = "Maximum file size is 5MB";
                $uploadOk = 0;
                $psn = 'failed';
                $res = array("pesan" => $msg, "status" => $psn);

                echo json_encode($res);
                exit();
            }

            $imageFileType = strtolower($imageFileType);
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "JPG"
            ) {
                $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                $psn = 'failed';
                $res = array("pesan" => $msg, "status" => $psn);

                echo json_encode($res);
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $msg = "Sorry, your file was not uploaded.";
                $psn = "Failed";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["userfile"]["name"]) . " has been uploaded.";
                    $psn = "OK";
                    $descs = "image/file_caleg/" . $nama . "/" . $picname;
                    $url = base_url().$descs;
                } else {
                    $msg = "Sorry, there was an error uploading your file.";
                    $psn = "Failed";
                }
            }
        } else {
            $msg = "Sorry, there was an error uploading your file.";
            $psn = "Failed";
        }
        $res = array(
            'pesan' => $msg,
            'status' => $psn,
            'url' => $url,
            'picname' => $picname,
        );
        echo json_encode($res);
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
            $kode_wilayah 	= $this->input->post('kode_wilayah');
            $nama     		= $this->input->post('nama');
            $nik    		= $this->input->post('nik');
            $no_urut     	= $this->input->post('no_urut');
            $email 			= $this->input->post('email');                
            $nama_partai    = $this->input->post('nama_partai');
            $no_urut_partai = $this->input->post('no_urut_partai');
            $daerah 		= $this->input->post('daerah');
            $t_lahir    	= $this->input->post('t_lahir');
            $tgl_lahir     	= $this->input->post('tgl_lahir');
            $provinsi    	= $this->input->post('provinsi');
            $kabupaten     	= $this->input->post('kabupaten');
            $kecamatan     	= $this->input->post('kecamatan');
            $kelurahan     	= $this->input->post('kelurahan');
            $jns_kelamin    = $this->input->post('jns_kelamin');
            $agama     		= $this->input->post('agama');
            $alamat    		= $this->input->post('alamat');
            $nama_istri     = $this->input->post('nama_istri');
            $j_anak     	= $this->input->post('j_anak');
            $pendidikan     = $this->input->post('pendidikan');
            $pekerjaan    	= $this->input->post('pekerjaan');
            $status     	= $this->input->post('status');
            $motivasi   	= $this->input->post('motivasi');
            $target     	= $this->input->post('target');
            $picturepath    = $this->input->post('picturepath');

            $data = array(
	            'kode_wilayah'	 => $kode_wilayah,
	            'nama' 	   		 => $nama,
	            'nik' 	   		 => $nik,
	            'no_urut' 		 => $no_urut,
	            'email'    		 => $email,
	            'nama_partai'    => $nama_partai,
	            'no_urut_partai' => $no_urut_partai,
	            'daerah'   		 => $daerah,
	            't_lahir'  		 => $t_lahir,
	            'tgl_lahir' 	 => $tgl_lahir,
	            'provinsi'   	 => $provinsi,
	            'kabupaten'    	 => $kabupaten,
	            'kecamatan'   	 => $kecamatan,
	            'kelurahan'   	 => $kelurahan,
	            'jns_kelamin'    => $jns_kelamin,
	            'agama'    		 => $agama,
	            'alamat'     	 => $alamat,
	            'nama_istri'	 => $nama_istri,
	            'j_anak'   		 => $j_anak,
	            'pendidikan'     => $pendidikan,
	            'pekerjaan'   	 => $pekerjaan,
	            'status'    	 => $status,
	            'motivasi'  	 => $motivasi,
	            'target'   		 => $target,
	            //'foto'   		 => $picturepath
                'status_caleg'   => 'Unverified'
            );

            $insert = $this->db->insert('caleg', $data);
            if ($insert !="OK") {
                $callback['Error'] = true;
                $callback['Pesan'] = $insert;
            } else {
                $callback['Error'] = false;
                $callback['Pesan'] ="Data has been saved successfully";
            }

            $insertArray = array();
            for ($i=0; $i < 5; $i++)
            {
            	$data_detail = array(
            		'nama' 				=> $this->input->post('nama'),
            		'jenjang'			=> $this->input->post('jenjang')[$i],
            		'nama_institusi'	=> $this->input->post('nama_institusi')[$i],
            		'thn_masuk_pend'	=> $this->input->post('thn_masuk_pend')[$i],
            		'thn_keluar_pend'	=> $this->input->post('thn_keluar_pend')[$i],

            		'nama_kursus'		=> $this->input->post('nama_kursus')[$i],
            		'lembaga'			=> $this->input->post('lembaga')[$i],
            		'no_sertifikat' 	=> $this->input->post('no_sertifikat')[$i],
            		'thn_masuk_kursus'	=> $this->input->post('thn_masuk_kursus')[$i],
            		'thn_keluar_kursus'	=> $this->input->post('thn_keluar_kursus')[$i],

            		'nama_organisasi'		=> $this->input->post('nama_organisasi')[$i],
            		'jabatan'				=> $this->input->post('jabatan')[$i],
            		'thn_masuk_organisasi'	=> $this->input->post('thn_masuk_organisasi')[$i],
            		'thn_keluar_organisasi'	=> $this->input->post('thn_keluar_organisasi')[$i],

            		'nama_kantor'		=> $this->input->post('nama_kantor')[$i],
            		'jabatan_pekerjaan'	=> $this->input->post('jabatan_pekerjaan')[$i],
            		'thn_masuk_kerja'	=> $this->input->post('thn_masuk_kerja')[$i],
            		'thn_keluar_kerja'	=> $this->input->post('thn_keluar_kerja')[$i],

            		'nama_penghargaan'	=> $this->input->post('nama_penghargaan')[$i],
            		'lembaga_pemberi'	=> $this->input->post('lembaga_pemberi')[$i],
            		'thn_pemberian'		=> $this->input->post('thn_pemberian')[$i]
            	);
            	array_push($insertArray, $data_detail);
            }
            $this->db->insert_batch('caleg_detail', $insertArray);
        } //tutup post
        else{
            $callback['Pesan'] = "Data validation is not valid";
        }
            
        echo json_encode($callback);
    }
}

?>