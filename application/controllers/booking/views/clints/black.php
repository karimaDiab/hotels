






        <div class="row">
     <div class="col-md-8">
<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/booking/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة عميل</a> 	</div>



        </div>
     
 
     </div>


        
    
        
            <div class="col-md-4">
<form action="<?= base_url()?>/booking/<?=$this->thispage?>/black" method="get">
                <div class="input-group">
                  <input type="text" name="search" placeholder="البحث في العملاء  ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">ابحث</button>
                      </span>
                </div>
              </form>
        
        
        
     </div>
    </div>
  <section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/clints/')?>">العملاء</a></li>
      </ol>
    </section>
  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  العملاء </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                  <th>الاسم</th>
                      <th>الجنسية</th>
                  <th>اخر تسكين</th>
                  <th >السبب</th>
                       <th style="width: 40px"></th>
                            
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['name']; ?></td>
                        <td><?= $row['country']; ?></td>
                  <td><?= $row['datetext']; ?> </td>
                      <td><?= $row['comment']; ?> </td>
                
            
             
                     <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/'.$this->thispage.'/show/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
       
           
             
                   
                 
           
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       <?php if($all_count>1): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$all_count;$count++):?>
                <li><a href="<?= base_url('booking/'.$this->thispage.'/black/'.$count); ?>"><?=$count?></a></li>
          
          <?php endfor; ?>
              </ul>
            </div>
                <?php endif; ?>   
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
     </div>
      </div>
      <!-- /.row -->
  
