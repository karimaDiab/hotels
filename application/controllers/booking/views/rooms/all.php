<div class="row">
   
<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/rooms/mhtwa/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  المحتويات</a> 	</div>



    </div>
    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/producer/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  المنتجات</a> 	</div>



    </div>

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/rooms/imagesrooms/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الصور</a> 	</div>



    </div>











</div>

<div class="row">
    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">عرض  الشقق </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="-webkit-overflow-scrolling: touch;overflow: auto;

                     ">

                    <!-- /.box-body -->


                    <table class="table table-bordered" style='  max-width: none;'>
                        <tr>
                            <th style="width: 10px">الترتيب</th>
                            <th>الاسم</th>
                            <th>الدور</th>
                            <th>النوع</th>
                            <th>حركات </th>
                            <th>حركات النقل</th>
                            <th>طلبات الصيانة</th>
                            <th>ارشيف الصيانة</th>
                            <th></th>
                            <th style="width: 40px">صور الشقق</th>
                            <th style="width: 40px"></th>
                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row): ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?> </td>
                                <td><?= $row['door']; ?> </td>

                                <td><?= $noaroom[$row['noa']]; ?> </td>
                                <td><a class=" btn" href="<?= base_url('booking/show/all/1/' . $row['name']) ?>">50 </td>        
                                <td><a class=" btn" href="<?= base_url('booking/show/roomsmove/1/' . $row['name']) ?>"><?= $row['move']; ?> </td>        
                                <td><a class=" btn" href="<?= base_url('booking/checkroom/all/1/' . $row['name']) ?>"><?= $row['checkroom']; ?> </td>
                                <td><a class=" btn " href="<?= base_url('booking/checkroom/arshif/1/' . $row['name']) ?>"><?= $row['checkroomarshif']; ?> </a></td>


                                <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/mhtwaroom/' . $row['id']) ?>"><i class="material-icons">محتويات الشقة</i></a>
                                </td>  
                                <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/images/' . $row['name']) ?>"><i class="material-icons"> <?= $row['images']; ?> </i></a>
                                </td>  

                                <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/' . $this->thispage . '/edit/' . $row['id']) ?>"><i class="material-icons">تعديل</i></a>
                                </td>

                                <td>
                                </td>




                            </tr>

<?php endforeach; ?>

                    </table>
                </div>
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


            <!-- /.box -->
        </div>
    </div>
</div>
<!-- /.row -->
