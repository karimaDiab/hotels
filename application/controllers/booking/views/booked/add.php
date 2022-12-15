<link href="<?= base_url() ?>public/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>public/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">

<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booked/all/')?>">حجز موكد</a></li>
      </ol>
    </section>
 <br>



     <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> خطأ</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
 
 <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> حجز جديد</h3>
            </div>
         
             
              
           <?php echo form_open_multipart(base_url('booking/booked/add2/'.$room)); ?>
              <div class="box-body">
          
      
                      <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1"> الرقم المدني	</label>
                  <input type="text" class="form-control"  placeholder="الرقم المدني " name="cid"  value="">
                  <select name="noa" dir="rtl" style="  width: 100px;

  margin-top: 10px;">

      
<option>بطاقة مدنية</option>
  <option>جواز سفر</option>
  <option>بطاقة احوال</option>
  <option>رخصة قيادة</option>
  
                        	</select>
                </div>
                        <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1">  او التليفون	</label>
                  <input type="text" class="form-control"  placeholder=" التليفون " name="mobile" value="" >
         
                </div>    
                  <div class="form-group  col-md-12">
             <div class="form-group">
                    <label>  تاريخ الحجز</label>
                    <div class="row">
                        <div class="radio col-md-4">
                            <input type="radio" name="noo3" id="optionsRadios123" value="today" checked onclick="javascript:no3(1)">
                            <label>
                                 اليوم                   </label>
                        </div>
                        <div class="radio col-md-4">
                            <input type="radio" name="noo3" id="optionsRadios223" value="date" onclick="javascript:no3(2)">
                            <label>
                            اختر التاريخ
                            </label>
                        </div>
                      
                    </div>
                </div>
                   </div>
                  
                  <div class="form-group  col-md-12" id="date" style="display: none">
                  <label for="exampleInputPassword1">   تاريخ الحجز 	</label>
                  <input id="dateTimeFlatpickr" name="datetext4" value="<?=date("Y-m-d")?>" class="form-control flatpickr flatpickr-input " type="text" placeholder="Select Date.."><br>
         
                </div>    
                 
                   
               
            
                  
                      <script language="JavaScript">


                    function no3(varO1) {
                        if (varO1 == 1)
                        {
       
                            document.getElementById("date").style.display = "none";
           
                        }
                        if (varO1 == 2)
                        {
                           document.getElementById("date").style.display = "block";
                           
                    
                        }
                       
                    }
                </SCRIPT>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">استمرار الحجز</button>
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
  
    dateFormat: "Y-m-d",
});
</script>