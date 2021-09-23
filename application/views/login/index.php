<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <link rel="shortcut icon" href="<?php echo base_url('assets/template/assets/img/logo.jpeg')?>">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/components.css')?>">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body style="background-image: url('http://localhost/project-kta/assets/template/assets/img/background.jpg');
  background-repeat: no-repeat;
  background-size: contain;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div align="center" class="mt-4">
              <img src="<?= base_url('assets/template/assets/img/Logo.png')?>" alt="logo" width="140">
            </div>
            <div class="card card-primary">
              <!-- <div class="card-header"><h4>Login</h4></div> -->

              <div class="card-body">
                <form method="POST" action="<?php echo base_url('Login/auth')?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username" class="control-label">Username/Email</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Silahkan isi username/email anda
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <div class="input-group">
                      <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <span class="btn-show-pass">
                            <i class="far fa-eye"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="invalid-feedback">
                      Silahkan isi password anda
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

                <div class="mt-3 text-muted text-center">
                  <a href="<?php echo base_url('Daftar')?>" target="_blank">PENDAFTARAN CALON LEGISLATIF PARTAI AMANAT NASIONAL</a>
                </div>
                <div class="mt-3 text-muted text-center">
                  <a href="<?php echo base_url('Daftar/anggota')?>" target="_blank">PENDAFTARAN ANGGOTA PARTAI AMANAT NASIONAL</a>
                </div>
              </div>
            </div>
            <div class="simple-footer">
              <!-- Copyright &copy; 2021 -->
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

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/template/assets/js/custom.js')?>"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>

<script type="text/javascript">
  <?php if ($this->session->flashdata('tampil')) { ?>
    toastr.error("<?php echo $this->session->flashdata('tampil');?>");
  <?php } ?>

  <?php if ($this->session->flashdata('hak')) { ?>
    toastr.error("<?php echo $this->session->flashdata('hak');?>");
  <?php } ?>

  <?php if ($this->session->flashdata('verify')) { ?>
    toastr.error("<?php echo $this->session->flashdata('verify');?>");
  <?php } ?>

  var showPass = 0;
  $('.btn-show-pass').on('click', function(){
    if(showPass == 0) {
      // $(this).next('input').attr('type','text');
      $("#password").prop("type", "text");
      $(this).find('i').removeClass('fa-eye');
      $(this).find('i').addClass('fa-eye-slash');
      showPass = 1;
    }
    else {
      // $(this).next('input').attr('type','password');
      $("#password").prop("type", "password");
      $(this).find('i').addClass('fa-eye');
      $(this).find('i').removeClass('fa-eye-slash');
      showPass = 0;
    }
  });
</script>