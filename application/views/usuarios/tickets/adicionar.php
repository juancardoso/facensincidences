<?php $this->load->view('usuarios/header'); ?> 
<div class="content-wrapper">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cria Ticket</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="titulo" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp" placeholder="Adicione um título">
                    </div>
                    <div class="form-group">
                        <label for="localizacao">Localizacao</label>
                        <?= form_dropdown('localizacao', $localizacoes, 'large','id="localizacao" class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamentos</label>
                        <?= form_dropdown('departamento', $departamentos, 'large','id="departamento" class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descricao</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="imagem" id="imagem">
                    </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
          </div>
        </div>
          <!-- /.box -->
          </section>
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('usuarios/footer'); ?>