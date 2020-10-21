@extends('frontend.app')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
           Statistik Tahun Kendaraan
          </h1>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
     
      <div class="col-lg-12">
        <div class="card card-lg">
          <div class="card-body">
            <div class="markdown">
              <div class="d-flex">
              </div>
              <div id="type_chart" style="width:1000px; height:450px;">
            
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var merk = <?php echo $tahun; ?>
    
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawMerk);

    function drawMerk()
    {
        var data = google.visualization.arrayToDataTable(merk);
        var options = {
            title : 'Perbandingan Type Kendaraan'
        };
        var chart = new google.visualization.PieChart(document.getElementById('type_chart'));
        chart.draw(data, options);
    }
     
   
</script>

@endsection

