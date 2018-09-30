<?php $this->load->view('usuarios/header'); ?>
<link href="<?= base_url('css/login-user.css') ?>" rel="stylesheet">
<!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="62480693910-2b8b8hf1q0ngev212gq74vb1etu9glgj.apps.googleusercontent.com"> -->
<script src="https://apis.google.com/js/api:client.js"></script>

<body class="hold-transition register-page">
<div class="content-wrapper">
    <section class="content">
<div class="register-box">
 

  <div class="register-box-body">
    <p class="login-box-msg">Editar Perfil</p>

    <?= $this->message->get_user(); ?>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <img width="90" src=<?= $this->user->img ?> class="img-circle" alt="User Image">
        <label for="files" class="btn btn-info">Trocar Imagem</label>
        <input id="files" style="visibility:hidden;" name="imagemPerfil" type="file">        
      </div>
      <div class="form-group has-feedback">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required placeholder="Nome Completo" value="<?= $user->nome ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Usuario</label>
        <input type="text" name="usuario" class="form-control" required placeholder="Usuario" value="<?= $user->usuario ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>RA</label>
        <input type="text" name="ra" class="form-control" required placeholder="RA" value="<?= $user->ra ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required placeholder="Email" disabled value="<?= $user->email ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-8 col-md-offset-2 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-flat ">Editar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    </div>
</div>
</section>
</div>

<?php $this->load->view('usuarios/footer'); ?>


<script>


    function addPassword(){
        $('*').addClass('password'); 
    }

    function removePassword(){
        $('*').removeClass('password'); 
    }
</script>
