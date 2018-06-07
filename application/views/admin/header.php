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
          base_url = "<?= base_url() ?>";

        </script>
        <title>Facens Incidences</title>
    </head>
    <body class="hold-transition skin-red layout-top-nav">
    <div class="wrapper">
    <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?= base_url('admin/Dashboard'); ?>" class="navbar-brand">FACENS INCIDENCES</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?= $active === 'dashboard' ? 'active' : '' ?>"><a href="<?= base_url('admin/dashboard') ?>">Home <span class="sr-only">(current)</span></a></li>
            <li class="<?= $active === 'incidences' ? 'active' : '' ?>"><a href="<?= base_url('admin/incidences/listar') ?>">Incidências</a></li>
            <li class="<?= $active === 'tickets' ? 'active' : '' ?>"><a href="<?= base_url('admin/tickets/listar') ?>">Tickets</a>
            <li class="<?= $active === 'departamentos' ? 'active' : '' ?>"><a href="<?=base_url('admin/departamentos/listar') ?>">Departamentos</a>
            <li class="<?= $active === 'localizacoes' ? 'active' : '' ?>"><a href="<?= base_url('admin/localizacoes/listar') ?>">Localizações</a>
            <li class="<?= $active === 'usuarios' ? 'active' : '' ?>"><a href="<?= base_url('admin/usuarios/listar') ?>">Usuários</a>
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
                <img src=<?= $this->admin->img ?> class="user-image" alt="admin Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">
                    <?php 
                        $nome = explode(' ',$this->admin->nome); 
                        echo $nome[0];
                     ?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src=<?= $this->admin->img ?> class="img-circle" alt="admin Image">
                  <p>
                    <?= $this->admin->nome; ?>
                    <small><?= $this->admin->usuario; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('admin/dashboard/editarPerfil'); ?>" class="btn btn-default btn-flat">Editar Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="<?= base_url('admin/login/sair'); ?>">Sair</a>
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