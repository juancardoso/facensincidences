<?php $this->load->view('usuarios/header'); ?> 
    <div class="container">
        <form method="post" style="margin-top: 50px">
        <div class="card">
            <div class="card-header text-center">
                <h4>Criar Ticket</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="offset-md-3">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="titulo" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp" placeholder="Adicione um título">
                            </div>
                            <div class="form-group">
                                <label for="localizacao">Localizacao</label>
                                <?php $options = array(""=> "Selecione","1" => "Predio A","2" => "Predio B","3" => "Predio C");
                                echo form_dropdown('localizacao', $options, 'large','id="localizacao" class="custom-select"'); ?>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categorias</label>
                                <?php $options = array(""=> "Selecione","1" => "Categoria 1","2" => "Categoria 2","3" => "Categoria 3");
                                echo form_dropdown('categoria', $options, 'large','id="categoria" class="custom-select"'); ?>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descricao</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        </form>
    </div>
<?php $this->load->view('usuarios/footer'); ?>