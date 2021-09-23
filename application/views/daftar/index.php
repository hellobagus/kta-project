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
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="d-inline">Pendaftaran Calon Legislatif</h4>
                <div class="card-header-action">
                  <a href="<?php echo base_url('Login')?>" class="btn btn-primary">
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
                      <label class="form-label">Email <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-9">
                      <input id="email" type="text" class="form-control" name="email">
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
                      <label class="form-label">Nomor Whatsapp <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-9">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <span>+62</span>
                          </div>
                        </div>
                        <input id="no_wa" type="text" class="form-control" name="no_wa" maxlength="20" onkeypress="return check_int(event)">
                      </div>
                      <small class="text-danger">input hanya angka</small>
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
  function check_int(evt)
  {
    var charCode = ( evt.which ) ? evt.which : event.keyCode;
    return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    //|| artinya atau
  }

  $(document).ready(function()
  {
    $("#frm").validate({
      rules: {
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
        jns_kelamin:{
          required:true
        },
        no_wa:{
          required:true,
          number:true
        }
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
                  title: "Informasi",
                  animation: true,
                  icon:"success",
                  text: event.Pesan,
                  confirmButtonText: "OK"
                }).then(function(){
                    window.location.href = "<?php echo base_url('Login')?>";
                  });
              } else {
                Swal.fire({
                  title: "Informasi",
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