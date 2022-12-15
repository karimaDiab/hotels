















   

  <div class="row">

    <!-- Main content -->

  

      <div class="row">

        <div class="col-md-12">

          <div class="box">

            <div class="box-header with-border">

              <h3 class="box-title">  سجل التفتيش </h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

              <table class="table table-bordered" style="display: none;">

                <tr>

               

                  <th>اليوزر</th>

                  <th>التاريخ</th>

                    <th>الوقت</th>

                  <th >الاستقبال</th>

                       <th >النظافة</th>

                         <th >الكاميرات</th>

                           <th >الموظفين</th>

                             </tr>

                

                     <?php $count=0; foreach($all_groups as $row):?>

                <tr>

                  <td><?= $row['text1']; ?></td>

                  <td><?= $row['text2']; ?> </td>

                      <td><?= $row['text3']; ?> </td>

                

            

             

                   

            <td>

                    <?php     if(!$row['text4']){  ?><a href="<?= base_url()?>/booking/checkall/add2/<?=$row['id']?>/4" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الاستقبال</a> <?php } ?>

                    

                       <?php     if($row['text4']){  ?><a href="<?= base_url()?>/booking/checkall/show/<?=$row['id']?>" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   عرض</a> <?php } ?>

                   

            </td>

                 <td>

                    <?php     if(!$row['text5']){  ?><a href="<?= base_url()?>/booking/checkall/add2/<?=$row['id']?>/5" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   النظافة</a> <?php } ?>

                   

            </td>

                    <td>

                    <?php     if(!$row['text6']){  ?><a href="<?= base_url()?>/booking/checkall/add2/<?=$row['id']?>/6" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الكاميرات</a> <?php } ?>

                   

            </td>

                    <td>

                    <?php     if(!$row['text7']){  ?><a href="<?= base_url()?>/booking/checkall/add2/<?=$row['id']?>/7" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الموظفين</a> <?php } ?>

                   

            </td>

              

                              <td>

                                <a title="Delete" class="delete btn btn-sm btn-success pull-right '.$disabled.'" href="<?= base_url('booking/'.$this->thispage.'/show/'.$row['id']); ?>" ><i class="material-icons">عرض الكل</i></a>

                </td>       <td>

                              

                </td>

             

                   

                  

           

                </tr>

              

                    <?php endforeach; ?>

                

              </table>

	<!-- <br>
<br>
<br>
<br>
<br>
my work -->			
      <table class="table table-bordered">

                <tr>

               

                  <th>اليوزر</th>

                    <th>التاريخ</th>
                    <th >الاستقبال</th>
                     <th >النظافة</th> 
					 <th >الكاميرات</th>       
					 <th >الموظفين</th>       
					<th >عمليات</th>

                             </tr>

                

                     <?php $routes=array(); $count=0; foreach($all_groups as $row):?>

                <tr>
					<?php 
				/*	if (!in_array($routes['date'],$row['text2']) && !in_array($routes['user_id'],$row['text1']) ){
						$obj->date=$row['text2'];
						$obj->user_id=$row['text1'];
						array_push($routes,$obj);
					}
					*/
					?>
<?php 
                    if(is_numeric($row['text1'])){
$query = $this->db->get_where('user', array('id' =>$row['text1']));
 $user = $query->row_array(); 
                    }
                    else {
                     $user['name']=$row['text1'];    
                    }
?>
                  <td><?= $user['name']; ?></td>

                  <td><?php echo  ($row['text2']); ?>
					<br/>
					<?php 
					  $date =  date('w', strtotime($row['text2']));
