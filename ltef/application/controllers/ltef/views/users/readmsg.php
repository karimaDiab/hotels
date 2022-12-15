

<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('booking/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('booking/clints/') ?>">الرسايل</a></li>
    </ol>
</section>

<div class="row">
    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">  عرض رسالة </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>

                            <th  colspan="4"></th>

                        </tr>

                        <tr>
            
                            <td><?= $show['title']; ?></td>
                           

                        <tr>
                  
                            <td><?= $show['msg']; ?></td>
                        </tr>

                        
                         <tr>
                  
                            <td> 
                        <?= $this->booking->tissme_show($show['dateadd']); ?>
                  
</td>
                        </tr>


                              <tr>
                  
                            <td> 
                      <?php 
     if($this->session->userdata('group')){
         
         echo" قراء كل من ";
         
        echo "<br>";
        
        
       $dsad=  explode("||", $show['user']);
       for ($index = 1; $index < count($dsad); $index++) {
           echo $dsad[$index];
             echo "<br>";
       }
         
     }
     
     
     
     ?>
                  
</td>
                        </tr>

                    </table>

                </div>

            </div>
        </div>
    </div>


    <!-- /.box -->

    <?php 
   
    
    
    if(!@stristr($show['user'],'||'.$this->user)){

    
    echo form_open_multipart(base_url('booking/Dashboard/readmsg/' . $show['id'])); ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">  تاكيد الرسالة</h3>
                    </div>
                    <div class="box-body">

                        <div class="form-group col-md-6">
                            <label >ملاحظاتك ان وجدت   </label>
                            <textarea class="form-control" rows="3" placeholder=" الرد  ..." name="msg"></textarea><br>
                        </div>
                        <div class="form-group col-md-6">

                        </div>

                        <div class="col-md-2">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-danger" name="submit" value="pl">  تاكيد القراءة</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->



                </div>
                <!-- /.box -->


            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
        </div>

    </form>
    <?php } ?>

   
</div>
                      <?php 
     if($this->session->userdata('group')){
         ?>
  <div class="row">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الردود   </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
       
                  <th>اليوزر</th>
                  <th>الرد</th>
                 <th style="width: 40px"></th>
                       <th style="width: 40px"></th>
                            <th style="width: 40px"></th>
                </tr>
                
                     <?php $count=0; foreach($all_read as $row):?>
                <tr>
         
                  <td><?= $row['title']; ?> </td>
                
                           <td><?= $row['msg']; ?> </td>
             
                   
                  <td><?= str_replace("||", "<br>", $row['user']); ?> </td>
             
                      
               
                   
                                   <td> 
                        <?= $this->booking->tissme_show($row['dateadd']); ?>
                  
</td>
                    
                    
                          <td>
                                <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/'.$this->thispage.'/msgdel/'.$row['id']); ?>" ><i class="material-icons">حذف</i></a>
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
     <?php } ?>