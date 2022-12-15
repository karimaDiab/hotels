<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/producer/')?>">المنتجات</a></li>
      </ol>
    </section>
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل منتج </h3>
            </div>

            <?php if (isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa-warning"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                    <?= isset($msg) ? $msg : ''; ?>
                </div>
            <?php endif; ?>   


            <?php echo form_open_multipart(base_url('booking/' . $thispage . '/edit/' . $edit['id'])); ?>
            <div class="box-body">

                <div class="form-group" style="display: none">
                    <label for="exampleInputEmail1">المكان   </label>

                    <select  name='counter'  dir="rtl"  class="form-control"   required>
  <option value='<?= $edit['counter'] ?>' >     <?= $edit['counter'] ?></option>
                        <option value='0' >     المخزن</option>
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
                
                
                
                <div class="form-group" style="display: none">
                    <label for="exampleInputEmail1">المكان داخل الشقة   </label>

                  <div class="radio">
                
                      <input type="radio" name="counter2"  value="1"     <?php if ($edit['counter2'] == '1')echo "checked"; ?>>
                <label>       الصالة
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="counter2"  value="2" <?php if ($edit['counter2'] == '2')echo "checked"; ?>>
                <label>    الماستر
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="counter2"  value="3" <?php if ($edit['counter2'] == '3')echo "checked"; ?>>
                 <label>    الثانية
                    </label>
                  </div>
                           <div class="radio">
                 
                      <input type="radio" name="counter2"  value="7" <?php if ($edit['counter2'] == '7')echo "checked"; ?>>
                 <label>     الثالثة
                    </label>
                  </div>
                         <div class="radio">
                
                      <input type="radio" name="counter2"  value="4" <?php if ($edit['counter2'] == '4')echo "checked"; ?>>
              <label>     المطبخ
                    </label>
                  </div>
                
                      
                </div> 
           
                <div class="form-group">
                    <label for="exampleInputEmail1">المحتوى   </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" الاسم " name="mhtwa" required autofocus value="<?= $edit['mhtwa'] ?>" disabled="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">النوع   </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" الاسم " name="name" required autofocus value="<?= $edit['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">    الموديل	</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  مسمى " name="model" value="<?= $edit['model'] ?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">  الشركة</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  company " name="company" value="<?= $edit['company'] ?>" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">    الكفالة	</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  warranty " name="warranty"  value="<?= $edit['warranty'] ?>">
                </div>




                <div class="form-group">
                    <label>وصف</label>
                    <textarea class="form-control" rows="3" placeholder="وصف ..." name="text1"><?= $edit['text1'] ?></textarea>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
            </div>
            </form>
        </div>
        <!-- /.box -->


    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
</div>
