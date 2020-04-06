<?php
     include('../../controller/conn.php');
     
     $query_total_umum =mysqli_query($conn,"SELECT COUNT(DISTINCT(id_pasien)) AS pasien FROM medical_record WHERE kategori='umum'");
            while($row=mysqli_fetch_array($query_total_umum)){
                      $total_pasien_umum = $row['pasien'];
            }
     $query_total_gigi =mysqli_query($conn,"SELECT COUNT(DISTINCT(id_pasien)) AS pasien FROM medical_record WHERE kategori='gigi'");
            while($row=mysqli_fetch_array($query_total_gigi)){
                      $total_pasien_gigi = $row['pasien'];
            }
     $query_total_penyakit =mysqli_query($conn,"SELECT COUNT(DISTINCT(id_penyakit)) AS penyakit FROM cek_penyakit");
            while($row=mysqli_fetch_array($query_total_penyakit)){
                      $total_penyakit = $row['penyakit'];
            }
     $query_total_pasien =mysqli_query($conn,"SELECT COUNT(id_pasien) AS pasien FROM data_pasien");
            while($row=mysqli_fetch_array($query_total_pasien)){
                      $total_pasien = $row['pasien'];
            }

     $query_penyakit=mysqli_query($conn,"select penyakit.nama_penyakit as penyakit, count(*) as jumlah
            from cek_penyakit, penyakit, medical_record 
            where medical_record.id_mr=cek_penyakit.id_mr and cek_penyakit.id_penyakit = penyakit.id_penyakit group by penyakit.nama_penyakit LIMIT 5");
            while($row=mysqli_fetch_array($query_penyakit)){
                      $penyakit[] = $row['penyakit'];
                      $jumlah[] = $row['jumlah'];
      }

      $q_orang=mysqli_query($conn,"SELECT CONCAT(DATE_FORMAT(tanggal, '%b')) AS bulan, 
                                  COUNT(IF(kategori = 'Umum', 1, NULL)) As pasien_umum,
                                  COUNT(IF(kategori = 'Gigi', 1, NULL)) As pasien_gigi 
                                  FROM medical_record 
                                  GROUP BY MONTH(tanggal)");
                    while($row=mysqli_fetch_array($q_orang)){
                      $bulan[] = $row['bulan'];
                      $pasien_umum[] = $row['pasien_umum'];
                      $pasien_gigi[] = $row['pasien_gigi'];
                  }

?>
<!-- page script -->
<script>
  $(function () {

    var areaChartData = {
      labels  : <?php echo json_encode($bulan); ?>,
      datasets: [
        {
          label               : 'Gigi',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($pasien_gigi); ?>
        },
        {
          label               : 'Umum',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?php echo json_encode($pasien_umum); ?>
        },
      ]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: <?php echo json_encode($penyakit); ?>,
      datasets: [
        {
          data: <?php echo json_encode($jumlah); ?>,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

  })
</script>