

<header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url('auth/logout/') ?>/booking/dashboard" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b> الشقق الفندقية</b></span>
    </a>
    <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Sidebar toggle button-->
     
        <!-- Navbar Right Menu -->

       <?php if($this->session->userdata('name')=='aln3esa'  or $this->session->userdata('name')=='tareq' or $this->session->userdata('name')=='الراشد'):
       
       $this->load->helper('url');


$currentURL = uri_string();

       
     
                      

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking6/')) {
       ?>
                 
                        <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking6/'.uri_string())?>"  class="btn btn-warning btn-flat">ريحانة  </a></div>
       
        <?php
                        }ELSE
                        {
                             ?>
                 
                        <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking6/'.uri_string())?>"  class="btn btn-success btn-flat">ريحانة  </a></div>
       
        <?php
                            
                        }

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking5/')) {?>
      <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking5/'.uri_string())?>"  class="btn btn-warning btn-flat">الشعب  </a></div>
             <?php
                        }
                        ELSE
                        {
                             ?>
                 
                          <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking5/'.uri_string())?>"  class="btn btn-success btn-flat">الشعب  </a></div>
       
        <?php
                            
                        }

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking2/')) {?>
            
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking2/'.uri_string())?>" class="btn btn-warning btn-flat">السالمية  </a></div>
            
             <?php
                        }ELSE
                        {
                             ?>
                 
                    
               <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking2/'.uri_string())?>" class="btn btn-success btn-flat">السالمية  </a></div>
        <?php
                            
                        }

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking4/')) {?>
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking4/'.uri_string())?>" class="btn btn-warning btn-flat">الرقعي  </a></div>
             <?php
                        }ELSE
                        {
                             ?>
                       <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking4/'.uri_string())?>" class="btn btn-success btn-flat">الرقعي  </a></div>
                    
       
        <?php
                            
                        }

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking/booking/')) {?>
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking/'.uri_string())?>"  class="btn btn-warning btn-flat">حولي  </a></div>
             <?php
                        }ELSE
                        {
                             ?>
                 
                    
           <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking/'.uri_string())?>"  class="btn btn-success btn-flat">حولي  </a></div>
        <?php
                            
                        }
                        
                                if (!@stristr($_SERVER['REQUEST_URI'], '/booking7/booking/')) {?>
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking7/'.uri_string())?>"  class="btn btn-warning btn-flat">حولي الجديدة  </a></div>
             <?php
                        }ELSE
                        {
                             ?>
                 
                           <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking7/'.uri_string())?>"  class="btn btn-success btn-flat">حولي الجديدة  </a></div>
       
        <?php
                            
                        }
                        
                             if (!@stristr($_SERVER['REQUEST_URI'], '/booking8/booking/')) {
                             ?>
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking8/'.uri_string())?>"  class="btn btn-warning btn-flat">الفنطاس  </a></div>
             <?php
                        }ELSE
                        {
                             ?>
                 
                             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking8/'.uri_string())?>"  class="btn btn-success btn-flat">الفنطاس  </a></div>    
       
        <?php
                            
                        }
                        ?>

               
                 <?php endif;?>
        <div  class="navbar-custom-menu">
            
          
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->

                <!-- Tasks: style can be found in dropdown.less -->

                <?php
            
$this->db->from('booking_msg');
$this->db->where("idmsg=0");
$this->db->not_like('user',"||". $this->session->userdata('name'));
$count_msgs=  $this->db-> count_all_results();
                
$this->db->from('booking_msg');
$this->db->where("idmsg=0");
$this->db->limit('5');
$this->db->order_by('id', 'desc');

$all_msgs = $this->db->get()->result_array();
                
                ?>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown messages-menu ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?=$count_msgs?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"> يوجد  <?=$count_msgs?>جديده </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                            <?php $count=0; foreach($all_msgs as $row):?>
                                    <li><!-- start message -->
                                        <a href="<?= base_url('booking/Dashboard/readmsg/'.$row['id']) ?>">
                                          
                                            <h4>
                                                <?=$row['title']?>
                                                <small></small>
                                            </h4>
                                            <p><i class="fa fa-clock-o"></i> <?= $this->booking->tissme_show($row['dateadd']); ?></p>
                                        </a>
                                    </li>
                                     <?php endforeach; ?>
                                    <!-- end message -->
                                    
                                </ul></div>
                        </li>
                        <li class="footer"><a href="<?= base_url('booking/Dashboard/msgs/') ?>">جميع الرسايل</a></li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">مرحبا بك :</span><?= $this->session->userdata('name') ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">


                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('auth/change_pwd/') ?>" class="btn btn-default btn-flat">تغير الباسورد</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('auth/logout/') ?>" class="btn btn-default btn-flat">خروج  </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li style="    font-size: 18px;
                    padding: 10px;
                    color: white;">
                    <?= date("  i :H   - D d", $this->booking->tissme_now()) ?>
                </li>
            </ul>
        </div>

    </nav>
    <!-- Header Navbar: style can be found in header.less -->

