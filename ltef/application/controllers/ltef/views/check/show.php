

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/bills/')?>">الفواتير</a></li>
      </ol>
    </section>
<div class="row">
  
    <div class="col-md-12">
 <div  style="float:left"><div  style="margin-left:10px">
                <?php if ($show['catid'] == 'مستحق'): ?>
         
               <?php if($show['text30']!='' ):?>
                    <a href="<?= base_url() ?>/ltef/check/updateok/<?= $show['id'] ?>" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   تم صرف الشيك</a>
                     <?php endif;?> 
                         <?php if($show['text30']=='' ):?>
                    يرجا التعديل على الشيك وتعديل القسم
                           <?php endif;?> 
                <?php endif; ?>
             
                       <a href="<?= base_url() ?>/ltef/check/add/<?= $show['id'] ?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>    تكرار الشيك </a>
            </div>

        </div>

 <div  style="float:right"><div  style="margin-left:10px">
                
                    <a href="<?= base_url() ?>/ltef/check/printcheck/<?= $show['id'] ?>" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   طباعة  الشيك</a>

               
            </div>

        </div>
           </div>

        </div>
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
                       <td>رقم الشيك</td>
                        <td><?= $show['text3']; ?></td>
                              <td>القسم</td>
                      <td><?= $show['text30']; ?> </td>     </tr>
                
               <tr>
                       <td>الشيك باسم</td>
                  <td><?= $show['text2']; ?> </td>
                      <td>التاريخ</td>
                      <td><?= $show['dateadd']; ?> </td>
                
            
             
                    
                       </tr>
                   
                
               <tr>
                  <td>ذلك عن</td>
                        <td><?= $show['text12']; ?></td>
                          <td>المستلم</td>
                        <td><?= $show['text11']; ?> - <?= $show['text13']; ?></td>
             
                   
                 
           
                </tr>
              
                
                
              </table>
                
            </div>
        
          </div>
         </div>
     </div>
         
  

      <!-- /.row -->
     <?php if($this->session->userdata('group')):?>
      <br>
               <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/edit/'.$show['id'])?>"><i class="material-icons">تعديل </i></a>
      <?php endif;?>   
                <?php if($show['catid']!='ايراد' or $this->session->userdata('group')):?>
                                <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('ltef/'.$this->thispage.'/del/'.$show['id']); ?>" ><i class="material-icons">حذف</i></a>
            <?php endif;?>      
      <br> <br>     <!-- /.box -->

          
          <!-- /.box -->
      


   
</div>