<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('ltef/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('ltef/'.$thispage.'/') ?>">,
           الوصلات </a></li>
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
                    <label >    القسم	</label>
               <select dir=rtl name='counter'  class="form-control"  >
                   <option value="1" > السالمية </option>
                   <option value="2">  حولي </option>
        
                   <option value="7">  الرقعي </option>
                   <option value="8">  الشعب </option>
                                <option value="9">  ريحانه </option>
                                           <option value="11">   الفنطاس </option>
                                               <option value="12">   الرقعي الجديدة </option>
                                            <option value="10">  عمارتنا حولي </option>
          <option value="6">  الشركة </option>
         <option value="5">  اخرى </option>
                  </select>  
                      </div>
                <div class="form-group">
                    <label >   الشهر 	</label>
                    <input type="text" class="form-control"  placeholder="   " name="dateadd" value="<?= $dataday ?>">
                </div>  
           



               
 <div class="form-group">
                    <label >   المبلغ	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text1" value="">
                </div>
          
                  <div class="form-group">
                    <label >   طريقة الدفع	</label>
                 
                       <input type="radio"     value="شيك"  name="text2">شيك &nbsp; &nbsp;&nbsp; &nbsp;
        	<input type="radio"     value="تحويل"  name="text2">تحويل &nbsp; &nbsp;&nbsp; &nbsp;
        	 <input type="radio"     value="كاش"  name="text2">كاش &nbsp; &nbsp;&nbsp; &nbsp;
                   
		
                </div>
                  <div class="form-group">
                    <label >    البنك	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text3" value="">
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
