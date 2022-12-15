<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> | شقق ماجيستك</title>
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
<style>
    .box-body {
   white-space: nowrap;
   overflow-x: auto;
   -webkit-overflow-scrolling: touch;
        }
        .table-bordered{
            max-width: none;
        }
        
    @media print{
        .box-body
        {
                overflow-x: visible;
        }
        .main-sidebar{
            display: none;
        }
            .btn{
            display: none;
        }
        .main-header{
            display: none;
        }
        .box-body {
 
    overflow-x: inherit;
        }
         a[href]:after {
    content: none !important;
  }
    }
    

    </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    
    	<?php include('navbar.php'); ?>	

  <!-- Left side column. contains the logo and sidebar -->
  

  
    <div class="content-wrapper">
      <section class="content-header">

		<?php if($this->session->flashdata('msg') != ''): ?>
		    <div class="alert alert-success flash-msg alert-dismissible">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
		   
		      <?= $this->session->flashdata('msg'); ?> 
		    </div>
		<?php endif; ?> 
  <section class="content">
		<!-- main content start-->
		<?php $this->load->view($view);?>
		<!-- end-->		
   </section>  </section>
    <!-- /.content -->
  </div>
  <!-- Content Wrapper. Contains page content -->

  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.5
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url()?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url()?>public/bootstrap/js/bootstrap-rtl.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url()?>public/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>public/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url()?>public/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url()?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url()?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url()?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= base_url()?>public/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url()?>public/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>public/js/demo.js"></script>
</body>
</html>
