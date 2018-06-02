<?php $this->load->view('admin/header'); ?>
<!-- Full Width Column -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tickets Mais Antigos (Status: Aberto)</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <?php foreach($arr AS $row): ?>
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
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Incidencias com Maior Prioridade</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <?php foreach($arr AS $row): ?>
                                        <tr>
                                            <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                        </tr>
                                        <tr>
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
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tickets</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <?php foreach($arr AS $row): ?>
                                                <tr>
                                                    <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                                </tr>
                                                <tr>
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
                    <div class="col-md-12">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tickets</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <table class="table table-condensed">
                                            <?php foreach($arr AS $row): ?>
                                                <tr>
                                                    <td><img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px"></td>
                                                </tr>
                                                <tr>
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
                </div> 
            </div>
        </div>
    </section>
</div>
  <!-- /.content-wrapper -->

<?php $this->load->view('admin/footer'); ?>