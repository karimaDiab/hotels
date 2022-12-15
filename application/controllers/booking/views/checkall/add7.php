
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">  تفتيش  الكاميرات</h3>
            </div>

            <?php if (isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa-warning"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                    <?= isset($msg) ? $msg : ''; ?>
                </div>
            <?php endif; ?>   


            <?php echo form_open_multipart(base_url('booking/' . $thispage . '/add2/' . $show['id'] . '/' . $text)); ?>
            <div class="box-body">



                <?php
                $array[] = "          هل     مواقف السيارات نظيفة";
                 $array[] = "هل اسقاء الاشجار والتاكد من نظافة مجرى الماي";
                  $array[] = "هل الواجهة البناية والزجاج  نظيفة";
                $array[] = "          هل  اللوبي والاصنصيل نظيفة     ";
                $array[] = "هل  ممرات الادوار    والحاويات نظبفة";
                
                $array[] = "هل   السلالم ننظيفة ولايوجد بها  اغراض";
                
                $array[] = "هل المكتب نظيف";
                
                $array[] = "هل  المعطرات  في الادار والاستقبال تعمل";
                
                $array[] = "هل المفروشات بعد  الغسيل  نظيفة لايوجد بقع   ولاشعر  ولا رائحة";
                
                $array[]="";
                
                
                
                for ($index = 0; $index < count($array); $index++) {
                    if ($array[$index]) {
                        ?>

<input type="text" name="all" id="optionsRadios1" value="<?= count($array) ?>" style="display: none" >
                        <div class="form-group">
                            <input type="text" name="text[tt0t<?= $index ?>]" id="optionsRadios1" value="  
        <?= $array[$index] ?>
                                   " style="display: none" >
                            <label>  
                            <?= $index + 1 ?>-
        <?= $array[$index] ?>

                            </label>
                            <div class="radio">
                                <input type="radio" name="text[tt1t<?= $index ?>]" id="optionsRadios1" value="نعم" required >
                                <label>
                                    نعم
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="text[tt1t<?= $index ?>]" id="optionsRadios2" value="لا" required>
                                <label>
                                    لا
                                </label>
                            </div>



                            <div class="form-group">
                                <label>ملاحظة</label>
                                <textarea class="form-control" rows="3" placeholder="وصف ..." name="text[tt2t<?= $index ?>]"> </textarea>
                            </div>

                            <div class="form-group">
                                <label> صورة</label>
                                <input type="radio" name="text[tt3t<?= $index ?>]" id="optionsRadios2" value=" " checked="" style="display: none">
                                <input type="file" id="exampleInputFile" name="tt3t<?= $index ?>" required>
                            </div>


                        </div>

    <?php
    }
}
?>


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
