
<?= $msgview ?>


<div id="myDiv"></div>
<div class="row">

    <div class="col-md-10" style=" padding: 0px">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 style=" display: "><?= $all_bill ?></h3>
                        <h3 style=" display:none ">-
                        </h3>
                        <p>   
                            متوفر 
                            : 

                            <?= ($all_cash) ?> 
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="<?= base_url('booking/show/bill/') ?>" class="small-box-footer">
                        عرض<i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?= $all_booking_day ?></h3>

                        <p>الحركات</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= base_url('booking/show/all/') ?>" class="small-box-footer">
                        عرض <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3><?= $all_rooms ?></h3>

                        <p>الشقق الموجرة </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?= base_url('booking/show/rooms/') ?>" class="small-box-footer">
                        عرض <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?= $clintsout ?></h3>

                        <p>المتأخرين </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= base_url('booking/show/roomsout/') ?>" class="small-box-footer">
                        عرض  <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box  bg-green">
                    <div class="inner">
                        <h3><?= $bookedall ?></h3>

                        <p>الحجوزات الموكدة </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <a href="<?= base_url('booking/booked/all/') ?>" class="small-box-footer">
                        عرض  <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-12" style="float: left">
                <?php if (isset($msg)): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa-warning"></i> تنبيه!</h4>
                        <?php for ($index = 0; $index < count($msg); $index++) : ?>


                            -<?= isset($msg[$index]) ? $msg[$index] : ''; ?><br>

                        <?php endfor; ?>
                    </div>
                <?php endif; ?> </div>
        </div>
        <div class="row">

            <div class="col-md-12">



                <div class="row">
                    <!-- Main content -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">

                                <!-- /.box-header -->
                                <div class="box-body" style="overflow-x: visible;">


                                    <?php
                                    $count = 0;
                                    $checkday = 0;
                                    foreach ($all_groups as $row):
                                        ?>
                                        <div class="col-lg-2 col-xs-6" style="max-width: 150px;height: 110px">
                                            <!-- small box -->


                                            <?php
                                            $whw = "  room='" . $row['name'] . "'  ";


                                            $this->db->from('booking_rooms_images');
                                            $this->db->order_by('id', 'desc');
                                            $this->db->where($whw);
                                            $this->db->limit('1');
                                            $query = $this->db->get();
                                            $datass = $query->row_array();
                                            $sss = '';
                                            if(isset($datass['dateadd']))
                                            {
                                            if (($this->booking->tissme_now() - $datass['dateadd']) > (10 * 24 * 60 * 60))
                                                $sss = 'ok';
                                            }else
                                            {
                                                $sss = 'ok';   
                                                
                                            }
                                            ?>
                                            <?php if ($row['conter'] == 1): ?>
                                                <div class="small-box <?= $row['color']; ?>">
                                                    <div class="inner">
                                                        <h3 style="margin-top: -8px;"><?= $row['name']; ?></h3>

                                                        <div style="        font-size: 10px;
                                                             margin-top: -12px;
                                                             margin-bottom: -2px;margin-right: -5px;"><?= $row['noa'] ?>

                                                            <?php
                                                            echo "<br>  ";

                                                            if ($sss)
                                                                echo '  يرجا رفع صور جديدة <br> ';
                                                            else
                                                                echo '-';
                                                            ?> 




                                                        </div>


                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion home"></i>
                                                    </div>
                                                    <a href="<?= base_url('booking/booked/index/' . $row['name']) ?>" class="small-box-footer"><?= $row['bookig']; ?>
                                                        تسكين<i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>
                                                <?php if ($sss) {
                                                    ?>




                                                    <div class="overlay">
                                                        <i class="fa" style="left: 10%;
                                                           right: 75%;top:15%;color: white;">  <img   src="<?= base_url() ?>/public/warning.gif" style="width:30px"></i>
                                                    </div> 

                                                <?php }
                                                ?>
                                            <?php endif; ?>

                                            <?php if ($row['conter'] == 4): ?>


                                                <!-- /.box -->

                                                <div class="small-box <?= $row['color']; ?>">
                                                    <div class="inner">
                                                        <h3 style="margin-bottom: 17px;   font-size: 30px;"><?= $row['name']; ?></h3>
                                                        <div style="        font-size: 10px; margin-top: -12px; margin-bottom: -2px;margin-right: -5px;min-height: 20px;">
                                                            <?= $row['cnetomla']; ?></div>
                                                    </div>

                                                    <a href="<?= base_url('booking/Dashboard/toopen/' . $row['name']) ?>" class="small-box-footer"><?= $row['bookig']; ?>
                                                        تغير الى متاحة <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>

                                            <?php endif; ?>
                                                
                                                
                                                
                                                           <?php if ($row['conter'] == 6): ?>


                                                <!-- /.box -->

                                                <div class="small-box <?= $row['color']; ?>" style="    background-color: #606060 !important;">
                                                    <div class="inner">
                                                        <h3 style="margin-bottom: 17px;   font-size: 30px;"><?= $row['name']; ?></h3>
                                                        <div style="        font-size: 10px; margin-top: -12px; margin-bottom: -2px;margin-right: -5px;min-height: 20px;">
                                                            <?= $row['cnetomla']; ?></div>
                                                    </div>

                                                    <a href="<?= base_url('booking/Dashboard/tobook/' . $row['name']) ?>" class="small-box-footer"><?= $row['bookig']; ?>
                                                         وصل العميل  <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>

                                            <?php endif; ?>

                                            <?php if ($row['conter'] == 5): ?>


                                                <!-- /.box -->

                                                <div class="small-box bg-teal">
                                                    <div class="inner">
                                                        <h3 style="margin-bottom: 17px;"><?= $row['name']; ?></h3>

                                                        <div style="        font-size: 12px;
                                                             margin-top: -12px;
                                                             margin-bottom: -2px;margin-right: -5px;"> تم  التشيك</div>

                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion home"></i>
                                                    </div>
                                                    <a href="<?= base_url('booking/Dashboard/toclean/' . $row['name']) ?>" class="small-box-footer"><?= $row['bookig']; ?>
                                                        تغير الى تنظيف <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>

                                            <?php endif; ?>

                                            <?php
                                            if ($row['conter'] == 3 and $row['checkout']):

                                                /// if(isset($row['checkout']) ){$row['color']='bg-orange';}
                                                ?>


                                                <!-- /.box -->

                                                <div class="small-box <?= $row['color']; ?>">
                                                    <div class="inner">
                                                        <h3 style="margin-bottom: 0px;"><?= $row['name']; ?></h3>

                                                        <div style="        font-size: 12px;
                                                             margin-top: -12px;
                                                             margin-bottom: -2px;margin-right: -5px;"> منذ :  <?= $this->booking->getNiceDuration($this->booking->tissme_now() - $row['timeend2'], 1); ?>
                                                             <?php
                                                             echo "<br>  ";

                                                             if ($sss)
                                                                 echo '  يرجا رفع صور جديدة <br> ';
                                                             else
                                                                 echo $noaroom[$row['noa']];
                                                             ?> </div>
                                                    </div>


                                                    <div class="icon">
                                                        <i class="ion home"></i>
                                                    </div>
                                                    <a href="<?= base_url('booking/show/id/' . $row['bookingid']) ?>" class="small-box-footer"><?= $row['bookig']; ?>
                                                        عرض  <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>
                                                <?php if ($sss) {
                                                    ?>




                                                    <div class="overlay">
                                                        <i class="fa" style="left: 10%;
                                                           right: 75%;top:15%;color: white;">  <img   src="<?= base_url() ?>/public/warning.gif" style="width:30px"></i>
                                                    </div> 

                                                <?php }
                                                ?>
                                            <?php endif; ?>


                                            <?php
                                            if ($row['conter'] == 3 and!$row['checkout']):

                                                $row['color'] = 'bg-aqua';
                                                ?>


                                                <!-- /.box -->

                                                <div class="small-box <?= $row['color']; ?>">
                                                    <div class="inner">
                                                        <h3 style="margin-bottom: 17px;"><?= $row['name']; ?></h3>

                                                        <div style="        font-size: 12px;
                                                             margin-top: -12px;
                                                             margin-bottom: -2px;margin-right: -5px;"> تحت التشيك</div>
                                                    </div>


                                                    <div class="icon">
                                                        <i class="ion home"></i>
                                                    </div>
                                                    <a href="<?= base_url('booking/show/id/' . $row['bookingid']) ?>" class="small-box-footer"><?= $row['bookig']; ?>
                                                        عرض  <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>

                                            <?php endif; ?>

                                            <?php
                                            if ($row['conter'] == 2 and $row['bookedok'] == 'wait'):

                                                $row['color'] = 'bg-aqua';
                                                ?>


                                                <!-- /.box -->

                                                <div class="small-box <?= $row['color']; ?>" style="    background-color: #e0a59e  !important;
                                                     ">
                                                    <div class="inner">
                                                        <h3 style="margin-top: -10px;"><?= $row['name']; ?></h3>

                                                        <div style="        font-size: 12px;
                                                             margin-top: -12px;
                                                             margin-bottom: -2px;"><?= $row['bookingname'] ?><br><span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"> 
                                                                ينتظر توقيع العقد

                                                            </span></div>
                                                    </div>


                                                    <div class="icon">
                                                        <i class="ion home"></i>
                                                    </div>
                                                    <a href="<?= base_url('booking/show/print3gd/' . $row['bookingid']) ?>" class="small-box-footer"><?= $row['bookig']; ?>
                                                        طباعة العقد  <i class="fa fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>

                                            <?php endif; ?>

                                            <?php
                                            if ($row['conter'] == 2 and $row['bookedok'] != 'wait'):

                                                $fff = ' ';
                                                $ddd = $row['timeend'] - (int) $this->booking->tissme_now();
                                                if ($ddd < 18000 and $ddd > 0) {
                                                    $row['color'] = '';
                                                    $checkday = $checkday + 1;
                                                    $fff = 'background-color:  #a23737;color: #fffefb;';
                                                }
                                                if ($row['bookedok'] == 'wait') {
                                                    $fff = 'background-color:  #a00737;color: #fffefb;';
                                                }
                                                ?>
                                                <div class="small-box <?= $row['color']; ?>" style="<?= $fff ?>">

                                                    <div class="inner">

                                                        <h3 style="margin-top: -10px;"><?= $row['name']; ?></h3>

                                                        <div style="        font-size: 12px;
                                                             margin-top: -12px;
                                                             margin-bottom: -2px;"><?= $row['bookingname'] ?><br><span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"> -
        <?php if ($row['outsite'] == 'ok'): ?>   غير متواجد
        <?php endif; ?>
                                                            </span></div>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion home"></i>
                                                    </div>
                                                    <a href="<?= base_url('booking/show/id/' . $row['bookingid']) ?>" class="small-box-footer" style=" font-size: 12px;">
                                                        عرض     

                                                    </a>

                                                </div>

        <?php if ((int) $row['timeend'] < (int) $this->booking->tissme_now()): ?>
                                                    <div class="progress vertical active" style="        margin-top: -126px;
                                                         height: 80px;
                                                         float: left;
                                                         width: 100%;
                                                         margin-left: 0px;">
                                                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="50" style="height: 100%;width: 100%;">
                                                            <h3 style="    font-size: 38px;margin-top: 0px;
                                                                margin-right: -10px;"><?= $row['name']; ?></h3>
                                                            <div style="        font-size: 10px;
                                                                 margin-top: -12px;
                                                                 margin-bottom: -2px;text-align: right;padding-right: 10px"><?= $row['bookingname'] ?>

                                                                <br><span style=" font-size: 12px ;margin-top: -30px;font-weight: bold;"><?= $this->booking->getNiceDuration($this->booking->tissme_now() - $row['timeend']); ?>- <?php if ($row['outsite'] == 'ok'): ?>   غير متواجد
            <?php endif; ?></span></div>

                                                        </div>
                                                    </div>
        <?php endif; ?>

                                                <?php if ($row['commentnbeh']): ?> 
                                                    <div class="overlay">
                                                        <i class="fa" style="left: 10%;
                                                           right: 75%;top:15%;color: white;">  <img   src="<?= base_url() ?>/public/warning.gif" style="width:30px"></i>
                                                    </div> 

        <?php endif; ?> 
    <?php endif; ?>

                                        </div>



