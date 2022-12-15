
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
       
         
         
              
              
          
                <div class="form-group">
                  <label for="exampleInputEmail1"> الرسبشن   </label>
           
                </div>
              
              
              <?php
              
              if($edit['text4'])
              {
                  
                  
                        $text = json_decode(stripslashes($edit['text4']),true); 
                       
             
                  
                         foreach ($text as $key => $value) {

                             $blockpl = substr($key, 0, 4);
 if($blockpl=='tt0t')
 {
      echo '        <div class="form-group">
                  <label for="exampleInputPassword1"> '.$value.'	</label><br>
                '.$text[str_replace("tt0t", "tt1t", $key)].'
                    <br>
                     '.$text[str_replace("tt0t", "tt2t", $key)].'
                         
'; 

                if($text[str_replace("tt0t", "tt3t", $key)]) echo '      <img class="img-responsive" src="'.base_url($text[str_replace("tt0t", "tt3t", $key)]).'" alt="Photo" style="max-width: 300px;">'; 
                echo '    </div>'; 
 }
     
  }
                    
                  
                  
              }
              
              
              
              ?>
              
   
             
           
              </div>
              <!-- /.box-body -->

           
            </form>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
