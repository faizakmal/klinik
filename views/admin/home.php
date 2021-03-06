<!DOCTYPE html>
<html>
<head>
  <?php
    $thisPage = "home"; 
    include ('dist/header.php');
  ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php
  include ('dist/navbar.php'); 
  include ('dist/sidebar.php'); 
  include ('../../controller/admin/dashboard.php'); 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo ($total_kunjungan); ?></h3>
                <p>Total Kunjungan </p>
              </div>
              <div class="icon">
                <i class="fas fa-notes-medical"></i>
              </div>
              <a href="medical_record.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo ($total_obat); ?></h3>

                <p>Total Obat Keluar</p>
              </div>
              <div class="icon">
               <i class="fas fa-pills"></i>
              </div>
              <a href="resep_obat.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo ($total_pasien); ?></h3>

                <p>Jumlah Pasien</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="pasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo ($total_penyakit); ?></h3>

                <p>Total Penyakit</p>
              </div>
              <div class="icon">
               <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">5 Data Penyakit Teratas di NFBS</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="height:230px; min-height:230px"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- BAR CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Jumlah Pasien Per Bulan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>                
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-warning">
               <div class="card-header">
                <h3 class="card-title">15 Penyakit Teratas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama Penyakit</th>
                    <th>Jumlah</th>
                    <th>Presentase</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                    $queryp=mysqli_query($conn,"SELECT penyakit.nama_penyakit As nama_penyakit, COUNT(penyakit.nama_penyakit) As Jumlah, ROUND((COUNT(penyakit.nama_penyakit)/(SELECT COUNT(*) FROM cek_penyakit))*100) As Presentase
                      FROM cek_penyakit, penyakit, medical_record 
                      WHERE medical_record.id_mr=cek_penyakit.id_mr AND cek_penyakit.id_penyakit = penyakit.id_penyakit
                      GROUP BY penyakit.nama_penyakit ORDER BY Presentase DESC LIMIT 15");
                    while($rowp=mysqli_fetch_array($queryp)){
                  ?>
                  <tr>
                    <td><?php echo $rowp['nama_penyakit']; ?></td>
                    <td><?php echo $rowp['Jumlah']; ?></td>
                    <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-red" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: <?php echo $rowp['Presentase']; ?>%">
                              </div>
                          </div>
                          <small>
                              <?php echo $rowp['Presentase']; ?> %
                          </small>
                    </td>
                  </tr>
                      <?php
                    }      
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (LEFT) -->
 
          <div class="col-md-6">
                                    <!-- STACKED BAR CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">5 Data Obat Dalam Presentase</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="obatChart" style="height:230px; min-height:230px"></canvas>
              </div>
            </div>
             <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Obat Keluar Per Bulan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                 <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Data stok obat yang menipis</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nama Obat</th>
                    <th>Tipe Obat</th>
                    <th>Jumlah Stok</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                    $queryp=mysqli_query($conn,"SELECT nama_obat, tipe, stok FROM data_obat WHERE stok <= 10 GROUP BY stok DESC");
                    while($rowp=mysqli_fetch_array($queryp)){
                  ?>
                  <tr>
                    <td><?php echo $rowp['nama_obat']; ?></td>
                    <td><?php echo $rowp['tipe']; ?></td>
                    <td><?php echo $rowp['stok']; ?></td>
                  </tr>
                      <?php
                    }      
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer"> <?php  include ('dist/footer.php');  ?> </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>