<?php endforeach; ?>


                                </div>
                                <!-- /.box-body -->

                            </div>
                            <!-- /.box -->


                            <!-- /.box -->
                        </div>
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">
<?php
if ($checkday > 0) {
    ?>
                        <!-- /.col -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon "  style="background-color: #a23737;"><?= $checkday ?></span>

                                <div class="info-box-content">
                                    <h4 > خروج اليوم</h4>

                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
<?php } ?>


                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon "><?= $all_rooms_3 + $all_rooms_1 ?></span>

                            <div class="info-box-content">
                                <h4 >المتاح الكل</h4>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><?= $all_rooms_3 ?></span>

                            <div class="info-box-content">
                                <h4 >تنظيف</h4>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><?= $all_rooms_1 ?></span>

                            <div class="info-box-content">
                                <h4 >متاح حاليا</h4> 
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>


                    <!-- /.col -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><?= $all_rooms_2 ?></span>

                            <div class="info-box-content">
                                <h4 >مشغول</h4>

                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">

                        <div class="info-box">
                            <span class="info-box-icon bg-blue"><?= $clintsout ?>
                            </span>

                            <div class="info-box-content">
                                <h4 >متاخرين</h4>

                            </div>

                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div> 
<!--
<?php echo form_open_multipart(base_url('booking/dashboard/gyab/')); ?>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="info-box" style=" padding: 20px">
                            <select dir=rtl name='modif' style="width: 200px"  >
                                <option value='' >اختر الموظف</option> 
