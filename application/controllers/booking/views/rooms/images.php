

 <div class="row">
     شقة  - <?=$room?>
 <?php echo form_open_multipart(); ?>
            
              <!-- /.box-body -->

              <div class="box-footer">   
                 <select  name='noa' class=" col-sm-12 "  dir="rtl"   style="

                                              margin-top: 10px;border: 1px solid blue; height: 75px" > 
                                    
                                        <?php for ($count = 1; $count < count($nao) + 1; $count ++): ?>
                                            <option value='<?= $count ?>'> <?php echo $nao[$count]; ?></option> 
                                        <?php endfor; ?>
                 </select>
                  
                  <input type="file" id="exampleInputFile"  name="files[]" multiple  class=" col-md-2"  style=" border: 1px solid blue; height: 75px" accept="image/*">
                 
                  <input type="file" id="exampleInputFile"  name="files2[]" multiple  class=" col-md-2" placeholder="pic 2" style=" border: 1px solid blue; height: 75px" accept="image/*">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">رفع الصوره</button>
              </div>
            </form>

   </div>

<br>
  <div class="row">  <div class="col-md-6">
    <?php for ($count = 1; $count < count($nao) + 1; $count ++): ?>

    <!-- Main content -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/imagesnoa/'.$count)?>">
                <?php echo $nao[$count]; ?></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic<?=$count?>" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic<?=$count?>" data-slide-to="0" class="active"></li>
                      <?php for ($countp = 1; $countp < count($all_groups[$count]) ; $countp ++){
                        ?>
                  <li data-target="#carousel-example-generic<?=$count?>" data-slide-to="<?=$countp?>" class=""></li>
                      <?php 
                      } ?>
                  
                </ol>
                <div class="carousel-inner">
                                       <?php $active='active'; foreach($all_groups[$count] as $row):
                                           
                                           
                                  
                                           ?>
                    
                     <div class="item <?=$active?>">
                         <a  href="<?= base_url($row['url']) ?>"  target="_block">
            
                    <img src="<?= base_url($row['url']) ?>" alt="Second slide">
  </a>     <div class="carousel-caption" style="background-color: #6669;">
                   <?= $this->booking->tissme_show($row['dateadd']); ?>
                          <a class="update btn btn-sm btn-danger " href="<?= base_url('booking/'.$this->thispage.'/images/'.$row['room'].'/'.$row['id'])?>">حذف</a>
                   
                    </div>
                  </div>
                    
                    
                     <?php $active=''; endforeach; ?>
               
                    
                    
                    
                 
                </div>
                  <a class="left carousel-control" href="#carousel-example-generic<?=$count?>" data-slide="prev" style="right: auto;
    left: 0;">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic<?=$count?>" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
  
   
           <?php endfor; ?>       </div>
      </div>

      <!-- /.row -->
  