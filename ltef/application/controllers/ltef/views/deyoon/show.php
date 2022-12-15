

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('ltef/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       <li><a href="<?= base_url('ltef/'.$thispage.'/') ?>">,
           الديون</a></li>
      </ol>
    </section>

  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  عرض الدين </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                    <th  colspan="4">البيانات</th>
                 
                             </tr>
                
               <tr>
                   <td>عربي</td>
                  <td><?= $show['text1']; ?></td>
                                      <td>التليفون</td>
                  <td><?= $show['text2']; ?> </td>  </tr>
                
               <tr>
                       <td>طريقة الدفع</td>
                  <td><?= $show['text3']; ?> </td>
                    
                
            
             
                    
                       </tr>
                          <tr>
                  
                      <td>التاريخ المعاملة</td>
                      <td><?= $show['text17']; ?> </td>
               <td> اول قسط</td>
                      <td><?= $show['dateadd']; ?> </td>
             
             
                    
                       </tr>
                    
                     <tr>
                       <td>المبلغ الاجمالي</td>
                  <td><?= $show['text4']; ?> </td>
                      <td> المقدم</td>
                      <td><?= $show['text13']; ?> </td>
                
            
             
                    
                       </tr>
                          
                       <tr>
                       <td> القسط</td>
                  <td><?= $show['text16']; ?> </td>
                      <td> عدد الاقساط</td>
                      <td><?= $show['text15']; ?> </td>
                 </tr>
                
               <tr>
               
                   
                 
           
                </tr>
              
                
                
              </table>
                
            </div>
        
          </div>
         </div>
     </div>
         
  

      <!-- /.row -->
 
   
          <!-- /.box -->
      


   
</div>

<div class="row">
  
    <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
          
               
                  
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$show['text4']?></h5>
                 <span class="description-text"> المبلغ المطلوب</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                        <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all?></h5>
                 <span class="description-text"> المدفوع</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                 
                   
                     <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=($show['text4']-$all)?></h5>
                 <span class="description-text"> المتبقي</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                   <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=($allold)?></h5>
                 <span class="description-text"> المتاخر</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              <!-- /.col -->
             
                  
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?= $show['text16']; ?></h5>
      <span class="description-text"> القسط</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                     
         
              <!-- /.col -->
              </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
   
  
        <!-- /.col -->
      </div>


 <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> المدفوعات  </h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body" style="overflow-x: auto;
                     white-space: nowrap;
                     direction: rtl;">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الرقم</th>
                   <th>المطلوب</th> 
                  <th>المدفوع</th>     
                 <th>السبب</th>
               
                    <th>تاريخ الاستحقاق</th>
                     <th>الدفع</th>
                       <th style="width: 40px"></th>
             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['id']; ?></td>
                    <td><?= $row['text4']; ?> </td>
                    <td><?= $row['text1']; ?> </td>
                  <td><?= $row['text2']; ?> </td>
   
                  <td><?= $row['dateadd']; ?>
                  
                  
                    <?php  if($dateadd>$row['dateadd'] and $row['text1']!=$row['text4'])
                    {  
                    echo '<span class="label label-danger">متاخر </span>';
                        
                    }?></td>
               
                
                                    <td><?= $row['text3']; ?> </td>
                 
             
                   
                  
             
                   
                    <td>     <?php  if($row['text4']>$row['text1'])
                    {
                        echo form_open_multipart(base_url('ltef/' . $thispage . '/addsalf2/'.$row['id'])); ?>
            
    <!-- Main content -->


                 
    <input type="hidden" class="form-control"  placeholder="   " name="text1old" value="<?= $row['text4'] ?>">
              
                    <input type="text" class="form-control"  placeholder="   " name="text1" value="<?= $row['text4']-$row['text1'] ?>">
              
             

                
          
            <!-- /.box-body -->

              <button type="submit" class="btn btn-primary" name="submit" value="pl">دفع</button>
          </div>
            </form>   <br></a>
                    </td>
                    
                    
           
                </tr>
              
                    <?php } endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>



               <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/edit/'.$show['id'])?>"><i class="material-icons">تعديل </i></a>
   
          
                                <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('ltef/'.$this->thispage.'/del/'.$show['id']); ?>" ><i class="material-icons">حذف</i></a>
         
      <br> <br>     <!-- /.box -->

          