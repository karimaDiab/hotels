


        <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$thispage?>/all/1/1" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الملاحظات </a> 	</div>



        </div>


        
    
        
        

        
        
        
    
    </div>




   
  <div class="row">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">التقيم  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
            
                  <th>العميل</th>
                  <th>الترحيب</th>
                     <th>الموظف </th>
                        <th> النظافة</th>
                           <th>موظف الخدمات</th>
                              <th> سرعة الاستجابة لطلباتك</th>
                     <th style="width: 40px">المجموع</th>
                       <th >ملاحظات</th>
                            <th style="width: 40px"></th>
                </tr>
                
                     <?php $count=0; foreach($all_groups as $row):
                          $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
        $row['cid']= $query->row_array(); 
                         
                         ?>
                <tr>
                  <td><?= $row['cid']['name']; ?></td>
              <td><?= $row['rat1']; ?></td>
                     <td><?= $row['rat2']; ?></td>
                            <td><?= $row['rat3']; ?></td>
                                   <td><?= $row['rat4']; ?></td>
                
                     <td><?= $row['rat5']; ?></td>
                  <td><?= $row['ratall']; ?></td>
             
                            <td><?= $row['comment']; ?></td>
                 
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/show/id/'.$row['idbook'])?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
                    
                 
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       <?php if($all_count>2): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$all_count;$count++):?>
                <li><a href="<?= base_url('booking/'.$this->thispage.'/all/'.$count.'/'.$counts); ?>"><?=$count?></a></li>
          
          <?php endfor; ?>
              </ul>
            </div>
                <?php endif; ?>   
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>
      <!-- /.row -->
  
