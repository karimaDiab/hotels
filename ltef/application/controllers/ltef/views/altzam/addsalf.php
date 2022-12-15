<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('booking/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('booking/modif/') ?>">الموظفين</a></li>
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


            <?php echo form_open_multipart(base_url('ltef/' . $thispage . '/addsalf/')); ?>
            <div class="box-body">

    <div class="form-group">
                  <label> اختر الموظف	</label>
              
                      <select dir=rtl name='text19'  class="form-control"   >
  <?php $count=0; foreach($all_groups as $row):
      $sss="";
      if($row['id']==$id)$sss="selected";
      
      ?>
                          <option value='<?=$row['id']?>'  <?=$sss?>><?=$row['text1']?></option> 
       <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                    <label >   المبلغ 	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text1" value="<?= $edit['text4'] ?>">
                </div>  
                
                <div class="form-group" style="display: none">
                    <label >   النوع 	</label>
               	<div align="$align"><input type="radio"   checked  value="سلفة من الراتب"  name="no3">سلفة &nbsp; &nbsp;&nbsp; &nbsp;
        <input type="radio"     value="خصم"  name="no3">خصم &nbsp; &nbsp;&nbsp; &nbsp;
        
             <input type="radio"     value="ملاحظة"  name="no3">ملاحظة&nbsp; &nbsp;&nbsp; &nbsp;
        
        
            </div> </div>  
                <div class="form-group">
                    <label > السبب	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text9" value="<?= $edit['text9'] ?>">
                </div>

            

            </div>
            <!-- /.box-body -->

             <div class="box-footer">
                 <input type="checkbox"     value="ملاحظة"  name="addbill">اضافة في الفواتير&nbsp; &nbsp;&nbsp; &nbsp;
            </div>
            
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
