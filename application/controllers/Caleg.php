<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Caleg extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (isset($this->session->logged)==FALSE)
		{
			$this->session->set_flashdata('hak','Silahkan login terlebih dahulu!');
			redirect ("Login");
		}
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view("caleg/index");
	}

	public function getTable()
	{
        $role = $this->session->role;
        if ($role == "Cabang")
        {
            $kode_wilayah = $this->session->kode_wilayah;
            $myquery = "SELECT * FROM caleg WHERE kode_wilayah = '$kode_wilayah'";
            $hasil   = $this->db->query($myquery);
        }
        else {
            $myquery = "SELECT * FROM caleg";
            $hasil   = $this->db->query($myquery);
        }

		echo json_encode($hasil->result());
	}

	public function add($id = "", $form = "")
	{
        if ($form == 'A')
        {
            $header = 'Pendaftaran Calon Legislatif';
            $form   = 'add';
        }
        else if ($form == 'E') {
            $header = 'Edit Data Calon Legislatif';
            $form   = 'edit';
        }

        $content = array(
            'id'     => $id,
            'header' => $header,
            'form'   => $form
        );
		$this->load->view("caleg/add", $content);
	}

	public function getByID($rowID = "")
	{
		$query = "SELECT * FROM caleg WHERE rowID = '$rowID'";
		$data = $this->db->query($query);
        $header = $data->result();
        $nama = $header[0]->nama;

        $query2 = "SELECT caleg_detail.* FROM caleg_detail WHERE nama = '$nama'";
        $data2 = $this->db->query($query2);
        $detail = $data2->result();
        //var_dump($result2);

        $content = array(
            'header' => $header,
            'detail' => $detail
        );
        //var_dump($content);
		echo json_encode($content);
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
            'Data'  => null,
            'Error' => false,
            'Pesan' => '',
            'Status'=> 200
        );

        if ($_POST) 
        {
            $id             = $this->input->post('id');
            // $kode_wilayah   = $this->input->post('kode_wilayah');
            $lembaga_negara = $this->input->post('lembaga_negara');
            $nama           = $this->input->post('nama');
            $nik            = $this->input->post('nik');
            $no_urut        = $this->input->post('no_urut');
            $email          = $this->input->post('email');                
            $nama_partai    = $this->input->post('nama_partai');
            $no_urut_partai = $this->input->post('no_urut_partai');
            $daerah         = $this->input->post('daerah');
            $t_lahir        = $this->input->post('t_lahir');
            $tgl_lahir      = $this->input->post('tgl_lahir');
            $provinsi       = $this->input->post('provinsi');
            $kabupaten      = $this->input->post('kabupaten');
            $kecamatan      = $this->input->post('kecamatan');
            $kelurahan      = $this->input->post('kelurahan');
            $jns_kelamin    = $this->input->post('jns_kelamin');
            $agama          = $this->input->post('agama');
            $alamat         = $this->input->post('alamat');
            $nama_istri     = $this->input->post('nama_istri');
            $j_anak         = $this->input->post('j_anak');
            $pendidikan     = $this->input->post('pendidikan');
            $pekerjaan      = $this->input->post('pekerjaan');
            $status         = $this->input->post('status');
            $motivasi       = $this->input->post('motivasi');
            $target         = $this->input->post('target');
            $picturepath    = $this->input->post('picturepath');

            $data = array(
                'kode_wilayah'   => '',
                'lembaga_negara' => $lembaga_negara,
                'nama'           => $nama,
                'nik'            => $nik,
                'no_urut'        => $no_urut,
                'email'          => $email,
                'nama_partai'    => $nama_partai,
                'no_urut_partai' => $no_urut_partai,
                'daerah'         => $daerah,
                't_lahir'        => $t_lahir,
                'tgl_lahir'      => $tgl_lahir,
                'provinsi'       => $provinsi,
                'kabupaten'      => $kabupaten,
                'kecamatan'      => $kecamatan,
                'kelurahan'      => $kelurahan,
                'jns_kelamin'    => $jns_kelamin,
                'agama'          => $agama,
                'alamat'         => $alamat,
                'nama_istri'     => $nama_istri,
                'j_anak'         => $j_anak,
                'pendidikan'     => $pendidikan,
                'pekerjaan'      => $pekerjaan,
                'status'         => $status,
                'motivasi'       => $motivasi,
                'target'         => $target,
                'foto'           => $picturepath,
                //'status_caleg'   => 'Unverified'
            );

            $where = array('rowID' => $id);
            $where_update = array('nama' => $nama);

            $insertArray = array();
            for ($i=0; $i < 5; $i++)
            {
                $data_detail = array(
                    'nama'              => $this->input->post('nama'),
                    'jenjang'           => $this->input->post('jenjang')[$i],
                    'nama_institusi'    => $this->input->post('nama_institusi')[$i],
                    'thn_masuk_pend'    => $this->input->post('thn_masuk_pend')[$i],
                    'thn_keluar_pend'   => $this->input->post('thn_keluar_pend')[$i],

                    'nama_kursus'       => $this->input->post('nama_kursus')[$i],
                    'lembaga'           => $this->input->post('lembaga')[$i],
                    'no_sertifikat'     => $this->input->post('no_sertifikat')[$i],
                    'thn_masuk_kursus'  => $this->input->post('thn_masuk_kursus')[$i],
                    'thn_keluar_kursus' => $this->input->post('thn_keluar_kursus')[$i],

                    'nama_organisasi'       => $this->input->post('nama_organisasi')[$i],
                    'jabatan'               => $this->input->post('jabatan')[$i],
                    'thn_masuk_organisasi'  => $this->input->post('thn_masuk_organisasi')[$i],
                    'thn_keluar_organisasi' => $this->input->post('thn_keluar_organisasi')[$i],

                    'nama_kantor'       => $this->input->post('nama_kantor')[$i],
                    'jabatan_pekerjaan' => $this->input->post('jabatan_pekerjaan')[$i],
                    'thn_masuk_kerja'   => $this->input->post('thn_masuk_kerja')[$i],
                    'thn_keluar_kerja'  => $this->input->post('thn_keluar_kerja')[$i],

                    'nama_penghargaan'  => $this->input->post('nama_penghargaan')[$i],
                    'lembaga_pemberi'   => $this->input->post('lembaga_pemberi')[$i],
                    'thn_pemberian'     => $this->input->post('thn_pemberian')[$i]
                );
                array_push($insertArray, $data_detail);
            }

            if ($id > 0)
            {
                $update = $this->db->update('caleg', $data, $where);
                if ($update !="OK") {
                    $callback['Error'] = true;
                    $callback['Pesan'] = $update;
                } else {
                    $callback['Error'] = false;
                    $callback['Pesan'] ="Data telah berhasil diupdate";
                }

                $this->db->delete('caleg_detail', $where_update);
                $this->db->insert_batch('caleg_detail', $insertArray);
            }
            else {
                $insert = $this->db->insert('user', $data);
                if ($insert !="OK") {
                    $callback['Error'] = true;
                    $callback['Pesan'] = $insert;
                } else {
                    $callback['Error'] = false;
                    $callback['Pesan'] ="Data telah berhasil tersimpan";
                }

                $this->db->insert_batch('caleg_detail', $insertArray);
            }            
        } //tutup post
        else{
            $callback['Pesan'] = "Data validation is not valid";
        }
            
        echo json_encode($callback);
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function change()
    {
        $rowID  = $this->input->post("id");
        $status = $this->input->post("status");
        $where = array('rowID'=>$rowID);
        $data = array('status_caleg' => $status);

        if($status == "Verified")
        {
            $update = $this->db->update('caleg', $data, $where);
            $msg  = "Data telah berhasil diedit";
            $sts  = "SUCCESS";

            if ($update = 'OK')
            {
                $dtcaleg = $this->db->get_where('caleg', ['rowID' => $rowID])->result_array();
                $email = $dtcaleg[0]['email'];
                $nama = $dtcaleg[0]['nama'];
                $pecah = explode(' ', $nama);
                $username = strtolower($pecah[0].$pecah[1]);

                $no_wa = $dtcaleg[0]['no_wa'];
                $avatar = "https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?resize=256%2C256&quality=100&ssl=1";
                $password = $this->generateRandomString(6);
                $userpswd = md5($password);

                $dtuser = array(
                    'username' => $username,
                    'password' => $userpswd,
                    'email'    => $email,
                    'nama'     => $nama,
                    'role'     => 'User',
                    'verified' => 'Ya',
                    'avatar'   => $avatar
                );

                $insert = $this->db->insert('user', $dtuser);
                if ($insert == 'OK')
                {
                    $data_wa = array(
                        'email'    => $email,
                        'nama'     => $nama,
                        'password' => $password,
                        'no_wa'    => $no_wa,
                        'link'     => 'http://dsignsystem.com/'
                    );

                    $dataemail = array(
                        'nama' => $nama,
                        'email' => $email,
                        'password' => $password,
                        'linkweb' => 'http://dsignsystem.com/'
                    );

                    $body = $this->load->view('caleg/email', $dataemail, TRUE);

                    $config = [
                        'mailtype'   =>'html',
                        'charset'    =>'utf-8',
                        'protocol'   =>'smtp',
                        'smtp_host'  =>'smtp.gmail.com',
                        'smtp_user'  =>'donnyprasetyo47.ad@gmail.com',
                        'smtp_pass'  =>'prasetyo',
                        'smtp_crypto'=>'ssl',
                        'smtp_port'  =>'465',
                        'crlf'       =>"\r\n",
                        'newline'    =>"\r\n"
                    ];

                    // Load library email dan konfigurasinya
                    $this->load->library('email', $config);

                    // Email dan nama pengirim
                    $this->email->from('administrator@gmail.com', 'Administrator');

                    // Email penerima
                    $this->email->to($email); // Ganti dengan email tujuan

                    // Subject email
                    $this->email->subject('Verifikasi Email');

                    // Isi email
                    $this->email->message($body);
                    
                    // Tampilkan pesan sukses atau error
                    if ($this->email->send()) {
                        $msg  = "Proses verifikasi berhasil, email terkirim!";
                        $sts  = "OK";
                    } else {
                        $msg  = "Proses verifikasi gagal, email tidak terkirim!";
                        $sts  = "ERROR";
                    }
                    // echo $this->email->print_debugger();
                } else {
                    $msg  = "Proses verifikasi gagal!";
                    $sts  = "ERROR";
                }
            } else {
                $msg  = "Proses verifikasi gagal!";
                $sts  = "ERROR";
            }
        }
        else{
            $update = $this->db->update('caleg', $data, $where);
            $msg  = "Data telah berhasil diedit";
            $sts  = "SUCCESS";
        }

        $calback = array(
            "Pesan" => $msg,
            "Status" => $sts
        );
        echo json_encode($calback+$data_wa);
    }

    public function zoom_provinsi()
    {
        $id = $this->input->post('id');
        $where = array('id_prov' => $id);
        $query = $this->db->get('provinsi')->result();
          // var_dump($query);die;
        $list = '';
        $pilih='';
        if(!empty($query)) {
          $list = '<option></option>';
          foreach ($query as $key) {
            if($id===$key->id_prov) {
              $pilih = ' selected="1" ';
            }else{
              $pilih='';
            }
            $list.='<option value="'.$key->id_prov.'"'.$pilih.'>'.$key->nama.'</option>';
          }
        }
        echo($list);
    }

    public function zoom_kabupaten()
    {
        $id = $this->input->post('id');
        $where = array('id_kab' => $id);
        $query = $this->db->get('kabupaten')->result();
        // var_dump($query);die;
        $list = '';
        $pilih='';
        if(!empty($query)) {
          $list = '<option></option>';
          foreach ($query as $key) {
            if($id===$key->id_kab){
                $pilih = ' selected="1" ';
            }else{
                $pilih='';
            }
            $list.='<option value="'.$key->id_kab.'"'.$pilih.'>'.$key->nama.'</option>';
          }
        }
        echo($list);
    }

    public function zoom_kecamatan()
    {
        $id = $this->input->post('id');
        $where = array('id_kec' => $id);
        $query = $this->db->get('kecamatan')->result();
        // var_dump($query);die;
        $list = '';
        $pilih='';
        if(!empty($query)) {
          $list = '<option></option>';
          foreach ($query as $key) {
            if($id===$key->id_kec){
                $pilih = ' selected="1" ';
            }else{
                $pilih='';
            }
            $list.='<option value="'.$key->id_kec.'"'.$pilih.'>'.$key->nama.'</option>';
          }
        }
        echo($list);
    }

    public function zoom_kelurahan()
    {
        $id = $this->input->post('id');
        $where = array('id_kel' => $id);
        $query = $this->db->get('kelurahan')->result();
        // var_dump($query);die;
        $list = '';
        $pilih='';
        if(!empty($query)) {
          $list = '<option></option>';
          foreach ($query as $key) {
            if($id===$key->id_kel){
              $pilih = ' selected="1" ';
            }else{
              $pilih='';
            }
            $list.='<option value="'.$key->id_kel.'"'.$pilih.'>'.$key->nama.'</option>';
          }
        }
        echo($list);
    }
}

?>