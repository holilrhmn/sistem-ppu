@extends('frontend.app')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-auto">
          <h1 class="">
           Statistik Tabular
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
              <div id="merk_chart" style="width:750px; height:450px;">
                <div id="type_chart" style="width:750px; height:450px;">
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var merk = <?php echo $merk; ?>
    
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawMerk);

    function drawMerk()
    {
        var data = google.visualization.arrayToDataTable(merk);
        var options = {
            title : 'Perbandingan Merk Kendaraan'
        };
        var chart = new google.visualization.PieChart(document.getElementById('merk_chart'));
        chart.draw(data, options);
    }
     
   
</script>

@endsection

