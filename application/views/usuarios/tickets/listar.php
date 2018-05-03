<?php $this->load->view('usuarios/header'); ?> 
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4>Meus Ticket</h4>
            </div>
            <?php $this->session->flashdata('item'); ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Localização</th>
                    <th>Descricao</th>
                    <th>Status</th>
                </tr>
                <?php foreach($tickets as $row): ?>
                    <tr>
                        <td><?= $row->id ?></td>
                        <td><?= $row->titulo ?></td>
                        <td><?= $row->localizacao ?></td>
                        <td><?= $row->descricao ?></td>
                        <td><?= $row->status ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php $this->load->view('usuarios/footer'); ?>