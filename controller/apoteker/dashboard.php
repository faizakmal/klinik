<?php
     include('../../controller/conn.php');
     
     $query_total_obat =mysqli_query($conn,"SELECT COUNT(id_obat) AS obat FROM resep");
            while($row=mysqli_fetch_array($query_total_obat)){
                      $total_obat = $row['obat'];
            }
     $query_total_pasien =mysqli_query($conn,"SELECT COUNT(id_pasien) AS pasien FROM data_pasien");
            while($row=mysqli_fetch_array($query_total_pasien)){
                      $total_pasien = $row['pasien'];
            }

     $query_5obat=mysqli_query($conn,"select data_obat.nama_obat as obat, count(*) as jumlah
            from resep, data_obat, medical_record 
            where medical_record.id_mr=resep.id_mr and resep.id_obat = data_obat.id_obat group by data_obat.nama_obat LIMIT 5");
            while($row=mysqli_fetch_array($query_5obat)){
                      $data_obat[] = $row['obat'];
                      $jumlah_data_obat[] = $row['jumlah'];
      }
      $q_obat=mysqli_query($conn,"SELECT CONCAT(DATE_FORMAT(tanggal, '%b')) AS bulan, COUNT(DISTINCT(resep.id_obat)) AS obat
                    FROM medical_record, resep WHERE medical_record.id_mr = resep.id_mr  GROUP BY MONTH(tanggal)");
                    while($row=mysqli_fetch_array($q_obat)){
                      $bulan[] = $row['bulan'];
                      $obat[] = $row['obat'];
                  }
      
?>
<!-- page script -->
<script>
  $(function () {

        //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var obatChartCanvas = $('#obatChart').get(0).getContext('2d')
    var obatData        = {
      labels: <?php echo json_encode($data_obat); ?>,
      datasets: [
        {
          data: <?php echo json_encode($jumlah_data_obat); ?>,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
        var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var obatChart = new Chart(obatChartCanvas, {
      type: 'pie',
      data: obatData,
      options: pieOptions      
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var areaChartData1 = {
      labels  : <?php echo json_encode($bulan); ?>,
      datasets: [
        {
          label               : 'Obat',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($obat); ?>
        },
      ]
    }
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, areaChartData1)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })

  })
</script>