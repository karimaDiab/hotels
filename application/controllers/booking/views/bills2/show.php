

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/bills2/')?>">العهدة</a></li>
      </ol>
    </section>

  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  عرض فاتورة </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                    <th  colspan="4">البيانات</th>
                 
                             </tr>
                
               <tr>
                   <td>المبلغ</td>
                  <td><?= $show['text1']; ?></td>
                       <td>النوع</td>
                        <td><?= $show['catid']; ?></td>
                                  </tr>
                
               <tr>
                       <td>الوصف</td>
                  <td><?= $show['text2']; ?> </td>
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
         
  

      <!-- /.row -->
     <?php if($this->session->userdata('group') ):?>
      <br>
               <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/'.$this->thispage.'/edit/'.$show['id'])?>"><i class="material-icons">تعديل </i></a>
      <?php endif;?>   
                <?php if($show['catid']!='ايراد' or $this->session->userdata('group')  or  $this->session->userdata('editor')):?>
                                <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/'.$this->thispage.'/del/'.$show['id']); ?>" ><i class="material-icons">حذف</i></a>
            <?php endif;?>      
      <br> <br>     <!-- /.box -->

          
          <!-- /.box -->
      


   
</div>