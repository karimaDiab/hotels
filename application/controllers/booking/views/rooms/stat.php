





<section class="content-header">
    <h1>
        <br>
    </h1>
    <ol class="breadcrumb" style="right: 10px;">
        <li><a href="<?= base_url('booking/Dashboard/') ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="<?= base_url('booking/producer/') ?>">المنتجات</a></li>
    </ol>
</section>













<div class="row">
    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">احصائيات المنتجات    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr style="display: none">

                            <th>الاسم</th>
                            <?php
                            $count = 0;
                            foreach ($all_room as $row): $count++;
                                ?>
                                <th><a href="ss"><?= $row['name']; ?> </a></th>
                            <?php endforeach; ?>
                            <th><?= $count; ?> </th>
                            <th>ناقص</th>
                        </tr>

<?php
$difern = 'dd';
foreach ($all_groups as $row):
    $query = $this->db->get_where('booking_producer', array("mhtwa" => $row['text1']));
    $producersss = $query->row_array();
    if (isset($producersss['name'])) {
        $nactmh[1] = "الصالة";
        $nactmh[2] = " الماستر";
        $nactmh[3] = " الثانية";
        $nactmh[4] = "المطبخ";
        $nactmh[5] = "الحمام";
        $nactmh[6] = "حمام الماستر";
        $nactmh[7] = "الثالثة";
        if ($difern != $row['text5'] and $row['text5']) {
            echo "<tr>";
            echo '<td align="right" colspan=100 style="text-align:center;padding-right: 10px;    background-color: #a3ccd8;">	<b> <a href="' . base_url() . 'booking/producer/stat/' . $page . '/' . $row['text5'] . '">' . $nactmh[$row['text5']] . '</a></b><br></td>';

            echo "</tr>";
            echo ' <th>الاسم</th>';
            echo '   <th><a href="' . base_url() . 'booking/producer/stat/0">المخزن </a></th>';
            echo '   <th><a href="' . base_url() . 'booking/producer/stat/100">الرسبشن</a></th>';
            foreach ($all_room as $rowa):
                echo '   <th><a href="' . base_url() . 'booking/producer/room/' . $rowa['name'] . '">' . $rowa['name'] . ' </a></th>';
            endforeach;
            echo " <th>$count </th>
                     <th>ناقص</th>";
        }

        echo "<tr>";

        $difern = $row['text5'];
        ?>
                                <tr>
                                    <td><a href="<?= base_url() ?>/booking/producer/stat/<?= $page ?>/<?= $row['text5']; ?>/<?= $row['id']; ?>"><?= $row['text1']; ?></a> </td>




        <?php
        $whr = "counter=0 and mhtwa='" . $row['text1'] . "'";


        $this->db->from('booking_producer');
        $this->db->where($whr);
        echo "<td>";
        $allmoh = $this->db->count_all_results();
        $query = $this->db->get_where('booking_producer', $whr);
        $producer = $query->row_array();
        echo '  <a href="' . base_url() . 'booking/producer/all/1/' . $producer['id'] . '/200">' . $allmoh . ' </a>';
        echo "</td>";
        ?>






                                    <?php
                                    $whr = "counter=100 and mhtwa='" . $row['text1'] . "'";
                                    $query = $this->db->get_where('booking_producer', $whr);
                                    $producer = $query->row_array();

                                    $this->db->from('booking_producer');
                                    $this->db->where($whr);




                                    echo ' <td> <a href="' . base_url() . 'booking/producer/all/1/' . $producer['id'] . '/100">' . $this->db->count_all_results() . ' </a></td>';
                                    ?>


        <?php
        foreach ($all_room as $rowr):

          
        
                ?>
                                            <td>


                                            <?php
                                            $query = $this->db->get_where('booking_producer', array('counter' => $rowr['name'], 'counter2' => $row['text5'], "mhtwa" => $row['text1']));
                                            $producer = $query->row_array();

                                            if (isset($producer['name'])) {
                                                $allmoh++;
                                                echo '<a href="' . base_url() . 'booking/producer/show/' . $producer['id'] . '/"><span  class="glyphicon glyphicon-ok" style="color: #00a65a;"></span></a>';
                                            } else {
                                                if(isset($_GET['alladd'])=='ok')
                                                {
                                                       $whr = "counter=0 and mhtwa='" . $row['text1'] . "'";






//echo print_r($this->db->last_query());

        $this->db->from('booking_producer');
        $this->db->order_by('id', 'desc');

        $this->db->where($whr);
   $this->db->limit(1);
        $data['all_groups'] = $this->db->get()->result_array();
         
        
             foreach ($data['all_groups'] as $rowdd) {
                 
                 echo $rowdd['id'];
                 
               $edit_data = array(
                'counter' => $rowr['name'],
                'counter2' => $row['text5'],
                'comment' => $producer['comment'] . "نقل الى شقة :" . $rowr['name'] . " - " . $nactmh[$row['text5']] . "||" . time() . "||<aln3esa>",
            );

            $result = $this->db->where('id', $rowdd['id'])->update('booking_producer', $edit_data);
                 
             }
                                                    
                                      
                                                 }
                                                 
                                                 
                                                 
                                                           echo '<a href="' . base_url() . 'booking/producer/checkmhtwa/' . $rowr['id'] . '/' . $row['id'] . '/"><span class="glyphicon glyphicon-remove"  style="color: red;"></span></a>';
                                            }
                                            ?>

                                            </td>

                                        <?php  endforeach; ?>

                                    <td><?php
                            
                                        echo $allmoh;
                                        
                              
                                    ?> <a href="<?= base_url() ?>/booking/<?= $thispage ?>/stat/1/<?=$row['text5'] ?>/<?=$row['id'] ?>/?alladd=ok" class="btn btn-block btn-primary"  style="margin-bottom:5px"><i class="icon-pencil  icon-white"> </i>  تعبية  </a> </td>

                                    <td><?php
                              
                                        echo $allmoh - $count;
                                        
                                        
                                    
                                    ?> </td>





                                </tr>

                                    <?php } endforeach; ?>

                    </table>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->


            <!-- /.box -->
        </div>
    </div>
</div>
<!-- /.row -->

