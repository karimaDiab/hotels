
 <script language='JavaScript'>

    function checkFiles(){

            if (document.getElementById('noa').value == 'بطاقة مدنية'){
            if(document.getElementById('mobile').value.length!=8){

                alert('ارقم التليفون غير صحيح');

          document.getElementById('mobile').focus();

         return false;

                }

              
                }
                    if((Number(document.getElementById('bill').value) +  Number(document.getElementById('knet').value) )<35 ){
///&& 
 if(document.getElementById('comment8').value=='' ){
                alert('  ادخل سبب المبلغ اقل من 35 ');

          document.getElementById('comment8').focus();

         return false;
     }

                }
                }</script>  

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/clints/')?>">حجز جديد</a></li>
      </ol>
    </section>
 <br>



       <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> تبيه</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>  
 <?php $datass = array('onsubmit' => "return checkFiles()"); ?>
    <?php echo form_open_multipart(base_url('booking/booked/add3/'),$datass); ?>

 
  <input type="hidden" class="form-control" placeholder="الرقم المدني " name="noa" value="<?=$noa?>" id="noa"  >
     
       <div class="row">

        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right" style="width: 100%;
    /* padding-bottom: 20px; */
    margin-bottom: 20px;    border-bottom-color: #3c8dbc;">
       
    <li class="active"><a href="#tab_1-1" data-toggle="tab">بيانات العميل</a></li>
    <li ><a href="#tab_1-4" data-toggle="tab">الملاحظات    
            <b> (<?=(
count($all_groups3 )+count($all_groups31 )+count($all_groups32)+count($all_groups34 )+count($all_groups35 ))?>)</b></a> </li>

                    <li><a href="#tab_2-2" data-toggle="tab">التاخيرات
                          <b> (<?=
count($all_groups2 )?>)</b>
                        </a></li>
                    <li><a href="#tab_3-2" data-toggle="tab">الكل
                          <b> (<?=
count($all_groups )?>)</b></a></li>
                    <li class="dropdown">

                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        
                        
             <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <input type="hidden" class="form-control"  name="show1" value="<?=$show1?>" required >
          
                   <input type="hidden" class="form-control"  name="datetext4" value="<?=$datetext4?>" required >
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">الاسم   </label>
                  <input type="text" class="form-control"  placeholder=" الاسم " name="name"  value="<?=$name?>" required >
                
                  <span class="help-block" style="color: #dd4b39; font-weight: bold"> يرجا ادخال الاسم الاول والثاني</span>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1"> التليفون	</label>
                    <input type="number" class="form-control"  placeholder=" التليفون " name="mobile" id="mobile"  value="<?=$mobile?>" required autofocus>
                  
                </div>
                      <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1"> الرقم المدني	</label>
                  <input type="hidden" class="form-control"  placeholder="الرقم المدني " name="cid" value="<?=$cid?>" required ><br><?=$cid?>
                </div>
                  
            <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">مبلغ    </label>
                  <input type="number" class="form-control"  placeholder=" المبلغ " name="bill" id="bill"  value="" required autofocus>
                </div>
          
          
          <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1">  ملاحظة عليه	</label>
                  <br>  <span style="color: red;font-size: 20px;" > <?=$comment?></span>
                </div>
                
                
             
                 
                  
               
        
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
                            <div class="box-body">

                <div class="col-sm-4">
                    <img class="img-responsive" src="<?= base_url($file1) ?>" alt="Photo">
         
               </div> 
                                <div class="col-sm-4">
                          <img class="img-responsive" src="<?= base_url($file2) ?>" alt="Photo">
               
               </div>
                  <div class="col-sm-4">عقد الزواج
                          <img class="img-responsive" src="<?= base_url($file3) ?>" alt="Photo">
               
               </div>
              

            </div>
           
                        
                    </div>
                    <div class="tab-pane " id="tab_1-4">



                        <table class="table table-bordered">
                            <tr>

                                <th>الشقة</th>
                                <th>الايام</th>
                                <th>المبلغ</th>
                                 <th>الملاحظة</th>
                                <th>الدخول</th>
                                <th >المدة</th>
                               
                                <th style="width: 40px"></th>

                            </tr>

                            <?php
                            
                            
                            
                        
                            $count = 0;
                            foreach ($all_groups3 as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                                    <td><?= $row['room']; ?></td>
                                    <td><?= $row['day']; ?></td>
                                    <td><?= $row['bill']; ?></td>
                                     <td><?= $row['comment7']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                            
  <td><?= $this->booking->getNiceDuration($row['timeend']-$row['timeenter']); ?></td> 
             


                                    <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   


                        <?php
                        
                        
                        if(count($all_groups31))
                        {
                            
                            
                            ?>
                
                        
                               <table class="table table-bordered">
                            <tr>

                       
                       
                                <th>المبلغ</th>
                                 <th>الملاحظة</th>
                                <th>الدخول</th>
                              
                               
                                <th style="width: 40px">فرع</th>

                            </tr>

                            <?php
                            
                            
                            
                        
                            $count = 0;
                            foreach ($all_groups31 as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                           
                      
                                    <td><?= $row['bill']; ?></td>
                                     <td><?= $row['comment7']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>

             


                                    <td>    
                                        حولي
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   
                        <?php } ?>
                        
                        
                             <?php
                        
                        
                        if(count($all_groups32))
                        {
                            
                            
                            ?>
                
                        
                               <table class="table table-bordered">
                            <tr>

                       
                       
                                <th>المبلغ</th>
                                 <th>الملاحظة</th>
                                <th>الدخول</th>
                              
                               
                                <th style="width: 40px">فرع</th>

                            </tr>

                            <?php
                            
                            
                            
                        
                            $count = 0;
                            foreach ($all_groups32 as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                           
                      
                                    <td><?= $row['bill']; ?></td>
                                     <td><?= $row['comment7']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>

             


                                    <td>    
                                        الساليمة
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   
                        <?php } ?>
                        
                             <?php
                        
                        
                        if(count($all_groups34))
                        {
                            
                            
                            ?>
                
                        
                               <table class="table table-bordered">
                            <tr>

                       
                       
                                <th>المبلغ</th>
                                 <th>الملاحظة</th>
                                <th>الدخول</th>
                              
                               
                                <th style="width: 40px">فرع</th>

                            </tr>

                            <?php
                            
                            
                            
                        
                            $count = 0;
                            foreach ($all_groups34 as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                           
                      
                                    <td><?= $row['bill']; ?></td>
                                     <td><?= $row['comment7']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>

             


                                    <td>    
                                        الرقعي
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   
                        <?php } ?>
                        
                        
                             <?php
                        
                        
                        if(count($all_groups35))
                        {
                            
                            
                            ?>
                
                        
                               <table class="table table-bordered">
                            <tr>

                       
                       
                                <th>المبلغ</th>
                                 <th>الملاحظة</th>
                                <th>الدخول</th>
                              
                               
                                <th style="width: 40px">فرع</th>

                            </tr>

                            <?php
                            
                            
                            
                        
                            $count = 0;
                            foreach ($all_groups35 as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                           
                      
                                    <td><?= $row['bill']; ?></td>
                                     <td><?= $row['comment7']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>

             


                                    <td>    
                                        الشعب
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   
                        <?php } ?>
                    </div>
                       <div class="tab-pane " id="tab_1-5">



                        <table class="table table-bordered">
                            <tr>

                                <th>الشقة</th>
                                <th>الايام</th>
                                <th>المبلغ</th>
                    
                                <th>الدخول</th>
                                  <th>وقت خارج وراجع</th>
                                <th >مدة تعلق الشقة</th>
                               
                                <th style="width: 40px"></th>

                            </tr>

                            <?php
                            $count = 0;
                            foreach ($outsiteall as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                                    <td><?= $row['room']; ?></td>
                                    <td><?= $row['day']; ?></td>
                                    <td><?= $row['bill']; ?></td>
                                 <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                                    <td><?= $this->booking->tissme_show($row['timeoutsite']); ?> </td>
                            
  <td><?= $this->booking->getNiceDuration($row['timeend']-$row['timeoutsite']); ?></td> 
             


                                    <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   


                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2-2">


              
                        <table class="table table-bordered">
                            <tr>

                                <th>الشقة</th>
                                <th>الايام</th>
                                <th>الغرامة</th>
                                <th>الدخول</th>
                                <th >الخروج</th>
                                <th >المبلغ</th>
                                <th style="width: 40px"></th>

                            </tr>

                            <?php
                            $count = 0;
                            foreach ($all_groups2 as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                                    <td><?= $row['room']; ?></td>
                                    <td><?= $row['day']; ?></td>
                                    <td><?= $row['comment1']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                                    <td><?= $this->booking->tissme_show($row['timeend']); ?> </td>

    <td><?= $row['comment2']; ?></td>
                                    <td><?= $row['comment3']; ?></td> 
                                    
                                    <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   



                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3-2">

                 
                        <table class="table table-bordered">
                            <tr>

                                <th>الشقة</th>
                                <th>الايام</th>
                                <th>المبلغ</th>
                                <th>الدخول</th>
                            <th >مدة الاقامة</th>  
                                <th style="width: 40px"></th>

                            </tr>

                            <?php
                            $count = 0;
                            foreach ($all_groups as $row):


                                if ($row['timeend2'])
                                    $row['timeend'] = $row['timeend2'];
                                ?>
                                <tr>
                                    <td><?= $row['room']; ?></td>
                                    <td><?= $row['day']; ?></td>
                                    <td><?= $row['bill']; ?></td>
                                    <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                                  <td><?= $this->booking->getNiceDuration($row['timeend']-$row['timeenter']); ?></td> 

                                    <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/show/id/' . $row['id']) ?>"><i class="material-icons">التفاصيل</i></a>
                                    </td>






                                </tr>

<?php endforeach; ?>

                        </table>   


                   
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>



<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">  تفاصيل الحجز  </h3>
            </div>
        <div class="box-body">
          
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">الشقة   </label>
               سوف تحدد بعد الدفع
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1"> الايام	</label>
                  <input type="hidden" class="form-control"  placeholder="  " name="day"  value="<?=$day?>" required autofocus><br><?=$day?>
                </div>
                      <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1">  الدخول	</label>
                  <input type="hidden" class="form-control"  placeholder="الرقم المدني " name="timeenter" value="<?=$timeenter?>" required autofocus><br>
                  <?= $this->booking->tissme_show($timeenter); ?>
                </div>
                  
                     <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1">  الخروج	</label>
                  <input type="hidden" class="form-control"  placeholder=" الايام " name="timeend" value="<?=$timeend?>" required autofocus><br>
                  <?= $this->booking->tissme_show($timeend); ?>
                </div>
             
                 
                  
               
            
              </div>
              <!-- /.box-body -->

             
         
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>



<div class="row">
        <div class="col-md-12">
 <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl"  > حجز</button>
              </div>
              </div>
     </div>
   </form>
      <!-- /.row -->
  
