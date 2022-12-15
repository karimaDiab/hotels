
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل اشتراك</h3>
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
            
                <div class="form-group">
                  <label for="exampleInputEmail1">التليفون  </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" الاسم " name="text1" required autofocus value="<?=$edit['text1']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">   مكان الجهاز	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  مسمى " name="text2" value="<?=$edit['text2']?>">
                </div>
                  
                  
                      <div class="form-group">
                  <label for="exampleInputPassword1">   اسم صاحب الاشتراك	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  باسورد " name="text3" value="<?=$edit['text3']?>" >
                </div>
                      <div class="form-group">
                  <label for="exampleInputPassword1">   رقم المدني	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  ايميل " name="text4" required value="<?=$edit['text4']?>">
                </div>
                  
                 
                  
               
              <div class="form-group">
                  <label>وصف</label>
                  <textarea class="form-control" rows="3" placeholder="وصف ..." name="text5"><?=$edit['text5']?></textarea>
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
