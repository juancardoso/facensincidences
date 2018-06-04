<?php $this->load->view('usuarios/header'); ?>
 <!-- Full Width Column -->
<div class="content-wrapper">
    <section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="row mt-4">
                <div class="col-md-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Ultimas Incidencias</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                <table class="table table-condensed">
                    <?php foreach($ultimasIncidences AS $row): ?>
                        <tr>
                            <td rowspan="2"><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                            <td><?= $row->titulo ?></td>
                        </tr>
                        <tr>
                            <td><?= $row->descricao ?></td>
                        </tr>

                    <?php endforeach; ?>
                </table>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ultimas Incidencias Resolvidas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <?php foreach($ultimasIncidencesResolvidas AS $row): ?>
                            <tr>
                                <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                <td><?= $row->titulo ?></td>
                            </tr>
                        <?php endforeach; ?>
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
                    
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ranking de Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-condensed">
                    <?php $i = 0; foreach($ranking AS $row): ?>
                        <tr>
                            <td style="vertical-align: middle;"><span class="label label-warning"><?= $i += 1 ?></span></td>
                            <td style="vertical-align: middle;"><img src=<?= $row->img ?> alt="usuario" width="50px" height="50px" style="border-radius: 5px"></td>
                            <td style="vertical-align: middle;"><p class="text-primary"><b><?= $row->nome ?></b></p>
                                <span class="text-secondary"> Quantidade de Incidencias: 
                                <?= $row->qtde ?>
                                    </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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