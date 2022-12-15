
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل عضو</h3>
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
                    <label for="exampleInputEmail1">اسم العضو </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" الاسم " name="name" required autofocus value="<?= $edit['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">  مسمى العضو	</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  مسمى " name="mosma" value="<?= $edit['mosma'] ?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">   الباسورد	</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  باسورد " name="pass"  >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">   الايميل	</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  ايميل " name="email" required value="<?= $edit['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">   الهاتف	</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  الهاتف " name="phone" value="<?= $edit['phone'] ?>">
                </div>


                <div class="form-group">
                    <label>وصف</label>
                    <textarea class="form-control" rows="3" placeholder="وصف ..." name="userInfo"><?= $edit['userInfo'] ?></textarea>
                </div>

                <div class="form-group">
                    <label>مجموعة</label>
                    <div class="radio">
                        <input type="radio" name="gruop" id="optionsRadios1" value="1" <?= $edit['checked'][1] ?>>
                        <label>
                            مدير
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="gruop" id="optionsRadios2" value="2" <?= $edit['checked'][2] ?>>
                        <label>
                            موظف استقبال
                        </label>
                    </div>

                    <div class="radio">
                        <input type="radio" name="gruop" id="optionsRadios2" value="3" <?= $edit['checked'][3] ?>>
                        <label>
                            مسول فرع
                        </label>
                    </div>
                      <div class="radio">
                        <input type="radio" name="gruop" id="optionsRadios2" value="5" <?= $edit['checked'][5] ?>>
                        <label>
                          شيك اوت
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="gruop" id="optionsRadios2" value="4" <?= $edit['checked'][4] ?>>
                        <label>
                            غير مفعل
                        </label>
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
