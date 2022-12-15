

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/bills3/')?>">الموردين</a></li>
      </ol>
    </section>
<div class="row">

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $this->thispage ?>/add/<?= $show['id']; ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة فاتورة</a> 	</div>



    </div>

 
</div>
  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  عرض مورد </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                    <th  colspan="6">البيانات</th>
                 
                             </tr>
                
               <tr>
                   <td>الاسم</td>
                  <td><?= $show['name']; ?></td>
                       <td>التيلفون</td>
                        <td><?= $show['text1']; ?></td>
                   
                
                      <td>التاريخ</td>
                      <td><?= $show['dateadd']; ?> </td>
                
            
             
                    
                       </tr>
                   
                
               <tr>
                
             
                   
                 
           
                </tr>
              
                
                
              </table>
                
            </div>
        
          </div>
         </div>
     </div>
         <div class="row">

    <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer">
                <div class="row">



                 
                  <table class="table table-bordered">
       
                
               <tr>
                   <td>
                       
                          <h5 class="description-header"><?= $totall5 ?></h5>
                            <span class="description-text">  اجمالي الطلبات </span>
                       </td>
                  <td>
                      
                       <h5 class="description-header"><?=$totall2 ?></h5>
                            <span class="description-text">  المدفوع </span>
                      
                      </td>
                      <td>
                              <h5 class="description-header"><?= $totall2-$totall3 ?></h5>
                            <span class="description-text">  المتبقي </span> 
                          
                     </td>
                  <td>
                      
                       <h5 class="description-header"><?= $totall ?></h5>
                            <span class="description-text"> المطلوب الحالي</span>
                      </td>
               </tr></table>
                      
                 
                
               
                
                
                </div>      </div>      </div>       </div>
                    
  <div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">الفواتير  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <table class="table table-bordered" style="max-width:100%">
                        <tr>
                            <th style="width: 10px">الرقم</th>
                            <th>الرصيد</th>     
                            <th>المبلغ</th>
                            <th>الوصف</th>
                                        
                            <th>النوع</th> 
                            <th>التاريخ</th>
                                 <th></th>
                            <th style="width: 40px"></th>
                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row):
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['text5']; ?> </td>
                                <td><?= $row['text1']; ?> </td>
                                <td><?= $row['text2']; ?> </td>





                                <td><?= $row['gruop']; ?> </td>
                           
                                <td><?= $row['dateadd']; ?> </td>  
    <td><?php 
    
    if($row['catid']==7 or $row['catid']==3)
    {
        
  ////echo ' <a title="Edit" class="update btn btn-sm btn-success  pull-right" href="'.base_url('booking/' . $this->thispage . '/backb/' . $row['id']).'"><i class="material-icons">استراجع</i></a>'  ;    
        
    }
    
    $row['dateadd']; ?> </td>  


                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/show/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                </td>



                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>
</div>


          <!-- /.box -->
      


   
</div>