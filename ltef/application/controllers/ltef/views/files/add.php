<link href="<?= base_url() ?>public/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('ltef/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('ltef/'.$thispage.'/') ?>">,
           الملفات </a></li>
    </ol>
</section>
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
          <div class="box box-primary" style="padding: 20px">
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
                    <label >   القسم 	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text1" value=""> <br> مثل بشير سالم - السالمية
                </div>
          
               <div class="form-group">
                    <label >  نوع	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text2" value=""><br>    مثل  : بطاقة مدنية - عقد ايجار
                </div>
                  <div class="form-group">
                    <label >   ملاحظات	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text3" value="">
                </div>
                    <div class="form-group  " id="date" style=" ">
                  <label for="exampleInputPassword1">   تاريخ الانتهاء 	</label>
                  <input id="dateTimeFlatpickr" name="datetext4" value="<?=date("Ymd")?>" class="form-control flatpickr flatpickr-input " type="number" placeholder="Select Date.."><br>
         
                </div>  
                 <div class="form-group">
                    <label >    الملف الاول	</label>
                   <input type="file" id="exampleInputFile" name="file1">
                </div>
                   <div class="form-group">
                    <label >    الملف الثاني	</label>
                   <input type="file" id="exampleInputFile" name="file2">
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
         <script src="<?= base_url() ?>public/plugins/flatpickr/flatpickr.js"></script>
    <script src="<?= base_url() ?>public/plugins/noUiSlider/nouislider.min.js"></script>
     <script>
 var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
  
    dateFormat: "Ymd",
});
</script>