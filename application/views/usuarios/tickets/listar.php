<?php $this->load->view('usuarios/header'); ?> 
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Meus Ticket</h4>
            </div>

            <?php $this->session->flashdata('item'); ?>

            <div class="panel" style="padding:20px;">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Localização</th>
                            <th>Descricao</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tickets as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->titulo ?></td>
                                <td><?= $row->localizacao ?></td>
                                <td><?= $row->descricao ?></td>
                                <td><?= $row->status ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tdoby>
                    <tfoot>
                        <tr>    
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Localização</th>
                            <th>Descricao</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
<?php $this->load->view('usuarios/footer'); ?>

<script>
$(document).ready(function () {
    table = $('#table').dataTable({
        "scrollX": false,
        "autoWidth": true,
        "processing": true,
        "columnDefs": [
            { width: 100, targets: [0] },
            { width: 200, targets: [1,2,3,4] },
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