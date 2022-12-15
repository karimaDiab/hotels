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
                <h3 class="box-title">تعديل موظف</h3>
            </div>

            <?php if (isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa-warning"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                    <?= isset($msg) ? $msg : ''; ?>
                </div>
            <?php endif; ?>   


            <?php echo form_open_multipart(base_url('ltef/' . $thispage . '/edit/' . $edit['id'])); ?>
            <div class="box-body">

                <div class="form-group">
                    <label >    الفرع	</label>
                    <select dir=rtl name='text21'  class="form-control"  >
                        <option value="<?= $edit['text21'] ?>" > <?php if ($edit['text21']) echo$noa[$edit['text21']] ?> </option>
                        <option value="1" >  السالمية </option>
                        <option value="2">  حولي </option>
                        <option value="3">  الرقعي </option>
                             <option value="4">  الشعب </option>
                               <option value="5">  ريحانة </option>
                        <option value="6">  الشركة </option>
                        <option value="7">  اخرى </option>

       <option value="8">  عمارتنا </option>
                        <option value="9">  الفنطاس </option>
                          <option value="10">  الرقغي الجديده </option>
                    </select>  
                </div>

                <div class="form-group">
                    <label >   عربي 	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text1" value="<?= $edit['text1'] ?>">
                </div>  
                <div class="form-group">
                    <label > انجليزي	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text11" value="<?= $edit['text11'] ?>">
                </div>

                <div class="form-group">
                    <label >   الجنس	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text13" value="<?= $edit['text13'] ?>">
                </div>

                <div class="form-group">
                    <label >   الجنسية	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text3" value="<?= $edit['text3'] ?>">
                </div>

                <div class="form-group">
                    <label >   التليفون	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text10" value="<?= $edit['text10'] ?>">
                </div>
                <div class="form-group">
                    <label >   الرقم المدني	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text2" value="<?= $edit['text2'] ?>">
                </div>

                <div class="form-group">
                    <label >   الراتب	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text4" value="<?= $edit['text4'] ?>">
                </div>

                <div class="form-group">
                    <label >   المكافاة	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text14" value="<?= $edit['text14'] ?>">
                </div>
 <div class="form-group">
                    <label >   راتب الشوون ذا كان عللينا	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text16" value="<?= $edit['text16'] ?>">
                </div>

                <div class="form-group">
                    <label >   المهنة	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text12" value="<?= $edit['text12'] ?>">
                </div>

                <div class="form-group">
                    <label >   المسمى الوظفيفي	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text15" value="<?= $edit['text15'] ?>">
                </div>

                <div class="form-group">
                    <label >  البداية	</label>
                    <input type="text" class="form-control"  placeholder="   " name="text6" value="<?= $edit['text6'] ?>">
                </div>

                <div class="form-group">
                    <label >   النهاية	</label>
                    <input type="text" class="form-control"  placeholder="  " name="text7" value="<?= $edit['text7'] ?>">
                </div>

                <div class="form-group">
                    <label>الحالة</label>
                    <div class="radio">

                        <input type="radio" name="text22"  value="2"  <?= $edit['checked'][2] ?>>
                        <label>    يعمل
                        </label>
                    </div>
                    <div class="radio">

                        <input type="radio" name="text22"  value="1" <?= $edit['checked'][1] ?>>
                        <label>     متوقف
                        </label>
                    </div>


                </div>
                           <div class="form-group">
                    <label>المكان</label>
                    <div class="radio">

                        <input type="radio" name="text23"  value="2"  <?= $edit['checked2'][2] ?>>
                        <label>    متنقل
                        </label>
                    </div>
                    <div class="radio">

                        <input type="radio" name="text23"  value="1" <?= $edit['checked2'][1] ?>>
                        <label>     ثابت
                        </label>
                    </div>


                </div>

            </div> 

        </div>


        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
        </div>
        </form>
    </div>
    <!-- /.box -->


</div>
<!--/.col (left) -->
<!-- right column -->

<!--/.col (right) -->
</div>
