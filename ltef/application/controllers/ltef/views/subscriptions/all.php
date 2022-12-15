






        <div class="row">
     <div class="col-md-8 col-xs-12">
<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة باقة</a> 	</div>



        </div>  <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1/2" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> الطلبات </a> 	</div>



        </div> 
     <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1/3" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> طلبات الموقع </a> 	</div>



        </div>
     
         <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/1/4" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الارشيف </a> 	</div>



        </div></div>


        
    
        
            <div class="col-md-4 col-xs-12">
<form action="<?= base_url()?>/ltef/<?=$this->thispage?>/all" method="get">
                <div class="input-group">
                  <input type="text" name="search" placeholder="البحث في الباقات  ..." class="form-control">
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
        <li><a href="<?=base_url('ltef/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('ltef/clints/')?>">الباقات</a></li>
      </ol>
    </section>
  <div class="row">
    <!-- Main content -->
   
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">  الباقات </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
           
                  <th>الاسم</th>
               
               
                  <th >المدني</th>
                    <th >التليفون</th>
                         <th >تاريخ الاضافة</th>
                                <th style="width: 40px">المتبقي</th>   <th > عن طريق</th>
                                  <th >  المبلغ</th>
                   <th >تاريخ الاشتراك</th>
                             
                       <th style="width: 40px"></th>
                            <th style="width: 40px"></th>     
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                  <td><?= $row['name']; ?></td>
                    
             
                      <td><?= $row['cid']; ?> </td>
                   <td><?= $row['mobile']; ?> </td>
                <td><?= $this->booking->tissme_show($row['dateadd']); ?> </td>
                                <td><?= $row['dayfree']; ?> </td>  
                     <td><?= $row['text3']; ?> </td>
                              <td><?= $row['text4']; ?> </td>
                     <td>     <a  class="update btn btn-sm btn-success pull-right" href="<?= base_url('ltef/'.$this->thispage.'/show/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
       
                    
                     <td>  
                     <?php if($this->session->userdata('name')=='aln3esa'):?>
                       <?php if ($row['text6'] != 'موكد' and $row['counter']==2 ): ?>
                    <a href="<?= base_url('ltef/'.$this->thispage.'/took/'.$row['id'])?>" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>     تاكيد</a>
                <?php endif; ?>
                    <?= $row['text6']; ?> 
                     <?php endif; ?>
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
                <li><a href="<?= base_url('ltef/'.$this->thispage.'/all/'.$count); ?>"><?=$count?></a></li>
          
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
  
