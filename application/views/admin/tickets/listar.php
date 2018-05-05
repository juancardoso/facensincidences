<?php $this->load->view('admin/header'); ?> 
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Meus Ticket</h4>
            </div>

            <?php $this->message->get(); ?>

            <div class="panel" style="padding:20px;">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Localização</th>
                            <th>Descricao</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
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
                                <td><a class="btn btn-sm btn-info" href="<?= base_url('admin/tickets/ver/'.$row->id) ?>">Ver</a></td>
                                <td><?= ($row->status == 'PENDENTE') ? '<a class="btn btn-sm btn-danger" href="#" onclick="excluir('.$row->id.')">Excluir</a>': "" ?></td>
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
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
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

function excluir(id){
    var getUrl = window.location;
    var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
    if(confirm('Deseja realmente excluir este ticket?')){
        var url = base_url + 'usuarios/tickets/excluir/' + id; 
        $.get(url,function(data){
            window.location.reload();
        });
    }
}

</script>