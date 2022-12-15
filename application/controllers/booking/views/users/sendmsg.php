
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> ارسال رسالة</h3>
            </div>
         
                 <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
              
           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/sendmsg/')); ?>
              <div class="box-body">
            
                <div class="form-group">
                  <label for="exampleInputEmail1"> العنوان </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" العنوان " name="title" required autofocus value="<?=$edit['name']?>">
                </div>
            
                  
                  
                  
               
              <div class="form-group">
                  <label>وصف</label>
                   <textarea class='editor' name="msg" rows="10" cols="80" aria-labelledby="article">
                  </textarea>
                
                </div>
                
              </div>
              <!-- /.box-body -->   <script src='<?= base_url() ?>public/tinymce/tinymce.min.js'></script>

    <!-- Form -->


    <!-- Script -->
    <script>
    tinymce.init({ 
      selector:'.editor',
      theme: 'modern',
      height: 200
    });
    </script>
              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">ارسال</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