<?php
$count = 0;
$count2 = 0;
foreach ($modif as $row):
    ?>

                                    <option value="<?= $row['name'] ?>-<?= $row['text6'] ?>-<?= $row['text7'] ?>"><?= $row['name'] ?></option> 
                                <?php endforeach; ?>
                            </select>      
<input type="text" class="form-control" id="exampleInputPassword1" placeholder=" ملاحظة " name="comment" value="">

       
         <input  name="file1" type="file" accept="image/*" capture>


                            <button type="submit" class="btn btn-primary" name="submit" value="pl">حضور</button>


                            <button type="submit" class="btn btn-primary" name="submit2" value="pl">انصراف</button>


                          

                        </div>

                    </div>
                </div>
                </form>
-->
				  <br>    <br> 
               <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="info-box" style=" padding: 20px">
                            الموظفين المتواجدين :
                            <?php $count = 0;
                            foreach ($all_gyab as $row):
                                ?>
                                <a class="update btn btn-sm btn-success " href="#"><i class="material-icons"> <?= $row['name'] ?></i></a>
                            <?php endforeach; ?>
				         <br>    <br> 
							</div></div></div>

<!--
                <?php if ($this->session->userdata('group') or $this->session->userdata('editor')):
                    echo form_open_multipart(base_url('booking/dashboard/gyab/'));
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="info-box" style=" padding: 20px">
                                <select dir=rtl name='modif' style="width: 200px"  >
                                    <option value='' >اختر الموظف</option> 
                                    <?php
                                    $count = 0;
                                    $count2 = 0;
                                    foreach ($modif as $row):
                                        ?>

                                        <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option> 
                                  <?php endforeach; ?>
                                </select>      



                                <br> <input type="text" name="note" placeholder="اضافة ملاحظة  ..." class="form-control" style=" height: 100px"><br>
                                <input type="file" id="exampleInputFile" name="file1">
                                <button type="submit" class="btn btn-primary" name="addnote" value="pl">اضافة ملاحظه</button>

                            </div>

                        </div>
                    </div>
                    </form>
                    <?php endif; ?>
