<?php $this->load->view('header'); ?>
<link href="<?= base_url('css/login-user.css') ?>" rel="stylesheet">
<link href="<?= base_url('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('bower_components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('bower_components/Ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('dist/css/AdminLTE.min.css') ?>" rel="stylesheet">
<!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="62480693910-2b8b8hf1q0ngev212gq74vb1etu9glgj.apps.googleusercontent.com"> -->
<script src="https://apis.google.com/js/api:client.js"></script>
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

        <?= $this->message->get_user(); ?>

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

            <div class="social-auth-links text-center">
            <p>- OU -</p>
            <a href="#" id="customBtn" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Entre usando o
        Google+</a>
            </div>
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

      var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '62480693910-2b8b8hf1q0ngev212gq74vb1etu9glgj.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {
    console.log(element.id);
    auth2.attachClickHandler(element, {},
        function(googleUser) {
            var profile = googleUser.getBasicProfile();
            var url = "<?= base_url("/usuarios/login") ?>" ;
            $.post(url, {
                id: profile.getId(),
                name: profile.getName(), 
                img: profile.getImageUrl(),
                email: profile.getEmail() 
                }, function(result){
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function () {
                    console.log('User signed out.');
                    });
                    window.location = "<?= base_url("/usuarios/dashboard") ?>";
            });
          
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });
  }

  startApp();

</script>
