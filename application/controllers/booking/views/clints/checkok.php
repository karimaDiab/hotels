
   <div class="row">



      
              <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>booking/clints/checkok/<?= date("Ymd",strtotime($this->data_day." 00:01")-100)?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  اليوم السابق   </a> 	</div>
             </div>  
            
          <div  style="float:left"><div  style="margin-left:10px"><a href="<?= base_url()?>booking/clints/checkok/<?= date("Ymd",strtotime($this->data_day." 23:59")+100)?>" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  اليوم التالي   </a> 	</div>
             </div> 
</div>


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
	
    chttp.open('get', '<?= base_url() ?>booking/clints/checkokupdate/'+ cn);
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
           
               
                      <th></th>
                  <th></th>
                   <th></th> 
                       <th style="width: 40px"></th>
                            
                             </tr>
                
                     <?php $count=0; foreach($all_groups as $row):?>
                <tr>
                
                        <td>  
                           
                                <?= $row['name']; ?>-  <?= $row['country']; ?>
                  
                      <br>    <img class="img-responsive" src="<?= base_url($row['file1']) ?>" alt="Photo">
                             
                             
                            </td>
                  <td>    
                  <?= $row['cid']; ?>    <br> <img class="img-responsive" src="<?= base_url($row['file2']) ?>" alt="Photo"></td>
                  
                        <td>    
        <?php if ($row['checkok'] == '0'  ): ?>
<div id='cndiv<?= $row['id']; ?>'><a href="javascript:" class="btn btn-block btn-danger"  onclick="getcnInfo(<?= $row['id']; ?>);return false;">  تاكيد</a></div><br />
                    <?php endif; ?>
      <?php if ($row['checkok'] == '1'  ): ?>
تم التاكيد    <?php endif; ?>
                   </td>
            
             
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
                <li><a href="<?= base_url('booking/'.$this->thispage.'/all/'.$count); ?>"><?=$count?></a></li>
          
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
  
