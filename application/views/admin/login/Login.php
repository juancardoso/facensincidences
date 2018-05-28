<?php $this->load->view('header'); ?>
<link href="<?= base_url('css/login-admin.css') ?>" rel="stylesheet">
    
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
            <div class="control">
                <label for="login" class="fa fa-envelope"></label>
                <input id="login" name="login" placeholder="Usuário" type="text"></input>
            </div>
            <div class="control">
                <label for="password" class="fa fa-asterisk"></label>
                <input id="password" name="password" onFocus='addPassword()' onBlur='removePassword()' placeholder="Senha" type="password"></input>
            </div>
            <div>
                <button type="submit" class="btn btn-sm btn-primary login-btn">Entrar</button>
                <!-- <button href="#" class="btn btn-sm btn-info forgot-pass-btn">Esqueci minha senha</button> -->
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