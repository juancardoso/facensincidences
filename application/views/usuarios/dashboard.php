<?php $this->load->view('usuarios/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Ultimas Incidencias</h4></div>
                        <div class="card-body">
                            <?php for($i = 0 ; $i < 4 ; $i++): ?>
                                <div class="row mt-2 ml-2">
                                    <div class="col-md-2">
                                        <img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px">
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <h5>Header Teste</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie rhoncus ligula eget facilisis. Nulla facilisi. Ut lobortis, mi a posuere tincidunt, elit mi pulvinar felis, egestas feugiat mauris ex at mi. Quisque rhoncus auctor vehicula. Duis euismod orci at dolor vehicula, eget vulputate massa euismod. Nunc ultrices augue at tellus porttitor, a dapibus est ullamcorper. Vivamus venenatis egestas eros aliquet fringilla. In et nisl quis sem congue facilisis. Vestibulum non varius lectus, in sodales justo. Aenean interdum, erat eu vulputate dignissim, felis lectus aliquam dolor, ut aliquam lorem odio at arcu. Sed eu rutrum libero. Praesent eleifend lorem nec massa rhoncus, et accumsan elit interdum. Fusce congue, tortor nec aliquet interdum, felis dolor scelerisque neque, in condimentum lectus dui ac ligula.</p>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Ultimas Incidencias Resolvidas</h4></div>
                        <div class="card-body">
                            <?php for($i = 0 ; $i < 4 ; $i++): ?>
                                <div class="row mt-2 ml-2">
                                    <div class="col-md-2">
                                        <img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px">
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <h5>Titulo</h5>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Ranking de Usuarios</h4></div>
                        <div class="card-body text-center">
                            <?php for($i = 1 ; $i < 13 ; $i++): ?>
                                <div class="row mt-2 ml-2">
                                        <div class="col-md-2">
                                            <h6><?= $i ?></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="http://placehold.it/60x60" width="90px" style="border-radius: 5px">
                                        </div>
                                        <div class="col-md-5">
                                            <p>User Name NAME NAME</p>
                                        </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<?php $this->load->view('usuarios/footer'); ?>