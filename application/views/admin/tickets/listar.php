<?php $this->load->view('admin/header'); ?> 
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Tickets</h4>
            </div>

            <?php $this->message->get_admin(); ?>

            <div class="panel" style="padding:20px;">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuário</th>
                            <th>Titulo</th>
                            <th>Localização</th>
                            <th>Departamento</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tickets as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->usuario ?></td>
                                <td><?= $row->titulo ?></td>
                                <td><?= $row->localizacao ?></td>
                                <td><?= $row->departamento ?></td>
                                <td><?= $row->status ?></td>
                                <td><a class="btn btn-sm btn-info" href="<?= base_url('admin/tickets/ver/'.$row->id) ?>">Ver</a></td>
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