<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Daftar Nama Anggota</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/jqvmap/dist/jqvmap.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/summernote/dist/summernote-bs4.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/weathericons/css/weather-icons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/weathericons/css/weather-icons-wind.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.css')?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/style.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/assets/css/components.css')?>">
</head>

<style type="text/css">
  .swal2-popup {
	  font-size: 0.8rem !important;
	}
</style>

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
	            <h1>Daftar Nama Anggota</h1>
	            <div class="section-header-breadcrumb">
	              <div class="breadcrumb-item active"><a href="#">Daftar Nama Anggota</a></div>
	              <div class="breadcrumb-item">Data Anggota</div>
	            </div>
	          </div>

	          <div class="section-body">
	            <div class="card">
	              <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="tableAnggota">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Kode Wilayah</th>
                          </tr>
                        </thead>
                        <tbody>
                        	
                        </tbody>
                      </table>
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
  <script src="<?php echo base_url('assets/template/node_modules/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/chart.js/dist/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/owl.carousel/dist/owl.carousel.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/summernote/dist/summernote-bs4.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js')?>"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/template/node_modules/datatables/media/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/datatables.net-select/js/dataTables.select.min.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/template/assets/js/custom.js')?>"></script>

   <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/template/assets/js/page/bootstrap-modal.js')?>"></script>
  <script src="<?=base_url('assets/template/assets/js/page/modules-datatables.js')?>"></script>

  <script>
  	$(document).ready(function(){
  		//GET DATA TABLE
	    var tblanggota; 
	    var tblanggota = $('#tableAnggota').DataTable( {
        "ajax" : {
          "url" : "<?= base_url('anggota/getTable');?>",
          "type": "GET",
          "dataSrc":""
        },
        "columns": [
		    	{data: "row_number", width:'1px', searchable:false,
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1 +'.';
            }
          },
			    {data: "foto", className: "text-center",
			        render: function (data, type, row) {
			        	if (data) {
			        		return '<img src="'+data+'" width="100px">';
			        	} else {
			        		return '<img src="<?= base_url('assets/template/assets/img/avatar/avatar-1.png');?>" width="100px">';		
			        	}
			        }
			      },
			    {data:"namalengkap"},
			    {data:"tempatlahir",
			    	render:function (data, type, row) {
			    		var tgl = row.tanggallahir;
			    		var frmtgl = formatdate(tgl)
			    		if (data) {
			    			return data+', '+frmtgl;
			    		}
			    	}
					},
			    {data:"alamat"},
			    {data: "kodewilayah",
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
        ],
        "pageLength": 5,
        "language": {
          "decimal": ",",
          "thousands": ".",
        },
	      "dom": '<"toolbar tblAnggota">frtip',
	    });

	    $("div.tblAnggota").html(
	      '<button type="button" id="add" class="btn btn-primary">Tambah</button>&nbsp;'+
	      '<button type="button" id="edit" class="btn btn-info">Edit</button>&nbsp;'+
		    '<button type="button" id="delete" class="btn btn-danger">Hapus</button>&nbsp;'+
		    '<button type="button" id="import" class="btn btn-success" disabled>Import Data</button>&nbsp;'+
		    '<button type="button" id="print" class="btn btn-dark" disabled>Print KTA</button>&nbsp;'+
		    '<div class="dropdown d-inline mr-2">'+
          '<button class="btn btn-primary dropdown-toggle" type="button" id="wilayah" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
            'Pilih Wilayah'+
          '</button>'+
          '<div class="dropdown-menu">'+
            '<a class="dropdown-item" href="#">Jakarta Pusat</a>'+
            '<a class="dropdown-item" href="#">Jakarta Selatan</a>'+
            '<a class="dropdown-item" href="#">Jakarta Timur</a>'+
            '<a class="dropdown-item" href="#">Jakarta Barat</a>'+
            '<a class="dropdown-item" href="#">Kepulauan Seribu</a>'+
          '</div>'+
        '</div>'
	    );

     	tblanggota.on('click', 'tr', function() {
        if ($(this).hasClass('selected')) {
        	document.getElementById("print").disabled = true;
          $(this).removeClass('selected');
        } else {
          tblanggota.$('tr.selected').removeClass('selected');
          document.getElementById("print").disabled = false;
          $(this).addClass('selected');
        }
	    });

	    $('#add').click(function(){
	    	window.location.href="<?= base_url('anggota/add')?>" + "/" + 0;
	    })

	    $('#edit').click(function(){
        var rows = tblanggota.rows('.selected').indexes();
        if (rows.length < 1) {
          Swal.fire("Information",'Pilih data yang akan diedit!',"warning");
          return;
        } 
        var data = tblanggota.rows(rows).data();
        var rowID = data[0].idanggota;

        var site_url = '<?= base_url("anggota/add")?>'+ "/" +rowID;
        window.location.href= site_url;
	    })

	    $('#delete').click(function(){
	    	var rows = tblanggota.rows('.selected').indexes();
        if (rows.length < 1) {
          Swal.fire("Informasi",'Pilih data yang akan dihapus!',"warning");
          return;
        }
        var data = tblanggota.rows(rows).data();
        var rowID = data[0].idanggota;
        Swal.fire({
          title: 'Yakin hapus data?',
          text: 'Data anggota akan dihapus!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        })
        .then(function(a){
          if (a.value==true) {
          	Hapus(rowID);
          }
        })
	    })

			$('#tableAnggota').on('click', 'td.details-control', function () {
	      var tr = $(this).closest('tr');
	      var row = tblanggota.row( tr );
	    });

	    function Hapus ( id ) {
	    	var data = [];
	      data.push({ name:'id', value:id })
	      $.ajax({
	        url : "<?= base_url('anggota/delete');?>",
	        type:"POST",
	        data: data,
	        dataType:"json",
	        success:function(event, data){
	            Swal.fire("Information",event.Pesan,"warning");
	            tblanggota.ajax.reload(null,true);
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            Swal.fire("Information",textStatus+' Save : '+errorThrown,"warning");
	        }
	      });
	    }

	    $('#print').click(function(){
        var rows = tblanggota.rows('.selected').indexes(); 
        var data = tblanggota.rows(rows).data();
        var rowID = data[0].idanggota;

        var site_url = '<?= base_url("anggota/cetak")?>'+ "/" +rowID;
        window.location.href= site_url;
	    })

	    function formatdate(data){
        if (data==null || data=='') {
          return 'Not Set'
        }
        var date = new Date(data.replace(/\s/, 'T'));
        var dd = date.getDate();
        var mm = date.getMonth() + 1
        var yyyy = date.getFullYear();
        var h = date.getHours();
        var m = date.getMinutes();
        if (dd < 10) {
        	dd = '0' + dd;
        }
        if (mm < 10) {
        	mm = '0' + mm;
        }
        if (h < 10) {
        	h = '0' + h;
        }
        if (m < 10) {
        	m = '0' + m;
        }
        var newdate = dd + '/' + mm + '/' + yyyy;
        return newdate
	    }
  	})
  </script>

</body>
</html>
