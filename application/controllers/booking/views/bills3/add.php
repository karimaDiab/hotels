<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('booking/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('booking/bills3/') ?>">العهدة</a></li>
    </ol>
</section>
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">اضافة فاتورة</h3>
            </div>

            <?php if (isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa-warning"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                    <?= isset($msg) ? $msg : ''; ?>
                </div>
            <?php endif; ?>   


            <?php echo form_open_multipart(base_url('booking/' . $thispage . '/add/')); ?>
            <div class="box-body">

                <div class="form-group">
                    <label > المبلغ </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" المبلغ " name="text1" required autofocus value="">
                </div>

                <div class="form-group">
                    <label>النوع</label>
                    <div class="radio">

                        <input type="radio" name="catid"  value="1"  required>
                        <label>       وصل بضاعة
                        </label>
                    </div>


                    <div class="radio">

                        <input type="radio" name="catid"  value="5" required>
                        <label>    طلب بضاعة
                        </label>
                    </div>

    
                    
                 
                    
                    

                   
                    <div class="radio">

                        <input type="radio" name="catid"  value="2">
                        <label>     دفع مبلغ          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;




                        </label>
                    </div>

                </div>   





                <div class="form-group">
                    <label>وصف</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  وصف " name="text2" value="">
                </div>

               
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">   اختر العميل  	</label>
                    
                    <?php 
                    
                    if($cat)
                    {
                        echo '  <input type="hidden" class="form-control" id="exampleInputPassword1" placeholder="  وصف " name="cat" value="'.$cat.'">';
                        
                    }  else {
                        
                    
                    
                    
                    
                    ?>
                        <select  class="form-control" name='cat'  dir="rtl"   style="  width: 100px;

                                     margin-top: 10px;" required>
                                <option value=''> </option>
                                 <option value='0'> عام</option>
   <option value='0'> عميل جديد</option>

        <?php
        $count = 0;
        foreach ($all_rooms as $row):
            ?> <option value='<?= $row['id'] ?>' ><?= $row['name'] ?></option>

                                    <?php
                                endforeach;
                                ?>

                            </select>
                 
                </div>  
                

                <div class="form-group">
                    <label for="exampleInputPassword1">   عميل جديد 	</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  الاسم  " name="newcat" value="">
                    <br>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" التليفون   " name="newcat2" value="">
                      <br>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="   المدني " name="newcat3" value="">
                </div>  

                    <?php }?>


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">اضافة</button>
            </div>
            </form>
        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>