-->
                <div class="row">
                    <?php
                    if (($all_rooms_1 + $all_rooms_3) < 6) {

                        if (@stristr($_SERVER['REQUEST_URI'], '/booking2/') or @ stristr($_SERVER['REQUEST_URI'], '/booking4/') or @ stristr($_SERVER['REQUEST_URI'], '/booking5/')or @ stristr($_SERVER['REQUEST_URI'], '/booking6/')) {

                            $dbhost = "localhost"; // ??????
                            $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                            $dbpass = "Qaz*123123";     // ??????? ????? ????????
                            $dbname = "kuwaityc_booking"; // ??? ????? ????????
                            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            $sql = mysqli_query($mysqli, "select * from booking_rooms where conter=1 or  conter=3  ");

                            $num_sql1 = mysqli_num_rows($sql);
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><?= $num_sql1 ?></span>

                                    <div class="info-box-content">
                                        <h3 >حولي</h3> 
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>


                            <?php
                        }

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking2/')) {

                            $dbhost = "localhost"; // ??????

                            $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                            $dbpass = "Qaz*123123";     // ??????? ????? ????????
                            $dbname = "kuwaityc_booking2"; // ??? ????? ????????
                            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            $sql = mysqli_query($mysqli, "select * from booking_rooms where conter=1 or  conter=3  ");

                            $num_sql1 = mysqli_num_rows($sql);
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><?= $num_sql1 ?></span>

                                    <div class="info-box-content">
                                        <h3 >السالمية</h3> 
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>


                            <?php
                        }

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking6/')) {

                            $dbhost = "localhost"; // ??????
                            $dbuser = "kuwaityc_book";  // ??? ?????? ????? ????????
                            $dbpass = "Qaz*123123";     // ??????? ????? ????????
                            $dbname = "kuwaityc_booking6"; // ??? ????? ????????
                            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            $sql = mysqli_query($mysqli, "select * from booking_rooms where conter=1 or  conter=3  ");

                            $num_sql1 = mysqli_num_rows($sql);
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><?= $num_sql1 ?></span>

                                    <div class="info-box-content">
                                        <h3 >ريحانه</h3> 
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>


                            <?php
                        }



                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking4/')) {

                            $dbhost = "localhost"; //
                            $dbuser = "kuwaityc_book";  // 
                            $dbpass = "Qaz*123123";     // 
                            $dbname = "kuwaityc_booking4"; // 
                            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            $sql = mysqli_query($mysqli, "select * from booking_rooms where conter=1 or  conter=3  ");

                            $num_sql1 = mysqli_num_rows($sql);
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><?= $num_sql1 ?></span>

                                    <div class="info-box-content">
                                        <h3 >الرقعي</h3> 
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>


                            <?php
                        }

                        if (!@stristr($_SERVER['REQUEST_URI'], '/booking5/')) {

                            $dbhost = "localhost"; //
                            $dbuser = "kuwaityc_book";  // 
                            $dbpass = "Qaz*123123";     // 
                            $dbname = "kuwaityc_booking5"; // 
                            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                            $sql = mysqli_query($mysqli, "select * from booking_rooms where conter=1 or  conter=3  ");

                            $num_sql1 = mysqli_num_rows($sql);
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><?= $num_sql1 ?></span>

                                    <div class="info-box-content">
                                        <h3 >الشعب</h3> 
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>


                            <?php
                        }
                    }
                    ?>  </div> 
            </div>
        </div>
    </div>
    <div class="col-md-2"  style=" padding: 0px"> 


        <div class="box box-primary">
            <div class="box-header ui-sortable-handle" >
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">حجوزات الهاتف</h3>

            </div>


            <!-- /.box-header -->
            <div class="box-bodyd" style="    padding: 15px">
                <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                <ul class="products-list product-list-in-box">
