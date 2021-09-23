<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>User Manager</title>

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
            <h1>User Manager</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="tbluser">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th style="text-align: center;">Avatar</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Verified</th>
                            <th>Aksi</th>
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
  var tbluser;
  var tbluser = $('#tbluser').DataTable({
    processing: true,
    //serverSide: true,
    "ajax": {
      "url": "<?php echo base_url('User/getTable')?>",
      "dataSrc": ""
    },
    columns: [
      {data: "rowID",
        render: function(data, type, row, meta)
        {
          return meta.row + meta.settings._iDisplayStart + 1 + '.';
        }
      },
      {data: "avatar", className: "text-center",
        render: function (data, type, row) {
          return '<img src="'+data+'" width=100px>';
        }
      },
      {data: "username"},
      {data: "email"},
      {data: "nama"},
      {data: "role"},
      {data: "verified"},
      {data: "verified",
        render: function(data, type, row)
        {
          if(data == "Ya")
          {
            return '<button type="button" class="btn btn-success" disabled>Verify</button>';
          }
          else {
            return '<button type="button" class="btn btn-success" id="ver-'+row.rowID+'" onClick=change("'+row.rowID+'")>Verify</button>';
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

  $("div.user").html(
    '<button type="button" id="add" class="btn btn-primary">Tambah</button>&nbsp;'+
    '<button type="button" id="edit" class="btn btn-info">Edit</button>&nbsp;'+
    '<button type="button" id="delete" class="btn btn-danger">Hapus</button>'
  );

  tbluser.on('click', 'tr', function()
  {
    if ($(this).hasClass('selected'))
    {
      $(this).removeClass('selected');
    } else {
      tbluser.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
    }
  });

  $('#add').click(function()
  {
    $('#modaldialog').addClass('modal-md');
    $('#modalheader').addClass('bg-info');
    $('#modaltitle').addClass('text-white');
    $('#modaltitle').html('Tambah User');
    $('#modalbody').load("<?php echo base_url("User/add");?>");
    $('#modal').data('rowID', 0);
    $('#modal').modal('show');
  });

  $('#edit').click(function(){
    var rows = tbluser.rows('.selected').indexes();
    if (rows.length < 1)
    {
      Swal.fire({
        title : 'Information',
        text : 'Please select a row',
        icon : 'warning'
      });
      return;
    }
    var data = tbluser.rows(rows).data();
    var id = data[0].rowID;

    $('#modaldialog').addClass('modal-md');
    $('#modalheader').addClass('bg-info');
    $('#modaltitle').addClass('text-white');
    $('#modaltitle').html('Edit User');
    $('#modalbody').load("<?php echo base_url("User/add");?>");
    $('#modal').data('rowID', id);
    $('#modal').modal('show');
  })

  $('#delete').click(function()
  {
    var rows = tbluser.rows('.selected').indexes();
    if (rows.length < 1)
    {
      Swal.fire({
        title : 'Information',
        text : 'Please select a row',
        icon : 'warning'
      });
      return;
    }
    var data = tbluser.rows(rows).data();
    var id = data[0].rowID;

    Swal.fire({
      title : 'Are you sure?',
      text : 'You won\'t be able to revert this!',
      icon : 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function(a){
      if (a.value==true)
      {
        Delete(id);
      } else {

      }
    })
  });

  function Delete(id)
  {
    $.ajax({
      url: "<?php echo base_url('User/delete')?>",
      type: "POST",
      data: {id: id},
      dataType: "json",
      success: function(event, data)
      {
        Swal.fire("Information", event.Pesan, "success");
        tbluser.ajax.reload(null, true);
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
        Swal.fire("Information", textStatus+' Save : '+errorThrown, "warning");
      }
    });
  };

  function change(id)
  {
    $.ajax({
      url: "<?php echo base_url('User/change')?>",
      type: "POST",
      data: {id: id},
      dataType: "json",
      success: function(event, data)
      {
        Swal.fire("Information", event.Pesan, "success");
        tbluser.ajax.reload(null, true);
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
        Swal.fire("Information", textStatus+' Save : '+errorThrown, "warning");
      }
    });
  }
</script>
