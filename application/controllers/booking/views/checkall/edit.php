
<div class="row">

    <!-- left column -->

    <div class="col-md-12">

        <!-- general form elements -->

        <div class="box box-primary">

            <div class="box-header with-border">

                <h3 class="box-title">    تعديل تفتيش</h3>

            </div>



            <?php if (isset($msg) || validation_errors() !== ''): ?>

                <div class="alert alert-warning alert-dismissible">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <h4><i class="icon fa-warning"></i> Alert!</h4>

                    <?= validation_errors(); ?>

                    <?= isset($msg) ? $msg : ''; ?>

                </div>

            <?php endif; ?>   
   </div>

            <!-- /.box-body -->


           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/edit/'.$edit['id'])); ?>

		 <?php 
		
		 ?>
  <h3 style="    text-align: center;    margin-top: -100px;"> تعديل تفتيش </h3>
  <!-- One "tab" for each step in the form: -->
	<br/><br/>
        
            <div class="box-body">
 <div class="form-group">

                  <label >   نوع التفتيش	</label>

                  <select class="form-control"  name='type_id'>

                      <option>اختر</option>

                      <?php foreach ($types as $one){ ?>

                      <option value='<?=$one['id']?>' <?php echo (isset($edit['type_id']) && $edit['type_id'] == $one['id'] ? 'selected':""); ?> ><?=$one['name']?></option>

                      <?php } ?>

                  </select>

                </div>

   </div>
        <?php 
$answer=$edit['text4'];
$text = json_decode($answer,true); 
?>
        <?php //print_r($questions);exit; ?> 
  <?php $i=1; foreach ($questions as $one){?>
	 <h4><?=$i.'- '?><?=$one['text']?> </h4>
<input type="hidden" name="question_<?=$one['id']?>" value="<?=$one['id']?>" />

<div class="row">

    <!-- left column -->

    <div class="col-md-12">

		  <div class="form-group">
                 <div class="col-md-6">
                    <div class="col-md-3">  <div class="radio">
 <input type="radio" name="choose_<?=$one['id']?>" id="optionsRadios1" value="نعم" 
   <?php echo (isset($text['choose_'.$one['id']]) && $text['choose_'.$one['id']] !=null && $text['choose_'.$one['id']] =='نعم'   ?'checked':''); ?>>

                   <label>

                   نعم

                    </label>

                  </div>
					 </div>
					     <div class="col-md-3">
                  <div class="radio">

                       <input type="radio" name="choose_<?=$one['id']?>" id="optionsRadios2" value="لا"      <?php echo (isset($text['choose_'.$one['id']]) && $text['choose_'.$one['id']] !=null && $text['choose_'.$one['id']] =='لا'   ?'checked':''); ?>>

                    <label>

                 لا
                    </label>

                  </div>
					 </div> </div><div class="col-md-6"></div>
			  
		</div>
		
    <div class="form-group"><div class="col-md-12">
<div class="col-md-6">
                  <label for="exampleInputFile">ارفاق الصورة</label>

                  <input type="file"  name="image_<?=$one['id']?>" class="form-control-file" accept="image/*;capture=camera" required>

</div>
    <div class="col-md-6">  
        <?php echo (isset($text['image_'.$one['id']]) && $text['image_'.$one['id']] !=null ?
			'<a  target="_blank" href="https://7agz.com/hotels/allcid/'.date("Ym").'/'.$text['image_'.$one['id']].'" ><img alt="" src="https://7agz.com/hotels/allcid/'.date("Ym").'/'.$text['image_'.$one['id']].'" width="20%" height="80" /></a>':''); ?>
        <?php if (isset($text['image_'.$one['id']]) && $text['image_'.$one['id']] !=null ){ ?>
        
             <input type="hidden" name="image2_<?=$one['id']?>" value="<?=$text['image_'.$one['id']]?>" />        
       
        <?php } ?>
        </div>
                </div>   
		      </div>   
		<div class="form-group">
			<div class="col-md-12">
<div class="col-md-6">
                            <label > ملاحظة</label>
                            <textarea  class="form-control" rows='6' cols='12'  name="note_<?=$one['id']?>" ><?php echo (isset($text['note_'.$one['id']]) && $text['note_'.$one['id']] !=null ?$text['note_'.$one['id']]:''); ?></textarea>
                        </div><div class="col-md-6"></div>
</div>
  </div>  
        
</div>
  </div> 
	<?php $i++;} ?>
	
<div class="box-footer "  style="text-align: center;
    margin-top: 20px;">

                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>

              </div>

            </form>

	<?php // print_r('4444');exit;  ?>
	

        </div>

        <!-- /.box -->





    </div>

   