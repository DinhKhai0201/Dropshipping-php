<?php include_once 'views/admin/layout/headerLogin.php'; ?>

<body class="hold-transition login-page">
  <div class="login-box-body login-page col-lg-12 .col-sm-12 login-padding">
    <div class="login-logo text-center">
      <p><img src="<?php echo RootREL; ?>media/img/logods.png" style='max-width:400px' alt=""></p>
    </div>
    <div class="row">
      <div class="col-lg-4 .col-sm-4 ">
      </div>
      <div class="col-lg-4 .col-sm-4 text-center">
        <div class="form-group has-feedback bg-danger">
          <?php if ($this->errors) { ?>
            <h4>Oh snap! You got an error!</h4>
            <p><?= $this->errors['input']; ?></p>
          <?php } ?>
        </div>
        <form method="post" action="<?php echo vendor_app_util::url(array('ctl' => 'login')); ?>">
          <div class="form-group has-feedback">
            <input type="email" id="email" class="form-control" name="user[email]" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback ic"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" class="form-control" name="user[password]" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback ic"></span>
          </div>
          <div class="form-group has-feedback text-left">
            <input type="checkbox" id="checkbox_1" name="remember" value="single" aria-invalid="false" style="display:none">
            <label for="checkbox_1"> Ghi nhớ đăng nhập</label>
          </div>
          <div class="form-group has-feedback">
            <button type="submit" class="btn btn-primary " name="btn_submit">Đăng nhập</button>
          </div>
        </form>
      </div>
      <div class="col-lg-4 .col-sm-4 ">
      </div>
    </div>
  </div>

  <script src="<?php echo RootREL; ?>media/js/jquery.min.js"></script>
  <script src="<?php echo RootREL; ?>media/libs/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo RootREL; ?>media/js/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
      });
    });
  </script>

</body>

</html>