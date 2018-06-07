<?php $this->load->view('admin/header'); ?>
<!-- Full Width Column -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tickets Mais Antigos (Status: Pendente)</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <?php foreach($arrTickets AS $row): ?>
                                        <tr>
                                            <td style="width: 110px"><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                            <td><?= $row->titulo ?></td>
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
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Incidencias</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <?php foreach($arrIncidences AS $row): ?>
                                        <tr>
                                            <td style="width: 110px"><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                            <td><?= $row->departamento ?></td>
                                            <td><?= $row->localizacao ?></td>
                                            <td><?= $row->departamento ?></td>
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
            </div>
            <!-- <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tickets</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <?php foreach($arr AS $row): ?>
                                                <tr>
                                                    <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                                    <td><?= $row->titulo ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tickets</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <?php foreach($arr AS $row): ?>
                                                <tr>
                                                    <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                                    <td><?= $row->titulo ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div> 
            </div> -->
        </div>
    </section>
</div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/footer'); ?>