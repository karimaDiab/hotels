


     


  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  عدد الشقق الفاضي عدد الشقق الكلي  <?=$all_rooms_3?>   </h3>
            </div>
              
              
                     <div class="box-body" style="">
                           <?php   $daynow=''; $count=0; $countall=0; $countall2=0; foreach($all_groups as $rowa):
                               
                               
                               
                               
                                   $day = date('D', strtotime($rowa['dateee']));

        $days = array('Sun' => "الاحد  ", 'Mon' => "الاثنين", 'Tue' => "الثلاثاء", 'Wed' => "الاربعاء", 'Thu' => "الخميس", 'Fri' => "الجمعة", 'Sat' => "السبت");
                               
                               ?> 
              <div class="col-lg-2 col-xs-6" style="margin-bottom: 10px;max-width: 150px;">
          <!-- small box -->
      
                    
                      
      
          <!-- /.box -->
      
          <div class="small-box bg-green" style="margin-bottom: 10px;">
              <div class="small-box-footer" style="height: 60px;padding: 10px">       <h3 style=""><?=   $rowa['allbook']?></h3>
            </div>
            <div class="inner">
                
                 <h4 style=""><?=$days[$day] ?><br><?=    date("m-d",(strtotime($rowa['dateee'])))?></h4>
      

              <p></p>
            </div>
            <div class="icon">
              <i class="ion home"></i>
            </div>
            <a href="<?=base_url('booking/Dashboard/index/'.$rowa['dateee'])?>" class="small-box-footer">             عرض الشقق  <i class="fa fa-arrow-circle-left"></i>
            </a>
          </div>
          
                    
                       
                     
          
                      
          
          
                           
        </div>
                           <?php 
                    
                    
                    
                    
                    
                    
                    endforeach; ?>
                            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
                        
             
                     <?php   $daynow=''; $count=0; $countall=0; $countall2=0; foreach($all_groups as $rowa):
                     
                         
                         
                            $this->db->from('booking');
        $this->db->order_by('id', 'asc');

         $whr = "counter=1  and  timeend> ".(strtotime($rowa['dateee'])+86400);
        $this->db->where($whr);
  $cccc='';
        $data['all_groupss'] = $this->db->get()->result_array();
        foreach ($data['all_groupss'] as $row) {
          
            //$data['all_groups']['allcat']=$this->db->from('cat')->where("parentcatid=".$row['catid'])->count_all_results();
       
                         
                         $cccc.='  <tr><td > '.$row['room'].'</td>
                  <td> '.$row['name'].'</td>
                      <td> '.$this->booking->tissme_show($row['timeend']).' </td>
                
            
             
       
           <td>   '.$row['knet'].'  </td>
                 <td >    '.$row['billprint'].'   </td>
             
                      
             
                   
                  
           
                </tr>';
                          }
              
   echo ' 
              
          
 <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">'.$rowa['dateee'].'</h3>

              <div class="box-tools pull-right">
                 '.$rowa['allbook'].' <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
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
               </div>
               </div>
            </div>
       </div>
            <!-- /.box-body -->
             
          <!-- /.box -->

        