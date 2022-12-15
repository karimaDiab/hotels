   <div class="row">

<div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/add/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> اضافة فاتورة</a> 	</div>



        </div>
       
       <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url()?>/ltef/<?=$this->thispage?>/all/" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  الكل</a> 	</div>



        </div>
            
          
                   <div  style="float:left"><div  style="margin-left:10px">
                                       <?php echo form_open_multipart(base_url('ltef/' . $thispage . '/getnum/')); ?>
<div style="float:left" dir=rtl>
   <select  name='catidshow'  class=data-select>
        <option value='22'  >السالمية</option> <option value='11' >حولي</option>  <option value='33' >الفروانية</option>  <option value='44' >الرقعي</option>                
                   </select>  <button type="submit" class="btn btn-primary    margin-fix" style="padding-right:5px;"> جلب الارقام<i class="icon-chevron-left   icon-white"></i> </button>
</div>  </form>     
                        </div>



       
</div>
      
            </div>




      
        <!-- /.col -->
   



 
