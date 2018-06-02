<?php $this->load->view('admin/header'); ?> 
<div class="content-wrapper">
    <section class="content">

            <?php $this->message->get_admin(); ?>

            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Incidencias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Localização</th>
                            <th>Departamento</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($incidences as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->titulo ?></td>
                                <td><?= $row->localizacao ?></td>
                                <td><?= $row->departamento ?></td>
                                <td><?= $row->status ?></td>
                                <td><a class="btn btn-sm btn-info" href="<?= base_url('admin/incidences/ver/'.$row->id) ?>">Ver</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tdoby>
                </table>
                </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
</div>
  <!-- /.content-wrapper -->
<?php $this->load->view('admin/footer'); ?>

<script>
$(document).ready(function () {
    table = $('#table').dataTable({
        "scrollX": false,
        "autoWidth": true,
        "processing": true,
        "columnDefs": [
            { width: 100, targets: [0] },
            { width: 200, targets: [1,2,3] },
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Portuguese-Brasil.json"
        },
        "dom": 'Bfrtip',
        buttons: [
            'copyHtml5', 'excelHtml5', 'csvHtml5'
        ]
    });

});

</script>