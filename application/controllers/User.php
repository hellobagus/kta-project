<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class User extends CI_Controller
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
		$this->load->view("user/index");
	}

    public function profile()
    {
        $this->load->view("user/profile");  
    }

    public function getByName($id)
    {
        $where = array('rowID' => $id);
        $query = $this->db->get_where('user', $where)->result();
        echo json_encode($query);
    }

    public function updateProfile()
    {
        $msg    = '';
        $status = '';
        $id   = $this->input->post('id');
        $username = $this->input->post('username');
        $name   = $this->input->post('nama');
        $email  = $this->input->post('email');
        $role  = $this->input->post('role');
        $verified  = $this->input->post('verified');
        $image  = $this->input->post('image');
        // var_dump($id,$username, $name, $email, $role, $verified, $image);die;

        $cr = array('rowID' => $id);
        $data = array(
            'username'  => $username,
            'nama'  => $name,
            'email' => $email,
            'role'  => $role,
            'verified'  => $verified,
            'avatar' => $image
        );
        $d = $this->db->update('user', $data, $cr);
        // $d = 'OK';
        if ($d == 'OK') {
            $msg = "Profile Berhasil Di Ubah";
            $status = "OK";
            $this->session->set_userdata('avatar', $image);
            $this->session->set_userdata('nama', $name);
        } else {
            $msg = "Gagal Ubah Profil";
            $status = 'EROR';
        }
        $t = array(
            "Pesan" => $msg,
            "Status" => $status
        );
        echo json_encode($t);
    }

	public function getTable()
	{
		$myquery = "SELECT * FROM user";
		$hasil   = $this->db->query($myquery);

		echo json_encode($hasil->result());
	}

	public function add($id = "")
	{
		$this->load->view("user/add");
	}

	public function getByID($rowID = "")
	{
		$query = "SELECT * FROM user WHERE rowID = '$rowID'";
		$data = $this->db->query($query);

		echo json_encode($data->result());
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

            $target_dir = "image/file_user/".$nama."/";
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
                    $msg = "File " . basename($_FILES["userfile"]["name"]) . " telah berhasil diupload.";
                    $psn = "OK";
                    $descs = "image/file_user/" . $nama . "/" . $picname;
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
            $rowID  = $this->input->post('rowID');
            $username = $this->input->post('username');
            $nama     = $this->input->post('nama');
            $email    = $this->input->post('email');                
            $role     = $this->input->post('role');
            $kode_wilayah = $this->input->post('kode_wilayah');
            $password = md5($this->input->post('password'));
            $picturepath = $this->input->post('picturepath');

            if(empty($rowID))
            {
                $rowID = 0;
            }

            $criteria = array('rowID' => $rowID);

            if ($rowID > 0)
            {
            	$data = array(
		            'username'     => $username,
		            'nama' 	       => $nama,
		            'email'        => $email,
		            'role'         => $role,
                    'kode_wilayah' => $kode_wilayah,
		            //'password' => $password,
		            'avatar'       => $picturepath
	            );

                $update = $this->db->update('user', $data, $criteria);
                if ($update !="OK") {
                	$callback['Error'] = true;
                    $callback['Pesan'] = $update;
                } else {
                	$callback['Error'] = false;
                    $callback['Pesan'] ="Data telah berhasil diedit";
                }
            } else {
            	$data = array(
		            'username'     => $username,
		            'nama' 	       => $nama,
		            'email'        => $email,
		            'role'         => $role,
                    'kode_wilayah' => $kode_wilayah,
		            'password'     => $password,
		            'avatar'       => $picturepath,
		            'verified'     => "Tidak"
	            );

                $insert = $this->db->insert('user', $data);
                if ($insert !="OK") {
                    $callback['Error'] = true;
                    $callback['Pesan'] = $insert;
                } else {
                    $callback['Error'] = false;
                    $callback['Pesan'] ="Data telah berhasil tersimpan";
                }
            }
        } //tutup post
        else{
            $callback['Pesan'] = "Data validation is not valid";
        }
            
        echo json_encode($callback);
    }

    public function Delete(){
        $rowID = $this->input->post("id");
        $where = array('rowID'=>$rowID);

        $data = $this->db->delete('user', $where);
        $msg  = "Data telah berhasil dihapus";
        $msg1 = array("Pesan"=>$msg);
        echo json_encode($msg1);
    }

    public function change()
    {
        $rowID = $this->input->post("id");
        $where = array('rowID'=>$rowID);

        $data = array('verified' => 'Ya');

        $data = $this->db->update('user', $data, $where);
        $msg  = "Data telah berhasil diedit";
        $msg1 = array("Pesan"=>$msg);
        echo json_encode($msg1);
    }

    public function changepass()
    {
        $password2  = $this->input->post('password2');
        $email      = $this->input->post('email');
        $pwlama     = md5($this->input->post('pwlama'));
        // var_dump($password2, $email, $pwlama);die;
        $psn = '';
        $sts = '';
        $md5newpass = md5($password2);
        $data = array(
            'password' => $md5newpass
        );
        if (!empty($password2)) {
            $query = $this->db->get_where('user', ['email' => $email])->result_array();
            $passwordlama = $query[0]['password'];
            if ($pwlama != $passwordlama) {
                $psn = "Password lama salah!";
                $sts = "EROR";
            } else {
                $query2 = $this->db->update('user', $data, ['email' => $email]);
                if ($query2 == 'OK') {
                    $psn = "Password berhasil diubah!";
                    $sts = "OK";
                } else {
                    $psn = "Gagal ubah password!";
                    $sts = "EROR";
                }
            }            
        } else {
            $psn = "Password baru tidak boleh kosong!";
            $sts = "EROR";
        }
        $msg = array(
            'Pesan' => $psn,
            'Status' => $sts
        );
        echo json_encode($msg);
    }
}

?>