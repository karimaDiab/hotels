

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/modif/')?>">الموظفين</a></li>
      </ol>
    </section>



 <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> الحضور والانصرف  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="
    white-space: nowrap;
    direction: rtl;">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الرقم</th>
                  <th>الاسم</th>
                    <th>وقت الدخول</th>  
                 <th>الدخول</th>
                     <th>يوزر الحضور</th>
                       <th>وقت الخروج</th>    
                    <th>الخروج</th>     <th>يوزر الخروج</th>
                    
                     <th> المدة</th>
                    
                 
                       <th style="width: 40px"></th>
             </tr>
           
                     <?php $count=0; $day='1'; foreach($all_groups as $row):
                         
                         
                        $dayy= ((date('d',$row['enter'])-1)-intval($day));
                           if($day and $dayy>0)
                 {
                     
                     $count=$count+$dayy; 
                     echo '    <tr>
                    <td colspan="10">غير محضر   عدد '.$dayy.' يوم</td>  </tr>';
                    
                 }
                 $day=date('d',$row['enter']);
                         ?>
                <tr>
                    <td colspan=""><?= date('d D',$row['enter']); ?></td>
                    <td><?= $row['name']; ?> </td>
                          <td><?= $row['enterdev']; ?> </td>
                  <td><?= date('Ymd  -  H:i',$row['enter']); ?> </td>
                   <td><?= $row['userenter']; ?> </td>
                         <td><?= $row['outdev']; ?> </td>
                  <td><?php if($row['outsite']) echo date('Ymd  -  H:i', $row['outsite']); ?> </td>
               
                 <td><?= $row['userout']; ?> </td>
                 
                <td><?php echo $dattime=     $this->booking->getNiceDuration($row['outsite']-$row['enter'],'dd');
                  ?> </td>  
             
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-danger pull-right" href="<?= base_url('booking/'.$this->thispage.'/del/'.$row['id'])?>"><i class="material-icons">حذف</i></a>
                    </td>
                    
                    
           
                </tr>
              
                    <?php endforeach; 
                    
                    
                         echo '    <tr>
                    <td colspan="10">غير محضر   عدد '.$count.' يوم للشهر</td>  </tr>';?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>