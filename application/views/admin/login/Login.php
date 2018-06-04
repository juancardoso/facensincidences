<?php $this->load->view('header'); ?>
<link href="<?= base_url('css/login-admin.css') ?>" rel="stylesheet">
<link href="<?= base_url('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('bower_components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('bower_components/Ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('dist/css/AdminLTE.min.css') ?>" rel="stylesheet">
    
<div class="Login">
    <div class="owl">
        <div class="hand"></div>
        <div class="hand hand-r"></div>
        <div class="arms">
            <div class="arm"></div>
            <div class="arm arm-r"></div>
        </div>
    </div>
    <div class="form">

        <div class="app-logo">
        </div>

        <?= $this->message->get_admin(); ?>

        <form class="form-group" method="post">
                <div class="form-group has-feedback">
                <input type="text" id="login" name="login" class="form-control" placeholder="Usuário">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" name="password" onFocus='addPassword()' onBlur='removePassword()' placeholder="Senha" type="password" class="form-control">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
        </form>
    </div>
</div>

<?php $this->load->view('footer'); ?>

<script>

    function addPassword(){
        $('*').addClass('password'); 
    }

    function removePassword(){
        $('*').removeClass('password'); 
    }

</script>