
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">تعديل شقة</h3>
            </div>
         
                 <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
              
           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/edit/'.$edit['id'])); ?>
     
                <div class="form-group">
                  <label for="exampleInputEmail1">اسم الشقة </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم " name="name" required autofocus value="<?=$edit['name']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"> الدور	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="رابط الصورة" name="door" value="<?=$edit['door']?>">
                </div>
             
           <div class="form-group">
                    <label>النوع</label>
                    <div class="radio">
                        <input type="radio" name="noa" id="optionsRadios1" value="1" <?= $edit['checked'][1] ?>>
                        <label>
                                واحد سرير مزدوج
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="noa" id="optionsRadios2" value="2" <?= $edit['checked'][2] ?>>
                        <label>
                              اثنين  سرير  مزدوج
                        </label>
                    </div>

                    <div class="radio">
                        <input type="radio" name="noa" id="optionsRadios2" value="3" <?= $edit['checked'][3] ?>>
                        <label>
                             واحد مزدوج واثنين فردي
                        </label>
                    </div>
                      <div class="radio">
                        <input type="radio" name="noa" id="optionsRadios2" value="4" <?= $edit['checked'][4] ?>>
                        <label>
                            اربعة فردي
                        </label>
                    </div>
                

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