<?php $count = 0;
foreach ($all_note as $row):
    
            $row['hour'] = sprintf("%'.02d\n", $row['hour']);
    ?>
                        <li class="item" >

                            <div class="product-info" style="margin-right: 0px;">
                               <span class="" style="">
  <span class="  pull-right" >   <i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i> <?= $row['title'] ?></span>
  
  
  <?php 
          $this->db->from('booking');
                $this->db->order_by('id', 'desc');
                $this->db->where(" mobile ='" . $row['mobile'] . "'   and timeend2!='' ");
                $data['all_groups'] = $this->db->get()->result_array();
                if(count($data['all_groups'])>0)
                {
                    echo '<span class="label label-primary pull-left" >عميل : '.count($data['all_groups']).'</span>';
                }
                ?>
  
  
                                
                                </span>
                               <br>  <span class="  pull-right" ><?= $row['mobile'] ?></span><span class="label label-warning pull-left" >الساعة : 00-<?= $row['hour'] ?></span>  <br>
                               
                                 <?php 
                                 
                                 if($row['comm'])echo '<span class="  pull-right" >'.$row['comm'].'</span><br> ';
                                 
                                 ?>

                                <span href="javascript:void(0)" class="product-title" style="color: #3c8dbc;">
                           
                                   
                                    <a class="label label-success pull-right" href="<?= base_url('booking/dashboard/notefinsh/' . $row['id'].'/2') ?>" >حضور</a>
                                    
                                      <a class="label label-danger pull-left" href="<?= base_url('booking/dashboard/notefinsh/' . $row['id'].'/3') ?>" >الغاء</a>
                                            
                                </span>

                            </div>
                        </li>
