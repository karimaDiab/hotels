






<div class="row">
   
    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/add/1/1" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> حجز جديد   </a> 	</div>



    </div>
      <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/all/1/8" class="btn btn-block btn-danger"  style="margin-bottom:5px ;   background-color: #222d32;"><i class="icon-pencil  icon-white"> </i> حجوزات اون لاين    مدفوعة  
             
           <span class="badge badge-danger "> <?=$all_count8?> </span>
             </a> 	</div>



        </div>
       <div  style="float:right ;display:none"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/all/1/7" class="btn btn-block btn-warning"  style="margin-bottom:5px ;  "><i class="icon-pencil  icon-white"> </i> حجوزات اون لاين    فاشلة  
             
           <span class="badge badge-danger "> <?=$all_count7?> </span>
             </a> 	</div>



        </div>
            <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/all/1/5" class="btn btn-block btn-success"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> تم التسكين  </a> 	</div>



        </div>
    
          <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/all/1/6" class="btn btn-block bg-blue"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  موجلة  </a> 	</div>



        </div>

    <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/all/1/3" class="btn btn-block btn-warning"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> منتهي الوقت  </a> 	</div>
 </div>
        <div  style="float:right"><div  style="margin-left:10px"><a href="<?= base_url() ?>/booking/<?= $thispage ?>/all/1/2" class="btn btn-block btn-danger"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i> ملغي  </a> 	</div>
            
            </div>
          


   </div>




   

    <div class="row">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">الحجوزات  </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>

                                    <th>الاسم</th>
                                    <th>الهاتف</th>
                                    <th>المدني </th>
                                    <th>  الاضافة</th>
                                    <th style="width: 40px">المبلغ</th>
                                    <th>الدخول</th>

                                    <th>حالة الدفع</th>
                                    <th style="width: 40px">اليوزر</th>
                                    <th style="width: 40px"></th>
                                </tr>

                                <?php
                                $count = 0;
                                foreach ($all_groups as $row):
                                    
                                    
                                         $query = $this->db->get_where('booking_clints', array('cid' => $row['cid']));
        $booking_clints = $query->row_array();
    
                                    ?>
                                    <tr>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['mobile']; ?></td>
                                        <td><?= $row['cid']; ?></td>
                                        <td><?= $this->booking->tissme_show($row['dateadd']); ?></td>
                                        <td><?= $row['amount']; ?></td>
                                        <td><?php
                                        
                                        IF($row['show1'] == '8')
                                        {
                                            echo "  ".$row['datetext4'];
                                        }else
                                        {
                                            
                                        if($row['booking'] !='' )echo " لشقه : ".$row['booking'];
                                        
                                       else echo  $this->booking->tissme_show($row['timeenter']);
                                        }
                                        
                                        ?></td>





    <?php if ($row['show1'] == '0'): ?>

                                            <td>     <a title="Edit" class="update btn btn-sm btn-success pull-right" href="<?= base_url('booking/' . $this->thispage . '/update/' . $row['id'] . '/1') ?>"><i class="material-icons">تم التسليم</i></a>
                                            </td>


                                            <td>
                                                <a title="Delete" class="delete btn btn-sm btn-danger pull-right '.$disabled.'" href="<?= base_url('booking/' . $this->thispage . '/update/' . $row['id'] . '/2'); ?>" ><i class="material-icons">لارشيف</i></a>
                                            </td>
                                            <td><?= $row['user']; ?></td>
                                        <?php endif; ?>
    <?php if ($row['show1'] != '0'): ?>





                                            <td>
                                                <?php if ($row['show1'] == '1') echo '  <span class="btn btn-warning">تحت الانتظار </span>'; ?>   <?php if ($row['show1'] == '4' or $row['show1'] == '5' or $row['show1'] == '6' or $row['show1'] == '8') echo '  <span class="btn btn-success"> تم الدفع </span>'.$this->booking->tissme_show($row['paymentdate']).' <br>'.$row['paymenttext']; ?> 

                                                 
                                                <?php if ($row['show1'] == '2') echo '  <span class="btn btn-danger"> تم الغاء</span>'; ?> 

               <?php if ($row['show1'] == '3') echo '  <span class="btn btn-danger"> منتهية</span>'; ?> 





                                            </td>

                                            <td><?= $row['user']; ?></td>
                                            <td>
                                                <?php
                                                if ($row['show1'] == '1' or $row['show1'] == '7' ) {
                                                    
                                                    
                                                          $whr = " show1='8'  and datetext4='".$row['datetext4']."'  and cid='".$row['cid']."'";
        $this->db->from('booking_booked');
    $this->db->where($whr);

    echo     $aaaaa = $this->db->count_all_results();  
                                                    ?>
                                                <br>
                                                    <a href="<?= base_url() ?>/booking/<?= $thispage ?>/send/<?= $row['id'] ?>/"  class="btn btn-block btn-primary" style="margin-bottom:5px"  >    ارسال واتس اب      </a> 
                                                    
                                                <a href="<?= base_url() ?>/booking/<?= $thispage ?>/cancel/<?= $row['id'] ?>/2"  class="btn btn-block btn-danger" style="margin-bottom:5px"  >       الغاء   </a> 
                                                    <?php
                                                }
                                                
                                                        if ($row['show1'] == '4' ) {
                                                            
                                                            
                                                                if( $row['booking'] !='' and $row['booking'] !=0)
                                                                {
                                                                  ?>

                                                             <?php echo form_open_multipart(base_url('booking/booked/idrenew/'.$row['id'].'/'.$row['booking'])); ?>
                                                  الايام
                                                         <input type="text" name="day" placeholder=" ادخل    الايام  ..." class="form-control" value="1"><br>
                 
                          <button type="submit" class="btn btn-success btn-flat" name="submit" value="211"> تمديد </button>
                  
           
               
              </form>
                                               
                                              
                                                    <?php     
                                                                }else{
                                                                    
                                                                        if(!isset( $booking_clints['cid']))
        {
            echo "يرجا اضافة العميل من العملاء";
        }else
        {
            
   
                                                    ?>

                                              
                                                <a href="<?= base_url() ?>/booking/<?= $thispage ?>/add4/<?= $row['id'] ?>/"  class="btn btn-block btn-success" style="margin-bottom:5px"  >        تسكين   </a>
                                                    <a href="<?= base_url() ?>/booking/<?= $thispage ?>/cancel/<?= $row['id'] ?>/6"  class="btn btn-block btn-danger" style="margin-bottom:5px"  >       موجلة   </a> 
                                                    <?php
                                                             
                                                         }}
                                                }
                                            
                                                    
                                                    
                                                                     if ($row['show1'] == '6' OR  ($row['show1'] == '8' and  $this->data_day==$row['datetext4']) ) {
                                                    ?>

                                              
                                                <a href="<?= base_url() ?>/booking/<?= $thispage ?>/add4/<?= $row['id'] ?>/"  class="btn btn-block btn-success" style="margin-bottom:5px"  >        تسكين   </a>
                                                  
                                                    <?php
                                                }
                                                ?>

                                            </td>
    <?php endif; ?>
                                    </tr>

<?php endforeach; ?>

                            </table>
                        </div>
                        <!-- /.box-body -->
<?php if ($all_count > 2): ?>
                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">

    <?php for ($count = 1; $count < $all_count; $count++): ?>
                                        <li><a href="<?= base_url('booking/' . $thispage . '/all/' . $count . '/' . $counter); ?>"><?= $count ?></a></li>

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

