<?php $this->load->view('admin/header'); ?> 

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Incidência #<?= $incidence->id ?></h4>
            </div>

            <div class="panel">
                <?php $this->message->get_admin(); ?>
                <div class="info-incidence panel-side panel col-sm-6">
                <form class="form-group" method="post" href="#">
                    <div class="form-group col-sm-6">
                        <label for="usuario">Usuário</label>
                        <input type="text" class="form-control" id="usuario" value="<?= $incidence->usuario ?>" />
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" value="<?= $incidence->titulo ?>" />
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="localizacao">Localização</label>
                        <input type="text" class="form-control" id="localizacao" value="<?= $incidence->localizacao ?>"  />
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" id="departamento" value="<?= $incidence->departamento ?>" />
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="descricao">Descrição</label>
                        <textarea rows="5" class="form-control" id="descricao" > <?= $incidence->descricao ?> </textarea>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="status">Status</label>
                        <?= form_dropdown('status',$status,$incidence->status,'class="form-control"') ?>
                    </div>

                
                    <div class="incidence-actions panel center col-sm-12">
                        <a class="btn btn-sm btn-success" href="#">Salvar</a>
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
                        <a class="btn btn-sm btn-secondary" href="#" onclick="toggleVisibility()" style="margin:5px;" id="btn-visible" title="Visibilidade"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>

                    <div class="panel-body comment-panel">
                        
                    </div>
                </div>

            </div>

        </div>
    </div>

<?php $this->load->view('admin/footer'); ?>

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

    function toggleVisibility(){
        var val = !$('#visible').is(':checked');
        $('#visible').prop('checked', val);

        if(val){
            $('#btn-visible').html('<i class="fa fa-eye-slash" aria-hidden="true">');
        }else{
            $('#btn-visible').html('<i class="fa fa-eye" aria-hidden="true">');
        }
    }

    function adicionarComentario(){
        var msg = $('#mensagem').val();
        var visible = $('#visible').is(':checked') ? 'ADM' : 'TODOS';
        var incidence = '<?= $incidence->id ?>';
        var getUrl = window.location;
        var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
        var url = base_url + 'admin/incidences/addComentarioAjax';

        $.post(url,{'mensagem':msg, 'visible':visible, 'incidence':incidence},function(data){
            $('#alert-comment').html(JSON.parse(data));
        }).done(function(){
            getComentarios();
        });
    }

    function getComentarios(){
        var incidence = '<?= $incidence->id ?>';
        var getUrl = window.location;
        var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/';
        var url = base_url + 'admin/incidences/getComentariosAjax';

        $.post(url,{'incidence':incidence},function(data){
            data = JSON.parse(data);
            $('.comment-panel').empty()
            data.forEach(function(row){
                var user = (row.id_admin == '<?= json_decode($this->admin->id) ?>') ? 'comment-user' : '';
                $('.comment-panel').append('<div class="comment col-sm-12 '+user+'" id="comment-'+row.id+'">');
                $('#comment-'+row.id).append('<div class="row comment-header "><small><b>'+row.usuario+'</b> '+row.data+'</small></div>');
                $('#comment-'+row.id).append('<div class="comment-msg badge badge-info">' + row.mensagem + '</div>');
                $('.comment-panel').append('</div>');
            });
        })
    }

</script>