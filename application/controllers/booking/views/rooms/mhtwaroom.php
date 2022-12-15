






<style
    
    
    
    >
    .box{
      margin-top: 70px;
    }
    </style>





 <div class="row">

<div  style="float:right"><div  style="margin-left:10px">

 <a class="update btn btn-sm btn-warning pull-right" href="<?= base_url('booking/'.$this->thispage.'/mhtwaroom2/'.$edit['id'])?>"><i class="material-icons">تحديد محتويات الشقة</i></a>

</div>



        </div>
     
     <div  style="float:right"><div  style="margin-left:10px">

 <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/mhtwaprint/'.$edit['id'])?>/1"><i class="material-icons"> طباعة المحتويات  الاساسية</i></a>

</div>



        </div> 
     <div  style="float:right"><div  style="margin-left:10px">

 <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/mhtwaprint/'.$edit['id'])?>/2"><i class="material-icons"> طباعة المحتويات  الغير اساسية</i></a>

</div>



        </div>


        
    
        
        

        
        
        
    
    </div>
<br>
   
 <?php echo form_open_multipart(base_url('booking/'.$thispage.'/mhtwaroom/'.$edit['id'])); ?>
     


<div class="row">

        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right" style="width: 100%;
    /* padding-bottom: 20px; */
    margin-bottom: 20px;    border-bottom-color: #3c8dbc;">
       
    <li class="active"><a href="#tab_1-1" data-toggle="tab"> الصالة</a></li>
                    <li><a href="#tab_2-2" data-toggle="tab">الماستر
                    
                        </a></li>
                    <li><a href="#tab_3-2" data-toggle="tab"> الثانية
                          </a></li>
                          
                              <li><a href="#tab_3-7" data-toggle="tab"> الثالثة
                          </a></li>
                          
                               <li><a href="#tab_3-4" data-toggle="tab"> المطبخ
                          </a></li>   
                          
                          <li><a href="#tab_3-5" data-toggle="tab"> 
                 الحمام         </a></li>
                                  <li><a href="#tab_3-6" data-toggle="tab"> حمام الماستر
                          </a></li>  
   
   
   

                    <li class="dropdown">

                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
<div class="row">
    <!-- Main content -->
   
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">عرض  المحتويات  الشقة   <?=$edit['name']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                             <th>الاسم</th>
                              <th>الحالة</th>
                          
                                <th>المكان</th>
                                <th>اساسي</th>   
                            
                               


                            </tr>

                            <?php $i = 0;
                            foreach ($all_groups1 as $row): ?>
                                <tr>
                                   
                                        <?php  
                                        
$query = $this->db->get_where('booking_mhtwah', array('text1' => $edit['name'],'text2' => $row['id']));
$mhtwah = $query->row_array(); 
        
        if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) :
        ?>
                                        
                 
                                    <td><?= $row['text1']; ?> - <?=$mhtwah['text4']?></td>
                              <td><input type="text" dir="rtl" name="mhtwah<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" /></td>
                               <input type="hidden" dir="rtl" name="mhtwahold<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                                    <td><?= $row['noa']; ?> </td>

                                    <td><?= $row['noa2']; ?> </td>                    
                                        
                                        
                                        
<?php endif; ?>
        
                

                               
                                </tr>

<?php $i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                            </ul>
                        </div>
<?php endif; ?>   
                </div>
                <!-- /.box -->

   <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
          
                <!-- /.box -->
            </div>
        </div>
</div>
                        
                        
                        </div>
                    
                    
                          <div class="tab-pane " id="tab_2-2">
<div class="row">
    <!-- Main content -->
   
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">عرض  المحتويات  الشقة   <?=$edit['name']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                             <th>الاسم</th>
                              <th>الحالة</th>
                          
                                <th>المكان</th>
                                <th>اساسي</th>   
                            
                               


                            </tr>

                            <?php $i = 0;
                            foreach ($all_groups2 as $row): ?>
                                <tr>
                                   
                                        <?php  
                                        
