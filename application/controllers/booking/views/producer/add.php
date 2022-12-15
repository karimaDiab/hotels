<section class="content-header">
      <h1>
          <br>
      </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?=base_url('booking/Dashboard/')?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?=base_url('booking/producer/')?>">المنتجات</a></li>
      </ol>
    </section>
    <!-- Content Header (Page header) -->
<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اضافة منتجات</h3>
            </div>
         
                 <?php if(isset($msg) || validation_errors() !== ''): ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa-warning"></i> Alert!</h4>
                <?= validation_errors();?>
                <?= isset($msg)? $msg: ''; ?>
            </div>
        <?php endif; ?>   
              
              
           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/add/')); ?>
              <div class="box-body">
            
                <div class="form-group">
                  <label for="exampleInputEmail1">المحتوى   </label>
             
                       <select  name='mhtwa'  dir="rtl"  class="form-control"   required>
           

    <?php
    $count = 0;
      if(isset($edit['mhtwa']))
        {
          
            echo "<option value='".$edit['mhtwa']."' >   ".$edit['mhtwa']."</option>";
            
        } else {
            echo "                 <option value=''>اختر المحتوى</option>
";
    foreach ($booking_mhtwa as $row):
        
      
            
       
        
        ?> <option value='<?= $row ?>' >     <?= $row ?></option>

        <?php 
    endforeach;}
    ?>

                        </select>
                </div>
                      <div class="form-group">
                  <label for="exampleInputEmail1">النوع   </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder=" مثلا  45 بوصة اللون سلفر   " name="name" required autofocus value="<?=$edit['name']?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">    الموديل	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  مسمى " name="model" value="<?=$edit['model']?>">
                </div>
                  
                  
                      <div class="form-group">
                  <label for="exampleInputPassword1">  الشركة</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  company " name="company" value="<?=$edit['company']?>" >
                </div>
                      <div class="form-group">
                  <label for="exampleInputPassword1">    الكفالة	</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="  warranty " name="warranty"  value="<?=$edit['warranty']?>">
                </div>
                  
                 
                  
               
              <div class="form-group">
                  <label>وصف</label>
                  <textarea class="form-control" rows="3" placeholder="وصف ..." name="text1"><?=$edit['text1']?></textarea>
                </div>
                  
                     <div class="form-group">
                  <label for="exampleInputPassword1">    العدد	</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" placeholder="  warranty " name="addnum" required value="1">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="submit" value="pl">اضافة</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

   
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      
        <!--/.col (right) -->
      </div>
