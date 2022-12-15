<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('ltef/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('ltef/modif/') ?>">الموظفين</a></li>
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


            <?php echo form_open_multipart(base_url('ltef/' . $thispage . '/add/')); ?>
            <div class="box-body">


 <div class="form-group">
                    <label >    الفرع	</label>
               <select dir=rtl name='text21'  class="form-control"  >
                   <option value="1" >  السالمية </option>
                   <option value="2">  حولي </option>
                   <option value="3">  الرقعي </option>
                <option value="4">  الشعب </option>
               <option value="5">  ريحانة </option>
                             <option value="9">   الفنطاس </option>
                                      <option value="10">   الرقعي الجديده </option>
                        <option value="8">  عمارتنا حولي </option>
                   <option value="6">  الشركة </option>
                   <option value="7">  اخرى </option>
                 
    
                  </select>  
                      </div>
                <div class="form-group">
                    <label >   عربي 	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text1" value="">
                </div>  
                <div class="form-group">
                    <label > انجليزي	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text11" value="">
                </div>

 <div class="form-group">
                    <label >   الجنس	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text13" value="">
                </div>

                <div class="form-group">
                    <label >   الجنسية	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text3" value="">
                </div>
 <div class="form-group">
                    <label >   التليفون	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text10" value="">
                </div>
                 <div class="form-group">
                    <label >   الرقم المدني	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text2" value="">
                </div>
                 
                  <div class="form-group">
                    <label >   الراتب	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text4" value="">
                </div>
                
                  <div class="form-group">
                    <label >   المكافاة	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text14" value="">
                </div>
 <div class="form-group">
                    <label >   راتب الشوون ذا كان عللينا	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text16" value="">
                </div>

                <div class="form-group">
                    <label >   المهنة	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text12" value="">
                </div>

                <div class="form-group">
                    <label >   المسمى الوظفيفي	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text15" value="">
                </div>
                
                     

                <div class="form-group">
                    <label >  البداية	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text6" value="">
                </div>

                <div class="form-group">
                    <label >   النهاية	</label>
                    <input type="text" class="form-control"  placeholder="  " name="text7" value="">
                </div>

                <div class="form-group">
                      <label>النوع</label>
                  <div class="radio">
                
                      <input type="radio" name="text22"  value="2"  checked="">
                <label>       يعمل
                    </label>
                  </div>
                  <div class="radio">
                  
                      <input type="radio" name="text22"  value="1">
                <label>    متوقف
                    </label>
                  </div>
                      
                      
                   
                
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
