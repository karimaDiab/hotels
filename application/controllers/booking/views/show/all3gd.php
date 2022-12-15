<h1>
    
    العقود من 
    <?php if(count($all_groups)){ echo  $all_groups[0]['3gd'] ?> الى 
    
     <?php echo$all_groups[count($all_groups)-1]['3gd'];
            
    } ?>
</h1>



      <?php echo form_open_multipart(); ?>

<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
        
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">الشقة</th>
                            <th>الاسم</th>


                            <th>الدخول</th> 
                            <th>العقد</th>


                            <th style="width: 10px">الشقة</th>
                            <th>الاسم</th>


                            <th>الدخول</th> 
                            <th>العقد</th>         

                        </tr>
                        <tr>
                            <?php $count = 0;
                            $ids = 1;
                            foreach ($all_groups as $row): ?>

                                <td><?= $row['3gd'] ?><br><?= $row['room']; ?></td>
                                <td><?= $row['name']; ?> <br><?= $row['user']; ?></td>


                                <td><?= $this->booking->tissme_show($row['timeenter']); ?> </td>
                                <td>
                                    <span class="label label-danger"><?= $row['3gdok'] ?></span><br>
                                    <input type="checkbox" id="id" name="idall[]" value="<?= $row['id'] ?>"></td>
<?php
                                if ($ids % 2 == 0)
                                    echo "</tr><tr  >";
                                $ids++;
                            endforeach;
                            ?>

                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->

                    <?php if ($pages > 1): ?>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $pages; $count++): ?>
                            <li><a href="<?= base_url('booking/' . $this->thispage . '/all3gd/' . $count."/".$old); ?>"><?= $count ?></a></li>

    <?php endfor; ?>
                    </ul>
                </div>
<?php endif; ?>   
            <!-- /.box -->
        </div>
    </div>
</div>
       <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">غير موقع</button>
            </div>
          </div>
            </form>
<!-- /.row -->

