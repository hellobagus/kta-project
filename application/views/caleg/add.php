<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>List Calon Legislatif</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/select2/dist/css/select2.min.css')?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/components.css')?>">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <?php 
          $this->load->view('template/navbar');
        ?>
      </nav>
      <div class="main-sidebar">
        <?php
          $this->load->view('template/sidebar');
        ?>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $header?></h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-header-action">
                      <a href="<?php echo base_url('Caleg')?>" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Kembali
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form id="frm" method="POST" action="" enctype="multipart/form-data">
                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Lembaga Negara</label>
                        </div>
                        <div class="col-9">
                          <select name="lembaga_negara" id="lembaga_negara" class="form-control">
                            <option value="DPR RI">DPR RI</option>
                            <option value="DPRD">DPRD</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <input id="nama" type="text" class="form-control" name="nama">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Nomor Induk Kependudukan <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <input id="nik" type="text" class="form-control" name="nik" onkeypress="return check_int(event)">
                          <small class="text-danger">input hanya angka</small>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Nomor Urut Bakal Calon</label>
                        </div>
                        <div class="col-9">
                          <input id="no_urut" type="text" class="form-control" name="no_urut">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Email <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <input id="email" type="text" class="form-control" name="email">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Nama Partai Politik</label>
                        </div>
                        <div class="col-9">
                          <input id="nama_partai" type="text" class="form-control" name="nama_partai">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Nomor Urut Partai Politik</label>
                        </div>
                        <div class="col-9">
                          <input id="no_urut_partai" type="text" class="form-control" name="no_urut_partai">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Daerah Pemilihan</label>
                        </div>
                        <div class="col-9">
                          <input id="daerah" type="text" class="form-control" name="daerah">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                          <input id="t_lahir" type="text" class="form-control" name="t_lahir">
                        </div>
                        <div class="form-group col-6">
                          <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                          <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir">
                        </div>
                      </div>

                      <div class="form-divider">
                        Alamat Tempat Tinggal (Sesuai KTP)
                      </div>
                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select class="form-control select2" name="provinsi" id="provinsi">
                            <option value=""></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Kabupaten <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select class="form-control select2" name="kabupaten" id="kabupaten">
                            <option value=""></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select class="form-control select2" name="kecamatan" id="kecamatan">
                            <option value=""></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Kelurahan / Desa <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select class="form-control select2" name="kelurahan" id="kelurahan">
                            <option value=""></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select class="form-control" name="jns_kelamin" id="jns_kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Agama <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select class="form-control" name="agama" id="agama" >
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Penghayat Kepercayaan">Penghayat Kepercayaan</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Alamat <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <textarea class="form-control" name="alamat" id="alamat" style="height:120px"></textarea>
                        </div>
                      </div>

                      <div class="form-divider">
                        Status Perkawinan
                      </div>
                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Nama Istri</label>
                        </div>
                        <div class="col-9">
                          <input type="text" name="nama_istri" id="nama_istri" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Jumlah Anak</label>
                        </div>
                        <div class="col-9">
                          <input type="text" name="j_anak" id="j_anak" class="form-control" onkeypress="return check_int(event)">
                          <small class="text-danger">input hanya angka</small>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select class="form-control" name="pendidikan" id="pendidikan" >
                            <option value="SD Sederajat">SD Sederajat</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <select name="pekerjaan" id="pekerjaan" class="form-control">
                            <option value="TNI/POLRI">TNI/POLRI</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Pensiunan TNI/POLRI">Pensiunan TNI/POLRI</option>
                            <option value="Karyawan BUMN">Karyawan BUMN</option>
                            <option value="Lain-lain">Lain-lain</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Status Khusus</label>
                        </div>
                        <div class="col-9">
                          <input type="text" name="status" id="status" class="form-control">
                        </div>
                      </div>

                      <div class="form-divider">
                        Riwayat Pendidikan
                      </div>
                      <div class="row mt-2">
                        <div class="col-3">
                          <label class="form-label">Jenjang Pendidikan</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Nama Institusi</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Tahun Masuk</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Tahun Keluar</label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="jenjang[]" id="jenjang1" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="nama_institusi[]" id="nama_institusi1" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="jenjang[]" id="jenjang2" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="nama_institusi[]" id="nama_institusi2" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="jenjang[]" id="jenjang3" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="nama_institusi[]" id="nama_institusi3" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="jenjang[]" id="jenjang4" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="nama_institusi[]" id="nama_institusi4" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="jenjang[]" id="jenjang5" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="nama_institusi[]" id="nama_institusi5" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="form-divider mt-4">
                        Kursus / Diklat yang pernah diikuti
                      </div>
                      <div class="row mt-2">
                        <div class="col">
                          <label class="form-label">Nama Kursus/Diklat</label>
                        </div>
                        <div class="col">
                          <label class="form-label">Lembaga Penyelenggara</label>
                        </div>
                        <div class="col">
                          <label class="form-label">No. Sertifikat</label>
                        </div>
                        <div class="col">
                          <label class="form-label">Tahun Masuk</label>
                        </div>
                        <div class="col">
                          <label class="form-label">Tahun Keluar</label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col">
                          <input type="text" name="nama_kursus[]" id="nama_kursus1" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="lembaga[]" id="lembaga1" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="no_sertifikat[]" id="no_sertifikat1" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col">
                          <input type="text" name="nama_kursus[]" id="nama_kursus2" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="lembaga[]" id="lembaga2" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="no_sertifikat[]" id="no_sertifikat2" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col">
                          <input type="text" name="nama_kursus[]" id="nama_kursus3" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="lembaga[]" id="lembaga3" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="no_sertifikat[]" id="no_sertifikat3" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col">
                          <input type="text" name="nama_kursus[]" id="nama_kursus4" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="lembaga[]" id="lembaga4" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="no_sertifikat[]" id="no_sertifikat4" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col">
                          <input type="text" name="nama_kursus[]" id="nama_kursus5" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="lembaga[]" id="lembaga5" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="no_sertifikat[]" id="no_sertifikat5" class="form-control">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col">
                          <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="form-divider mt-4">
                        Riwayat Organisasi
                      </div>
                      <div class="row mt-2">
                        <div class="col-3">
                          <label class="form-label">Nama Organisasi</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Jabatan</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Tahun Masuk</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Tahun Keluar</label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_organisasi[]" id="nama_organisasi1" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan[]" id="jabatan1" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_organisasi[]" id="nama_organisasi2" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan[]" id="jabatan2" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_organisasi[]" id="nama_organisasi3" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan[]" id="jabatan3" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_organisasi[]" id="nama_organisasi4" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan[]" id="jabatan4" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_organisasi[]" id="nama_organisasi5" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan[]" id="jabatan5" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="form-divider mt-4">
                        Riwayat Pekerjaan
                      </div>
                      <div class="row mt-2">
                        <div class="col-3">
                          <label class="form-label">Nama Perusahaan/Lembaga</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Jabatan</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Tahun Masuk</label>
                        </div>
                        <div class="col-3">
                          <label class="form-label">Tahun Keluar</label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_kantor[]" id="nama_kantor1" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan1" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_kantor[]" id="nama_kantor2" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan2" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_kantor[]" id="nama_kantor3" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan3" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_kantor[]" id="nama_kantor4" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan4" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-3">
                          <input type="text" name="nama_kantor[]" id="nama_kantor5" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan5" class="form-control">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                        <div class="col-3">
                          <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="form-divider mt-4">
                        Tanda Penghargaan
                      </div>
                      <div class="row mt-2">
                        <div class="col-4">
                          <label class="form-label">Nama Penghargaan</label>
                        </div>
                        <div class="col-4">
                          <label class="form-label">Lembaga Pemberi Penghargaan</label>
                        </div>
                        <div class="col-4">
                          <label class="form-label">Tahun Pemberian</label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-4">
                          <input type="text" name="nama_penghargaan[]" id="nama_penghargaan1" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi1" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="thn_pemberian[]" id="thn_pemberian1" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-4">
                          <input type="text" name="nama_penghargaan[]" id="nama_penghargaan2" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi2" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="thn_pemberian[]" id="thn_pemberian2" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-4">
                          <input type="text" name="nama_penghargaan[]" id="nama_penghargaan3" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi3" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="thn_pemberian[]" id="thn_pemberian3" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-4">
                          <input type="text" name="nama_penghargaan[]" id="nama_penghargaan4" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi4" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="thn_pemberian[]" id="thn_pemberian4" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-4">
                          <input type="text" name="nama_penghargaan[]" id="nama_penghargaan5" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi5" class="form-control">
                        </div>
                        <div class="col-4">
                          <input type="text" name="thn_pemberian[]" id="thn_pemberian5" class="form-control" onkeypress="return check_int(event)" maxlength="4">
                        </div>
                      </div>

                      <div class="form-group row mt-4">
                        <div class="col-3">
                          <label class="form-label">Motivasi Pencalonan <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <input type="text" name="motivasi" id="motivasi" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Target Sasaran <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-9">
                          <input type="text" name="target" id="target" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-3">
                          <label class="form-label">Foto</label>
                        </div>
                        <div class="col-9">
                          <img id="picturebox" class="img-thumbnail img-fluid" src="<?php echo base_url('assets/template/assets/img/avatar/avatar-5.png')?>" width="100" height="100" alt="Image Description">
                            <input type="file" name="userfile" id="userfile">
                            <span class="text-danger">(*Only JPG, JPEG, PNG allowed)</span>
                          <input type="hidden" name="picturepath" id="picturepath" value="<?php echo base_url('assets/template/assets/img/avatar/avatar-5.png')?>">
                          <input type="hidden" name="picturename" id="picturename">
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="savefrm">
                          Simpan
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <?php 
          $this->load->view('template/footer');
        ?>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url('assets/template/assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/template/node_modules/datatables/media/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/select2/dist/js/select2.full.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/template/assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/page/modules-datatables.js')?>"></script>
  <script src="<?php echo base_url('assets/validate/jquery.validate.min.js')?>"></script>
