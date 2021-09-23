<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Calon Legislatif</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.css')?>">

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
            <h1>Data Pribadi</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <center>
                      <img id="picturebox" class="img-thumbnail img-fluid" src="" width="250" height="250" alt="Image Description">
                    </center>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="d-inline">Identitas Diri</h4>
                    <div class="card-header-action">
                      <a href="<?php echo base_url('DataDiri/edit')?>" class="btn btn-primary">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-3">
                        <span>Nama</span>
                      </div>
                      <div class="col-9">
                        <span><?php echo $this->session->nama?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-3">
                        <span>Email</span>
                      </div>
                      <div class="col-9">
                        <span id="email"><?php echo $this->session->email?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-3">
                        <span>Tempat Lahir</span>
                      </div>
                      <div class="col-9">
                        <span id="t_lahir"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-3">
                        <span>Tanggal Lahir</span>
                      </div>
                      <div class="col-9">
                        <span id="tgl_lahir"></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-3">
                        <span>Jenis Kelamin</span>
                      </div>
                      <div class="col-9">
                        <span id="jns_kelamin"></span>
                      </div>
                    </div>
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

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/template/assets/js/custom.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/page/modules-datatables.js')?>"></script>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function()
  {
    //menampilkan data
    loaddata();

    function loaddata()
    {
      $.getJSON("<?php echo base_url('DataDiri/getNama')?>",
        function(data)
      {
        console.log(data);
        document.getElementById('t_lahir').innerHTML = data.header[0].t_lahir;

        $tgl_lahir = data.header[0].tgl_lahir;
        var year = $tgl_lahir.substr(0,4);
        var month = $tgl_lahir.substr(5,2);
        var day = $tgl_lahir.substr(8,2);
        $format = day+"/"+month+"/"+year;
        document.getElementById('tgl_lahir').innerHTML = $format;

        document.getElementById('jns_kelamin').innerHTML = data.header[0].jns_kelamin;

        if(data.header[0].foto!="")
        {
          $('#picturebox').attr("src", data.header[0].foto);
        }
        else{
          $('#picturebox').attr("src", 'https://i0.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?resize=256%2C256&quality=100&ssl=1');
        }
      });
    }
  });
</script>
