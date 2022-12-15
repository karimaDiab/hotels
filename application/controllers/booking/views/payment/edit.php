
<!-- Content Header (Page header) -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل </h3>
            </div>

            <?php if (isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa-warning"></i> Alert!</h4>
                    <?= validation_errors(); ?>
                    <?= isset($msg) ? $msg : ''; ?>
                </div>
            <?php endif; ?>   


            <?php echo form_open_multipart(base_url('admin/' . $thispage . '/edit/' . $edit['id'])); ?>
            <div class="box-body">

                <div class="form-group">
                    <label >اسم المستخدم </label>
                    <input type="text" class="form-control" placeholder=" الاسم " name="name" required autofocus value="<?= $edit['name'] ?>">
                </div>
                <div class="form-group">
                    <label >  الاسم 	</label>
                    <input type="text" class="form-control"  placeholder="  مسمى " name="mosma" value="<?= $edit['mosma'] ?>">
                </div>


                <div class="form-group">
                    <label >   الباسورد	</label>
                    <input type="text" class="form-control"  placeholder="  باسورد " name="pass"  >
                </div>
                <div class="form-group" style="display: none">
                    <label >   الايميل	</label>
                    <input type="email" class="form-control"  placeholder="  ايميل " name="email"  value="<?= $edit['email'] ?>">
                </div>
    <div class="form-group" style="display: none">
                  <label >   الدولة	</label>
                  <input type="text" class="form-control"  placeholder="  الهاتف " name="Country" value="<?=$edit['Country']?>">
                </div>
                <div class="form-group">
                    <label >   الهاتف	</label>
                    <input type="text" class="form-control"  placeholder="  الهاتف " name="phone" value="<?= $edit['phone'] ?>">
                </div>


                <div class="form-group" style="display: none">
                    <label>وصف</label>
                    <textarea class="form-control" rows="3" placeholder="وصف ..." name="userInfo"><?= $edit['userInfo'] ?></textarea>
                </div>

                <div class="form-group">
                    <label>نوع العضوية</label>
                    <div class="radio">
                        <input type="radio" name="gruop" id="optionsRadios1" value="1" <?= $edit['checked'][1] ?>>
                        <label>
                            مسؤل
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="gruop" id="optionsRadios2" value="2" <?= $edit['checked'][2] ?>>
                        <label>
                            سائق
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
