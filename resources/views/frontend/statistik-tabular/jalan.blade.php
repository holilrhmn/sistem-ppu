@extends('frontend.app')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="container-xl">
    <!-- Page title -->
    <div class="container p-5">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Armada', 'Panjang Jalan (KM)'],

                @php
                foreach($jalan as $j) {
                    echo "['".$j->nama_angkutan."', ".$j->panjang_jalan."],";
                }
                @endphp
          ]);

          var options = {
            title: 'Panjang Jalan',
            is3D: true,
            
          };
          bars: 'horizontal'
          var chart = new google.visualization.BarChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
      </script>

@endsection

