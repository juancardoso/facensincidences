<?php $this->load->view('header'); ?>
    <div class="container">
        <div class="panel panel-default form-signin">
            <div class="panel-header text-center">
                <h3>Login</h3>
            </div>
            <div class="panel-block">
                <form class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
                </form>  
            </div>
        </div>
    </div>

<style>
body { 
  background: url(<?= base_url('images/engrenagem.svg'); ?>) no-repeat center center fixed; 
  //background-size: cover;
}
</style>

<?php $this->load->view('footer'); ?>