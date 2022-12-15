<div class="row">
 

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/rooms/imagesall/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  كل الصور</a> 	</div>



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
                      
                            <th>الشقة</th>
                         
                            <th>الصالة </th>
                              <th> </th>
                            <th>الماستر </th>
                             <th> </th>
                            <th>الثانية </th>
                             <th> </th>
                            <th>الثالثة </th>
                             <th> </th>
                            <th>الكل</th>
                        </tr>

                        <?php $count = 0;
                        foreach ($all_groups as $row):
                            
                            
                            if(!isset($row['image1']['dateadd']))$row['image1']['dateadd']='';
                                     if(!isset($row['image2']['dateadd']))$row['image2']['dateadd']='';
                                         if(!isset($row['image3']['dateadd']))$row['image3']['dateadd']='';
                                   if(!isset($row['image7']['dateadd']))$row['image7']['dateadd']='';
                              
                                ?>
                            <tr>
                              
                                <td><?= $row['name']; ?> </td>
                                
                                  <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/images/' . $row['name']) ?>"><i class="material-icons"> <?= $row['images1']; ?> </i></a>
                                  </td>    <td>    
                                        <?php if($row['image1']['dateadd']) echo  $this->booking->getNiceDuration($this->booking->tissme_now() - $row['image1']['dateadd']); ?>
                                </td>  
                                  <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/images/' . $row['name']) ?>"><i class="material-icons"> <?= $row['images2']; ?> </i></a>
                                </td>  
                                 <td>    
                                           <?php if($row['image2']['dateadd']) echo  $this->booking->getNiceDuration($this->booking->tissme_now() - $row['image2']['dateadd']); ?>
                                </td>  
  <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/images/' . $row['name']) ?>"><i class="material-icons"> <?= $row['images3']; ?> </i></a>
                                </td> 
                                 <td>    
                                   <?php if($row['image3']['dateadd']) echo  $this->booking->getNiceDuration($this->booking->tissme_now() - $row['image3']['dateadd']); ?>
                                </td>  
                             <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/images/' . $row['name']) ?>"><i class="material-icons"> <?= $row['images7']; ?> </i></a>
                                </td>      


 <td>    
                                 <?php if($row['image7']['dateadd']) echo  $this->booking->getNiceDuration($this->booking->tissme_now() - $row['image7']['dateadd']); ?>
                                </td>  

                              
                                <td>     <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/images/' . $row['name']) ?>"><i class="material-icons"> <?= $row['images']; ?> </i></a>
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
