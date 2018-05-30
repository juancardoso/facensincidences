<?php $this->load->view('usuarios/header'); ?>
 <!-- Full Width Column -->
<div class="content-wrapper">
    <section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="row mt-4">
                <div class="col-md-12">
                <div class="box">
                <div class="box-header">
                <h3 class="box-title">Ultimas Incidencias</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                <table class="table table-condensed">
                    <?php for($i = 0 ; $i < 4 ; $i++): ?>
                        <tr>
                            <td rowspan="2"><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                            <td>Header Teste</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie rhoncus ligula eget facilisis. Nulla facilisi. Ut lobortis, mi a posuere tincidunt, elit mi pulvinar felis, egestas feugiat mauris ex at mi. Quisque rhoncus auctor vehicula. Duis euismod orci at dolor vehicula, eget vulputate massa euismod. Nunc ultrices augue at tellus porttitor, a dapibus est ullamcorper. Vivamus venenatis egestas eros aliquet fringilla. In et nisl quis sem congue facilisis. Vestibulum non varius lectus, in sodales justo. Aenean interdum, erat eu vulputate dignissim, felis lectus aliquam dolor, ut aliquam lorem odio at arcu. Sed eu rutrum libero. Praesent eleifend lorem nec massa rhoncus, et accumsan elit interdum. Fusce congue, tortor nec aliquet interdum, felis dolor scelerisque neque, in condimentum lectus dui ac ligula.</td>
                        </tr>

                    <?php endfor; ?>
                </table>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Ultimas Incidencias Resolvidas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <?php for($i = 0 ; $i < 4 ; $i++): ?>
                            <tr>
                                <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                <td>Titulo</td>
                            </tr>
                        <?php endfor; ?>
                    </table>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mt-4">
                <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Ranking de Usuarios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <?php for($i = 0 ; $i < 13 ; $i++): ?>
                            <tr>
                                <td><h6><?= $i ?></h6></td>
                                <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                <td>User Name NAME NAME</td>
                            </tr>
                        <?php endfor; ?>
                    </table>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>    
    </div>
</section>
</div>
  <!-- /.content-wrapper -->
<?php $this->load->view('usuarios/footer'); ?>