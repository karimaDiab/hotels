

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/producer/')?>">المنتجات</a></li>
      </ol>
    </section>

  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  عرض منتج </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                    <th  colspan="4">البيانات</th>
                 
                             </tr>
                
               <tr>
                   <td>المحتوى</td>
                  <td><?= $show['mhtwa']; ?></td>
                       <td>النوع</td>
                        <td><?= $show['name']; ?></td>
                                  </tr>
                
               <tr>
                       <td>الموديل</td>
                  <td><?= $show['model']; ?> </td>
                      <td>الشركة</td>
                      <td><?= $show['company']; ?> </td>
                
            
             
                    
                       </tr>
                   
                  <tr>
                       <td>الكفالة </td>
                  <td><?= $show['warranty']; ?> </td>
                      <td>تاريخ الاضافة</td>
                          <td><?= $this->booking->tissme_show($show['dateadd']); ?></td>
                
            
             
                    
                       </tr>
               <tr>
                
             
                   
                 
           
                </tr>
              
                
                
              </table>
                
            </div>
        
          </div>
         </div>
     </div>
    </div>
  
  

      <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">تاريخ المنتج وتنقلاته  </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>

                                <th>التاىريخ</th>
                                <th>الى</th>
                             <th>السبب</th>
                            </tr>
<tr>
                                    <td>الشراء</td>
                                <td><?= $this->booking->tissme_show($show['dateadd']); ?></td>
                         





                               


                                </tr>
                            <?php 
                            
                            
                            
                            $all_groups= explode("<aln3esa>", $show['comment']);
                            foreach ($all_groups as $rowa): 
                                
                                if($rowa)
                                {
                                    
                           
                                              $row= explode("||",$rowa);?>
                                <tr>
                                    <td><?= $row[0]; ?></td>
                                         <td><?= $this->booking->tissme_show($row[1]); ?></td>
                                <td><?= $row[2]; ?></td>
                         





                               


                                </tr>

<?php } endforeach; 
?>

                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>


  

      <!-- /.row -->
     <?php if($this->session->userdata('group') ):?>
      <br>
               <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/'.$this->thispage.'/edit/'.$show['id'])?>"><i class="material-icons">تعديل </i></a>
      <?php endif;?>   
                <!-- /.box -->
        </div>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">نقل منتج </h3>
            </div>

            <?php if (isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa-warning"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                    <?= isset($msg) ? $msg : ''; ?>
                </div>
            <?php endif; ?>   


            <?php echo form_open_multipart(base_url('booking/' . $thispage . '/checkmhtwaok2/' . $show['id'])); ?>
            <div class="box-body">

                <div class="form-group" >
                    <label for="exampleInputEmail1">المكان   </label>

                    <select  name='counter'  dir="rtl"  class="form-control"   required>
                          <?php if ($show['counter'] !=0): ?>
  <option value='<?= $show['counter'] ?>' >     <?= $show['counter'] ?></option>
     <?php endif; ?> 
                        <option value='0' >     المخزن</option>
                             <option value='1' >     توالف</option>
                        <option value='100' >     الرسبشن</option>
                        <?php
                        $count = 0;
                        foreach ($all_rooms as $row):
                            ?> <option value='<?= $row['name'] ?>' >     <?= $row['name'] ?></option>

                            <?php
                        endforeach;
                        ?>

                    </select>
                </div>
                
                
                
                <div class="form-group" >
                    <label for="exampleInputEmail1">المكان داخل الشقة   </label>

                  <div class="radio">
                
                      <input type="radio" name="counter2"  value="1"     <?php if ($show['counter2'] == '1')echo "checked"; ?>>
                <label>       الصالة
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="counter2"  value="2" <?php if ($show['counter2'] == '2')echo "checked"; ?>>
                <label>    الماستر
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="counter2"  value="3" <?php if ($show['counter2'] == '3')echo "checked"; ?>>
                 <label>    الثانية
                    </label>
                  </div>
                           <div class="radio">
                 
                      <input type="radio" name="counter2"  value="7" <?php if ($show['counter2'] == '7')echo "checked"; ?>>
                 <label>     الثالثة
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="counter2"  value="4" <?php if ($show['counter2'] == '4')echo "checked"; ?>>
              <label>     المطبخ
                    </label>
                  </div>
                
                      
                </div> 
           
                


   



                <div class="form-group">
                    <label>السبب</label>
                    <textarea class="form-control" rows="3" placeholder="السبب ..." name="comment" required></textarea>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">نقل</button>
            </div>
            </form>
        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>
  
          
          <!-- /.box -->
      


   
