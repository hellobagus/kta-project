<script src="<?php echo base_url('assets/validate/jquery.validate.min.js')?>"></script>
<form id="frm" class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
	<div class="form-body">
		<div class="row g-4">
			<div class="col-lg-7">
				<div class="form-group">
					<label class="form-label">Username <span class="text-danger">*</span></label>
					<input type="text" name="username" id="username" class="form-control">
				</div>

				<div class="form-group">
					<label class="form-label">Nama <span class="text-danger">*</span></label>
					<input type="text" name="nama" id="nama" class="form-control">
				</div>

				<div class="form-group">
					<label class="form-label">Email <span class="text-danger">*</span></label>
					<input type="text" name="email" id="email" class="form-control">
				</div>

				<div class="form-group">
					<label class="form-label">Role <span class="text-danger">*</span></label>
					<select class="form-control" name="role" id="role">
						<option value="Administrator">Administrator</option>
						<option value="User">User</option>
						<option value="Cabang">Cabang</option>
						<option value="Pusat">Pusat</option>
					</select>
				</div>

				<div class="form-group" id="div_cabang">
					<label class="form-label">Cabang Input <span class="text-danger">*</span></label>
					<select name="kode_wilayah" id="kode_wilayah" class="form-control">
                        <option value="0901">Jakarta Pusat</option>
                        <option value="0902">Jakarta Selatan</option>
                        <option value="0903">Jakarta Timur</option>
                        <option value="0904">Jakarta Barat</option>
                        <option value="0905">Jakarta Utara</option>
                        <option value="0906">Kepulauan Seribu</option>
                    </select>
				</div>

				<div class="form-group" id="div_pass">
					<label class="form-label">Password <span class="text-danger">*</span></label>
					<input type="password" name="password" id="password" class="form-control">
				</div>

				<div class="form-group" id="div_re_pass">
					<label class="form-label">Ulangi Password <span class="text-danger">*</span></label>
					<input type="password" name="re_password" id="re_password" class="form-control">
				</div>
			</div>
			<div class="col-lg-5">
				<div class="form-group">
					<label class="form-label">Avatar</label>
					<img id="picturebox" class="img-thumbnail img-fluid" src="<?php echo base_url('assets/template/assets/img/avatar/avatar-5.png')?>" width="150" height="150" alt="Image Description">
						<input type="file" id="userfile" name="userfile" accept="image/*">
						<span class="text-danger">(*Hanya JPG, JPEG, PNG diperbolehkan)</span>
					<input type="hidden" name="picturepath" id="picturepath" value="<?php echo base_url('assets/template/assets/img/avatar/avatar-5.png')?>">
					<input type="hidden" name="picturename" id="picturename">
				</div>
			</div>
			<div class="form-group">
				<input type="hidden" name="rowID" id="rowID" class="form-control">
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function()
	{
		//menampilkan data
		loaddata();
		$('#div_cabang').hide();

		$("#role").change(function(){
	        var role = $("#role").val();
	        console.log(role);
	        if (role == "Cabang")
	        {
	        	$('#div_cabang').show();
	        }
	        else {
	        	$('#div_cabang').hide();
	        }
	    });

		function  loaddata()
		{
			var rowID = $('#modal').data('rowID');
			$('#rowID').val(rowID);

			if (rowID > 0)
			{
				$.getJSON("<?php echo base_url('User/getByID')?>" + "/" + rowID,
					function(data)
				{
					$('#username').val(data[0].username);
					$('#nama').val(data[0].nama);
					$('#email').val(data[0].email);
					$('#kode_wilayah').val(data[0].kode_wilayah).trigger('change');
					$('#role').val(data[0].role).trigger('change');

					if(data[0].avatar!="")
					{
						$('#picturebox').attr("src", data[0].avatar);
						$('#picturepath').val(data[0].avatar);
					}
				});
				$('#div_pass').hide();
				$('#div_re_pass').hide();
			}
		}

		$("#userfile").on('change', function ()
	    {
	    	if ($('#nama').val() == "")
	    	{
	    		Swal.fire("Informasi", "Nama Tidak Boleh Kosong", "warning");
	    	}
	    	else {
	    		$.ajax({
	            	url : "<?php echo base_url('User/savepic')?>",
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
								title: "Informasi",
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
				username:{
					required:true
				},
				nama:{
					required:true
				},
				email:{
					required:true
				},
				role:{
					required:true
				},
				kode_wilayah:{
					required:true
				},
				password:{
					required:true
				},
				re_password:{
					required:true
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
	    				url : "<?php echo base_url('User/save')?>",
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
	    							$('#modal').modal('hide');
	    							tbluser.ajax.reload(null,true);
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
	})
</script>