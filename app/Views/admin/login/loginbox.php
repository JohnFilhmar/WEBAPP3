<div class="login-box">
  <div class="login-logo">
    <a href="/login"><b>E-Commerce<b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-warning">
          <?= session()->getFlashdata('msg') ?>
        </div>
      <?php endif; ?>
      <form action="/auth_login" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span> 
            </div>
          </div>
        </div>
        <input type="submit" value="Login" class="btn btn-primary btn-block">
      </form><br>
        <div class="row">
            <div class="col">
                <a href="/home" class="btn btn-danger btn-block">Back</a>
            </div>
            <div class="col">
                <a href="/register" class="btn btn-primary btn-block">Create an Account</a>
            </div>
        </div>
    </div>
  </div>
</div>