$query = $this->db->get_where('booking_mhtwah', array('text1' => $edit['name'],'text2' => $row['id']));
$mhtwah = $query->row_array(); 
        
        if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) :
        ?>
                                        
                 
                                    <td><?= $row['text1']; ?> - <?=$mhtwah['text4']?></td>
                              <td><input type="text" dir="rtl" name="mhtwah<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" /></td> <input type="hidden" dir="rtl" name="mhtwahold<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                                    <td><?= $row['noa']; ?> </td>

                                    <td><?= $row['noa2']; ?> </td>                    
                                        
                                        
                                        
<?php endif; ?>
        
                

                               
                                </tr>

<?php $i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                            </ul>
                        </div>
<?php endif; ?>   
                </div>
                <!-- /.box -->

   <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
          
                <!-- /.box -->
            </div>
        </div>
</div>
                        
                        
                        </div>
                    
                        <div class="tab-pane " id="tab_3-7">
<div class="row">
    <!-- Main content -->
   
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">عرض  المحتويات  الشقة   <?=$edit['name']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                             <th>الاسم</th>
                              <th>الحالة</th>
                          
                                <th>المكان</th>
                                <th>اساسي</th>   
                            
                               


                            </tr>

                            <?php $i = 0;
                            foreach ($all_groups7 as $row): ?>
                                <tr>
                                   
                                        <?php  
                                        
$query = $this->db->get_where('booking_mhtwah', array('text1' => $edit['name'],'text2' => $row['id']));
$mhtwah = $query->row_array(); 
        
        if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) :
        ?>
                                        
                 
                                    <td><?= $row['text1']; ?> - <?=$mhtwah['text4']?></td>
                              <td><input type="text" dir="rtl" name="mhtwah<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" /></td> <input type="hidden" dir="rtl" name="mhtwahold<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                                    <td><?= $row['noa']; ?> </td>

                                    <td><?= $row['noa2']; ?> </td>                    
                                        
                                        
                                        
<?php endif; ?>
        
                

                               
                                </tr>

<?php $i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                            </ul>
                        </div>
<?php endif; ?>   
                </div>
                <!-- /.box -->

   <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
          
                <!-- /.box -->
            </div>
        </div>
</div>
                        
                        
                        </div>
                          <div class="tab-pane " id="tab_3-2">
<div class="row">
    <!-- Main content -->
   
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">عرض  المحتويات  الشقة   <?=$edit['name']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                             <th>الاسم</th>
                              <th>الحالة</th>
                          
                                <th>المكان</th>
                                <th>اساسي</th>   
                            
                               


                            </tr>

                            <?php $i = 0;
                            foreach ($all_groups3 as $row): ?>
                                <tr>
                                   
                                        <?php  
                                        
$query = $this->db->get_where('booking_mhtwah', array('text1' => $edit['name'],'text2' => $row['id']));
$mhtwah = $query->row_array(); 
        
        if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) :
        ?>
                                        
                 
                                    <td><?= $row['text1']; ?> - <?=$mhtwah['text4']?></td>
                              <td><input type="text" dir="rtl" name="mhtwah<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" /></td> <input type="hidden" dir="rtl" name="mhtwahold<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                                    <td><?= $row['noa']; ?> </td>

                                    <td><?= $row['noa2']; ?> </td>                    
                                        
                                        
                                        
<?php endif; ?>
        
                

                               
                                </tr>

<?php $i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                            </ul>
                        </div>
<?php endif; ?>   
                </div>
                <!-- /.box -->

   <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
          
                <!-- /.box -->
            </div>
        </div>
</div>
                        
                        
                        </div>
                    
                          <div class="tab-pane " id="tab_3-4">
<div class="row">
    <!-- Main content -->
   
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">عرض  المحتويات  الشقة   <?=$edit['name']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                             <th>الاسم</th>
                              <th>الحالة</th>
                          
                                <th>المكان</th>
                                <th>اساسي</th>   
                            
                               


                            </tr>

                            <?php $i = 0;
                            foreach ($all_groups4 as $row): ?>
                                <tr>
                                   
                                        <?php  
                                        
