<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link href="<?= base_url('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('bower_components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('bower_components/Ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('dist/css/AdminLTE.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
          <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script>

          // base_url = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname.split('/')[1] + '/';
          base_url = "<?= base_url(); ?>";
        </script>
        <title>Facens Incidences</title>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
    <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= base_url('usuarios/Dashboard'); ?>" class="navbar-brand">FACENS INCIDENCES</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?= $active === 'dashboard' ? 'active' : '' ?>"><a href="<?= base_url('usuarios/dashboard') ?>" onclick="bloquear()">Home <span class="sr-only">(current)</span></a></li>
            <li class="<?= $active === 'listarIncidencias' ? 'active' : '' ?>"><a href="<?= base_url('usuarios/incidences/listar') ?>" onclick="bloquear()">Listar Incidências</a></li>
            <li class="<?= $active === 'criarTicket' ? 'active' : '' ?>"><a href="<?= base_url('usuarios/tickets/adicionar') ?>" onclick="bloquear()">Criar Ticket</a></li>
            <li class="<?= $active === 'meusTicket' ? 'active' : '' ?>"><a href="<?= base_url('usuarios/tickets/listar') ?>" onclick="bloquear()">Meus Tickets</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src=<?= $this->user->img ?> class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">
                    <?php 
                        $nome = explode(' ',$this->user->nome); 
                        echo $nome[0];
                     ?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src=<?= $this->user->img ?> class="img-circle" alt="User Image">
                  <p>
                    <?= $this->user->nome; ?>
                    <small><?= $this->user->usuario; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('usuarios/dashboard/editarPerfil'); ?>" class="btn btn-default btn-flat">Editar Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="<?= base_url('usuarios/login/sair'); ?>">Sair</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
</header>
