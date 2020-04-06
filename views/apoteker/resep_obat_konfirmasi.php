<!DOCTYPE html>
<html>
<head>
  <?php 
  $thisPage = "resep_obat";
  include ('dist/header.php');
  ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php
  include ('dist/navbar.php'); 
  include ('dist/sidebar.php'); 
  $id=$_GET['id'];
  
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
              <li class="breadcrumb-item"><a href="resep_obat.php">Resep Obat</a></li>
              <li class="breadcrumb-item active">Konfirmasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-7">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Konfirmasi Resep Obat</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
        </div>
        <div class="card-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th><b>Nama Obat</th>
                  <th><b>Tipe</th>
                  <th><b>Jumlah</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $kquery=mysqli_query($conn,"select data_obat.nama_obat, data_obat.tipe, resep.jumlah from data_obat, resep where resep.id_obat = data_obat.id_obat and id_mr ='".$id."'");
                    while($krow=mysqli_fetch_array($kquery)){ 
                  ?>
                <tr>
                  <td><?php echo $krow['nama_obat']; ?></td>
                  <td><?php echo $krow['tipe']; ?></td>
                  <td><?php echo $krow['jumlah']; ?></td>
                </tr>
          <?php
        }
      ?>
                </tbody>
              </table>
        </div>
        <div class="card-footer">
             <form method="post">
                <button name="terima" type="submit" class="btn btn-success float-sm-right"> Terima Resep</button>
                <?php include('../../controller/apoteker/konfirmasi_resep.php'); ?>  
            </form>
      </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>
    </div>
  </div>
      <!-- /.card -->

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
