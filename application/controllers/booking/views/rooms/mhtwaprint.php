
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

    
   



<body   onload="swindow.print();">



 

 <div style="text-align: center">
 <h1>
     
    محتويات شقة : <?=$room['name']?> </h1>
 
  </div>

 <div class="row">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                
                    <!-- /.box-header -->
                    <div class="box-body">
                     <table border="1"  cellspacing="0" cellpadding="0"  class="show_tbl" style="width: 90%;margin: 20px;" dir="rtl"  >

	

               	<tr>

			<td  colspan="10" style="background-color: #DDD9C4;">

			<div align="center">

				<font class="fonttable">المحتويات</font></div>

			</td>

	

    

		</tr>

        

        	<tr  style="background-color: #FABF8F;">

            

		

			<td >

			الصنف 

			</td>

		
	

 	
		

			<td  >

			الحالة

			</td>

		

		
   	

		

			<td >

		الصنف 

			</td>

		
	
	

		

			<td  >

			الحالة

			</td>

		

			<td >

			الصنف 

			</td>

		
	
	

		

			<td  >

			الحالة

			</td>

		

		

 	</tr>
<tr>
                            <?php  
                            $i=1;
                            $rowd6='';
                         foreach ($all_groups as $row): ?>

 <?php if($rowd6!=$row['noa']){
     
       echo "	</td>		</tr>  <tr>	<td  colspan=10 style='background-color: #8EB3E3;' align='center'> <div ><strong>".$row['noa']."</strong>	</div> </td  ></tr>	";
      $rowd6= $row['noa'];
 }
 ?>
                                
                           
                              
    <td><?= $row['text1']; ?></td>
                                    <td><?= $row['com']; ?> </td>
                             
                                  
       

                              
                                   
                                   
                            

<?php 
if(($i)%3==0)echo  "</tr><tr   class='alt2'>";
        
$i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->


          
                <!-- /.box -->
            </div>
        </div>
</div>




      <!-- /.row -->
  



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
