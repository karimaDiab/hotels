
<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booked/all/')?>">حجز موكد</a></li>
      </ol>
    </section>
 <br>



     <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> خطأ</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
 
 <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">  اختر الشقة</h3>
            </div>
         
             
              
           <?php echo form_open_multipart(base_url('booking/booked/add5/'.$row['id'])); ?>
              <div class="box-body">
          
      
                      <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1"> الرقم المدني	</label>
               <?=$row['cid']?>
                </div>
                        <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1">   التليفون	</label>
                        <?=$row['mobile']?>
                </div>    
                 
             
                 
                  
                 <div class="form-group  col-md-6">
                            <label >  اختر الشقة	</label>
                            <select  name='room'  dir="rtl"   style="  width: 100px;

                                     margin-top: 10px;" required>
                                <option value=''>اختر الشقة</option>


        <?php
        $count = 0;
        foreach ($all_rooms as $row):
            ?> <option value='<?= $row['name'] ?>' > شقة رقم   <?= $row['name'] ?></option>

                                    <?php
                                endforeach;
                                ?>

                            </select>
            
              </div>
              
               
                     <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1">  الايام	</label>
                  <input type="text" class="form-control"  placeholder=" الايام " name="day" value="1" required width="150px" style="width: 150px">
                </div></div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl"> تسكين</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
        