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
                                <label for="email">Titulo</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Localizacao</label>
                                <?php $options = array(""=> "Selecione","um" => "Predio A","dois" => "Predio B","tres" => "Predio C");
                                echo form_dropdown('shirts', $options, 'large','id="categoria" class="custom-select"'); ?>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categorias</label>
                                <?php $options = array(""=> "Selecione","um" => "Categoria 1","dois" => "Categoria 2","tres" => "Categoria 3");
                                echo form_dropdown('shirts', $options, 'large','id="categoria" class="custom-select"'); ?>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descricao</label>
                                <textarea class="form-control" id="descricao" rows="3"></textarea>
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