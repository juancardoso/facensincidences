<?php $this->load->view('header'); ?>
<link href="<?= base_url('css/login-user.css') ?>" rel="stylesheet">
<!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="62480693910-2b8b8hf1q0ngev212gq74vb1etu9glgj.apps.googleusercontent.com"> -->
<script src="https://apis.google.com/js/api:client.js"></script>

<body class="hold-transition register-page">
<div class="register-box">
 

  <div class="register-box-body">
    <p class="login-box-msg">Registrar</p>

    <?= $this->message->get_user(); ?>

      <div class="app-logo"></div>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nome" class="form-control" required placeholder="Nome Completo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="usuario" class="form-control" required placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="ra" class="form-control" required placeholder="RA">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" required placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="senha" class="form-control" required placeholder="Digite a Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="resenha" class="form-control" required placeholder="Digite a senha novamente">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-8 col-md-offset-2 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat ">Registrar</button>
          </br>
          <a href=<?= base_url("usuarios/Login") ?> class="text-center">Eu já sou registrado</a>
        </div>
        <!-- /.col -->
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
