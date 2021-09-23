  <style type="text/css">
    .swal2-popup {
      font-size: 0.8rem !important;
    }
  </style>
  <div class="form-body">
    <div class="row g-4">
      <div class="col-lg-7">
        <ul class="nav nav-pills" id="myTab3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Edit Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Ganti Password</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent2">
          <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
            <form method="post" id="frmProfile" action="" enctype="multipart/form-data">
              <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control">
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" id="nama" name="nama" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" id="role">
                  <option value="Administrator">Administrator</option>
                  <option value="User">User</option>
                  <option value="Cabang">Cabang</option>
                  <option value="Pusat">Pusat</option>
                </select>
              </div>
              <div class="form-group">
                <label>Verified</label>
                <select class="form-control" name="verified" id="verified">
                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
                </select>
              </div>
              <div class="modal-footer">
                  <button type="button" id="btnSave" class="btn btn-primary">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
            <form id="frmPassword" method="post" class="needs-validation" novalidate="">
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" id="pwlama" name="pwlama" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" id="pwbaru" name="pwbaru" class="form-control">
              </div>
              <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" id="ulangi" nama="ulangi" class="form-control">
              </div>
            </form>
            <div class="modal-footer">
                <button type="button" id="btnSavepass" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
            <i>Setelah mengganti password anda akan otomatis log out dari website!</i>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="form-group">
          <img id="picturebox" class="rounded-circle profile-widget-picture mb-2" width="100%" src="<?=base_url('assets/template/assets/img/avatar/avatar-1.png')?>" alt="image">
          <input type="file" id="userfile" name="userfile" accept="image/x-png,image/gif,image/jpeg"/>
          <p>(* Only Jpg, Png allowed. Max 300kb)</p>    
          <input type="hidden" name="image" id="image">
          <input type="hidden" name="labelimage" id="labelimage">
        </div>
      </div>
    </div>
  </div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
  loaddata()

  $('#role').attr("style", "pointer-events: none;");
  $('#verified').attr("style", "pointer-events: none;");
  
  $('#userfile').change(function(event) {
    event.preventDefault();
    event.handled = true;
    $.ajax({
      url : "<?=base_url('user/savepic')?>",
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
        console.log(data.Status);
        if(data.Status == "OK"){
          Swal.fire({
            title: "Information",
            text: data.Pesan,
            icon: "success",
            confirmButtonText: "OK"
          });
          $('#picturebox').attr('src', data.Url);
          $('#image').val(data.Url)
          $('#labelimage').val(data.Picname)
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
  });

  $('#btnSave').click(function(e)
  {
    var id = "<?php echo $this->session->userid ?>";
    e.preventDefault();
    var dataform = $('#frmProfile').serializeArray();
    console.log(dataform)
    var img = $('#image').val();
    dataform.push({name:"id",value:id},{name:"image",value:img})
    var site_url = "<?=base_url('user/updateProfile')?>";
    $.ajax({
      url: site_url,
      type: "POST",
      data: dataform,
      dataType: "json",
      success: function(data, status){
        console.log(data); 
        console.log(status);
        if(data.Status=='OK'){
          Swal.fire({
            title: "Information",
            text: data.Pesan,
            icon: "success",
            confirmButtonText: "OK"
          }).then(function(){
            // $('#modal').modal('hide');
            location.reload();
          });
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
  });

  $('#btnSavepass').click(function(){
    var dataform = $('#frmPassword').serializeArray();
    var email = $('#email').val();
    var pwlama = $('#pwlama').val();
    var password = $('#pwbaru').val();
    var confpass  = $('#ulangi').val();
    if(password != confpass){
      Swal.fire('Information', 'Password baru tidak sama','error');
      return;
    }
    console.log(pwlama)
    dataform.push({name:"email",value:email},{name:"pwlama",value:pwlama},{name:"password2",value:password})
    var site_url = "<?=base_url('user/changepass')?>";
    $.ajax({
      url: site_url,
      type: "POST",
      data: dataform,
      dataType: "json",
      success: function(data, status){
        console.log(data); console.log(status);
        if(data.Status=='OK'){
          Swal.fire({
            title: "Information",
            text: data.Pesan,
            icon: "success",
            confirmButtonText: "OK"
          }).then(function(){
            sessionStorage.clear(); 
            window.location.href="<?php echo base_url('Login');?>";
          })
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
  });

  function loaddata(){
    var id = $('#modal').data('id');
    if (id.length > 0) {
      $.getJSON("<?=base_url('user/getByName')?>" + "/" + id, function (data) {
        console.log(data)
        $("#username").val(data[0].username);
        $("#nama").val(data[0].nama);
        $("#email").val(data[0].email);
        $("#role").val(data[0].role).trigger('change');
        $("#verified").val(data[0].verified).trigger('change');
        $('#image').val(data[0].avatar);
        $('#labelimage').val(data[0].avatar);
        var url = data[0].avatar;
        if(url != "" || url != null)
        {
          var filename = url.substring(url.lastIndexOf('/')+1);
          $('#labelimage').text(filename);
          $('#picturebox').attr("src",url);
        }
      });
    }
  }
</script>