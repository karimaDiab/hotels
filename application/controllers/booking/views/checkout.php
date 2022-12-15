
   <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/rooms/imagesrooms/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الصور</a> 	</div>



    </div>

<?php       $sss='';?>
  <div class="row">
   
        <div class="col-md-12">


    
  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: visible;">
        
                
                
                 <?php $count=0; foreach($all_groups as $row):?>
              
          <!-- small box -->
     
  
           <?php if($row['conter']==5 ):?>
          
             <div class="col-lg-2 col-xs-6" style="max-width: 150px;height: 110px">
          <!-- /.box -->
      
          <div class="small-box bg-aqua">
            <div class="inner">
                <h3 style="margin-bottom: 17px;"><?= $row['name']; ?></h3>

                 <div style="        font-size: 12px;
       margin-top: -12px;
       margin-bottom: -2px;margin-right: -5px;"> تم  التشيك</div>
           
            </div>
            <div class="icon">
              <i class="ion home"></i>
            </div>
            <a href="<?=base_url('booking/Dashboard/toclean/'.$row['name'])?>" class="small-box-footer"><?= $row['bookig']; ?>
            تغير الى تنظيف <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>    </div>
          
          <?php endif; ?>
          
         
         
      
            <?php if($row['conter']==3 and !$row['checkout']):
               
             $row['color']='bg-orange';
               ?>
          
      
          <!-- /.box -->
        <div class="col-lg-2 col-xs-6" style="max-width: 150px;height: 110px">
          <div class="small-box <?= $row['color']; ?>">
              <div class="inner">
                <h3 style="margin-bottom: 17px;"><?= $row['name']; ?></h3>

             <div style="        font-size: 12px;
       margin-top: -12px;
       margin-bottom: -2px;margin-right: -5px;"> تحت التشيك</div>
            </div>
          
          
            <div class="icon">
              <i class="ion home"></i>
            </div>
            <a href="<?=base_url('booking/show/id/'.$row['bookingid'])?>" class="small-box-footer"><?= $row['bookig']; ?>
             عرض  <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
                 </div>
          
          <?php endif; ?>
          
          
          
              
       
          
               
              
                    <?php endforeach; ?>
                
          
        </div>  <div class="box-body" style="overflow-x: visible;">
                   <?php $count=0; foreach($all_groups as $row):?>
              
          <!-- small box -->
      
  
        
         
           <?php if($row['conter']==3 and $row['checkout']):
               
              /// if(isset($row['checkout']) ){$row['color']='bg-orange';}
               ?>
              <?php  
                 $whw="  room='" . $row['name'] . "'  ";
             
            
         $this->db->from('booking_rooms_images');
         $this->db->order_by('id','desc');
         $this->db->where($whw);
         $this->db->limit('1');
         $query=  $this->db->get();
         $datass= $query->row_array();

                 if(($this->booking->tissme_now() - $datass['dateadd'])>(10*24*60*60))$sss='ok';
                     
                 
                 ?>
      
          <!-- /.box -->
        <div class="col-lg-2 col-xs-6" style="max-width: 150px;height: 110px">
          <div class="small-box <?= $row['color']; ?>">
              <div class="inner">
                <h3 style="margin-bottom: 17px;"><?= $row['name']; ?></h3>

             <div style="        font-size: 12px;
       margin-top: -12px;
       margin-bottom: -2px;margin-right: -5px;"> منذ :  <?= $this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeend2'],1); ?></div>
            </div>
          
            <?php
                                                             echo "<br>  ";

                                                             if ($sss)
                                                                 echo '  يرجا رفع صور جديدة <br> ';
                                                          
                                                             ?> 
            <div class="icon">
              <i class="ion home"></i>
            </div>
            <a href="<?=base_url('booking/show/id/'.$row['bookingid'])?>" class="small-box-footer"><?= $row['bookig']; ?>
             عرض  <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
      
          
              <?php if($sss){
            
            ?>
          
          
       
         
           <div class="overlay">
                <i class="fa" style="left: 10%;
                   right: 75%;top:15%;color: white;">  <img   src="<?= base_url()?>/public/warning.gif" style="width:30px"></i>
            </div> 
          
       <?php
        }?>
             </div> 
          <?php endif; ?>
          
          
          
              
       
          
               
              
                    <?php endforeach; ?>
                
           </div>  
           
        <div class="box-body" style="overflow-x: visible;">
            
          
                       <?php $count=0; foreach($all_groups as $row):?>
         
          <!-- small box -->
       <?php
                                            $whw = "  room='" . $row['name'] . "'  ";


                                            $this->db->from('booking_rooms_images');
                                            $this->db->order_by('id', 'desc');
                                            $this->db->where($whw);
                                            $this->db->limit('1');
                                            $query = $this->db->get();
                                            $datass = $query->row_array();
                                            $sss = '';
                                            if(isset($datass['dateadd']))
                                            {
                                            if (($this->booking->tissme_now() - $datass['dateadd']) > (10 * 24 * 60 * 60))
                                                $sss = 'ok';
                                            }else
                                            {
                                                $sss = 'ok';   
                                                
                                            }
                                            ?>
          <?php if($row['conter']==1):?>
                 <div class="col-lg-2 col-xs-6" style="max-width: 150px;height: 110px">
          <div class="small-box <?= $row['color']; ?>">
            <div class="inner">
                <h3 style="margin-bottom: 17px;"><?= $row['name']; ?></h3>

             <div style="        font-size: 10px;
       margin-top: -12px;
       margin-bottom: -2px;margin-right: -5px;"> <?php
                                                      
                                                            if ($sss)
                                                                echo '  يرجا رفع صور جديدة <br> ';
                                                        else echo "-";
                                                            ?> </div>
            </div>
            <div class="icon">
              <i class="ion home"></i>
            </div>
            <a href="<?= base_url('booking/rooms/images/' . $row['name']) ?>" class="small-box-footer">اضغط هنا لرفع الصور
             <i class="fa fa-arrow-circle-right"></i>
            </a>
             
          </div>
            
              <?php if($sss){
            
            ?>
          
          
       
         
           <div class="overlay">
                <i class="fa" style="    margin-top: -60px;
    margin-right: 30px;">  <img   src="<?= base_url()?>/public/warning.gif" style="width:30px"></i>
            </div> 
          
       <?php
        }?>
         </div>
          <?php endif; ?>
          
        
          
          
        
          
          
            
          
             
              
                    <?php endforeach; ?>
        
            </div>
        <div class="box-body" style="overflow-x: visible;">
            
          
                       <?php $count=0; foreach($all_groups as $row):?>
         
          <!-- small box -->
      
         
      
          
        
          
          
                <?php if($row['conter']==2):?>
               <div class="col-lg-2 col-xs-6" style="max-width: 150px;height: 110px">
         
          <div class="small-box <?= $row['color']; ?>">
            
            <div class="inner">
             
                <h3 style="margin-top: -10px;"><?= $row['name']; ?></h3>

              <div style="        font-size: 12px;
       margin-top: -12px;
       margin-bottom: -2px;"><?=$row['bookingname']?><br><span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"> -
                  <?php if ($row['outsite']== 'ok'): ?>   غير متواجد
      <?php endif; ?>
                  </span></div>
            </div>
            <div class="icon">
              <i class="ion home"></i>
            </div>
              <a href="<?=base_url('booking/show/id/'.$row['bookingid'])?>" class="small-box-footer" style=" font-size: 12px;">
                  عرض     
            </a>
             
          </div>
          
          <?php if((int)$row['timeend']< (int)$this->booking->tissme_now()):?>
          <div class="progress vertical active" style="        margin-top: -126px;
    height: 80px;
    float: left;
    width: 100%;
    margin-left: 0px;">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="50" style="height: 100%;width: 100%;">
                    <h3 style="    font-size: 38px;margin-top: 0px;
    margin-right: -10px;"><?= $row['name']; ?></h3>
      <div style="        font-size: 10px;
       margin-top: -12px;
       margin-bottom: -2px;text-align: right;padding-right: 10px"><?=$row['bookingname']?>
      
      <br><span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"><?= $this->booking->getNiceDuration($this->booking->tissme_now()-$row['timeend']); ?>- <?php if ($row['outsite']== 'ok'): ?>   غير متواجد
      <?php endif; ?></span></div>
     
                </div>
              </div>
             <?php endif; ?>
          
           <?php if($row['commentnbeh']):?> 
           <div class="overlay">
                <i class="fa" style="left: 10%;
                   right: 75%;top:15%;color: white;">  <img   src="<?= base_url()?>/public/warning.gif" style="width:30px"></i>
            </div> 
           
           <?php endif; ?> 
                   </div>
          <?php endif; ?>
           
       
          
             
              
                    <?php endforeach; ?>
        
            </div>
            <!-- /.box-body -->
                  
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>
     

         
    
       </div>
          <!-- /.info-box -->
        </div>
     </div>
  

<meta http-equiv=refresh content=150;url=<?=base_url() . 'booking/dashboard/'?>>