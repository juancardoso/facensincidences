<?php $this->load->view('header'); ?>
<link href="<?= base_url('css/signin.css') ?>" rel="stylesheet">
    <div class="container">
        <div class="panel panel-default form-signin">
            <div class="panel-header text-center">
                <!-- <h3>Login</h3> -->
            </div>
            <?php if($errorLogin): ?>
                <div class="alert alert-danger" role="alert">
                    Usuario ou senha nao encontrado
                </div>
            <?php endif; ?>
            <div class="panel-block">
                <form class="form-group" method="post">
                    <!-- <label for="inputEmail" class="sr-only">Email address or Username</label> -->
                    <input type="text" id="inputEmail" name="login" class="form-control <?= form_error('login')? 'is-invalid' : '' ?>" placeholder="E-mail address or Username" autofocus value="<?= set_value('login') ?>">
                    <!-- <label for="inputPassword" class="sr-only">Password</label> -->
                    <input type="password" id="inputPassword" name="password" class="form-control mt-2 <?= form_error('password')? 'is-invalid' : '' ?>" placeholder="Password">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>

<style>
body { 
  background: url(<?= base_url('images/engrenagem.svg'); ?>) no-repeat center center fixed; 
  background-size: 1000px 1000px;   
}
</style>

<?php $this->load->view('footer'); ?>