</header>

<?php
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
<br><br><br><br>
        <!-- search form -->
        <form action="<?= base_url() ?>/booking/clints/all" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="البحث في العملاء  ..." >
                <span class="input-group-btn">
                    <button type="submit"id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li>
                <a href="<?= base_url('booking/Dashboard/') ?>">
                    <i class="fa fa-home"></i> <span>الرئيسية</span>

                </a>
            </li>
            <li class="header">القائمة </li>



            <li>
                <a href="<?= base_url('booking/bills/') ?>">
                    <i class="fa fa-dollar"></i> <span>الفواتير</span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/rooms/') ?>">
                    <i class="fa fa-home"></i> <span>الشقق</span>

                </a>
            </li>



            <li>
                <a href="<?= base_url('booking/clints/') ?>">
                    <i class="fa fa-th"></i> <span>العملاء</span>

                </a>
            </li>
                <li>
                <a href="<?= base_url('booking/lost/') ?>">
                    <i class="fa fa-th"></i> <span>المفقودات</span>

                </a>
            </li>
            <li class="header"> الحركات </li> 
             <li>
                <a href="<?= base_url('booking/show/allday') ?>">
                    <i class="fa fa-calendar"></i> <span>  التقويم</span>

                </a>
            </li> 
            <li>
                <a href="<?= base_url('booking/show/knet') ?>">
                    <i class="fa fa-credit-card"></i> <span> الكي نت</span>

                </a>
            </li>   <li>
                <a href="<?= base_url('booking/show/bookingcom') ?>">
                    <i class="fa fa-sitemap"></i> <span> حجوزات بوكنق</span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/show/roomsfinsh') ?>">
                    <i class="fa fa-sign-out"></i> <span>  حركات الخروج </span>

                </a>
            </li>

            <li>
                <a href="<?= base_url('booking/show/roomsmove') ?>">
                    <i class="fa fa-sign-out"></i> <span>  حركات النقل </span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/show/waitproblem') ?>">
                    <i class="fa fa-calendar-times-o"></i> <span>غرامات التاخير</span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/show/waitbill') ?>">
                    <i class="fa  fa-balance-scale"></i> <span> ايجار لم يسترد</span>

                </a>
            </li>

            <li>
                <a href="<?= base_url('booking/show/all3gd/') ?>">
                    <i class="fa fa-pie-chart"></i> <span>العقود</span>

                </a>
            </li>  
            <li>
                <a href="<?= base_url('booking/show/allnot/') ?>">
                    <i class="fa fa-warning"></i> <span>الملاحظات</span>

                </a>
            </li>
                  <li>
                <a href="<?= base_url('booking/rating/') ?>">
                    <i class="fa fa-warning"></i> <span>التقيم</span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/show/billdown/') ?>">
                    <i class="fa fa-warning"></i> <span>تسكين اقل من 35</span>

                </a>
            </li>
            <li class="header"> الاضافات </li>   
                  <li>
                <a href="<?= base_url('booking/bills3/') ?>">
                    <i class="fa  fa-plus-circle"></i> <span>الموردين </span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/checkroom/') ?>">
                    <i class="fa  fa-plus-circle"></i> <span>الصيانة </span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/checkall/') ?>">
                    <i class="fa fa-check"></i> <span>التفتيش </span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/raoter/') ?>">
                    <i class="fa fa-users"></i> <span>الاشتراكات </span>

                </a>
            </li>

            <li>
                <a href="<?= base_url('booking/users/') ?>">
                    <i class="fa fa-users"></i> <span>الاعضاء </span>

                </a>
            </li>
            <li>
                <a href="<?= base_url('booking/Modif/') ?>">
                    <i class="fa fa-users"></i> <span> الموظفين </span>

                </a>
            </li>


            <li>
                <a href="<?= base_url('booking/gyab/') ?>">
                    <i class="fa fa-users"></i> <span>الحضور والانصراف </span>

                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>