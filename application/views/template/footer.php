<div class="footer-left">
    Copyright &copy; 2021
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal" aria-labelledby="modaltitle" aria-hidden="true">
  <div class="modal-dialog" role="document" id="modaldialog">
    <div class="modal-content">
      <div class="modal-header" id="modalheader">
        <h5 class="modal-title" id="modaltitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalbody">

      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-primary" id="savefrm">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/sweetalert2/package/dist/sweetalert2.min.js')?>"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $('#profile').click(function(){
    var data = "<?php echo $this->session->userid ?>";
    $('#modaldialog').addClass('modal-md');
    $('#modaltitle').addClass('white');
    $('#modaltitle').html('User Profile');
    $('#modalbody').load("<?=base_url('user/profile')?>");
    $('#modal').data('id', data);
    $('#modal').modal('show');
    $('.modal-footer').hide();
  })
</script>