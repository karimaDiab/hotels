




<div class="row">

    <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer">
                <div class="row">



                    <div class="col-sm-1 border-right">
                        <div class="description-block">
                            <h5 class="description-header"><?= $all_count ?></h5>
                            <span class="description-text"> الملفات</span>
                        </div>
                        <!-- /.description-block -->
                    </div>


                    <!-- /.col -->


                    <!-- /.col -->
                </div>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>


    <!-- /.col -->
</div>


<div class="row">

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/ltef/<?= $this->thispage ?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة   ملف</a> 	</div>



    </div>



  
            <div class="col-md-4 col-xs-12">
<form action="<?= base_url()?>ltef/<?=$this->thispage?>" method="get">
                <div class="input-group">
                  <input type="text" name="search" placeholder="البحث في الملفات  ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">ابحث</button>
                      </span>
                </div>
              </form>
        
        
        
     </div>



</div> 


<div class="row">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">الوصلات  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="overflow-x: auto;
                     white-space: nowrap;
                     direction: rtl;">
                    <table class="table table-bordered">
                        <tr>
                            <th>القسم</th>  
                            <th>العنوان</th>   
                            <th>ملاحظات</th>  
                            <th> تاريخ الانتهاء</th>



                            <th>الملف الاول</th>  <th>الملف الثاني</th>


                        </tr>

                        <?php $count = 0;
                        $count2 = 0;
                        foreach ($all_groups as $row): ?>
                            <tr>


                                <td><?= $row['text1']; ?>  </td>
                                <td><?= $row['text2']; ?> </td>   
                                <td><?= $row['text3']; ?> </td>   
                                <td><?= $row['dateadd']; ?>  </td>







                                <td>         <a  href="<?= base_url($row['text4']) ?>" class="btn btn-success" target="_block">

                                        تحميل 
                                    </a>  </td>  
                                <td>        
                                    <?php 
                                    
                                    if($row['text5']){
                                    
                                        ?><a  href="<?= base_url($row['text5']) ?>"  class=" btn btn-success" target="_block">

                                        تحميل </a> 
                                    <?php } ?></td>  

                                <td>              <a title="Delete" class="delete btn btn-sm btn-primary pull-right '.$disabled.'" href="<?= base_url('ltef/' . $this->thispage . '/edit/' . $row['id']); ?>" ><i class="material-icons">تعديل</i></a>

                                </td>

                                <td>              <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('ltef/' . $this->thispage . '/del/' . $row['id']); ?>" ><i class="material-icons">حذف</i></a>

                                </td>

                            </tr>

<?php endforeach; ?>
                    </table>
                </div>
                <!-- /.box-body -->
<?php if ($pages > 2): ?>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">

                            <?php for ($count = 1; $count < $pages; $count++): ?>
                                <li><a href="<?= base_url('ltef/' . $this->thispage . '/all/' . $count); ?>"><?= $count ?></a></li>

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

