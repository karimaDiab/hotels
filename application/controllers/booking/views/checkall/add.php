<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Content Header (Page header) -->

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Core CSS RTL-->
    <link href="<?=base_url()?>css/bootstrap-rtl.min.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>css/ccs-admin-1.css" rel="stylesheet" type="text/css">


<style>
    
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
 // font-size: 17px;
//  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
#nextBtn{
    margin: 30px 0 ;
    text-align: center;
}


.content-table th {
    text-align: center;
    font-size: 12px;
}


.border-box{
    border: 1px solid #ccc;
    padding: 20px;
    margin: 20px 0;
}


</style>


<div class="row">

    <!-- left column -->

    <div class="col-md-12">

        <!-- general form elements -->

        <div class="box box-primary">

            <div class="box-header with-border" style="    margin-top: 70px;">

                <h6 class="box-title">    إضافة تفتيش</h6>

            </div>



            <?php if (isset($msg) || validation_errors() !== ''): ?>

                <div class="alert alert-warning alert-dismissible">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <h4><i class="icon fa-warning"></i> Alert!</h4>

                    <?= validation_errors(); ?>

                    <?= isset($msg) ? $msg : ''; ?>

                </div>

            <?php endif; ?>   



<?php if (!isset($_GET['type_id'])){ ?>

            <?php echo form_open_multipart(base_url('booking/' . $thispage . '/add_check')); ?>

            <div class="box-body">
 <div class="form-group">

                  <label >   نوع التفتيش	</label>

                  <select class="form-control"  name='type_id'>

                      <option>اختر</option>

                      <?php foreach ($types as $one){ ?>

                      <option value='<?=$one['id']?>'><?=$one['name']?></option>

                      <?php } ?>

                  </select>

                </div>

   </div> 

         </div>

            <!-- /.box-body -->



            <div class="box-footer">

                <button type="submit" class="btn btn-primary" name="submit" value="pl">التالي</button>

            </div>

            </form>
<?php } else { ?>
       <div id="wrapper">


        <div id="page-wrapper">
            <div class="page-all">
                <div class="container">
	 <div class="content-table">
		             <?php echo form_open_multipart(base_url('booking/' . $thispage . '/add_check'), array('id' => 'regForm','class'=>"form-horizontal  form-all")); ?>
  <div class="form-content">
		 <?php 
		  $query = $this->db->get_where('check_types', array('id' => $_GET['type_id']));
            $type = $query->row_array();
		
	$query = $this->db->get_where('questions', array('type_id' => $_GET['type_id']));
       $ques = $query->result_array();
		 ?>
  <h3 class="text-center">إضافة تفتيش <?=$type['name']?></h3>   <hr>
  <!-- One "tab" for each step in the form: -->
	<br/><br/>
  <?php $i=1; foreach ($ques as $one){?>
	<div class="tab"> 
        <label><?=$i.'- '?><?=$one['text']?></label>
<input type="hidden" name="question_<?=$one['id']?>" value="<?=$one['id']?>" />

     
  
        
		
        
          <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="نعم">
                                        نعم </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="لا">
                                        لا </label>
                                </div>
		 <div class="border-box">
                                    <h3 class="text-center">ارفاق الصورة </h3>
                                    <hr>

                                    <input type="file"  name="image_<?=$one['id']?>"  class="form-control-file" accept="image/*;capture=camera" required >

                                </div>
              <h3 class="text-center">ملاحظة </h3>
                                <hr>
                                <textarea class="form-control" rows="6" placeholder=" ملاحظة"  name="note_<?=$one['id']?>" ></textarea>

	  </div>
	<?php $i++;} ?>
	

  <div style="overflow:auto;">
    <div style="    text-align: center;    margin: 30px;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">السابق</button>
      <button type="button" class="btn btn-success" id="nextBtn" name="nextBtn" onclick="nextPrev(1)">التالي</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
	   </div> 
</form>

  </div>  </div>  </div>  </div>  </div>
	<?php // print_r('4444');exit;  ?>
	
	<?php } ?>
        </div>

        <!-- /.box -->





    </div>

    <!--/.col (left) -->

    <!-- right column -->



    <!--/.col (right) -->

</div>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "grid";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {

    document.getElementById("nextBtn").innerHTML = "إرسال";	 
//document.getElementById("nextBtn").setAttribute('type', 'submit');

  } else {
    document.getElementById("nextBtn").innerHTML = "التالي";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
