<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pendaftaran Caleg</title>

  <link rel="shortcut icon" href="<?php echo base_url('assets/template/assets/img/logo.jpeg')?>">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/selectric/public/selectric.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/select2/dist/css/select2.min.css')?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/components.css')?>">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <a href="<?php echo base_url('Login')?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Pendaftaran Calon Legislatif</h4>
              </div>

              <div class="card-body">
                <form id="frm" method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group row">
                    <div class="col-3">
                      <label class="form-label">Cabang Input <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-9">
                      <select name="kode_wilayah" id="kode_wilayah" class="form-control">
                        <option value="0901">Jakarta Pusat</option>
                        <option value="0902">Jakarta Selatan</option>
                        <option value="0903">Jakarta Timur</option>
                        <option value="0904">Jakarta Barat</option>
                        <option value="0905">Jakarta Utara</option>
                        <option value="0906">Kepulauan Seribu</option>
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
                      <input id="nik" type="text" class="form-control" name="nik">
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
                      <input type="text" name="j_anak" id="j_anak" class="form-control">
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
                      <input type="text" name="jenjang[]" id="jenjang" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="nama_institusi[]" id="nama_institusi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="jenjang[]" id="jenjang" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="nama_institusi[]" id="nama_institusi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="jenjang[]" id="jenjang" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="nama_institusi[]" id="nama_institusi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="jenjang[]" id="jenjang" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="nama_institusi[]" id="nama_institusi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="jenjang[]" id="jenjang" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="nama_institusi[]" id="nama_institusi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_pend[]" id="thn_masuk_pend" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_pend[]" id="thn_keluar_pend" class="form-control">
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
                      <input type="text" name="nama_kursus[]" id="nama_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="lembaga[]" id="lembaga" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="no_sertifikat[]" id="no_sertifikat" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col">
                      <input type="text" name="nama_kursus[]" id="nama_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="lembaga[]" id="lembaga" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="no_sertifikat[]" id="no_sertifikat" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col">
                      <input type="text" name="nama_kursus[]" id="nama_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="lembaga[]" id="lembaga" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="no_sertifikat[]" id="no_sertifikat" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col">
                      <input type="text" name="nama_kursus[]" id="nama_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="lembaga[]" id="lembaga" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="no_sertifikat[]" id="no_sertifikat" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col">
                      <input type="text" name="nama_kursus[]" id="nama_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="lembaga[]" id="lembaga" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="no_sertifikat[]" id="no_sertifikat" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_masuk_kursus[]" id="thn_masuk_kursus" class="form-control">
                    </div>
                    <div class="col">
                      <input type="text" name="thn_keluar_kursus[]" id="thn_keluar_kursus" class="form-control">
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
                      <input type="text" name="nama_organisasi[]" id="nama_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan[]" id="jabatan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_organisasi[]" id="nama_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan[]" id="jabatan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_organisasi[]" id="nama_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan[]" id="jabatan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_organisasi[]" id="nama_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan[]" id="jabatan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_organisasi[]" id="nama_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan[]" id="jabatan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_organisasi[]" id="thn_masuk_organisasi" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_organisasi[]" id="thn_keluar_organisasi" class="form-control">
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
                      <input type="text" name="nama_kantor[]" id="nama_kantor" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_kantor[]" id="nama_kantor" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_kantor[]" id="nama_kantor" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_kantor[]" id="nama_kantor" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-3">
                      <input type="text" name="nama_kantor[]" id="nama_kantor" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="jabatan_pekerjaan[]" id="jabatan_pekerjaan" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_masuk_kerja[]" id="thn_masuk_kerja" class="form-control">
                    </div>
                    <div class="col-3">
                      <input type="text" name="thn_keluar_kerja[]" id="thn_keluar_kerja" class="form-control">
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
                      <input type="text" name="nama_penghargaan[]" id="nama_penghargaan" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="thn_pemberian[]" id="thn_pemberian" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-4">
                      <input type="text" name="nama_penghargaan[]" id="nama_penghargaan" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="thn_pemberian[]" id="thn_pemberian" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-4">
                      <input type="text" name="nama_penghargaan[]" id="nama_penghargaan" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="thn_pemberian[]" id="thn_pemberian" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-4">
                      <input type="text" name="nama_penghargaan[]" id="nama_penghargaan" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="thn_pemberian[]" id="thn_pemberian" class="form-control">
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-4">
                      <input type="text" name="nama_penghargaan[]" id="nama_penghargaan" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="lembaga_pemberi[]" id="lembaga_pemberi" class="form-control">
                    </div>
                    <div class="col-4">
                      <input type="text" name="thn_pemberian[]" id="thn_pemberian" class="form-control">
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
                      Daftar
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url('assets/template/assets/js/stisla.js')?>"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/selectric/public/jquery.selectric.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/select2/dist/js/select2.full.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/template/assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/page/auth-register.js')?>"></script>
  <script src="<?php echo base_url('assets/validate/jquery.validate.min.js')?>"></script>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function()
  {
    $('.select2').select2();

    $.ajax({
      type: 'POST',
      url: "<?=base_url('Daftar/get_provinsi')?>",
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
          url: "<?=base_url('Daftar/get_kabupaten')?>",
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
          url: "<?=base_url('Daftar/get_kecamatan')?>",
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
          url: "<?=base_url('Daftar/get_kelurahan')?>",
          data: {kecamatan: kecamatan},
          cache: false,
          success: function(msg)
          {
            $("#kelurahan").html(msg);
          }
        });
      // }
    });

    $("#userfile").on('change', function ()
    {
      if ($('#nama').val() == "")
      {
        Swal.fire("Information", "Nama Tidak Boleh Kosong", "warning");
      }
      else {
        $.ajax({
          url : "<?php echo base_url('Daftar/savepic')?>",
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
          required:true
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
          var datafrm = $('#frm').serializeArray();
          console.log(datafrm);

          $.ajax({
            url : "<?php echo base_url('Daftar/save')?>",
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
                    window.location.href = "<?php echo base_url('Login')?>";
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