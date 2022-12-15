
<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/clints/')?>">حجز جديد</a></li>
      </ol>
    </section>
 <br>


     <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> خطأ</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
 
 <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> حجز جديد</h3>
            </div>
         
             
              
           <?php echo form_open_multipart(base_url('booking/booked/booked2/'.$room)); ?>
              <div class="box-body">
          
                <div class="form-group  col-md-6">
                    <label for="exampleInputEmail1">الشقة  </label><br>
        <?=$room?>
                </div>
                <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1"> الدور	</label><br>
                 <?=$door?>
                </div>
                      <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1"> الرقم المدني	</label>
                  <input type="text" class="form-control"  placeholder="الرقم المدني " name="cid" required>
                  <select name="noa" dir="rtl" style="  width: 100px;

  margin-top: 10px;">

      
<option>بطاقة مدنية</option>
  <option>جواز سفر</option>
  <option>بطاقة احوال</option>
  <option>رخصة قيادة</option>
  
                        	</select>
                </div>
                  
                     <div class="form-group  col-md-6">
                  <label for="exampleInputPassword1">  الايام	</label>
                  <input type="text" class="form-control"  placeholder=" الايام " name="day" value="1" required>
                </div>
             
                 
                  
               
            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">استمرار الحجز</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
 
         <?php echo form_open_multipart(base_url('/booking/dashboard/roomtoprom/'.$room)); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">    تحويل الشقة صيانة       </h3>
                </div>
                <div class="box-body">



        
                    
                        <div class="form-group col-md-5">
                        <label >   السبب	</label>
                        <textarea class="form-control" rows="3" placeholder="  سبب التحويل    ..." name="lost"  required ></textarea>
                    </div>
        
   <div class="form-group col-md-2" >
  
                        <button type="submit" class="btn btn-danger btn-flat">تغير الى صيانة </button>
                      </span>

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
    
    
       <?php echo form_open_multipart(base_url('/booking/dashboard/roomtobook/'.$room)); ?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">    تحويل الشقة بوكنق       </h3>
                </div>
                <div class="box-body">



        
                    
                        <div class="form-group col-md-5">
                        <label >   اسم العميل 	</label>
                        <textarea class="form-control" rows="3" placeholder="  سبب اكتب العميل     ..." name="lost"  required ></textarea>
                    </div>
                    
                     <span class="help-block" style="color: #dd4b39; font-weight: bold"> يرجا التشيك قبلها من قبل الشك اوت  </span>
        
   <div class="form-group col-md-2" >
  
                        <button type="submit" class="btn btn-danger btn-flat">تغير الى انتظار </button>
                      </span>

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
      <!-- /.row -->
    <div class="row">  
    <?php for ($count = 1; $count < count($nao) + 1; $count ++): ?>

    <!-- Main content -->
<div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> <a class="update btn btn-sm btn-success pull-right" href="">
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
          