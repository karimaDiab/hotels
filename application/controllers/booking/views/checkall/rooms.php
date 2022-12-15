   <div class="row">



      
              <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$this->thispage?>/rooms/<?= date("Ymd",strtotime($this->data_day)-100)?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  اليوم السابق   </a> 	</div>
             </div>  
            
          <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$this->thispage?>/rooms/<?= date("Ymd",strtotime($this->data_day." 23:59")+100)?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  اليوم التالي   </a> 	</div>
             </div> 
</div>






       
  <div class="row">
    <!-- Main content -->
  
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">عرض  الحركة لتاريخ <?=$this->data_day?> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <table class="table table-bordered" style="width: 1000px;direction: rtl;    border: 1px solid #f4f4f4;" border="1|0">
            
                
                     <?php $count=0; foreach($all_groups as $row):?>
                       <tr>
                    <th style="width: 80px;height: 10px"></th>
                <?php 
                for($i=0;$i<25;$i++)
                {
                 echo "  <th style=\"padding: 0px;width:58px;height: 5px\"><div style=\"width: 39px;font-size: 12px;\">$i</div></th>";   
                }
                
                ?>
                 </tr>
                <tr>
                    <td style="padding: 0px;"><a href="<?= base_url()?>/booking/checkall/room/<?= $row['name']; ?>"><?= $row['name']; ?></a>
                 
                 
                 
                 </td>
                   
               <td colspan="25" style="padding: 0;padding: 0px;background-color: #00ffff00;"> 
                     <div class="" style="   background-color: #00a65a;width: 960px ;    color: white;">
                        <?php
               
                      $to = strtotime($this->data_day); 
                        $from = strtotime($this->data_day." 23:59"); 
              $whr=" ( timeend2 >'".$from."' and  timeenter < '".$to."' )and room=".$row['name'];
                   
          $query = $this->db->get_where('booking', $whr);
        $rows =  $query->row_array();
                     
       if(isset($rows['timeenter']))
       {
         echo  '  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:'.(100).'%;height: 25px"><a style="color: white;" href="'.base_url('booking/show/id/'.$rows['id']).'">'.date(' Ymd ',$rows['timeenter']).'-'.date('Ymd',$rows['timeend']).'</a></div></div>';  
       } else {
           
       }
        
                      $to = strtotime($this->data_day); 

                   $from = strtotime($this->data_day." 23:59"); 
                    $whr=" ( timeend2 BETWEEN '$to' AND '".$from."' or  timeenter BETWEEN '$to' AND '".$from."' )and (room='".$row['name']."' or  oldroom='".$row['name']."' )";
        //$whr = " room = '" .$row['name'] . "' and    (datetext4 = '" . $this->data_day . "' or dataend= '" . $this->data_day . "' )";
                    $room=$row['name'];
        
       $this->db->from('booking');
        $this->db->order_by('timeenter', 'asc');
                $this->db->order_by('id', 'asc');
        $this->db->where($whr);
        //$this->db->limit(4);
        $data['all_groups'] = $this->db->get()->result_array();
        
        
        if(count($data['all_groups'])==0 and !isset($rows['timeenter']))
        {
            echo "لم تسكن هذا اليوم";
        }
              $cid='';     $i = 0;
        
        foreach ($data['all_groups'] as $row) {
            //if(!trim($row['oldroom']) ){
             // $cid=$row['cid'].'ss';
            
           /// echo $row['id'];
            $nsahd='';
           // echo $row['timeend'];
            $nsah='';
            $color='e25d5d';
              if($row['timeend2'])$row['timeend']=$row['timeend2'];
              if(isset($row['oldroom']) ){
            if($row['oldroom']==$room)
            {
              if($row['timemove']){     $color='00a5ff';
                   $row['timeend']=$row['timemove'];  
                 }
            } else {
                if($row['timemove']) $row['timeenter']=$row['timemove'];
             }  
        
              }
               // if($row['timerenew'])$row['timeenter']=$row['timerenew'];
              
               $dateenter=date("Ymd",$row['timeenter']);
                 $dateend=date("Ymd",$row['timeend']);
          $ddd='';
                       if( $i==1)$ddd='    margin-top: -25px;';
                      if( $i==2)$ddd='    margin-top: -25px;';
                           if( $i==3)$ddd='    margin-top: -25px;';
                              if( $i==4)$ddd='    margin-top: -25px;';
                
                
              if($dateenter!=$this->data_day )
            {
                
                 //    echo date("Ymd",$row['timeend'])."-0000<br>";
               // echo date("Ymd",$row['timeend'])."-".date('Hi',$row['timeend'])."<br><br>";
                  
                 
                  if(date('Ymd',$row['timeend'])== $this->data_day)
                  {
                      
               
                  
                    
                    $hh= 0;
                    $ii=0;
                     $ii= ceil(($ii)*1);
                       $nsah=(((($hh*60)+$ii)/75)*100)/2;
                       
                       
                       
                           
                    $hh2= date('H',$row['timeend']);
                    $ii2=date('i',$row['timeend']);;
                      $ii2= ceil(($ii2)*1);
                      $nsah2=(((($hh2*60)+$ii2)/75)*100)/2;
                       
                       
                       
                       
                         echo  '  <div  style="   background-color: #00ffff00; "><div style="width:'.($nsah2-$nsah).'px;height: 25px;background-color: #'.$color.';    margin-right: '.($nsah).'px;text-align: left;"> <a style="color: white;" href="'.base_url('booking/show/id/'.$row['id']).'">'.date('H:i',$row['timeend']).'</a></div>';
   }
                    
               /// if($nsah>100)$nsah=$nsah/100;
            //   echo  ' <div class="progress" style="    background-color: #00ffff00;">  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:'.($nsah).'px;height: 25px">'.date('H:i',$row['timeend']).'</div></div>';
                  
              } else {
                    if($dateend!=$this->data_day )
            {  
                        
                         if(date('Ymd',$row['timeenter'])== $this->data_day and !isset($row['timerenew']) )
                  {
                          //  echo 11;
               
                              $hh=  date('H',$row['timeenter']);
                    $ii=date('i',$row['timeenter']);
                     $ii= ceil(($ii)*1);
                       $nsah=(((($hh*60)+$ii)/75)*100)/2;
                       
                       
                       
                           
                    $hh2= 23;
                    $ii2=60;
                      $ii2= ceil(($ii2)*1);
                      $nsah2=(((($hh2*60)+$ii2)/75)*100)/2;
                       
                       
                       
                       
                         echo  '  <div  style="   background-color: #00ffff00;'.$ddd.'; "><div style="width:'.($nsah-$nsah2).'px;height: 25px;background-color: #'.$color.';    margin-right: '.($nsah).'px;text-align: right;"><a style="color: white;" href="'.base_url('booking/show/id/'.$row['id']).'">'.date('H:i',$row['timeenter']).'</a></div>';

                    
                  }
                   
                         
                         
              
                       
                        
                    } else {
                        
                          $hh=  date('H',$row['timeenter']);
                    $ii=date('i',$row['timeenter']);
                     $ii= ceil(($ii)*1);
                       $nsah=(((($hh*60)+$ii)/75)*100)/2;
                       
                       
                       
                           
                    $hh2= date('H',$row['timeend']);
                    $ii2=date('i',$row['timeend']);;
                      $ii2= ceil(($ii2)*1);
                      $nsah2=(((($hh2*60)+$ii2)/75)*100)/2;
                       
                       
                       
                       
                         echo  '  <div  style="   background-color: #00ffff00;'.$ddd.'; "><div style="width:'.($nsah2-$nsah).'px;height: 25px;background-color: #'.$color.';    margin-right: '.($nsah).'px;text-align: center;"> <a style="color: white;" href="'.base_url('booking/show/id/'.$row['id']).'">'.date('H:i',$row['timeend']).'-'.date('H:i',$row['timeenter']).'</a></div>';
                        
                        
                        
                        
                        
                        
                            }
              
              
              }
            
            
         
          
             $i++;
        //}
                     }
                     ?>
                  
 </div>

  

                  
           </td>
                </tr>
              
                    <?php  endforeach; ?>
                
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
  
