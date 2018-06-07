<?php $this->load->view('usuarios/header'); ?> 
<div class="content-wrapper">
    <section class="content">

        <?php $this->message->get_user(); ?>

        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Meus Tickets</h3>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tickets as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->titulo ?></td>
                                <td><?= $row->localizacao ?></td>
                                <td><?= $row->departamento ?></td>
                                <td><?= $row->status ?></td>
                                <td><a class="btn btn-sm btn-info" href="<?= base_url('usuarios/tickets/ver/'.$row->id) ?>">Ver</a></td>
                                <td><?= ($row->status == 'PENDENTE') ? '<a class="btn btn-sm btn-danger" href="#" onclick="excluir('.$row->id.')">Excluir</a>': "" ?></td>
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
<?php $this->load->view('usuarios/footer'); ?>

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

function excluir(id){
    var getUrl = window.location;
    // var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
    if(confirm('Deseja realmente excluir este ticket?')){
        var url = base_url + 'usuarios/tickets/excluir/' + id; 
        $.get(url,function(data){
            window.location.reload();
        });
    }
}

</script>