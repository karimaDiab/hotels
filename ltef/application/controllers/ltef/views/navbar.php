

<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>  الرئيسي</b></span>
    </a>
  <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
            <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking6/booking/bills')?>" target="_blank" class="btn btn-warning btn-flat">ريحانة  </a></div>
       
      <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking5/booking/bills')?>" target="_blank" class="btn btn-warning btn-flat">الشعب  </a></div>
            
            
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking2/booking/bills')?>" target="_blank" class="btn btn-warning btn-flat">السالمية  </a></div>
            
            
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking4/booking/bills')?>" target="_blank" class="btn btn-warning btn-flat">الرقعي  </a></div>
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking8/booking/bills')?>" target="_blank" class="btn btn-warning btn-flat">الفنطاس  </a></div>
             <div  class="" style="float: right
            ;margin-right: 10px;margin-top: 5px">   <a href="<?=base_url('../booking/booking/bills')?>" target="_blank" class="btn btn-warning btn-flat">حولي  </a></div>
        <ul class="nav navbar-nav" style="float: left">
          <!-- Messages: style can be found in dropdown.less-->
     
          <!-- Notifications: style can be found in dropdown.less -->
   
          <!-- Tasks: style can be found in dropdown.less -->
    
          <!-- User Account: style can be found in dropdown.less -->
       
            <li class="dropdown user user-menu">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <span class="hidden-xs">مرحبا بك :<?=$this->session->userdata('name')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               
             
              </li>
              <!-- Menu Body -->
          
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('auth/logout/')?><" class="btn btn-default btn-flat">خروج  </a>
                </div>
              </li>
            </ul>
          </li>
          <li style="    font-size: 18px;
    padding: 10px;
    color: white;">
      <?=date("  i :H   - D", $this->booking->tissme_now())?>
          </li>
        </ul>
      
      </div>
     
    </nav>
    <!-- Header Navbar: style can be found in header.less -->

  </header>

    <?php 
  
 
  ?>
  <br><br>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
 <br><br> <br><br>
      <!-- search form -->
       <form action="<?= base_url() ?>/ltef/clints/all" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="البحث في العملاء الفروع ..." >
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
          <a href="<?=base_url('ltef/index/')?>">
            <i class="fa fa-home"></i> <span>الرئيسية</span>
       
          </a>
        </li>
        <li class="header">القائمة </li>
        
          
        
             <li>
          <a href="<?=base_url('ltef/bills/')?>">
            <i class="fa fa-dollar"></i> <span>الفواتير</span>
       
          </a>
        </li>
          <li>
          <a href="<?=base_url('ltef/cach/')?>">
            <i class="fa fa-dollar"></i> <span>الكاش</span>
       
          </a>
        </li>
        
         <li>
          <a href="<?=base_url('ltef/cach2/')?>">
            <i class="fa fa-dollar"></i> <span>  التصدير  </span>
       
          </a>
        </li>
        
            <li>
          <a href="<?=base_url('ltef/salry/')?>">
            <i class="fa fa-dollar"></i> <span>المعتمدين</span>
       
          </a>
        </li>
      
             <li>
          <a href="<?=base_url('ltef/modif/')?>">
            <i class="fa fa-dollar"></i> <span>الموظفين</span>
       
          </a>
        </li>
          <li>
          <a href="<?=base_url('ltef/altzam')?>">
            <i class="fa fa-dollar"></i> <span>الالتزامات</span>
       
          </a>
        </li>
               <li>
          <a href="<?=base_url('ltef/payment')?>">
            <i class="fa fa-dollar"></i> <span>مدفوعات اون لاين</span>
       
          </a>
        </li>
          <li class="header"> الاضافات </li> 
           <li>
          <a href="<?=base_url('ltef/files')?>">
            <i class="fa fa-dollar"></i> <span>الملفات</span>
       
          </a>
        </li>
           <li>
          <a href="<?=base_url('ltef/subscriptions')?>">
            <i class="fa fa-dollar"></i> <span>الباقات</span>
       
          </a>
        </li>
             <li>
          <a href="<?=base_url('ltef/check')?>">
            <i class="fa fa-dollar"></i> <span>الشيكات</span>
       
          </a>
        </li>
           <li>
          <a href="<?=base_url('ltef/wasel')?>">
            <i class="fa fa-dollar"></i> <span>الوصلات</span>
       
          </a>
        </li>
           <li>
          <a href="<?=base_url('ltef/deyoon')?>">
            <i class="fa fa-dollar"></i> <span>الديون</span>
       
          </a>
        </li>
          <li>
          <a href="<?=base_url('ltef/shaab')?>">
            <i class="fa fa-dollar"></i> <span>عماره جديدة</span>
       
          </a>
        </li>
        
  
        
        
              <li class="header"> الاضافات </li>       
     
        
            <li>
                <a href="<?= base_url('ltef/users/') ?>">
                    <i class="fa fa-users"></i> <span>الاعضاء </span>

                </a>
            </li>
         
       
         </ul>
    </section>
    <!-- /.sidebar -->
  </aside>