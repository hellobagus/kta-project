<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Anggota extends CI_Controller
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
    $this->load->view('anggota/index');
  }

  public function add($id)
  {
    $data = array('id' => $id);
    $this->load->view('anggota/add', $data);  
  }

  public function cetakkartu()
  {
    $role = $this->session->role;
    if ($role == "Cabang")
    {
      $kode_wilayah = $this->session->kode_wilayah;
      $myquery = "SELECT * FROM anggota WHERE kode_wilayah = '$kode_wilayah'";
      $hasil   = $this->db->query($myquery);
    }
    else {
      $myquery = "SELECT * FROM anggota";
      $hasil   = $this->db->query($myquery);
    }
    $data = array('list' => $hasil->result());
    $this->load->view('anggota/cetakkartu', $data);
  }

  public function cetak()
  {
    $dt = $this->input->post('id');
    $ids = join(",", $dt);
    $query = $this->db->query("SELECT anggota.*, provinsi.nama AS nama_provinsi, kecamatan.nama AS nama_kecamatan, kelurahan.nama AS nama_kelurahan
      FROM anggota
        INNER JOIN provinsi ON anggota.provinsi = provinsi.id_prov
        INNER JOIN kecamatan ON anggota.kecamatan = kecamatan.id_kec 
        INNER JOIN kelurahan ON anggota.kelurahan = kelurahan.id_kel
      WHERE idanggota IN ($ids)")->result_array();

    $data=array(
      'list'  => $query,
      'count' => count($dt)
    );
    //var_dump($data);
    $this->load->view('anggota/cetak', $data);  
  }

  public function getTable()
  {
    $role = $this->session->role;
    if ($role == "Cabang")
    {
      $kode_wilayah = $this->session->kode_wilayah;
      $query = $this->db->get_where('anggota',['kodewilayah' => $kode_wilayah])->result_array();
    } else {
      $query = $this->db->get('anggota')->result_array();
    }
    echo json_encode($query);
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

  public function getByID($id)
  {
    $where=array('idanggota'=>$id);
    $data = $this->db->get_where('anggota', $where)->result_array();
    echo json_encode($data);
  }

  private function setUploadOptions()
  {
    $config = array(
      'upload_path'=>'./img/cs',
      'allowed_types'=>'jpg|png|pdf',
      'max_size'=>'10000',
      'overwrite'=>TRUE
    );
    return $config;
  }

  public function savePic() 
  {
    $files = $_FILES;
    $cnt ='';
    // $picname = str_replace(' ', '_', $files['userfile']['name']);
    $this->load->library('upload');
    $this->upload->initialize($this->setUploadOptions());

    $picture = !empty($_FILES) ? $picture = $_FILES["userfile"] : '';
      
    if(!empty($picture["name"]))
    {
      $picname = str_replace(' ', '_', $picture["name"]);
      $picture = $_FILES["userfile"];
      // var_dump($picture);exit();
      $tmpName = $_FILES['userfile']['tmp_name'];
      $imgString = file_get_contents($tmpName);
      $imgData = bin2hex($imgString);
      $imgbin ="0x".$imgData;
      $psn='';
      $msg='';
      $picture = array_filter($picture);

      $target_dir = "assets/img/anggota/";
      if(!is_dir($target_dir)){
        mkdir($target_dir);
      }

      // $target_file = $target_dir . basename($_FILES["userfile"]["name"]);
      $target_file = $target_dir . str_replace(' ','_',basename($_FILES["userfile"]["name"]));
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if ($_FILES["userfile"]["size"] > 5000000) {
        $msg = "Ukuran foto maksimal 5MB";
        $uploadOk = 0;
        $psn='failed';
            // return;
        $res=array("Pesan"=>$msg,"Status"=>$psn);                           

        echo json_encode($res);
        exit();
      }

      $imageFileType = strtolower($imageFileType);
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "JPG" ) {
        $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $psn='failed';
            // return;
        $res=array("Pesan"=>$msg,"Status"=>$psn);                           

        echo json_encode($res);
        exit();
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $msg = "Upload foto error!";
        $psn = "Failed";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file)) {
          $msg = "Foto ". basename( $_FILES["userfile"]["name"]). " berhasil diupload.";
          $psn = "OK";
          $descs ="assets/img/anggota/".$picname;
          $url=base_url().$descs;
          // var_dump($url);exit();
        } else {
          $msg = "Upload foto error!";
          $psn = "Failed";
        }
      }

    } else {
      $msg = "Upload foto error!";
      $psn = "Failed";
    }

    $res = array(
      'Pesan'=>$msg, 
      'Status'=>$psn,
      'Url'=>$url,
      'Picname'=>$picname,
    );
    echo json_encode($res);
  }

  public function save()
  {
    $id       = $this->input->post('id');
    $kodewilayah  = $this->input->post('kodewilayah');
    $namalengkap  = $this->input->post('namalengkap');
    $tempatlahir  = $this->input->post('tempatlahir');
    $tanggallahir = $this->input->post('tanggallahir');
    $jeniskelamin = $this->input->post('jeniskelamin');
    $nik      = $this->input->post('nik');
    $email      = $this->input->post('email');
    $provinsi   = $this->input->post('provinsi');
    $kabupaten    = $this->input->post('kabupaten');
    $kecamatan    = $this->input->post('kecamatan');
    $kelurahan    = $this->input->post('kelurahan');
    $alamat     = $this->input->post('alamat');
    $agama      = $this->input->post('agama');
    $picturepath  = $this->input->post('picturepath');
    $frmttanggal    = date("Y-m-d", strtotime($tanggallahir));
    // var_dump($id,$kodewilayah,$namalengkap,$tempatlahir, $tanggallahir,$jeniskelamin,$nik,$email,$provinsi,$kabupaten,$kecamatan,$kelurahan,$alamat,$agama, $picturepath);die;

    if ($id > 0) {
      $where = array('idanggota' => $id);
      $data = array(
        'kodewilayah'  => $kodewilayah, 
        'namalengkap'  => $namalengkap,
        'tempatlahir'  => $tempatlahir,
        'tanggallahir' => $frmttanggal,
        'jeniskelamin' => $jeniskelamin,
        'nik'          => $nik,
        'email'        => $email,
        'provinsi'     => $provinsi,
        'kabupaten'    => $kabupaten,
        'kecamatan'    => $kecamatan,
        'kelurahan'    => $kelurahan,
        'alamat'       => $alamat,
        'agama'        => $agama,
        'foto'         => $picturepath
      );

      $query = $this->db->update('anggota', $data, $where);
      if ($query == 'OK') {
        $pesan = 'Data Berhasil Diedit';
        $status = 'OK';
      } else {
        $pesan = 'Gagal Edit Data';
        $status = 'Failed';
      }
    } else {
      $data = array(
        'kodewilayah'  => $kodewilayah, 
        'namalengkap'  => $namalengkap,
        'tempatlahir'  => $tempatlahir,
        'tanggallahir' => $frmttanggal,
        'jeniskelamin' => $jeniskelamin,
        'nik'          => $nik,
        'email'        => $email,
        'provinsi'     => $provinsi,
        'kabupaten'    => $kabupaten,
        'kecamatan'    => $kecamatan,
        'kelurahan'    => $kelurahan,
        'alamat'       => $alamat,
        'agama'        => $agama,
        'foto'         => $picturepath,
        'tgl_registrasi' => date("Y-m-d")
      );
      $query = $this->db->insert('anggota', $data);
      if ($query == 'OK') {
        $pesan = 'Data Berhasil Disimpan';
        $status = 'OK';
      } else {
        $pesan = 'Gagal Simpan Data';
        $status = 'Failed';
      }
    }

    $callback = array(
      'Pesan' => $pesan,
      'Status' => $status
    );
    echo json_encode($callback);
  }

  public function delete()
  {
    $id = $this->input->post('id');
    $where = array('idanggota' => $id);
    $query = $this->db->delete('anggota', $where);
    if ($query == 'OK') {
      $pesan = 'Data Berhasil Dihapus';
      $status = 'OK';
    } else {
      $pesan = 'Gagal Hapus Data';
      $status = 'Failed';
    }

    $callback = array(
      'Pesan' => $pesan,
      'Status' => $status
    );
    echo json_encode($callback);
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