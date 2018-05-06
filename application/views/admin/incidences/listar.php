<?php $this->load->view('admin/header'); ?> 
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Incidencias</h4>
            </div>

            <?php $this->message->get_admin(); ?>

            <div class="panel" style="padding:20px;">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Localização</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($incidences as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->titulo ?></td>
                                <td><?= $row->id_localizacao ?></td>
                                <td><?= $row->id_categoria ?></td>
                                <td><?= $row->status ?></td>
                                <td><a class="btn btn-sm btn-info" href="<?= base_url('admin/incidences/ver/'.$row->id) ?>">Ver</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tdoby>
                </table>
            </div>

        </div>
    </div>
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
        "buttons":[
            { "extend": 'csvHtml5', "text": 'CSV' }
        ],
    });

});

</script>