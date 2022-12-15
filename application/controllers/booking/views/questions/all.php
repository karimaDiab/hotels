













        
   

  <div class="row">

    <!-- Main content -->

  

      <div class="row">

        <div class="col-md-12">

          <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title">أنواع التفتيش </h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table class="table table-bordered">

                <tr>

<?php if (isset($types) && $types !=null){  ?>
         <?php foreach ($types as $one){ ?>   
					<td>

                <a href="<?= base_url()?>/booking/questions?type=<?=$one['id']?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i><?=$one['name']?></a> 

            </td>
<?php } } ?>
                
            </tr>
   
              </table>

            </div>

        

          </div>

          <!-- /.box -->



          

          <!-- /.box -->

        </div>

     </div>
	 <div class="row" >



<div  style="float:right;  padding: 20px;"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/questions/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة سؤال</a> 	</div>


        </div>

            

         

</div>
 
	<?php if (isset($all_groups) && $all_groups !=null){  ?>
	  
      <div class="row">

        <div class="col-md-12">

          <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title"> أسئلة ال<?=$type_name?></h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table class="table table-bordered">

                <tr>
                  <?php $i=1;  ?>
               

                  <th>الرقم التسلسلي</th>

                           <th >السؤال</th>
                    <?php if (!isset($_GET['type'])){?> 
					<th >نوع التفتيش</th>
					<?php } ?>
                             </tr>

                

                     <?php $count=0; foreach($all_groups as $row):?>

                <tr>

                  <td><?= $i; ?></td>

                  <td><?= $row['text']; ?> </td>
                    <?php if (!isset($_GET['type'])){?> 
					<th ><?=$row['type_value']?></th>
					<?php } ?>
             <td>

				       <a title="edit" class="delete btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/edit/'.$row['id']); ?>" ><i class="material-icons"> تعديل</i></a>
<br/><br/>
                                <a title="Delete" class="delete btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/del/'.$row['id']); ?>" ><i class="material-icons"> حذف</i></a>

                </td>     

                </tr>

              

                    <?php $i++; endforeach; ?>

                

              </table>

            </div>

            <!-- /.box-body -->

                       <?php if($all_count>1): ?>

        <div class="box-footer clearfix">

              <ul class="pagination pagination-sm no-margin pull-right">

                  

   <?php for($count=1;$count<$all_count;$count++):?>

                <li><a href="<?= base_url('booking/'.$this->thispage.'/all/'.$count); ?>"><?=$count?></a></li>

          

          <?php endfor; ?>

              </ul>

            </div>

                <?php endif; ?>   

          </div>

          <!-- /.box -->



          

          <!-- /.box -->

        </div>

     </div>
	  
	  
	  <?php } ?>

      </div>

      <!-- /.row -->

  

