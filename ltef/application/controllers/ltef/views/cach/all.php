

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/forms/switches.css">

<div class="row">
  
    <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
           
            <div class="box-footer">
              <div class="row">
          
               
                  
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill?></h5>
                 <span class="description-text"> المتوفر</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                  <?php if($this->session->userdata('group')):?>
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1?></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/1" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الايراد</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                
                
                        <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill111?></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/1" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> ايراد لم يستلم</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
              
                  
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill2?></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> المصروفات</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
               
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill5?></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/5" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> التصدير</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
            
            <?php endif;?>
                <!-- /.col -->
              </div>
         
                      <div class="row">
          
               
                  
                  
                  
                  <?php if($this->session->userdata('group')):?>
                             <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                 
                  </div>
                  <!-- /.description-block -->
                </div>
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/1" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> السالمية</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/2" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> حولي</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
               
                    <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/8" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الشعب</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                      <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                 
                                  <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/7" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الر قعي</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                     <div class="col-sm-2 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                  
                               <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/all/9" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> ريحانة</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>       
            
            <?php endif;?>
                <!-- /.col -->
              </div>
         
                
                 <div class="row">
          
               
                  
                    
                  
                  <?php if($this->session->userdata('group') and $text30!=''):?>
                         <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_billn?></h5>
                 <span class="description-text"> المتوفر</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                      <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1n?></h5>
                   <a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/<?=$this->thismon?>/1/<?=$text30?>" class="btn btn-block btn-success"  style="margin-bottom:5px">     <span class="description-text"> الايراد</span></a> 
                  </div>
                  <!-- /.description-block -->
                </div>
                 
                
                         <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?=$all_bill1n2?></h5>
                 <span class="description-text"> لم يستلم</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                  
                  
                 
                   
            
            <?php endif;?>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
   
  
        <!-- /.col -->
      </div>



        <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة فاتورة</a> 	</div>



        </div>
            
           <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/endbill/<?=$this->data_day?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> طباعة تصدير اليوم </a> 	</div>
             </div> 
                   <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/stat/<?=$this->thismon?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   الاحصائيات </a> 	</div>



       
</div>
              <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/ltef/<?= $this->thispage ?>/updatebalc/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>   تحديث الرصيد </a> 	</div>
</div>
        </div>
  <div class="row">
    <!-- Main content -->
     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">الفواتير  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: auto;
    white-space: nowrap;
    direction: rtl;">
              <table class="table table-bordered">
                <tr>
                 <th  style="width: 50px">الرصيد</th>     
                 <th  style="width: 50px">المبلغ</th>
                     <th>الوصف</th>
                  <th>النوع</th>
               <th>التاريخ</th>
                       <th style="width: 40px"></th>
                         <th style="width: 40px"></th>
             </tr>
                                      <script type="text/javascript">
var chttp = createRequestObject();
function createRequestObject(){
    var request_;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        request_ = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else{
        request_ = new XMLHttpRequest();
    }
    return request_;
}
function getcnInfo(cn){
	
    chttp.open('get', '<?= base_url() ?>ltef/cach/showid/'+ cn);
    chttp.onreadystatechange = function(){handlecnInfo(cn)}; handlecnInfo();
    chttp.send(null);
}
function handlecnInfo(cn){
 
        if(chttp.readyState ==4){
        	  var response = chttp.responseText;
        document.getElementById('cndiv'+cn).innerHTML = response;
    }
}




</script>
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
               
                    <td><?= $row['text5']; ?> </td>
                  <td><?= $row['text1']; ?> </td>
                  <td><?= $row['text2']; ?> </td>
                
                  
                 
             
                   
                    <td><?= $row['gruop']; ?> </td>
                        <td><?= $row['dateadd']; ?> </td>  
                      
             
                   
                    <td>     <a title="Edit" class="update btn btn-sm btn-primary pull-right" href="<?= base_url('ltef/'.$this->thispage.'/show/'.$row['id'])?>"><i class="material-icons">التفاصيل</i></a>
                    </td>
                    
                       <td>    
        <?php if ($row['text14'] != 'موكد'  ): ?>
<div id='cndiv<?= $row['id']; ?>'><a href="javascript:" class="btn btn-block btn-danger"  onclick="getcnInfo(<?= $row['id']; ?>);return false;">  تاكيد</a></div><br />
                    <?php endif; ?>
                    <?= $row['text14']; ?>  </td>
               
                </tr>
              
                    <?php endforeach; ?>
                
              </table>
            </div>
            <!-- /.box-body -->
                       <?php if($pages>2): ?>
        <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                  
   <?php for($count=1;$count<$pages;$count++):?>
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
  
  
    <script src="<?= base_url() ?>public/jquery-3.1.1.min.js"></script>
    <script>

              

                             $(document).ready(function () {
                                 $('input[type=checkbox]').change(function () {
                                     var element = $(this);
                                     var del_id = element.attr("id");
                                     if (this.checked) {
                                         $.ajax({
                                             type: "GET",
                                             url: "<?= base_url() ?>/ltef/cash/showid/" + del_id,
                                             success: function (data) {
                                                alert('test');
                                             }
                                         });//ajax
                                     } else
                                     {
                                         $.ajax({
                                             type: "GET",
                                             url: "<?= base_url() ?>/ltef/cash/hideid/" + del_id,
                                             success: function (data) {
                                             alert('testss');
                                             }
                                         });//ajax
                                     }




                                     //// $( "#content1" ).load( "ajax/test.html" );

                                 });




                             });</script>