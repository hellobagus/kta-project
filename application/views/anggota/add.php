<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Daftar Anggota</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/template/assets/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/template/assets/css/components.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/select2/dist/css/select2.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/template/node_modules/selectric/public/selectric.css')?>">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>
<style type="text/css">
	.swal2-popup {
	  font-size: 1.6rem !important;
	}

	.error {
    color: red;
    background-color: #fff;
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
		            <h1>Tambah Data Anggota</h1>
		            <div class="section-header-breadcrumb">
		              <div class="breadcrumb-item active"><a href="#">Daftar Anggota</a></div>
		              <div class="breadcrumb-item"><a href="#">Data Anggota</a></div>
		              <div class="breadcrumb-item">Tambah Data Anggota</div>
		            </div>
		          </div>

		          <div class="section-body">
		            <div class="card">
		              <div class="card-body">
		              	<?php
		              	$wilayah = $this->session->kode_wilayah;
		              	$role = $this->session->role;	              	
		            	// var_dump($wilayah, $role);die;
		              	 ?>
		              	<form action="" id="frmAnggota">
		                    <div class="form-group row">
					          <label for="kodewilayah" class="col-sm-2 col-form-label"><h5>Kode Wilayah</h5></label>
					          <div class="col-sm-5">
					          	<?php if ($wilayah == "0903") { ?>
					          		<select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            	<option value="0903">Jakarta Timur</option>
							        </select>
						    	<?php } elseif ($wilayah == "0901") { ?>
						    		<select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            	<option value="0901">Jakarta Pusat</option>
							        </select>
							    <?php } elseif ($wilayah == "0902") { ?>
						    		<select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            	<option value="0902">Jakarta Selatan</option>
							        </select>
							    <?php } elseif ($wilayah == "0904") { ?>
						    		<select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            	<option value="0904">Jakarta Barat</option>
							        </select>
							    <?php } elseif ($wilayah == "0905") { ?>
						    		<select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            	<option value="0905">Jakarta Utara</option>
							        </select>
							    <?php } elseif ($wilayah == "0906") { ?>
						    		<select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            	<option value="0906">Kab. Kepulauan Seribu</option>
							        </select>
					    		<?php } else { ?>
						    	<select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            <option value="0901">Jakarta Pusat</option>
						            <option value="0902">Jakarta Selatan</option>
						            <option value="0903">Jakarta Timur</option>
						            <option value="0904">Jakarta Barat</option>
						            <option value="0905">Jakarta Utara</option>
						            <option value="0906">Kab. Kepulauan Seribu</option>
						        </select>
						    	<?php } ?>
					          </div>
					          	
							  <!-- <label for="kodewilayah" class="col-sm-2 col-form-label"><h5>Kode Wilayah</h5></label>
					          <div class="col-sm-5">
					            <select class="form-control select2" name="kodewilayah" id="kodewilayah">
						            <option value="0901">Jakarta Pusat</option>
						            <option value="0902">Jakarta Selatan</option>
						            <option value="0903">Jakarta Timur</option>
						            <option value="0904">Jakarta Barat</option>
						            <option value="0905">Jakarta Utara</option>
						            <option value="0906">Kab. Kepulauan Seribu</option>
						        </select>
					          </div> -->
					        </div>
					        <div class="form-group row">
					          <label for="namalengkap" class="col-sm-2 col-form-label"><h5>Nama Lengkap</h5></label>
					          <div class="col-sm-5">
					            <input type="text" class="form-control" name="namalengkap" id="namalengkap" placeholder="Nama Lengkap">
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="tempatlahir" class="col-sm-2 col-form-label"><h5>Tempat Lahir</h5></label>
					          <div class="col-sm-5">
					            <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir">
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="tanggallahir" class="col-sm-2 col-form-label"><h5>Tanggal Lahir</h5></label>
					          <div class="col-sm-5">
					            <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="Tanggal Lahir">
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="jeniskelamin" class="col-sm-2 col-form-label"><h5>Jenis Kelamin</h5></label>
					          <div class="col-sm-5">
					            <select class="form-control select2" name="jeniskelamin" id="jeniskelamin">
						            <option value="1">Laki-laki</option>
						            <option value="2">Perempuan</option>
						        </select>
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="nik" class="col-sm-2 col-form-label"><h5>NIK</h5></label>
					          <div class="col-sm-5">
					            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="email" class="col-sm-2 col-form-label"><h5>Email</h5></label>
					          <div class="col-sm-5">
					            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
					          </div>
					        </div>
					        <hr>
					        <h5>Tempat Tinggal Saat Ini</h5>
					        <br>
					        <div class="form-group row">
					          <label for="provinsi" class="col-sm-2 col-form-label"><h5>Provinsi</h5></label>
					          <div class="col-sm-5">
					            <select class="form-control select2" name="provinsi" id="provinsi">
						            <option value=""></option>
						        </select>
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="kabupaten" class="col-sm-2 col-form-label"><h5>Kabupaten</h5></label>
					          <div class="col-sm-5">
					            <select class="form-control select2" name="kabupaten" id="kabupaten">
						            <option value=""></option>d
						        </select>
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="kecamatan" class="col-sm-2 col-form-label"><h5>Kecamatan</h5></label>
					          <div class="col-sm-5">
					            <select class="form-control select2" name="kecamatan" id="kecamatan">
						            <option value=""></option>
						        </select>
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="kelurahan" class="col-sm-2 col-form-label"><h5>Kelurahan / Desa</h5></label>
					          <div class="col-sm-5">
					            <select class="form-control select2" name="kelurahan" id="kelurahan">
						            <option value=""></option>
						        </select>
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="namalengkap" class="col-sm-2 col-form-label"><h5>Alamat</h5></label>
					          <div class="col-sm-5">
					          	<textarea name="alamat" id="alamat" class="form-control" rows="5" style="height:100%;"></textarea>
					          </div>
					        </div>
					        <div class="form-group row">
					          <label for="agama" class="col-sm-2 col-form-label"><h5>Agama</h5></label>
					          <div class="col-sm-5">
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
					          <label for="namalengkap" class="col-sm-2 col-form-label"><h5>Foto</h5></label>
					          <div class="col-sm-5">
					          	<div id="logo" class="image" >
	                      <img class="img-responsive" src="<?php echo(empty('') ? base_url('assets/template/assets/img/example-image.jpg'): base_url('assets/img/'.'') );?>" width="120px" id="picturebox">
	                    </div>
	                    <br>
	                    <input type="file" id="userfile" name="userfile" accept="image/x-png,image/gif,image/jpeg"/>
	                    <p>(* Hanya JPG, PNG yang diperbolehkan)</p>
	                    <input type="hidden" id="picturepath" name="picturepath" value="<?php echo ''?>" readonly="1">
	                    <input type="hidden" id="picturename" name="picturename" readonly="1">
					          </div>
					        </div>
					    </form>
		              </div>
		              <div class="card-footer bg-whitesmoke">
		                <button class="btn btn-icon icon-left btn-primary" id="btnSave">Simpan</button>
		                <a href="javascript:window.history.go(-1);" class="btn btn-icon icon-left btn-dark">Batal</a>
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
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url('assets/template/assets/js/stisla.js')?>"></script>

  <!-- Template JS File -->
  <script src="<?=base_url('assets/template/assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/template/assets/js/custom.js')?>"></script>

  <script src="<?php echo base_url('assets/template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/selectric/public/jquery.selectric.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/node_modules/select2/dist/js/select2.full.js')?>"></script>

   <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/template/assets/js/page/bootstrap-modal.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.js')?>"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script>
  	$(document).ready(function(){
  		loaddata();
  		var id = <?= $id ?>;
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
					var id = <?= $id ?>;
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
		            	window.location.href="<?= base_url('anggota/index');?>";
		            	tblanggota.ajax.reload();
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

      function loaddata(){
        var rowID = <?= $id ?>;
        if (rowID > 0) {
          $.getJSON("<?php echo base_url('anggota/getByID');?>" + "/" + rowID, function (data) {
              console.log(data);
              $('#kodewilayah').val(data[0].kodewilayah).trigger('change');
              $("#namalengkap").val(data[0].namalengkap);
              $('#tempatlahir').val(data[0].tempatlahir);
              $('#tanggallahir').val(data[0].tanggallahir);
              $('#jeniskelamin').val(data[0].jeniskelamin);
              $('#nik').val(data[0].nik);
              $('#email').val(data[0].email);
              zoomprovinsi(data[0].provinsi);
              zoomkabupaten(data[0].kabupaten);
              zoomkecamatan(data[0].kecamatan);
              zoomkelurahan(data[0].kelurahan);
              $('#alamat').val(data[0].alamat);
              $('#agama').val(data[0].agama).trigger('change');
              $('#db_profile').attr('disabled',true);
              $('#picturepath').val(data[0].foto)
              if(data[0].foto=='null'||data[0].foto==''||data[0].foto==null){
                pic_path = "<?= base_url('assets/template/assets/img/avatar/avatar-1.png')?>";
              }else{
                pic_path = data[0].foto;
              }
              $('#picturebox').attr('src', pic_path);
            });
        }else{
        }
      }

      function zoomprovinsi(id){
	    	var site_url = '<?= base_url("anggota/zoom_provinsi")?>';
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
	    	var site_url = '<?= base_url("anggota/zoom_kabupaten")?>';
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
	    	var site_url = '<?= base_url("anggota/zoom_kecamatan")?>';
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
	    	var site_url = '<?= base_url("anggota/zoom_kelurahan")?>';
        $.post(site_url,
          {id:id},
          function(data,status) {
            $("#kelurahan").empty();
            $("#kelurahan").append(data);
            $("#kelurahan").trigger('change');
          }
        );
	    }
  	});
  </script>

</body>
</html>
