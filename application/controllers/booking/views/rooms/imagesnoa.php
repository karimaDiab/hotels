<h1><?php echo $naos[$count]; ?></h1>
<br>
  <div class="row">  <div class="col-md-6">
    <?php for ($count = 0; $count < count($nao) ; $count ++): ?>

    <!-- Main content -->
  <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> <a class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/images/'.$nao[$count]['name'])?>">
                <?php echo $nao[$count]['name']; ?></a><?php echo $noaroom[$nao[$count]['noa']]; ?></h3>
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
  </a>  
                    <div class="carousel-caption" style="background-color: #6669;">
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
        </div>
  
   
           <?php endfor; ?>
        </div>
      </div>

      <!-- /.row -->
  