</body>
</html>

<script type="text/javascript">
  function check_int(evt)
  {
    var charCode = ( evt.which ) ? evt.which : event.keyCode;
    return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    //|| artinya atau
  }

  $(document).ready(function()
  {
    //menampilkan data
    loaddata();

    $('.select2').select2();

    $.ajax({
      type: 'POST',
      url: "<?=base_url('Caleg/get_provinsi')?>",
      cache: false, 
      success: function(msg)
      {
        $("#provinsi").html(msg);
      }
    });

    $("#provinsi").change(function(){
      // if (id == 0) {
        var provinsi = $("#provinsi").val();
        $.ajax({
          type: 'POST',
          url: "<?=base_url('Caleg/get_kabupaten')?>",
          data: {provinsi: provinsi},
          cache: false,
          success: function(msg)
          {
            $("#kabupaten").html(msg);
          }
        });
      // } 
    });


    $("#kabupaten").change(function(){
      // if (id == 0) {
        var kabupaten = $("#kabupaten").val();
        $.ajax({
          type: 'POST',
          url: "<?=base_url('Caleg/get_kecamatan')?>",
          data: {kabupaten: kabupaten},
          cache: false,
          success: function(msg)
          {
            $("#kecamatan").html(msg);
          }
        });
      // }
    });

    $("#kecamatan").change(function(){
      // if (id == 0) {
        var kecamatan = $("#kecamatan").val();
        $.ajax({
          type: 'POST',
          url: "<?=base_url('Caleg/get_kelurahan')?>",
          data: {kecamatan: kecamatan},
          cache: false,
          success: function(msg)
          {
            $("#kelurahan").html(msg);
          }
        });
      // }
    });

    function  loaddata()
    {
      var rowID = '<?php echo $id?>';

      if (rowID > 0)
      {
        $.getJSON("<?php echo base_url('Caleg/getByID')?>" + "/" + rowID,
          function(data)
        {
          console.log(data);
          // $('#kode_wilayah').val(data.header[0].kode_wilayah).trigger('change');
          $('#lembaga_negara').val(data.header[0].lembaga_negara).trigger('change');
          $('#nama').val(data.header[0].nama);
          $('#nik').val(data.header[0].nik);
          $('#no_urut').val(data.header[0].no_urut);
          $('#email').val(data.header[0].email);
          $('#nama_partai').val(data.header[0].nama_partai);
          $('#no_urut_partai').val(data.header[0].no_urut_partai);
          $('#daerah').val(data.header[0].daerah);
          $('#t_lahir').val(data.header[0].t_lahir);
          $('#tgl_lahir').val(data.header[0].tgl_lahir);
          zoomprovinsi(data.header[0].provinsi);
          zoomkabupaten(data.header[0].kabupaten);
          zoomkecamatan(data.header[0].kecamatan);
          zoomkelurahan(data.header[0].kelurahan);
          $('#jns_kelamin').val(data.header[0].jns_kelamin);
          $('#agama').val(data.header[0].agama).trigger('change');
          $('#alamat').val(data.header[0].alamat);
          $('#nama_istri').val(data.header[0].nama_istri);
          $('#j_anak').val(data.header[0].j_anak);
          $('#pendidikan').val(data.header[0].pendidikan).trigger('change');
          $('#pekerjaan').val(data.header[0].pekerjaan).trigger('change');
          $('#status').val(data.header[0].status);
          
          // Riwayat Pendidikan
          $('#jenjang1').val(data.detail[0].jenjang);
          $('#jenjang2').val(data.detail[1].jenjang);
          $('#jenjang3').val(data.detail[2].jenjang);
          $('#jenjang4').val(data.detail[3].jenjang);
          $('#jenjang5').val(data.detail[4].jenjang);

          $('#nama_institusi1').val(data.detail[0].nama_institusi);
          $('#nama_institusi2').val(data.detail[1].nama_institusi);
          $('#nama_institusi3').val(data.detail[2].nama_institusi);
          $('#nama_institusi4').val(data.detail[3].nama_institusi);
          $('#nama_institusi5').val(data.detail[4].nama_institusi);

          $('#thn_masuk_pend1').val(data.detail[0].thn_masuk_pend);
          $('#thn_masuk_pend2').val(data.detail[1].thn_masuk_pend);
          $('#thn_masuk_pend3').val(data.detail[2].thn_masuk_pend);
          $('#thn_masuk_pend4').val(data.detail[3].thn_masuk_pend);
          $('#thn_masuk_pend5').val(data.detail[4].thn_masuk_pend);

          $('#thn_keluar_pend1').val(data.detail[0].thn_keluar_pend);
          $('#thn_keluar_pend2').val(data.detail[1].thn_keluar_pend);
          $('#thn_keluar_pend3').val(data.detail[2].thn_keluar_pend);
          $('#thn_keluar_pend4').val(data.detail[3].thn_keluar_pend);
          $('#thn_keluar_pend5').val(data.detail[4].thn_keluar_pend);

          // Kursus/Diklat
          $('#nama_kursus1').val(data.detail[0].nama_kursus);
          $('#nama_kursus2').val(data.detail[1].nama_kursus);
          $('#nama_kursus3').val(data.detail[2].nama_kursus);
          $('#nama_kursus4').val(data.detail[3].nama_kursus);
          $('#nama_kursus5').val(data.detail[4].nama_kursus);

          $('#lembaga1').val(data.detail[0].lembaga);
          $('#lembaga2').val(data.detail[1].lembaga);
          $('#lembaga3').val(data.detail[2].lembaga);
          $('#lembaga4').val(data.detail[3].lembaga);
          $('#lembaga5').val(data.detail[4].lembaga);

          $('#no_sertifikat1').val(data.detail[0].no_sertifikat);
          $('#no_sertifikat2').val(data.detail[1].no_sertifikat);
          $('#no_sertifikat3').val(data.detail[2].no_sertifikat);
          $('#no_sertifikat4').val(data.detail[3].no_sertifikat);
          $('#no_sertifikat5').val(data.detail[4].no_sertifikat);

          $('#thn_masuk_kursus1').val(data.detail[0].thn_masuk_kursus);
          $('#thn_masuk_kursus2').val(data.detail[1].thn_masuk_kursus);
          $('#thn_masuk_kursus3').val(data.detail[2].thn_masuk_kursus);
          $('#thn_masuk_kursus4').val(data.detail[3].thn_masuk_kursus);
          $('#thn_masuk_kursus5').val(data.detail[4].thn_masuk_kursus);

          $('#thn_keluar_kursus1').val(data.detail[0].thn_keluar_kursus);
          $('#thn_keluar_kursus2').val(data.detail[1].thn_keluar_kursus);
          $('#thn_keluar_kursus3').val(data.detail[2].thn_keluar_kursus);
          $('#thn_keluar_kursus4').val(data.detail[3].thn_keluar_kursus);
          $('#thn_keluar_kursus5').val(data.detail[4].thn_keluar_kursus);

          // Riwayat Organisasi
          $('#nama_organisasi1').val(data.detail[0].nama_organisasi);
          $('#nama_organisasi2').val(data.detail[1].nama_organisasi);
          $('#nama_organisasi3').val(data.detail[2].nama_organisasi);
          $('#nama_organisasi4').val(data.detail[3].nama_organisasi);
          $('#nama_organisasi5').val(data.detail[4].nama_organisasi);

          $('#jabatan1').val(data.detail[0].jabatan);
          $('#jabatan2').val(data.detail[1].jabatan);
          $('#jabatan3').val(data.detail[2].jabatan);
          $('#jabatan4').val(data.detail[3].jabatan);
          $('#jabatan5').val(data.detail[4].jabatan);

          $('#thn_masuk_organisasi1').val(data.detail[0].thn_masuk_organisasi);
          $('#thn_masuk_organisasi2').val(data.detail[1].thn_masuk_organisasi);
          $('#thn_masuk_organisasi3').val(data.detail[2].thn_masuk_organisasi);
          $('#thn_masuk_organisasi4').val(data.detail[3].thn_masuk_organisasi);
          $('#thn_masuk_organisasi5').val(data.detail[4].thn_masuk_organisasi);

          $('#thn_keluar_organisasi1').val(data.detail[0].thn_keluar_organisasi);
          $('#thn_keluar_organisasi2').val(data.detail[1].thn_keluar_organisasi);
          $('#thn_keluar_organisasi3').val(data.detail[2].thn_keluar_organisasi);
          $('#thn_keluar_organisasi4').val(data.detail[3].thn_keluar_organisasi);
          $('#thn_keluar_organisasi5').val(data.detail[4].thn_keluar_organisasi);

          // Riwayat Pekerjaan
          $('#nama_kantor1').val(data.detail[0].nama_kantor);
          $('#nama_kantor2').val(data.detail[1].nama_kantor);
          $('#nama_kantor3').val(data.detail[2].nama_kantor);
          $('#nama_kantor4').val(data.detail[3].nama_kantor);
          $('#nama_kantor5').val(data.detail[4].nama_kantor);

          $('#jabatan_pekerjaan1').val(data.detail[0].jabatan_pekerjaan);
          $('#jabatan_pekerjaan2').val(data.detail[1].jabatan_pekerjaan);
          $('#jabatan_pekerjaan3').val(data.detail[2].jabatan_pekerjaan);
          $('#jabatan_pekerjaan4').val(data.detail[3].jabatan_pekerjaan);
          $('#jabatan_pekerjaan5').val(data.detail[4].jabatan_pekerjaan);

          $('#thn_masuk_kerja1').val(data.detail[0].thn_masuk_kerja);
          $('#thn_masuk_kerja2').val(data.detail[1].thn_masuk_kerja);
          $('#thn_masuk_kerja3').val(data.detail[2].thn_masuk_kerja);
          $('#thn_masuk_kerja4').val(data.detail[3].thn_masuk_kerja);
          $('#thn_masuk_kerja5').val(data.detail[4].thn_masuk_kerja);

          $('#thn_keluar_kerja1').val(data.detail[0].thn_keluar_kerja);
          $('#thn_keluar_kerja2').val(data.detail[1].thn_keluar_kerja);
          $('#thn_keluar_kerja3').val(data.detail[2].thn_keluar_kerja);
          $('#thn_keluar_kerja4').val(data.detail[3].thn_keluar_kerja);
          $('#thn_keluar_kerja5').val(data.detail[4].thn_keluar_kerja);

          // Tanda Penghargaan
          $('#nama_penghargaan1').val(data.detail[0].nama_penghargaan);
          $('#nama_penghargaan2').val(data.detail[1].nama_penghargaan);
          $('#nama_penghargaan3').val(data.detail[2].nama_penghargaan);
          $('#nama_penghargaan4').val(data.detail[3].nama_penghargaan);
          $('#nama_penghargaan5').val(data.detail[4].nama_penghargaan);

          $('#lembaga_pemberi1').val(data.detail[0].lembaga_pemberi);
          $('#lembaga_pemberi2').val(data.detail[1].lembaga_pemberi);
          $('#lembaga_pemberi3').val(data.detail[2].lembaga_pemberi);
          $('#lembaga_pemberi4').val(data.detail[3].lembaga_pemberi);
          $('#lembaga_pemberi5').val(data.detail[4].lembaga_pemberi);

          $('#thn_pemberian1').val(data.detail[0].thn_pemberian);
          $('#thn_pemberian2').val(data.detail[1].thn_pemberian);
          $('#thn_pemberian3').val(data.detail[2].thn_pemberian);
          $('#thn_pemberian4').val(data.detail[3].thn_pemberian);
          $('#thn_pemberian5').val(data.detail[4].thn_pemberian);
          
          $('#motivasi').val(data.header[0].motivasi);
          $('#target').val(data.header[0].target);

          if(data.header[0].foto!="")
          {
            $('#picturebox').attr("src", data.header[0].foto);
            $('#picturepath').val(data.header[0].foto);
          }
        });
      }
    }

    function zoomprovinsi(id){
      var site_url = '<?= base_url("Caleg/zoom_provinsi")?>';
      $.post(site_url,
        {id:id},
        function(data,status) {
          $("#provinsi").empty();
          $("#provinsi").append(data);
          $("#provinsi").trigger('change');
        }
      );
    }

    function zoomkabupaten(id){
      var site_url = '<?= base_url("Caleg/zoom_kabupaten")?>';
      $.post(site_url,
        {id:id},
        function(data,status) {
          $("#kabupaten").empty();
          $("#kabupaten").append(data);
          $("#kabupaten").trigger('change');
        }
      );
    }

    function zoomkecamatan(id){
      var site_url = '<?= base_url("Caleg/zoom_kecamatan")?>';
      $.post(site_url,
        {id:id},
        function(data,status) {
          $("#kecamatan").empty();
          $("#kecamatan").append(data);
          $("#kecamatan").trigger('change');
        }
      );
    }

    function zoomkelurahan(id){
      var site_url = '<?= base_url("Caleg/zoom_kelurahan")?>';
      $.post(site_url,
        {id:id},
        function(data,status) {
          $("#kelurahan").empty();
          $("#kelurahan").append(data);
          $("#kelurahan").trigger('change');
        }
      );
    }

    $("#userfile").on('change', function ()
    {
      if ($('#nama').val() == "")
      {
        Swal.fire("Information", "Nama Tidak Boleh Kosong", "warning");
      }
      else {
        $.ajax({
          url : "<?php echo base_url('Caleg/savepic')?>",
          type:"POST",
          data: function () {
            var data = new FormData();
            data.append("userfile", $("#userfile").get(0).files[0]);
            data.append("nama", $('#nama').val());
            return data;
        }(),
          processData: false,
          contentType: false,
          dataType:"json",
          success:function(data, status){
              if(data.status == "OK"){
          Swal.fire({
            title: "Information",
            text: data.pesan,
            icon: "success",
            confirmButtonText: "OK"
          });
          $('#picturebox').attr('src', data.url);
          $('#picturepath').val(data.url)
          $('#picturename').val(data.picname)
            } else {
              Swal.fire({
                title: "Error",
                text: data.pesan,
                icon: "error",
                confirmButtonText: "OK"
              });
            }
          },
            error: function(jqXHR, textStatus, errorThrown){
            Swal.fire(textStatus+' Save : '+errorThrown);
          }
        });
      }
    });

    $("#frm").validate({
      rules: {
        kode_wilayah:{
          required:true
        },
        nama:{
          required:true
        },
        nik:{
          required:true,
          number:true
        },
        email:{
          required:true
        },
        t_lahir:{
          required:true
        },
        tgl_lahir:{
          required:true
        },
        provinsi:{
          required:true
        },
        kabupaten:{
          required:true
        },
        kecamatan:{
          required:true
        },
        kelurahan:{
          required:true
        },
        jns_kelamin:{
          required:true
        },
        agama:{
          required:true
        },
        alamat:{
          required:true
        },
        pendidikan:{
          required:true
        },
        pekerjaan:{
          required:true
        },
        motivasi:{
          required:true
        },
        target:{
          required:true
        },
      },
      messages: {
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
          $(element).addClass(errorClass); //.removeClass(errorClass);
          $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass(errorClass); //.addClass(validClass);
          $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        errorPlacement: function (error, element) {
          if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
          } else if (element.hasClass('select2')){
            error.insertAfter(element.next('span'));
          } else {
            error.insertAfter(element);
          }
        }
      }
    });

    //simpan&edit data
    $('#savefrm').click(function(event)
    {
      event.preventDefault();
      if (event.handled !== true) {
        event.handled = true;
        if ($('#frm').valid())
        {
          var id = '<?php echo $id?>';
          var action = '<?php echo $form?>';
          var datafrm = $('#frm').serializeArray();
            datafrm.push(
              {name: "id", value: id},
              {name: "action", value: action}
            );
          console.log(datafrm);

          $.ajax({
            url : "<?php echo base_url('Caleg/save')?>",
            type:"POST",
            data: datafrm,
            dataType:"json",
            success:function(event, data)
            {
              if (event.Error == false)
              {
                Swal.fire({
                  title: "Information",
                  animation: true,
                  icon:"success",
                  text: event.Pesan,
                  confirmButtonText: "OK"
                }).then(function(){
                    window.location.href = "<?php echo base_url('Caleg')?>";
                  });
              } else {
                Swal.fire({
                  title: "Information",
                  animation: true,
                  icon:"error",
                  text: event.Pesan,
                  confirmButtonText: "OK"
                });
              }
            },error: function(jqXHR, textStatus, errorThrown){
              Swal.fire({
                title: "Error",
                animation: true,
                icon:"error",
                text: textStatus+' Save : '+errorThrown,
                confirmButtonText: "OK",
              });
              //block(false);
            }
          });
        } else {
          //block(false);
        }
      }
    });
  });
</script>