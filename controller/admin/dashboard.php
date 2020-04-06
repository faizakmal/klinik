<?php
     include('../../controller/conn.php');
     
     $query_kunjungan =mysqli_query($conn,"SELECT COUNT(id_mr) AS pasien FROM medical_record ");
            while($row=mysqli_fetch_array($query_kunjungan)){
                      $total_kunjungan = $row['pasien'];
            }
     $query_total_obat =mysqli_query($conn,"SELECT COUNT(distinct(id_obat)) AS obat FROM resep");
            while($row=mysqli_fetch_array($query_total_obat)){
                      $total_resep_obat = $row['obat'];
            }
     $query_total_transaksi =mysqli_query($conn,"SELECT COUNT(distinct(id_obat)) AS obat FROM transaksi_obat");
            while($row=mysqli_fetch_array($query_total_transaksi)){
                      $total_transaksi_obat = $row['obat'];
            }
     $total_obat = $total_resep_obat+$total_transaksi_obat;
     $query_total_penyakit =mysqli_query($conn,"SELECT COUNT(DISTINCT(id_penyakit)) AS penyakit FROM cek_penyakit");
            while($row=mysqli_fetch_array($query_total_penyakit)){
                      $total_penyakit = $row['penyakit'];
            }
     $query_total_pasien =mysqli_query($conn,"SELECT COUNT(id_pasien) AS pasien FROM data_pasien");
            while($row=mysqli_fetch_array($query_total_pasien)){
                      $total_pasien = $row['pasien'];
            }

     //doghnut chart data penyakit
     $query_penyakit=mysqli_query($conn,"SELECT penyakit.nama_penyakit As nama_penyakit, COUNT(penyakit.nama_penyakit) As Jumlah, ROUND((COUNT(penyakit.nama_penyakit)/(SELECT COUNT(*) FROM cek_penyakit))*100) As Presentase
                      FROM cek_penyakit, penyakit, medical_record 
                      WHERE medical_record.id_mr=cek_penyakit.id_mr AND cek_penyakit.id_penyakit = penyakit.id_penyakit
                      GROUP BY penyakit.nama_penyakit ORDER BY Presentase DESC LIMIT 5");
            while($row=mysqli_fetch_array($query_penyakit)){
                      $penyakit[] = $row['nama_penyakit'];
                      $jumlah_penyakit[] = $row['Jumlah'];
      }
       //pie chart data obat
      $query_obat=mysqli_query($conn,"
        SELECT data_obat.nama_obat As obat, COUNT(data_obat.nama_obat) As Jumlah, ROUND((COUNT(data_obat.nama_obat)/(SELECT COUNT(*) FROM resep))*100) As Presentase
                      FROM resep, data_obat, medical_record 
                      WHERE medical_record.id_mr=resep.id_mr AND resep.id_obat = data_obat.id_obat GROUP BY data_obat.nama_obat ORDER BY Presentase DESC LIMIT 5");
            while($row=mysqli_fetch_array($query_obat)){
                      $nama_obat[] = $row['obat'];
                      $jumlah_obat[] = $row['Jumlah'];
                      $presentase_obat[] = $row['Presentase'];
      }
      
      $q_orang=mysqli_query($conn,"SELECT CONCAT(DATE_FORMAT(tanggal, '%b')) AS bulan, 
                                  COUNT(IF(kategori = 'Umum', 1, NULL)) As pasien_umum,
                                  COUNT(IF(kategori = 'Gigi', 1, NULL)) As pasien_gigi 
                                  FROM medical_record 
                                  GROUP BY MONTH(tanggal)");
                    while($row=mysqli_fetch_array($q_orang)){
                      $bulan_pasien[] = $row['bulan'];
                      $pasien_umum[] = $row['pasien_umum'];
                      $pasien_gigi[] = $row['pasien_gigi'];
                  }

      $q_obat=mysqli_query($conn,"SELECT CONCAT(DATE_FORMAT(tanggal, '%b')) AS bulan, 
                                  COUNT(DISTINCT(resep.id_obat)) AS obat
                                  FROM medical_record, resep 
                                  WHERE medical_record.id_mr = resep.id_mr  GROUP BY MONTH(tanggal)");
                    while($row=mysqli_fetch_array($q_obat)){
                      $bulan_obat[] = $row['bulan'];
                      $obat[] = $row['obat'];
                  }
      $jumlah = count($jumlah_obat);
?>
<!-- page script -->
<script>

  $(function () {

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: <?php echo json_encode($penyakit); ?>,
      datasets: [
        {
          data: <?php echo json_encode($jumlah_penyakit); ?>,
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
      type: 'doughnut',
      data: pieData,
      options: pieOptions      
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var obatChartCanvas = $('#obatChart').get(0).getContext('2d')
    var obatData        = {
      labels: <?php echo json_encode($nama_obat); ?>,
      datasets: [
        {
          data: <?php echo json_encode($jumlah_obat); ?>,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }
      ]
    }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var obatChart = new Chart(obatChartCanvas, {
      type: 'pie',
      data: obatData,
      options: pieOptions      
    })

    var areaChartData = {
      labels  : <?php echo json_encode($bulan_pasien); ?>,
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

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var areaChartData1 = {
      labels  : <?php echo json_encode($bulan_obat); ?>,
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