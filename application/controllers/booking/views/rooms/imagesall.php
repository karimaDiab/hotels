
<br>

  <div class="row">  
 
    <!-- Main content -->
  <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
          
            </div>
            <!-- /.box-header -->
            <div class="box-body">
   
 

   <div class="col-md-12">

  

                                       <?php  foreach($all_groups as $row):
                                           
                                           
                                  
                                           ?>
          <div class=" col-md-6 col-12">
   <a  href="<?= base_url($row['url']) ?>"  target="_block"  class="d-block mb-4 h-300">
            
       <img src="<?= base_url($row['url']) ?>" alt="Second slide" style="max-width:100%;max-height: 500px" class="img-fluid img-thumbnail">
  </a>  
                  
               
         <div class="carousel-caption" style="background-color: #6669;">
                    <?= ($row['room']) ?> ( <?= ($nao[$row['noa']]) ?> )<br>   <?= $this->booking->tissme_show($row['dateadd']); ?>
                         
                   
                    </div>              
                  
    </div>
 
                    
                    
                     <?php  endforeach; ?>
               
        

</div>       
                    
                    
                 
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  
   
  
      
      </div>
       </div>

      <!-- /.row -->
  