</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>&copy; <?=date('Y')?> <a href="https://queenterichospital.org">Queenteric Hospital</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <?php //$this->load->view('section/parts/right_sidebar')?>
  <!-- /.control-sidebar -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<?php $this->load->view('section/parts/modals/modals'); ?>

<!-- /* prepare the system for printing a thing */ -->
<?php $this->load->view('section/parts/print/printing'); ?>

<!-- /* load the select boxes dynamic stylo */ -->
<?php $this->load->view('section/parts/select2'); ?>

<?php $this->load->view('section/parts/modals/modalscripts') ?>

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/dist/js/demo.js')?>"></script>

<script>

  function pf(i){console.log(i);}

  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