<?php endforeach; ?>
                    <!-- /.item -->

                    <!-- /.item -->
                </ul>
            </div>
            <div class="box-footer">
<?php echo form_open_multipart(base_url('booking/dashboard/addnote/')); ?>
                <div class="input-group">
                    <div class="col-md-12"> 
                        <input type="text" name="mobile" placeholder="الهاتف  ..." class="form-control" required>
                    </div>
                    <div class="col-md-12"><input type="text" name="title" placeholder="الاسم  ..." class="form-control" required>
                    </div>    <div class="col-md-12"> 

                    </div>    <div class="col-md-12"> 
                    </div>   
                    <div class="col-md-12">

                        <select  name='hour'  dir="rtl"   class="form-control " required>
                            <option value='' >الساعة</option>
                            <?php
                            $count = 0;



                            for ($index1 = 7; $index1 < 25; $index1++) {
                               /// $index1 = sprintf("%'.02d\n", $index1);
                                ?> <option value='<?= sprintf("%'.02d\n", $index1) ?>'  ><?= $index1 ?>:00</option>

    <?php
}
?>

                        </select>
                    </div>   
                    
                      <div class="col-md-12"><input type="text" name="comm" placeholder="ملاحظة مثلا السعر  45  ..." class="form-control" >
                    </div><div class="col-md-12"> 

                        <button type="submit" class="btn btn-primary " >اضافة </button>
                    </div>   
                </div>
                </from>
            </div>

        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.info-box -->
</div>
</div>
<meta http-equiv=refresh content=300;url=<?= base_url() . 'booking/dashboard/' ?>>


<script type="text/javascript">
      function loadXMLDoc() {
          var xmlhttp;
         if (window.XMLHttpRequest) {
              xmlhttp = new XMLHttpRequest();
          }
          else {// code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function () {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    // change content from div
                  document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "<?= base_url("booking/backsound/?time=".time()) ?>", true);
          xmlhttp.send();
      }

      // first page load
   setTimeout(function(){ 

        loadXMLDoc();
    }, 5000);
     
    setInterval(loadXMLDoc, 10000); // 2 seconds.
    
</script>