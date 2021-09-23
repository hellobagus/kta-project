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
            <h1>List Calon Legislatif</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="tblcaleg">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th style="text-align: center;">Foto</th>
                            <th>Nama Lengkap</th>
                            <th>No. Urut</th>
                            <th>Wilayah</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
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
  var tblcaleg;
  var tblcaleg = $('#tblcaleg').DataTable({
    processing: true,
    //serverSide: true,
    "ajax": {
      "url": "<?php echo base_url('Caleg/getTable')?>",
      "dataSrc": ""
    },
    columns: [
      {data: "rowID",
        render: function(data, type, row, meta)
        {
          return meta.row + meta.settings._iDisplayStart + 1 + '.';
        }
      },
      {data: "foto", className: "text-center",
        render: function (data, type, row) {
          return '<img src="'+data+'" width=100px>';
        }
      },
      {data: "nama"},
      {data: "no_urut"},
      {data: "kode_wilayah",
        render: function (data, type, row) {
          if (data == "0901")
          {
            return 'Jakarta Pusat';
          }
          else if (data == "0902")
          {
           return 'Jakarta Selatan'; 
          }
          else if (data == "0903")
          {
            return 'Jakarta Timur';
          }
          else if (data == "0904")
          {
            return 'Jakarta Barat';
          }
          else if (data == "0905")
          {
            return 'Jakarta Utara';
          }
          else {
            return 'Kepulauan Seribu';
          }
        }
      },
      {data: "nik"},
      {data: "email"},
      {data: "t_lahir"},
      {data: "tgl_lahir",
        render: function(data, type, row)
        {
          var year = data.substr(0,4);
          var month = data.substr(5,2);
          var day = data.substr(8,2);
          return day+"/"+month+"/"+year;
        }
      },
      {data: "alamat"},
      {data: "jns_kelamin"},
      {data: "status_caleg",
        render: function(data, type, row)
        {
          if (data == 'Verified') {
            return '<span class="badge badge-success">'+data+'</span>';
          } else if (data == 'Rejected'){
            return '<span class="badge badge-danger">'+data+'</span>';
          } else {
            return '<span class="badge badge-primary">'+data+'</span>';
          }
        }
      },
    ],
    language: {
      "decimal": ",",
      "thousand": ".",
    },
    dom: '<"toolbar user">frtip',
  });

  var wa = "https://web.whatsapp.com/send?phone=6285710008512";

  $("div.user").html(
    '<button type="button" id="add" class="btn btn-primary">Tambah</button>&nbsp;'+
    '<button type="button" id="edit" class="btn btn-info">Edit</button>&nbsp;'+
    '<button type="button" id="verify" value="Verified" class="btn btn-success">Verify</button>&nbsp;'+
    '<button type="button" id="reject" value="Rejected" class="btn btn-danger">Reject</button>'
  );

  tblcaleg.on('click', 'tr', function()
  {
    if ($(this).hasClass('selected'))
    {
      $(this).removeClass('selected');
    } else {
      tblcaleg.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
    }
  });

  $('#add').click(function()
  {
    window.location.href="<?php echo base_url('Caleg/add')?>"+'/0/A';
  });

  $('#edit').click(function(){
    var rows = tblcaleg.rows('.selected').indexes();
    if (rows.length < 1)
    {
      Swal.fire({
        title : 'Informasi',
        text : 'Silahkan pilih data terlebih dahulu',
        icon : 'warning'
      });
      return;
    }
    var data = tblcaleg.rows(rows).data();
    var id = data[0].rowID;

    if(data[0].status_caleg == 'Rejected'){
      Swal.fire({
        title : 'Informasi',
        text : 'Data caleg sudah ditolak!',
        icon : 'warning'
      });
      return;
    }

    window.location.href="<?php echo base_url('Caleg/add')?>"+'/'+id+'/E';
  });

  $('#verify').click(function(){
    var rows = tblcaleg.rows('.selected').indexes();
    if (rows.length < 1)
    {
      Swal.fire({
        title : 'Informasi',
        text : 'Silahkan pilih data terlebih dahulu',
        icon : 'warning'
      });
      return;
    }
    var data = tblcaleg.rows(rows).data();
    var id = data[0].rowID;
    status = $(this).val();

    if(data[0].status_caleg == 'Verified' || data[0].status_caleg == 'Rejected'){
      Swal.fire({
        title : 'Informasi',
        text : 'Data ini sudah pernah dicek. Silahkan pilih data yang lain!',
        icon : 'warning'
      });
      return;
    }
    else {
      Swal.fire({
        title : 'Anda yakin?',
        text : 'Anda tidak akan dapat mengembalikannya',
        icon : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, ubah!',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
      }).then(function(a){
        if (a.value==true)
        {
          change(id, status);
        } else {

        }
      })
    }
  });

  $('#reject').click(function(){
    var rows = tblcaleg.rows('.selected').indexes();
    if (rows.length < 1)
    {
      Swal.fire({
        title : 'Informasi',
        text : 'Silahkan pilih data terlebih dahulu',
        icon : 'warning'
      });
      return;
    }
    var data = tblcaleg.rows(rows).data();
    var id = data[0].rowID;
    status = $(this).val();

    if(data[0].status_caleg == 'Verified' || data[0].status_caleg == 'Rejected'){
      Swal.fire({
        title : 'Informasi',
        text : 'Data ini sudah pernah dicek. Silahkan pilih data yang lain!',
        icon : 'warning'
      });
      return;
    }
    else {
      Swal.fire({
        title : 'Anda yakin?',
        text : 'Anda tidak akan dapat mengembalikannya',
        icon : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, ubah!',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
      }).then(function(a){
        if (a.value==true)
        {
          change(id, status);
        } else {

        }
      })
    }
  });

  function change(id, status)
  {
    $.ajax({
      url: "<?php echo base_url('Caleg/change')?>",
      type: "POST",
      data: {
        id: id,
        status: status
      },
      dataType: "json",
      success: function(event, data)
      {
        console.log(event);
        var nama     = event.nama;
        var email    = event.email;
        var password = event.password;
        //var alamat = event.alamat;
        var hp       = event.no_wa;
        var link     = event.link;
        if (nama) {
          window.open('https://web.whatsapp.com/send?phone='+hp+'&text=Selamat, akun anda sudah *terverifikasi* dengan data berikut, %0a Nama : '+nama+', %0a Email : '+email+', %0a Password : '+password+', %0a Silahkan login kedalam web '+link+' %0a Terimakasih.', '_blank');
        }
        Swal.fire("Informasi", event.Pesan, "success");
        tblcaleg.ajax.reload(null, true);
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
        Swal.fire("Informasi", textStatus+' Simpan : '+errorThrown, "warning");
      }
    });
  }
</script>
