<?php $this->load->view('admin/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Tickets Mais Antigos (Status: Aberto)</h4></div>
                        <div class="card-body">
                            <?php for($i = 0 ; $i < 4 ; $i++): ?>
                                <div class="row mt-2 ml-2">
                                    <div class="col-md-2">
                                        <img src="http://placehold.it/90x90" width="90px" style="border-radius: 5px">
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <h5>Header Teste</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie rhoncus ligula eget facilisis. Nulla facilisi. Ut lobortis, mi a posuere tincidunt, elit mi pulvinar felis, egestas feugiat mauris ex at mi. Quisque rhoncus auctor vehicula. Duis euismod orci at dolor vehicula, eget vulputate massa euismod. Nunc ultrices augue at tellus porttitor, a dapibus est ullamcorper. Vivamus venenatis egestas eros aliquet fringilla.</p>
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
                        <div class="card-header"><h4>Incidencias com Maior Prioridade</h4></div>
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
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"><h4>Tickets</h4></div>
                                <div class="card-body text-center">
                                    <?php for($i = 1 ; $i < 6 ; $i++): ?>
                                        <div class="row mt-2 ml-2">
                                                <div class="col-md-4">
                                                    <img src="http://placehold.it/60x60" width="90px" style="border-radius: 5px">
                                                </div>
                                                <div class="col-md-5">
                                                    <p>TITULO TITULO </p>
                                                </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"><h4>Tickets</h4></div>
                                <div class="card-body text-center">
                                    <?php for($i = 1 ; $i < 6 ; $i++): ?>
                                        <div class="row mt-2 ml-2">
                                                <div class="col-md-4">
                                                    <img src="http://placehold.it/60x60" width="90px" style="border-radius: 5px">
                                                </div>
                                                <div class="col-md-5">
                                                    <p>TITULO TITULO </p>
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
    </div>
</div>
<?php $this->load->view('admin/footer'); ?>