$query = $this->db->get_where('booking_mhtwah', array('text1' => $edit['name'],'text2' => $row['id']));
$mhtwah = $query->row_array(); 
        
        if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) :
        ?>
                                        
                 
                                    <td><?= $row['text1']; ?> - <?=$mhtwah['text4']?></td>
                              <td>
                                  
                                  
                                  <input type="hidden" dir="rtl" name="mhtwahold<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                                  
                                  
                                     <input type="text" dir="rtl" name="mhtwah<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                              
                              
                              </td>
                                    <td><?= $row['noa']; ?> </td>

                                    <td><?= $row['noa2']; ?> </td>                    
                                        
                                        
                                        
<?php endif; ?>
        
                

                               
                                </tr>

<?php $i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                            </ul>
                        </div>
<?php endif; ?>   
                </div>
                <!-- /.box -->

   <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
          
                <!-- /.box -->
            </div>
        </div>
</div>
                        
                        
                        </div>
                    
                          <div class="tab-pane " id="tab_3-5">
<div class="row">
    <!-- Main content -->
   
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">عرض  المحتويات  الشقة   <?=$edit['name']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                             <th>الاسم</th>
                              <th>الحالة</th>
                          
                                <th>المكان</th>
                                <th>اساسي</th>   
                            
                               


                            </tr>

                            <?php $i = 0;
                            foreach ($all_groups5 as $row): ?>
                                <tr>
                                   
                                        <?php  
                                        
$query = $this->db->get_where('booking_mhtwah', array('text1' => $edit['name'],'text2' => $row['id']));
$mhtwah = $query->row_array(); 
        
        if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) :
        ?>
                                        
                 
                                    <td><?= $row['text1']; ?> - <?=$mhtwah['text4']?></td>
                              <td><input type="text" dir="rtl" name="mhtwah<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" /></td> <input type="hidden" dir="rtl" name="mhtwahold<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                                    <td><?= $row['noa']; ?> </td>

                                    <td><?= $row['noa2']; ?> </td>                    
                                        
                                        
                                        
<?php endif; ?>
        
                

                               
                                </tr>

<?php $i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                            </ul>
                        </div>
<?php endif; ?>   
                </div>
                <!-- /.box -->

   <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
          
                <!-- /.box -->
            </div>
        </div>
</div>
                        
                        
                        </div>
                    
                          <div class="tab-pane " id="tab_3-6">
<div class="row">
    <!-- Main content -->
   
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">عرض  المحتويات  الشقة   <?=$edit['name']?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                             <th>الاسم</th>
                              <th>الحالة</th>
                          
                                <th>المكان</th>
                                <th>اساسي</th>   
                            
                               


                            </tr>

                            <?php $i = 0;
                            foreach ($all_groups6 as $row): ?>
                                <tr>
                                   
                                        <?php  
                                        
$query = $this->db->get_where('booking_mhtwah', array('text1' => $edit['name'],'text2' => $row['id']));
$mhtwah = $query->row_array(); 
        
        if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) :
        ?>
                                        
                 
                                    <td><?= $row['text1']; ?> - <?=$mhtwah['text4']?></td>
                              <td><input type="text" dir="rtl" name="mhtwah<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" /></td> <input type="hidden" dir="rtl" name="mhtwahold<?=$row['id']?>" size="40" value="<?=$mhtwah['text3']?>"  style="width:150px;" />
                                    <td><?= $row['noa']; ?> </td>

                                    <td><?= $row['noa2']; ?> </td>                    
                                        
                                        
                                        
<?php endif; ?>
        
                

                               
                                </tr>

<?php $i++;
endforeach; ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                    <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                            </ul>
                        </div>
<?php endif; ?>   
                </div>
                <!-- /.box -->

   <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
          
                <!-- /.box -->
            </div>
        </div>
</div>
                        
                        
                        </div>
                    </div>
                </div>
            </div>
     </div>

  </form>
<!-- /.row -->

