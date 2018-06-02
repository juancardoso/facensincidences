<?php $this->load->view('admin/header'); ?> 
<div class="content-wrapper">
    <section class="content">

            <?php $this->message->get_admin(); ?>

            <div><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalAdicionar">Adicionar</button></div>

            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Departamentos</h3>
            </div>
            <!-- /.box-header -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Data Criação</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($departamentos as $row): ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->nome ?></td>
                                <td><?= $row->data ?></td>
                                <td><?= $row->status ?></td>
                                <td><a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalEditar" data-id="<?= $row->id ?>" href="#">Editar</a></td>
                                <td><a class="btn btn-sm btn-danger" onclick="excluir(<?= $row->id ?>)" href="#">Excluir</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tdoby>
                </table>
            <!-- /.box-body -->
            </div>
        <!-- /.box -->

   </section>
</div>

    <!-- Modal -->
    <div id="modalAdicionar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Novo Departamento</h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" id="nome" name="nome" placeholder="Digite o nome do departamento." />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" onclick="adicionar()">Salvar</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
        </div>

    </div>
    </div>

    <div id="modalEditar" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Editar Departamento</h4>
        </div>
        <div class="modal-body">
            <input class="form-control" type="text" id="novo_nome" name="novo_nome" placeholder="Digite o novo nome para o departamento." />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" onclick="editar()">Salvar</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
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
            { width: 100, targets: [0,2,3,4,5] },
            { width: 300, targets: [1] },
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Portuguese-Brasil.json"
        },
        "dom": 'Bfrtip',
        "buttons":[
            { "extend": 'csvHtml5', "text": 'CSV' }
        ],
    });

    $('#modalEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        id = button.data('id');
    });

});

function adicionar(){
    var nome = $('#nome').val();
    var url = base_url + "admin/departamentos/adicionar";
    if(!nome){
        alert('Digite um nome para o departamento!');
    }else{
        $.post(url, {nome: nome}, function(data){
            data = JSON.parse(data);
            if(typeof(data) == 'object'){
                table.fnAddData([
                    data.id,
                    data.nome,
                    data.data,
                    data.status,
                    '<td><a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalEditar" data-id="'+data.id+'" href="#">Editar</a></td>',
                    '<td><a class="btn btn-sm btn-danger" onclick="excluir('+data.id+')" href="#">Excluir</a></td>'
                ]);
                $('#nome').val('');
            }else{
                alert(data);
            }
        });
    }
}

function editar(){
    var novo_nome = $('#novo_nome').val();
    var url = base_url + "admin/departamentos/editar";
    if(!novo_nome){
        alert('Digite um nome para o departamento!');
    }else{
        $.post(url, {id: id, nome: novo_nome}, function(data){
            window.location.reload();
        });
    }
}

function excluir(id_excluir){
    var url = base_url + "admin/departamentos/excluir";
    if(confirm("Deseja realmente excluir este departamento?")){
        $.post(url, {id: id_excluir}, function(data){
            window.location.reload();
        });
    }
}

</script>