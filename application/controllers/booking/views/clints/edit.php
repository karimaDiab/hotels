<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/clints/')?>">العملاء</a></li>
      </ol>
    </section>
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">تعديل   عميل </h3>
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
                  <label for="exampleInputEmail1">الاسم  </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ادخل الاسم " name="name" required autofocus value="<?=$edit['name']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"> التليفون	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" التليفون" name="mobile" value="<?=$edit['mobile']?>">
                </div>
              
                   <div class="form-group">
                  <label for="exampleInputPassword1"> الرقم المدني 	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" الرقم المدني " name="cid" value="<?=$edit['cid']?>">
                </div>
              
                   <div class="form-group">
                  <label for="exampleInputPassword1"> الجنسية	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" الجنسية" name="country" value="<?=$edit['country']?>">
                </div>
                   <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="oky"  value=""  <?=$edit['checked']['1']?>>
                <label>       عادي
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="oky"  value="star" <?=$edit['checked']['2']?>>
                <label> مميز
                    </label>
                  </div>
                      
                         <div class="radio">
                 
                      <input type="radio" name="oky"  value="ok" <?=$edit['checked']['3']?>>
                 <label>    بلاك لست
                    </label>
                  </div>
                        <div class="radio">
                 
                      <input type="radio" name="oky"  value="all" <?=$edit['checked']['4']?>>
                 <label>    بلاك لست لحميع الفروع
                    </label>
                  </div>
                
                </div>   
             <div class="form-group">
                  <label>وصف</label>
                  <textarea class="form-control" rows="3" placeholder="وصف ..." name="comment"><?=$edit['comment']?></textarea>
                </div>
                    <div class="form-group">
                  <label for="exampleInputFile">  صورة الاثبات 1 </label>
                  <input type="file" id="exampleInputFile" name="file1">

                </div>
                  
                     <div class="form-group">
                  <label for="exampleInputFile">  صورة الاثبات 2</label>
                  <input type="file" id="exampleInputFile" name="file2">

                </div>
           
            
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
              </div>
            </form>
              </div>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
    
