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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css">
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

	table.dataTable tr th.select-checkbox.selected::after {
    content: "✔";
    margin-top: -11px;
    margin-left: -4px;
    text-align: center;
    text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
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
	              	<form action="<?php echo base_url('anggota/cetak')?>" method="POST" target="_blank" id="form_cetak">
	              		<button type="submit" class="btn btn-dark print-all" target="_blank" disabled=""><span class="btn-label-icon"><i class="fas fa-print"></i> Cetak Yang Dicentang</span></button>
                    <div class="table-responsive mt-3">
                      <table class="table table-striped table-bordered" id="tableAnggota">
                        <thead>
                          <tr>
                          	<th class="text-center">
                          		<div class="custom-checkbox custom-control">
	                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input checkall" id="checkbox-all">
	                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
	                            </div>
                          	</th>
                            <th class="text-center">#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Kode Wilayah</th>
                          </tr>
                        </thead>
                        <tbody>
                        	<?php
                            $e=0;
                            foreach ($list as $row) {
                            $e++;
                          ?>
                         	<tr>
                         		<td align="center">
                         			<div class="custom-checkbox custom-control">
	                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input checkbox" id="checkbox-<?= $e?>" name="id[]" value="<?= $row->idanggota?>">
	                              <label for="checkbox-<?= $e?>" class="custom-control-label">&nbsp;</label>
	                            </div>
                         			<!-- <input type="checkbox" name="id[]" value="<?= $row->idanggota?>" class="form-control"> -->
                         		</td>
                         		<td><?php echo $e ?></td>
                            <td align="center">
                            	<?php
                                if ($row->foto !== "")
                                {
                              ?>
                            		<img src="<?= $row->foto?>" width="100px">
                            	<?php
                            		}
                                else
                                {
                              ?>
                              <img src="<?= base_url('assets/template/assets/img/avatar/avatar-1.png');?>" width="100px">
                              <?php
                            		}
                              ?>
                            </td>
                            <td><?php echo $row->namalengkap ?></td>
                            <td>
                            	<?php
                            		$year = substr($row->tanggallahir, 0,4);
												        $month = substr($row->tanggallahir, 5,2);
												        $day = substr($row->tanggallahir, 8,2);
												        $format = $day.$month.$year;
												        $format_tanggallahir = $day."/".$month."/".$year;
                            	?>
                            	<?php echo $row->tempatlahir.", ".$format_tanggallahir ?>
                            </td>
                            <td><?php echo $row->alamat ?></td>
                            <td>
                            	<?php 
                            		if ($row->kodewilayah == "0901")
																{
																	$wilayah = 'Jakarta Pusat';
																}
																	else if ($row->kodewilayah == "0902")
																{
																	$wilayah = 'Jakarta Selatan'; 
																}
																	else if ($row->kodewilayah == "0903")
																{
																	$wilayah = 'Jakarta Timur';
																}
																	else if ($row->kodewilayah == "0904")
																{
																	$wilayah = 'Jakarta Barat';
																}
																	else if ($row->kodewilayah == "0905")
																{
																	$wilayah = 'Jakarta Utara';
																}
																else {
																	$wilayah = 'Kepulauan Seribu';
																}
                            	?>
                            	<?php echo $wilayah ?>
                            </td>
                         	</tr>
                         	<?php
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </form>
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
	    var tblanggota = $('#tableAnggota').DataTable();

	    function checkChecked() {
				$checked = $('#tableAnggota').children('tbody').find('input[type="checkbox"]:checked');
				console.log($checked);
				
				if ($checked.length > 0) {
					$('#form-cetak').find('button[type="submit"]').removeClass('disabled').removeAttr('disabled');
					// $('.check-all').prop('checked', true);
				} else if ($checked.length ==0) {
					$('#form-cetak').find('button[type="submit"]').addClass('disabled').attr('disabled','disabled');
				}
			}

			function showPrintAll(print = true) {
				if (print) {
					$('button.print-all').removeClass('disabled').removeAttr('disabled');
					// $('.check-all').prop('checked', true);
				} else {
					
					$('button.print-all').addClass('disabled').attr('disabled','disabled');
				}
			}

			$('table').delegate('input.checkall', 'click', function(e) 
			{
				if ($(this).is(':checked')) {
					showPrintAll();
					$('table').find('input.checkbox').prop('checked', 'checked');
				} else {
					$('table').find('input.checkbox').prop('checked', false);
					showPrintAll(false);
				}
			})

			$('table').delegate('input.checkbox', 'click', function(e) {
				// alert();
				if ($(this).is(':checked')) {
					showPrintAll();
					not_checked = $('table').find('input.checkbox:not(:checked)').length;
					if (not_checked == 0) {
						$('table').find('input.checkall').prop('checked', 'checked');
					}
				} else {
					$('table').find('input.checkall').prop('checked', false);
					not_checked = $('table').find('input.checkbox:checked').length;
					// console.log(not_checked);
					if (not_checked == 0) {
						showPrintAll(false);
					}
				}
			})
  	})
  </script>

</body>
</html>
