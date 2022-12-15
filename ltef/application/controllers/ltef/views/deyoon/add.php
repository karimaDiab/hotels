<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('ltef/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('ltef/'.$thispage.'/') ?>">,
           الديون</a></li>
    </ol>
</section>
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">اضافة </h3>
            </div>

            <?php if (isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa-warning"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                    <?= isset($msg) ? $msg : ''; ?>
                </div>
            <?php endif; ?>   


            <?php echo form_open_multipart(base_url('ltef/' . $thispage . '/add/')); ?>
            <div class="box-body">


 <div class="form-group">
                    <label >    الفرع	</label>
               <select dir=rtl name='text21'  class="form-control"  >
                   <option value="1" > الكويت </option>
                   <option value="2">  السعودية </option>
        
                   <option value="7">  اخرى </option>
                 
    
                  </select>  
                      </div>
                <div class="form-group">
                    <label >   الاسم 	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text1" value="">
                </div>  
           



               
 <div class="form-group">
                    <label >   التليفون	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text2" value="">
                </div>
          
                  <div class="form-group">
                    <label >   المبلغ	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text4" value="">
                </div>
                  <div class="form-group">
                    <label >    المقدم	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text13" value="">
                </div>
               <div class="form-group">
                    <label >    القسط	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text16" value="">
                </div>

                <div class="form-group">
                    <label >    عدد الاقساط	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text15" value="">
                </div>
            <div class="form-group">
                    <label >   طريقة الدفع	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text3" value="">
                </div>

                     <div class="form-group">
                  <label for="exampleInputPassword1">   تاريخ المعاملة 	</label>
               
                  <input type="text" class="form-control"  id="datepicker2" placeholder="  المستلم " data-date-format="yyyymmdd"  name="text17" value="<?=$dateadd?>">
                  
                </div> 
            
                     <div class="form-group">
                  <label for="exampleInputPassword1">    اول قسط 	</label>
               
                  <input type="text" class="form-control"  id="datepicker" placeholder="  المستلم " data-date-format="yyyymmdd"  name="dateadd" value="<?=$dateadd?>">
                  
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
<script > 
    
      $(function () {

        $('#ss').datepicker({
      autoclose: true
    });

      }
        </script>