

    <!-- Content Header (Page header) -->

<div class="row">

        <!-- left column -->

        <div class="col-md-12">

          <!-- general form elements -->

          <div class="box box-primary" style="    padding: 20px;">

            <div class="box-header with-border">

              <h3 class="box-title">تعديل سؤال</h3>

            </div>

         

                 <?php if(isset($msg) || validation_errors() !== ''): ?>

            <div class="alert alert-warning alert-dismissible">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <h4><i class="icon fa-warning"></i> Alert!</h4>

                <?= validation_errors();?>

                <?= isset($msg)? $msg: ''; ?>

            </div>

        <?php endif; ?>   

              

              

           <?php echo form_open_multipart(base_url('booking/'.$thispage.'/edit/'.$edit['id'])); ?>

     <div class="form-group">

                  <label >   نوع التفتيش	</label>

                  <select class="form-control"  name='type_id'>

                      <option>اختر</option>

                      <?php foreach ($types as $one){ ?>

                      <option value='<?=$one['id']?>' <?php echo (isset($edit['type_id']) && $edit['type_id']!=null && $edit['type_id']==$one['id']?'selected':'' ); ?> ><?=$one['name']?></option>

                      <?php } ?>

                  </select>

                </div>


                <div class="form-group">

                  <label for="exampleInputEmail1">نص السؤال </label>

                
                            <textarea class="form-control" rows="5" placeholder="وصف ..." name="text" required autofocus><?=$edit['text']?> </textarea>

                </div>

             

              </div>

              <!-- /.box-body -->



              <div class="box-footer">

                  <button type="submit" class="btn btn-primary" name="submit" value="pl">تعديل</button>

              </div>

            </form>

          </div>

          <!-- /.box -->



   

        </div>

        <!--/.col (left) -->

        <!-- right column -->

      

        <!--/.col (right) -->

      </div>