$day  = $date;
$days = array('الأحد', 'الأثنين', 'الثلاثاء', 'الاربعاء','الخميس','الجمعة', 'السبت');
$day2=$days[$day];
					  ?><?php echo $day2; ?>
					</td>

               
                  
               	 <?php 
		  $query = $this->db->get_where('check_types', array('id' =>$row['type_id']));
            $type = $query->row_array(); 
                 ?>
            <td> <?php
				$query = $this->db->get_where('booking_checkall', array('text2' =>$row['text2'],'type_id' =>2,'text1' =>$row['text1']));
                $one_v = $query->row_array(); ?>
					<?php if ($one_v !=null){ ?>
				<a title="Show" class="Show btn btn-sm btn-success " style="    margin-right: 20px; margin-left: 20px;
" href="<?= base_url('booking/'.$this->thispage.'/show/'.$one_v['id']); ?>" ><i class="material-icons"> عرض</i></a><br/><p  style="     margin-top: 20px;     margin-right: 20px; margin-left: 20px;"><?= $row['text3']; ?></p> 
				<?php } else { echo 'لا يوجد';} ?>
					</td>
			<td>	<?php
				$query = $this->db->get_where('booking_checkall', array('text2' =>$row['text2'],'type_id' =>1,'text1' =>$row['text1']));
                $one_v = $query->row_array(); ?>
					<?php if ($one_v !=null){ ?>
				<a title="Show" class="Show btn btn-sm btn-success " style="margin-right: 20px; margin-left: 20px;
" href="<?= base_url('booking/'.$this->thispage.'/show/'.$one_v['id']); ?>" ><i class="material-icons"> عرض</i></a><br/><p  style="      margin-top: 20px;    margin-right: 20px; margin-left: 20px;"><?= $row['text3']; ?></p>
					<?php } else { echo 'لا يوجد';} ?>
					</td>
			 <td>		
				 <?php
				$query = $this->db->get_where('booking_checkall', array('text2' =>$row['text2'],'type_id' =>3,'text1' =>$row['text1']));
                $one_v = $query->row_array(); ?>
					<?php if ($one_v !=null){ ?>
				 <a title="Show" class="Show btn btn-sm btn-success " style="     margin-right: 20px; margin-left: 20px;
" href="<?= base_url('booking/'.$this->thispage.'/show/'.$one_v['id']); ?>" ><i class="material-icons"> عرض</i></a><br/><p  style="     margin-top: 20px;     margin-right: 20px; margin-left: 20px;"><?= $row['text3']; ?></p>
					<?php } else { echo 'لا يوجد';} ?>
					</td>
			<td>	
				<?php
				$query = $this->db->get_where('booking_checkall', array('text2' =>$row['text2'],'type_id' =>4,'text1' =>$row['text1']));
                $one_v = $query->row_array(); ?>
				<?php if ($one_v !=null){ ?>
				<a title="Show" class="Show btn btn-sm btn-success " style="     margin-right: 20px; margin-left: 20px;
" href="<?= base_url('booking/'.$this->thispage.'/show/'.$one_v['id']); ?>" ><i class="material-icons"> عرض</i></a><br/><p  style="     margin-top: 20px;   margin-right: 20px; margin-left: 20px;"><?= $row['text3']; ?></p>
				<?php } else { echo 'لا يوجد';} ?>
					</td>		
             <td>
				 <a title="Show" class="Show btn btn-sm btn-success " style="  display: none;   margin-right: 20px; margin-left: 20px;
" href="<?= base_url('booking/'.$this->thispage.'/show/'.$row['id']); ?>" ><i class="material-icons"> عرض</i></a>
				 
     <?php if($this->session->userdata('admin_id')==2){ ?>
				 
   <a title="Edi"  style="    margin-left: 20px;
"  class="edit btn btn-sm btn-primary pull-right" href="<?= base_url('booking/'.$this->thispage.'/edit/'.$row['id']); ?>" ><i class="material-icons"> تعديل</i></a>
     
				 <a title="Delete"  style="    margin-left: 20px;
"  class="delete btn btn-sm btn-danger pull-right" href="<?= base_url('booking/'.$this->thispage.'/del/'.$row['id']); ?>" ><i class="material-icons"> حذف</i></a>
	
	<?php } ?>	
				 
      </td>      

 </tr>

              

                    <?php endforeach; ?>

                

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

      </div>

      <!-- /.row -->

  

        <div class="row">
     <?php if($this->session->userdata('admin_id')==2){ ?>

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/questions/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اسئلة التفتيش</a> 	</div>

        </div>
<?php } ?>
<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/checkall/add_check/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة تفتيش</a> 	</div>

        </div>

              <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$this->thispage?>/rooms/<?= $this->booking->data_day(23)?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> حركة الشقق   </a> 	</div>

             </div>  

            

         

</div>