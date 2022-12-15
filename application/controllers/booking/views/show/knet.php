
 <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/show/knet/<?=$thismon?>/all/" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الكل</a> 	</div>



        </div>
 </div>

  <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/show/linkscheck/<?=$thismon?>/all/" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   تشيك  روابط الدفع</a> 	</div>



        </div>
 </div> 
     <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/show/knetcheck/" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   تشيك الكي نت</a> 	</div>



        </div>
 </div> 

      <?php echo form_open_multipart(base_url('booking/' . $thispage . '/knet/'.$thismon)); ?>
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">حركات الكي نت   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
                        
             
                     <?php    $cccc=''; $daynow=''; $count=0; $countall=0; $countall2=0; foreach($all_groups as $row):
                          
                     if($row['timerenew'])$row['timeenter']=$row['timerenew'];
                     
                     
                         
                         $day =date('Ymd', $row['timeenter']); 
if($day!=$daynow)
{
  
    if(!isset($name[$daynow]) and isset($ass[$daynow]))$name[$daynow]=$ass[$daynow];
   
    if($daynow)
    {
      
        
          echo ' 
              
          
 <div class="box box-default  box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">'.$daynow.'</h3>

              <div class="box-tools pull-right">
                 '.$count.' <input type="text" dir="rtl" name="name'.$daynow.'" size="40" value="'.$name[$daynow].'"  style="width:150px;" /> <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
         <table class="table table-bordered">  '.$cccc.' </table>
            </div>
            <!-- /.box-body -->
          </div>
          ';
            $countall=$countall+$count;
             $countall2=$countall2+$name[$daynow];
          $cccc='';
        $count=0;
      
    }
    $daynow=$day;
    
}
 $count=$count+$row['knet'];
 $ddddd='';
 if($row['daa'])$ddddd='<span class="update btn btn-sm btn-danger pull-right">--'. $row['daa'].'</span>';
if( $all or $row['daa'])$cccc.='  <tr><td > '.$row['room'].'</td>
                  <td> '.$row['name'].'</td>
                      <td> '.$this->booking->tissme_show($row['timeenter']).' </td>
                
            
             
       
           <td>   '.$row['knet'].'  </td>
            
           
                 <td >    '.$row['billprint'].'<br>'.$ddddd.'    </td>
               <td>   '.$row['knetcode'].'  </td>
                      
             <td >
                   
                                                  <a class="update btn btn-sm btn-success pull-right" href="'.base_url('booking/show/id/'.$row['id']).'"><i class="material-icons">التفاصيل</i></a>
             </td>
                </tr>';
                         ?>
            
                                  
           
               
              
                    <?php 
                    
                    
                    
                    
                    
                    
                    endforeach; 
                    
                      if($daynow)
    {
         
        
          echo ' <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">'.$daynow.'</h3>

              <div class="box-tools pull-right">
                 '.$count.' <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
         <table class="table table-bordered">  '.$cccc.' </table>
            </div>
            <!-- /.box-body -->
          </div>
        ';
        $count=0;
    }
    
         if($daynow)
    {
         
        
          echo ' <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">الكل</h3>

              <div class="box-tools pull-right">
                 '.$countall.'  -   '.$countall2.'= '.($countall-$countall2).'    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
         <table class="table table-bordered">  '.$cccc.' </table>
            </div>
            <!-- /.box-body -->
          </div>
        ';
        $count=0;
    }
    
    
    ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                 <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>
            </div>
          </div>
            </form>
          <!-- /.box -->

        