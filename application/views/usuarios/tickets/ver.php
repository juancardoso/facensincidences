<?php $this->load->view('usuarios/header'); ?> 

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Ticket #<?= $ticket->id ?></h4>
            </div>

            <div class="panel">
                <?php $this->message->get_user(); ?>
                <div class="info-ticket panel-side panel col-sm-6">

                    <div class="form-group col-sm-6">
                        <label for="usuario">Usuário</label>
                        <input type="text" class="form-control" id="usuario" value="<?= $ticket->usuario ?>" readonly/>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" value="<?= $ticket->titulo ?>" readonly/>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="localizacao">Localização</label>
                        <input type="text" class="form-control" id="localizacao" value="<?= $ticket->localizacao ?>" readonly />
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="categoria">Categoria</label>
                        <input type="text" class="form-control" id="categoria" value="<?= $ticket->categoria ?>" readonly/>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="descricao">Descrição</label>
                        <textarea rows="5" class="form-control" id="descricao" readonly> <?= $ticket->descricao ?> </textarea>
                    </div>

                </div>

                <div class="comment-ticket panel-side panel col-sm-6">
                    <h4 class="center">Comentários</h4>
                    <div id="alert-comment"></div>
                    <div>
                        <textarea class="form-control" name="mensagem" id="mensagem" rows="2"></textarea>
                        <input id="visible" type="checkbox" value="0" hidden>
                        <a class="btn btn-sm btn-primary" href="#" onclick="adicionarComentario()" style="margin:5px;">Adicionar Comentário</a>
                    </div>

                    <div class="panel-body comment-panel">
                        
                    </div>
                </div>

            </div>

            <div class="ticket-actions panel center col-sm-12">
                <a class="btn btn-sm btn-danger" href="<?= base_url("usuarios/tickets/excluir/{$ticket->id}/1") ?>">Cancelar</a>
            </div>

        </div>
    </div>

<?php $this->load->view('usuarios/footer'); ?>

<style>
    .panel-side {
        position: relative;
        float:left;
        padding:10px;
    }

    .center {
        text-align:center;
    }

    .comment {
        margin:10px;
    }

    .comment-panel {
        background-color: #e9ecef;
        max-height: 370px;
        overflow-y: auto;
        overflow-x: hidden;
        border: 1px solid #ccc;
        border-radius: 16px;
    }

    .comment-header {
    }

    .comment-msg {
        margin:10px;
        font-size : 15px;
        font-style: italic;
        font-weight: lighter;
    }

    .comment-user {
        text-align: right;
    }

    .ticket-actions{
     
    }
</style>

<script>

    $(function(){
        getComentarios();
    })

    function adicionarComentario(){
        var msg = $('#mensagem').val();
        var ticket = '<?= $ticket->id ?>';
        var getUrl = window.location;
        var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
        var url = base_url + 'usuarios/tickets/addComentarioAjax';

        $.post(url,{'mensagem':msg, 'ticket':ticket},function(data){
            $('#alert-comment').html(JSON.parse(data));
        }).done(function(){
            getComentarios();
        });
    }

    function getComentarios(){
        var ticket = '<?= $ticket->id ?>';
        var getUrl = window.location;
        var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
        var url = base_url + 'usuarios/tickets/getComentariosAjax';

        $.post(url,{'ticket':ticket},function(data){
            data = JSON.parse(data);
            $('.comment-panel').empty()
            data.forEach(function(row){
                var user = (row.id_usuario == '<?= json_decode($this->user->id) ?>') ? 'comment-user' : '';
                $('.comment-panel').append('<div class="comment col-sm-12 '+user+'" id="comment-'+row.id+'">');
                $('#comment-'+row.id).append('<div class="row comment-header "><small><b>'+row.usuario+'</b> '+row.data+'</small></div>');
                $('#comment-'+row.id).append('<div class="comment-msg badge badge-info">' + row.mensagem + '</div>');
                $('.comment-panel').append('</div>');
            });
        })
    }

</script>