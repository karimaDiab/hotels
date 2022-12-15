<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url()?>public/bootstrap/css/bootstrap-rtl.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url()?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>public/css/AdminLTE-rtl.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url()?>public/css/skins/_all-skins-rtl.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?= base_url()?>https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?= base_url()?>https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>



<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url()?>public/index2.html"><b>Admin</b>LTE</a>
  </div>
            <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?> 
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

                <?php echo form_open(base_url('auth/login'), 'class="login-form" '); ?>
      <div class="form-group has-feedback">
            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus value="">
       
      </div>
      <div class="form-group has-feedback">
                   <input type="password" class="form-control" name="password" placeholder="Password" required value="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="11">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>

  
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url()?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url()?>public/bootstrap/js/bootstrap-rtl.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url()?>public/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

