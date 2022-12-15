

<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('ltef/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('ltef/subscriptions/') ?>"> الباقات</a></li>
    </ol>
</section>

<div class="row">
    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">  عرض باقة </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>

                            <th  colspan="4">البيانات</th>

                        </tr>

                        <tr>
                            <td>الاسم</td>
                            <td><?= $show['name']; ?></td>
                            <td>   الاضافة</td>
                                 <td><?= $this->booking->tissme_show($show['dateadd']); ?> </td>
                        </tr>

                        <tr>
                            <td>المدني</td>
                            <td><?= $show['cid']; ?> </td>
                            <td>التليفون</td>
                            <td><?= $show['mobile']; ?> </td>




                        </tr>

                        <tr>
                            <td>النوع</td>
                            <td><?= $show['text1']; ?> </td>
                            <td>الوصف</td>
                            <td><?= $show['text2']; ?> </td>




                        </tr>
                        
                                  <tr>
                            <td>الموظف</td>
                            <td><?= $show['text3']; ?> </td>
                            <td>الدفع</td>
                            <td><?= $show['text5']; ?> </td>




                        </tr>
      
                        <tr>





                        </tr>



                    </table>

                </div>

            </div>
        </div>
    </div>
    
  <?php if ($show['counter'] !='2' ):
      
      
     //// http://majestc.com/2//payment/index/payment/sub/1f0584f840    
      
      ?>
 
        <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/' . $this->thispage . '/send/' . $show['id']) ?>"><i class="material-icons"> ارسل  sms </i></a>
        
    

    
          <?php endif; ?>
  <?php if ($show['counter'] != '2' ): ?>
        <br>
        <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/' . $this->thispage . '/change/' . $show['id']) ?>"><i class="material-icons">نقل الارشيف </i></a>
        
             <br>     <br>     <br>
   <?php endif; ?>
                      <?php if ($show['counter'] != '2' ): ?>
          <div class="box">    
         <?php echo form_open_multipart(base_url('ltef/'.$thispage.'/oky/'.$show['id'])); ?>
              <div class="box-body">
               <div class="box-header with-border">
                    <h3 class="box-title">   تاكيد الاشتراك </h3>
                </div>
                  
                           <div class="form-group">
                  <label for="exampleInputEmail1"> الرقم المدني  </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم " name="cid" required autofocus value="<?= $show['cid']; ?>">
                </div>
                       <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="text1"  value="1"   <?php if($show['text1']=="ذهبية")echo "checked";?>>
                <label>       الذهبية
                    </label>
                  </div>  
                      
                      <div class="radio">
                 
                      <input type="radio" name="text1"  value="2"<?php if($show['text1']=="الفضية")echo "checked";?>>
                 <label> الفضية   
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text1"  value="3"  <?php if($show['text1']=="برونزية")echo "checked";?>>
                <label>   البرونزية
                    </label>
                  </div>
                      
                    
                     
                
                </div>   
                <div class="form-group">
                  <label for="exampleInputEmail1">المبلغ  </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم " name="text4" required autofocus>
                </div>
         
                  
                  
             
                 <div class="form-group">
                      <label>عن طريق</label>
                  <div class="radio">
                
                      <input type="radio" name="text5"  value="cash"  checked="">
                <label>       كاش
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text5"  value="knet">
                <label>   كي نت
                    </label>
                  </div>
                       <?php if ($show['counter'] == '1' and ($this->session->userdata('group')  or  $this->session->userdata('editor'))): ?>
  
                         <div class="radio">
                 
                      <input type="radio" name="text5"  value="اخرى">
                 <label>    اخرى
                    </label>
                  </div>
                         <?php endif; ?>
                
                </div>   
                    <div class="form-group">
                  <label>وصف</label>
                  <textarea class="form-control" rows="3" placeholder="وصف ..." name="text2"><?= $show['text2']; ?></textarea>
                </div>
               
                  
                 
            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تاكيد</button>
              </div>
            </form>
          </div>   

    <!-- /.box -->

   
</div>
       <?php endif; ?>