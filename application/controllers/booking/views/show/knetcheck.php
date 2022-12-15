<div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/show/knetcheck/<?=$thismon?>/all/" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الخطا</a> 	</div>



        </div>
 </div>
 <div class="row">



       <?php echo form_open_multipart(); ?>
              <div>
          
      
                      <div class="form-group  col-md-6">
                 	<p><label>Select Excel File</label>
			<input type="file" name="file" id="file" required/></p>
		   </div>
                  <div class="form-group  col-md-6" style=" display: none">
                        <textarea class="form-control" rows="3" placeholder="  اكواد العملليات    ..." name="comment8" id="comment8"></textarea><br>
               
            
              </div>
                     <div class="form-group  col-md-6" style=" display: none">
                 
                 
                        <textarea class="form-control" rows="3" placeholder="  اكواد  المبلغ    ..." name="comment6" id="comment8"></textarea><br>
               
            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <br>  <button type="submit" class="btn btn-primary" name="submit" value="pl"> تاكيد</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
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
      ///       $countall2=$countall2+$name[$daynow];
          $cccc='';
        $count=0;
      
    }
    $daynow=$day;
    
}
 $count=$count+$row['knet'];
  $cccc.='  <tr><td > '.$row['room'].'</td>
                  <td> '.$row['name'].'</td>
                      <td> '.$this->booking->tissme_show($row['timeenter']).' </td>
                
            
             
       
           <td>   '.$row['knet'].'  </td>
            
           
                 <td >    '.$row['billprint'].' </td>
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

        