

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('ltef/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('ltef/modif/')?>">الموظفين</a></li>
      </ol>
    </section>

  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  عرض موظف </h3>
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
                       <td>انجليزي</td>
                        <td><?= $show['text11']; ?></td>
                                  </tr>
                
               <tr>
                       <td>الجنسية</td>
                  <td><?= $show['text3']; ?> </td>
                      <td>الجنس</td>
                      <td><?= $show['text13']; ?> </td>
                
            
             
                    
                       </tr>
                          <tr>
                       <td>التليفون</td>
                  <td><?= $show['text10']; ?> </td>
                      <td>الرقم المدني</td>
                      <td><?= $show['text2']; ?> </td>
                
            
             
                    
                       </tr>
                         <tr>
                       <td>المهنة</td>
                  <td><?= $show['text12']; ?> </td>
                      <td>المسمى الوظيفي</td>
                      <td><?= $show['text15']; ?> </td>
                
            
             
                    
                       </tr>
                     <tr>
                       <td>الراتب</td>
                  <td><?= $show['text4']; ?> </td>
                      <td>المكافاة</td>
                      <td><?= $show['text14']; ?> </td>
                
            
             
                    
                       </tr>
                           <tr>
                       <td>بداية العمل</td>
                  <td><?= $show['text6']; ?> </td>
                      <td>نهاية العمل</td>
                      <td><?= $show['text7']; ?> </td>
                
            
             
                    
                       </tr>
                
               <tr>
                
             
                   
                 
           
                </tr>
              
                
                
              </table>
                
            </div>
        
          </div>
         </div>
     </div>
         
  

      <!-- /.row -->
 
      <br>
               <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/edit/'.$show['id'])?>"><i class="material-icons">تعديل </i></a>
   
          
                                <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('ltef/'.$this->thispage.'/del/'.$show['id']); ?>" ><i class="material-icons">حذف</i></a>
         
      <br> <br>     <!-- /.box -->

          
          <!-- /.box -->
      


   
</div>

 <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">السلف والخصم  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="
    white-space: nowrap;
    direction: rtl;">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">الرقم</th>
                  <th>المبلغ</th>     
                 <th>السبب</th>
                    <th>السبب</th>
                 
                       <th style="width: 40px"></th>
             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['id']; ?></td>
                    <td><?= $row['text1']; ?> </td>
                  <td><?= $row['text2']; ?> </td>
                  <td><?= $row['dateadd']; ?> </td>
               
                
                  
                 
             
                   
                  
             
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-danger pull-right" href="<?= base_url('ltef/'.$this->thispage.'/del/'.$row['id'])?>"><i class="material-icons">حذف</i></a>
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