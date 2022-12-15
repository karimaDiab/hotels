






<div class="row">

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/rooms/mhtwa/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  المحتويات</a> 	</div>



    </div>














</div>
<?php echo form_open_multipart(base_url('booking/' . $thispage . '/alledite/')); ?>

<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  المحتويات </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>الاسم</th>

                            <th>السعر</th>
                            <th>المكان</th>
                            <th>اساسي</th>   



                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row):
                            ?>
                            <tr>

                                <td><input type="text" dir="rtl" name="text1<?= $row['id'] ?>" size="40" value="<?= $row['text1'] ?>"  style="width:150px;" /></td>
                                <td><input type="text" dir="rtl" name="text6<?= $row['id'] ?>" size="40" value="<?= $row['text6'] ?>"  style="width:150px;" /></td>
                                <td> <select  name='text5<?= $row['id'] ?>' class="form-control"  dir="rtl"   style="

                                              margin-top: 10px;" > 
                                        <option value='<?= $row['text5'] ?>'> <?php if ($row['text5']) echo $nao[$row['text5']]; ?></option> 
                                        <?php for ($count = 1; $count < count($nao) + 1; $count ++): ?>
                                            <option value='<?= $count ?>'> <?php echo $nao[$count]; ?></option> 
                                        <?php endfor; ?>
                                    </select></td>
                                <td> <select  name='text8<?= $row['id'] ?>' class="form-control"  dir="rtl"   style="

                                              margin-top: 10px;" > 
                                        <option value='<?= $row['text8'] ?>'> <?php if ($row['text8']) echo $nao2[$row['text8']]; ?></option> 
                                        <?php for ($count = 1; $count < count($nao2) + 1; $count ++): ?>
                                            <option value='<?= $count ?>'> <?php echo $nao2[$count]; ?></option> 
                                        <?php endfor; ?>
                                    </select></td>          






                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($all_count > 1): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                <li><a href="<?= base_url('booking/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

                            <?php endfor; ?>
                        </ul>
                    </div>
                        <?php endif; ?>   
            </div>
            <!-- /.box -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
            </div>

            <!-- /.box -->
        </div>
    </div>
</div>
</form>
<!-- /.row -->

