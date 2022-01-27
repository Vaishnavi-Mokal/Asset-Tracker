<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Asset Tracker</title>
    <!-- plugins:css -->
    @include('admin.includes.header')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     @include('admin.includes.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       @include('admin.includes.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="clearfix">
                      <h4 class="card-title float-left">Asset </h4>
                      <div id="visit-sale-chart-legend " class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <div id="piechart" style="width: 600px; height: 500px;"></div> 
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Asset Type</h4>
                  </div>
                  <div id="barchart" style="width: 100%; height: 500px;" class="mb-5"></div>
                </div>
              </div>
            </div>
          </div>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
              <?php echo $chartData ?>
              ]);
              var options = {
                title: 'Asset Types'
              };
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
              chart.draw(data, options);
              var data1 = google.visualization.arrayToDataTable([
                ['Task', 'Active'],
              <?php echo $chartData ?>
              ]);
              var options1 = {
                bars: 'vertical'
              };
              var chart = new google.visualization.BarChart(document.getElementById('barchart'));
              chart.draw(data1,options1);
            }
          </script>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.includes.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.includes.foot')
    <!-- End custom js for this page -->
  </body>
</html>