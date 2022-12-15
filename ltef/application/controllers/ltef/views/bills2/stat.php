


  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">المالية </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">الفئة العمرية</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div><div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"> اكثر الايام دخول</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart2" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div>
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> الحركات  والعملاء الجدد</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success" >
            <div class="box-header with-border">
              <h3 class="box-title">اوقات الدخول والخروج </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <div class="chart"style="width: 3000px">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
              
                 <div class="box-body">
              <div class="chart" style="width: 3000px">
                <canvas id="barChart2" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->



  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url()?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- page script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: [
          
               <?php  foreach ($all_groups as $row): ?>
                          "<?= $row['dateadd']; ?>",
                                    <?php endforeach; ?>
               ],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
        
          data: [ <?php  foreach ($all_groups as $row): ?>
                          <?= $row['all_bill1']; ?>,
                                    <?php endforeach; ?>]
        }
      ]
    };


<?php    foreach($countryname as $code => $counter)
{
             
                     $counter."-";
                    
    $country=$flagscounter[$code]."";
                }
                ?>


    var areaChartData3 = {
      labels: [
          
               <?php foreach($countryname as $code => $counter): ?>
                          "<?php
                          
                          if(substr($counter,0,1)=="1")  echo "الاثنين";
                            if(substr($counter,0,1)=="2")  echo "الثلاثاء";
                              if(substr($counter,0,1)=="3")  echo "الاربعائ";
                                if(substr($counter,0,1)=="4")  echo "الخميس";
                                           if(substr($counter,0,1)=="5")  echo "الجمعة";
                                  if(substr($counter,0,1)=="6")  echo "السبت";
                                    if(substr($counter,0,1)=="7")  echo "الاحد";

               echo substr($counter,1,2);
               
               
               ?>",
                                    <?php endforeach; ?>
               ],
      datasets: [
        {
          label: "خروج",
         fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
        
          data: [    <?php foreach($countryname as $code => $counter): ?>
                          "<?= 0; ?>",
                                    <?php endforeach; ?>]
        }, {
          label: "دخول",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
        
        data: [    <?php foreach($countryname as $code => $counter): ?>
                          "<?= $flagscounter[$code]; ?>",
                                    <?php endforeach; ?>]
        }
      ]
    };

  var areaChartData4 = {
      labels: [
          
               <?php foreach($countryname as $code => $counter): ?>
                          "<?php
                          
                          if(substr($counter,0,1)=="1")  echo "الاثنين";
                            if(substr($counter,0,1)=="2")  echo "الثلاثاء";
                              if(substr($counter,0,1)=="3")  echo "الاربعائ";
                                if(substr($counter,0,1)=="4")  echo "الخميس";
                                           if(substr($counter,0,1)=="5")  echo "الجمعة";
                                  if(substr($counter,0,1)=="6")  echo "السبت";
                                    if(substr($counter,0,1)=="7")  echo "الاحد";

               echo substr($counter,1,2);
               
               
               ?>",
                                    <?php endforeach; ?>
               ],
      datasets: [
        {
          label: "دخول",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
        
          data: [    <?php foreach($countryname as $code => $counter): ?>
                          "<?=0; ?>",
                                    <?php endforeach; ?>]
        }, {
          label: "خروج",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
        
          data: [<?php foreach($countryname as $code => $counter): ?>
                          "<?= @$flagscounter2[$code]; ?>",
                                    <?php endforeach; ?>]
        }
      ]
    };

   var areaChartData2 = {
      labels: [
          
               <?php  foreach ($all_groups as $row): ?>
                          "<?= $row['dateadd']; ?>",
                                    <?php endforeach; ?>
               ],
      datasets: [
        {
          label: "الحركات",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
        
          data: [ <?php  foreach ($all_groups as $row): ?>
                          <?= $row['all_booking']; ?>,
                                    <?php endforeach; ?>]
        },
        {
          label: " العملاء الجدد",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
         data: [ <?php  foreach ($all_groups as $row): ?>
                          <?= $row['all_clints']; ?>,
                                    <?php endforeach; ?>]
        }
      
      
      ]
    };
    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData2, lineChartOptions);

    //-------------
    //- PIE CHART -                $yee21=0;
  
  
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    
      var pieChartCanvas2 = $("#pieChart2").get(0).getContext("2d");
    var pieChart2 = new Chart(pieChartCanvas2);
    var PieData = [
      {
        value: <?=$yee21?>,
        color: "#f56954",
        highlight: "#f56954",
        label: "21-25"
      },
      {
        value: <?=$yee25?>,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "26-29"
      },
      {
        value: <?=$yee30?>,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "30-34"
      },
      {
        value: <?=$yee35?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "35-39"
      },
      {
        value: <?=$yee40?>,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "40-44"
      },
      {
        value: <?=$yee45?>,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "45-49"
      }
      
      ,
      {
        value: <?=$yee50+$yee55?>,
        color: "#d2d6de",
        highlight: "#d2dffe",
        label: "50-99"
      }
    ];

    var pieOptions = {
    usePointStyle:true,
        enablePointSelection: true,
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
    
    
    
    
    var PieData2 = [
      {
        value: <?=$Sun?>,
        color: "#f56954",
        highlight: "#f56954",
        label: "الاحد"
      },
      {
        value: <?=$Mon?>,
        color: "#00aaaa",
        highlight: "#00aaaa",
        label: "الاثنين"
      },
      {
        value: <?=$Tue?>,
        color: "#322c12",
        highlight: "#f39c12",
        label: "الثلاثاء"
      },
      {
        value: <?=$Wed?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "الاربعاء"
      },
      {
        value: <?=$Thu?>,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "الخميس"
      },
    
   
      {
        value: <?=$Fri?>,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "الجمعة"
      }
      
      ,
      {
        value: <?=$Sat?>,
        color: "#d2dcde",
        highlight: "#d2dffe",
        label: "السبت"
      }
    ];
        pieChart2.Doughnut(PieData2, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData3;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 3,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
    
        //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart2").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData4;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 3,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
<div class="row">

    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer">
                <div class="row">





                    <?php if ($this->session->userdata('group')): ?>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill1 ?></h5>
                                <span class="description-text"> الايراد</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill2 ?></h5>

                                <span class="description-text"> المصروفات</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_bill5-$all_cash ?></h5>

                                <span class="description-text"> التصدير</span>

                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $all_cash ?></h5>

                                <span class="description-text">تصدير الكاش</span>

                            </div>
                            <!-- /.description-block -->
                        </div>

                    <?php endif; ?>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>

    <div class="col-md-6">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

            <div class="box-footer">
                <div class="row">





             
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header">احصائية الموظفين</h5>
                                <span class="description-text"> </span>
                            </div>
                            <!-- /.description-block -->
                        </div>
<?php 
                        foreach ($all_user as $row): ?>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><?= $row['userbooking'] ?></h5>

                                <span class="description-text"> <?= $row['user'] ?></span>
                            </div>
                            <!-- /.description-block -->
                        </div>

<?php


endforeach; ?>
                    
                 
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
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">الاحصائيات  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="
                     white-space: nowrap;
                     direction: rtl;">
                    <table class="table table-bordered">
                        <tr>
                            <th >اليوم</th>
                            <th>الايراد</th>   
                              <th>الكي نت</th>  
                              
                              
                                <th>الحركات</th>
                                     <th>العملاء الجدد</th>
                                      <th> نسبة التشغيل</th>
                            <th>المصروفات</th>
                     
                            <th>التصدير</th>
                            <th>الكاش</th>
                        </tr>

                        <?php $count = 0;
                        
                        
                        $booking = 0;
                        $clints = 0;
                        
                          $knet= 0;
                        foreach ($all_groups as $row): ?>
                            <tr>
                                <td><?= $row['dateadd']; ?></td>
                                <td><?= $row['all_bill1']; ?></td>  
                                
                                <td><?= $row['all_billknet']; ?></td>
                                 <td><?= $row['all_booking']; ?> </td>
                                   <td><?= $row['all_clints']; ?> </td>
                                     <td><?= $row['all_roomfull']; ?> </td>
                                   
                                <td><?= $row['all_bill2']; ?> </td> 
                              
                         
                                <td><?= $count2=($row['all_bill5']-($row['all5_last']+$row['all_bill5knet']));
                                ?> </td>

                                <td><?= $row['all5_last']; ?> </td>













                            </tr>

<?php
$knet=$knet+$row['all_billknet'];
   $booking = $row['all_booking']+$booking;
                        $clints =$clints+ $row['all_clints'];
$count=$count+$count2;
endforeach; ?>
                        <tr>
                            <th >المجموع</th>
                            <th><?= $all_bill1 ?></th>  
                              <th><?=$knet?></th>  
                            <th><?= $booking ?></th>
                                <th><?= $clints ?></th>
                                      <th>نسبة العملاء الجدد</th>
                                    <th><?= $all_bill2 ?></th>
                         
                            <th><?= $count ?></th>    
                            <th><?= $all_cash ?></th>
                        </tr>
                             <tr>
                            <th >المتوسط</th>
                            <th><?= ceil($all_bill1/count($all_groups)) ?></th>  
                                <th><?= (round($knet/$all_bill1,4)*100) ?>%</th> 
                           
                          <th><?= ceil($ltef/count($all_groups)) ?></th>
                              <th><?= ceil($clints/count($all_groups)) ?></th>
                              
                                    <th><?= (round($clints/$booking,4)*100) ?>%</th> 
                                    <th></th>
                         
                            <th></th>    
                            <th></th>
                        </tr>
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

