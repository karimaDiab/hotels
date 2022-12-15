


<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/producer/')?>">المنتجات</a></li>
      </ol>
    </section>



        <div class="row">


            
            
            <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$thispage?>/stat/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الاحصائيات </a> 	</div>



        </div>


        
    
        
        

        
        
        
    
    </div>
   
  <div class="row">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">اختيار محتوى :<?=$mhtwah['text1']?> شقة <?=$room['name']?>  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
            
                  <th>المحتوى</th>
                  <th>العنوان</th>
                     <th> الموديل</th>
                        <th>الشركة </th>
                           <th>الكفالة</th>    <th>التاريخ</th>
                     <th style="width: 40px"></th>
                        
                </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['mhtwa']; ?></td>
              <td><?= $row['name']; ?></td>
                     <td><?= $row['model']; ?></td>
                            <td><?= $row['company']; ?></td>
                                   <td><?= $row['warranty']; ?></td>
                
                     <td><?= $this->booking->tissme_show($row['dateadd']); ?></td>
             
                   
                 
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('booking/'.$this->thispage.'/checkmhtwaok/'.$room['id'].'/'.$mhtwah['id'].'/'.$row['id'])?>"><i class="material-icons">اختيار</i></a>
                    </td>
                    
           
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
      
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>
      <!-- /.row -->
  
