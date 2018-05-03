<?php $this->load->view('admin/header'); ?> 

    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Ticket #<?= $ticket->id ?></h4>
            </div>

            <div class="panel">
                <?php $this->message->get(); ?>
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
                        <textarea rows="5" class="form-control" id="descricao" value="<?= $ticket->descricao ?>" readonly> </textarea>
                    </div>

                </div>

                <div class="comment-ticket panel-side panel col-sm-6">
                    <h4 class="center">Comentários</h4>

                    <div>
                        <textarea class="form-control" rows="2"></textarea>
                        <a class="btn btn-sm btn-info" href="#" style="margin:5px;">Adicionar Comentário</a>
                        <a class="btn btn-sm btn-secondary" href="#" style="margin:5px;" title="Visibilidade"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>
                </div>

            </div>

            <div class="actions-ticket panel center col-sm-12">
                <a class="btn btn-md btn-success" href="#">Aprovar</a>
                <a class="btn btn-md btn-danger" href="#">Reprovar</a>
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
</style>