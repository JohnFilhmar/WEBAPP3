<div class="register-box">
  <div class="register-logo">
    <a href="/register"><b>Create</b>Account</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new username and password</p>
      <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-warning">
          <?= session()->getFlashdata('msg') ?>
        </div>
      <?php endif; ?>
      <form action="/createaccount" method="post">
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
        <input type="submit" value="Submit" class="btn btn-primary btn-block">
        <a href="/login" class="btn btn-danger btn-block">Back</a>
      </form><br>
    </div>
  </div>
</div>