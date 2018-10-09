<footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2018 <a href="">Manda Nuggets</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="<?= base_url("bower_components/jquery/dist/jquery.min.js") ?>"></script>
        <!-- blockUI -->
        <script src="<?= base_url("bower_components/jquery/dist/jquery.blockUI.js") ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url("bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
        <!-- DataTables -->
        <script src="<?= base_url("bower_components/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
        <script src="<?= base_url("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url("bower_components/jquery-slimscroll/jquery.slimscroll.min.js") ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url("bower_components/fastclick/lib/fastclick.js") ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url("dist/js/adminlte.min.js") ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url("dist/js/demo.js") ?>"></script>
    </body>

<script>
  $(document).ajaxStart(bloquear).ajaxStop(desbloquear);

  function bloquear(){
    var getUrl = window.location;
    var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
    var url = base_url + 'images/loading_icon.gif';
    var msg = '<h1><img class="loading_gif" src="'+url+'" />Carregando...</h1>';
    $.blockUI({ message: msg });
  }

  function desbloquear(){
    $.unblockUI();
  }

</script>

<style>
  .loading_gif {
    width: 75px;
    height: 75px;
  }
</style>

</html>
