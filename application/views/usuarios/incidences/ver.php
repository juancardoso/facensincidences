<?php $this->load->view('usuarios/header'); ?> 
<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Incidência #<?= $incidence->id ?></h3>
            </div>

            <div class="box-body">
                <?php $this->message->get_admin(); ?>
                <div class="info-incidence panel-side panel col-sm-6">
                    <form class="form-group" method="post" href="#">
                        <div class="form-group col-sm-6">
                            <label for="usuario">Usuário</label>
                            <input type="text" class="form-control" id="usuario" value="<?= $incidence->usuario ?>" readonly/>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" value="<?= $incidence->titulo ?>" readonly/>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="localizacao">Localizacao</label>
                            <input type="text" class="form-control" id="localizacao" value="<?= $localizacoes[$incidence->id_localizacao] ?>" readonly/>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="departamento">Departamentos</label>
                            <input type="text" class="form-control" id="departamento" value="<?= $departamentos[$incidence->id_departamento] ?>" readonly/>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="descricao">Descrição</label>
                            <textarea rows="5" class="form-control" id="descricao" readonly> <?= $incidence->descricao ?> </textarea>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" value="<?= $status[$incidence->status] ?>" readonly/>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="imagem">Imagem(ns)</label>
                            <div class="row">
                                <?php foreach($imagens AS $imagem):?>
                                <div class="col-xs-2">
                                    <div class="border">
                                        <img width="100%" class="" src="<?= 'data:image/png;base64,'.$imagem->img ?>" alt="" />
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                    </form>
                </div>
                
                <div class="comment-incidence panel-side panel col-sm-6">
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

        </div>
    <!-- /.box -->
    </section>
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

    .incidence-actions{
     
    }
</style>

<script>

    $(function(){
        getComentarios();
    })

    function adicionarComentario(){
        var msg = $('#mensagem').val();
        var incidence = '<?= $incidence->id ?>';
        var getUrl = window.location;
        var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
        var url = base_url + 'usuarios/incidences/addComentarioAjax';

        $.post(url,{'mensagem':msg, 'incidence':incidence},function(data){
            $('#alert-comment').html(JSON.parse(data));
        }).done(function(){
            $('#mensagem').val('');
            getComentarios();
        });
    }

    function getComentarios(){
        var incidence = '<?= $incidence->id ?>';
        var getUrl = window.location;
        var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
        var url = base_url + 'usuarios/incidences/getComentariosAjax';

        $.post(url,{'incidence':incidence},function(data){
            data = JSON.parse(data);
            $('.comment-panel').empty()
            data.forEach(function(row){
                var user = (row.id_admin == '<?= json_decode($this->admin->id) ?>') ? 'comment-user' : '';
                $('.comment-panel').append('<div class="comment col-sm-12 '+user+'" id="comment-'+row.id+'">');
                $('#comment-'+row.id).append('<div class="row comment-header "><small><b>'+row.nome+'</b> '+row.data+'</small></div>');
                $('#comment-'+row.id).append('<div class="comment-msg badge badge-info">' + row.mensagem + '</div>');
                $('.comment-panel').append('</div>');
            });
        })
    }

</script>