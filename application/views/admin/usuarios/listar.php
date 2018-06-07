<?php $this->load->view('admin/header'); ?> 
<div class="content-wrapper">
    <section class="content">

            <?php $this->message->get_admin(); ?>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Usuários</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuário</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>RA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($usuarios as $row): ?>
                            <tr>
                                <td><?= $row->user_id ?></td>
                                <td><?= $row->user_user ?></td>
                                <td><?= $row->user_name ?></td>
                                <td><?= $row->user_email ?></td>
                                <td><?= $row->user_ra ?></td>
                                <td><a class="btn btn-sm btn-danger" href="<?= base_url('admin/usuarios/excluirUsuario/'.$row->user_id) ?>"> Excluir</a></td>
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