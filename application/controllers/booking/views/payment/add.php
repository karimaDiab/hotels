
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة رابط دفع</h3>
            </div>
         
                 <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
              
           <?php echo form_open_multipart(base_url('/booking/'.$thispage.'/add/')); ?>
              <div class="box-body">
            
                      <div class="form-group">
                  <label >    اسم الدافع </label>
                  <input type="text" class="form-control"  placeholder=" الاسم " name="name" required autofocus value="<?=$edit['name']?>">
                </div>
                      <div class="form-group">
                  <label >   التليفون </label>
                  <input type="number" class="form-control"  placeholder=" التليفون " name="mobile" required autofocus value="<?=$edit['name']?>">
                </div>
                <div class="form-group">
                  <label >   المبلغ </label>
                  <input type="number" class="form-control"  placeholder=" الاسم " name="amount" required autofocus value="<?=$edit['name']?>">
                </div>
                      <div class="form-group">
                  <label >   وذلك عن </label>
                  <input type="text" class="form-control"  placeholder=" الاسم " name="comment" required autofocus value="<?=$edit['name']?>">
                </div>
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
