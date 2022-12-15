





  
   
  <div class="row">
    <!-- Main content -->
  
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">احصائيات المحتويات    </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                  <tr style="display: none">
                 
                  <th>الاسم</th>
                            <?php $count=0; foreach($all_room as $row):  $count++;?>
                  <th><a href="ss"><?= $row['name']; ?> </a></th>
                   <?php endforeach; ?>
                   <th><?=$count; ?> </th>
                     <th>ناقص</th>
                </tr>
                
                     <?php $difern='dd'; foreach($all_groups as $row):
                         
                        $nactmh[1]="الصالة";
$nactmh[2]=" الماستر";
$nactmh[3]=" الثانية";
$nactmh[4]="المطبخ";
$nactmh[5]="الحمام";
$nactmh[6]="حمام الماستر";
$nactmh[7]="الثالثة";
    if($difern!=$row['text5'] and $row['text5'])
    {
        echo "<tr>";
        echo '<td align="right" colspan=100 style="text-align:center;padding-right: 10px;    background-color: #a3ccd8;">	<b> <a href="'.base_url().'booking/rooms/mhtwastat/'.$page.'/'.$row['text5'].'">'.$nactmh[$row['text5']].'</a></b><br></td>';
   
  echo "</tr>"; 
  echo ' <th>الاسم</th>';
   foreach($all_room as $rowa): 
  echo '   <th><a href="'.base_url().'booking/rooms/mhtwaroom2/'.$rowa['id'].'">'.$rowa['name'].' </a></th>';
  endforeach;  
   echo " <th>$count </th>
                     <th>ناقص</th>";
    }
  
    echo "<tr>";

    $difern=$row['text5']; 
                         ?>
                <tr>
                  <td><a href="<?= base_url()?>/booking/rooms/mhtwastat/<?=$page?>/<?= $row['text5']; ?>/<?= $row['id']; ?>"><?= $row['text1']; ?></a> </td>
                      
            
                  <?php $allmoh=0; foreach($all_room as $rowr):?>
                  <td>
                  
                  
                  <?php
                     $comment=explode("##",$rowr['comment']);
    if(in_array($row['text1']."|".$row['id']."|".$row['text5'],$comment)) 
       {
        $allmoh++;
         echo '<a href="'.base_url().'booking/rooms/checkmhtwa2/'.$rowr['id'].'/'.$row['id'].'/"><span  class="glyphicon glyphicon-ok" style="color: #00a65a;"></span></a>';
     

    } else {
 
    echo '<a href="'.base_url().'booking/rooms/checkmhtwa/'.$rowr['id'].'/'.$row['id'].'/"><span class="glyphicon glyphicon-remove"  style="color: red;"></span></a>';
    }

                  
                  ?>
                  
                  </td>
              
                   <?php endforeach; ?>
                   
            <td><?=$allmoh; ?> </td>
                  
                <td><?=$allmoh-$count; ?> </td>
                       
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
  
