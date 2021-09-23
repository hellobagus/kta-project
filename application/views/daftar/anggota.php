<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pendaftaran Anggota</title>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="d-inline">Pendaftaran Calon Anggota Partai PAN</h4>
                <div class="card-header-action">
                  <a href="<?php echo base_url('Login')?>" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                  </a>
                </div>
              </div>

              <div class="card-body">
                <form action="" id="frmAnggota">
                  <div class="form-group row">                 
                    <label for="kodewilayah" class="col-3">Kode Wilayah</label>
                    <div class="col-9">
                      <select class="form-control select2" name="kodewilayah" id="kodewilayah">
                        <option value="0901">Jakarta Pusat</option>
                        <option value="0902">Jakarta Selatan</option>
                        <option value="0903">Jakarta Timur</option>
                        <option value="0904">Jakarta Barat</option>
                        <option value="0905">Jakarta Utara</option>
                        <option value="0906">Kab. Kepulauan Seribu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="namalengkap" class="col-3">Nama Lengkap</label>
                    <div class="col-9">
                      <input type="text" class="form-control" name="namalengkap" id="namalengkap" placeholder="Nama Lengkap">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tempatlahir" class="col-3">Tempat Lahir</label>
                    <div class="col-9">
                      <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tanggallahir" class="col-3">Tanggal Lahir</label>
                    <div class="col-9">
                      <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="Tanggal Lahir">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jeniskelamin" class="col-3">Jenis Kelamin</label>
                    <div class="col-9">
                      <select class="form-control select2" name="jeniskelamin" id="jeniskelamin">
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nik" class="col-3">NIK</label>
                    <div class="col-9">
                      <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-3">Email</label>
                    <div class="col-9">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                  </div>
                  <hr>
                  <b>Tempat Tinggal Saat Ini</b>
                  <br>
                  <div class="form-group row">
                    <label for="provinsi" class="col-3">Provinsi</label>
                    <div class="col-9">
                      <select class="form-control select2" name="provinsi" id="provinsi">
                        <option value=""></option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kabupaten" class="col-3">Kabupaten</label>
                    <div class="col-9">
                      <select class="form-control select2" name="kabupaten" id="kabupaten">
                        <option value=""></option>d
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kecamatan" class="col-3">Kecamatan</label>
                    <div class="col-9">
                      <select class="form-control select2" name="kecamatan" id="kecamatan">
                        <option value=""></option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kelurahan" class="col-3">Kelurahan / Desa</label>
                    <div class="col-9">
                      <select class="form-control select2" name="kelurahan" id="kelurahan">
                        <option value=""></option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="namalengkap" class="col-3">Alamat</label>
                    <div class="col-9">
                      <textarea name="alamat" id="alamat" class="form-control" rows="5" style="height:100%;"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="agama" class="col-3">Agama</label>
                    <div class="col-9">
                      <select class="form-control select2" name="agama" id="agama">
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Penghayat Kepercayaan">Penghayat Kepercayaan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="namalengkap" class="col-3">Foto</label>
                    <div class="col-9">
                      <div id="logo" class="image" >
                          <img class="img-responsive" src="<?php echo(empty('') ? base_url('assets/template/assets/img/example-image.jpg'): base_url('assets/img/'.'') );?>" width="120px" id="picturebox">
                        </div>
                        <br>
                          <input type="file" id="userfile" name="userfile" accept="image/x-png,image/gif,image/jpeg"/>
                        <p>(* Only Jpg, Png allowed)</p>
                        <input type="hidden" id="picturepath" name="picturepath" value="<?php echo ''?>" readonly="1">
                        <input type="hidden" id="picturename" name="picturename" readonly="1">
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer bg-whitesmoke">
                  <button class="btn btn-icon icon-left btn-primary btn-lg btn-block" id="btnSave">Simpan</button>
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
  <script src="<?php echo base_url('assets/template/node_modules/select2/dist/js/select2.full.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/template/assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/page/auth-register.js')?>"></script>

  <script src="<?=base_url('assets/template/assets/js/page/bootstrap-modal.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.js')?>"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script>
    $(document).ready(function(){
      var id = 0;
      $('.select2').select2();

      $.ajax({
        type: 'POST',
        url: "<?=base_url('anggota/get_provinsi')?>",
        cache: false, 
        success: function(msg){
          $("#provinsi").html(msg);
        }
      });

      $("#provinsi").change(function(){
        if (id == 0) {
        var provinsi = $("#provinsi").val();
          $.ajax({
            type: 'POST',
            url: "<?=base_url('anggota/get_kabupaten')?>",
            data: {provinsi: provinsi},
            cache: false,
            success: function(msg){
              $("#kabupaten").html(msg);
            }
          });
        } 
      });

      $("#kabupaten").change(function(){
        if (id == 0) {
        var kabupaten = $("#kabupaten").val();
          $.ajax({
            type: 'POST',
            url: "<?=base_url('anggota/get_kecamatan')?>",
            data: {kabupaten: kabupaten},
            cache: false,
            success: function(msg){
              $("#kecamatan").html(msg);
            }
          });
        }
      });

      $("#kecamatan").change(function(){
        if (id == 0) {
        var kecamatan = $("#kecamatan").val();
          $.ajax({
            type: 'POST',
            url: "<?=base_url('anggota/get_kelurahan')?>",
            data: {kecamatan: kecamatan},
            cache: false,
            success: function(msg){
              $("#kelurahan").html(msg);
            }
          });
        }
      });

      $("#userfile").change(function() {
        saveImage(this)
      });

      function saveImage(el) {
        var a = el.files[0].size;
        var max = (1024 * 1024) * 7;
        
        if (a > max){
          if (max.toString().length > 6) {
            max = max / 1024 / 1024;
            max = max.toFixed(2);
            max = max + ' mb';
          } else {
            max = max / 1024;
            max = max.toFixed(2);
            max = max + ' kb';
          }
          Swal.fire('Please upload less than ' + max);
          return false;
        }

        $.ajax({
          url : "<?php echo base_url('anggota/savePic');?>",
          type:"POST",
          data: function () {
            var data = new FormData();
            data.append("userfile", $("#userfile").get(0).files[0]);
            return data;
          }(),
          processData: false,
          contentType: false,
          dataType:"json",
          success:function(data, status){
            console.log(data);
            if(data.Status == "OK"){
              Swal.fire({
                title: "Information",
                text: data.Pesan,
                icon: "success",
                confirmButtonText: "OK"
              });
              $('#picturebox').attr('src', data.Url);
              $('#picturepath').val(data.Url)
              $('#picturename').val(data.Picname)
            } else {
                Swal.fire({
                  title: "Error",
                  text: data.Pesan,
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

      $("#frmAnggota").validate({
        ignore:"",
        rules: {
          namalengkap: {
            required: true
          },
          tempatlahir:{
            required:true
          },
          tanggallahir: {
            required: true
          },
          nik:{
            required:true
          },
          email:{
            required:true
          },
          alamat:{
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

      $('#btnSave').click(function(e){
        e.preventDefault(); // avoid to execute the actual submit of the form.
        if($('#frmAnggota').valid()){
          var id = 0;
          var datafrm = $('#frmAnggota').serializeArray();
          datafrm.push({name:"id",value:id});
          var url = "<?=base_url('anggota/save')?>";      
          $.ajax({
            type: "POST",
            url: url,
            data: datafrm,
            dataType:"json",
            success: function(event, data)
            {
              if (event.Status == 'OK') {
                Swal.fire({
                  title: "Information",
                  animation: false,
                  icon:"success",
                  text: event.Pesan,
                  confirmButtonText: "OK"
                }).then(function(){
                  window.location.href="<?= base_url('Login');?>";
                });
              } else {
                Swal.fire({
                  title: "Error",
                  animation: false,
                  icon:"error",
                  text: event.Pesan,
                  confirmButtonText: "OK"
                });
              }
            }
          });
        }
      });
  });
  </script>
</body>
</html>