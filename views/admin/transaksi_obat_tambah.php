<!DOCTYPE html>
<html>
<head>
  <?php 
  $thisPage = "transaksi_obat"; 
  include ('dist/header.php'); 
  ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php
  include ('dist/navbar.php'); 
  include ('dist/sidebar.php'); 

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="transaksi_obat.php">Transaksi Obat</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Transaksi Obat</h3>
                    <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
                  <form method="post">
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="control-label">Tanggal</label>
            </div>
            <div class="col-lg-6">
              <?php $tanggal = date("Y-m-d"); ?>
              <input type="text" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="control-label">Nama Obat</label>
            </div>
            <div class="col-lg-6">
               <select class="form-control select2bs4" name="obat">
                    <?php 
                    $hasil = mysqli_query($conn, "select * from data_obat order by id_obat asc");
                    while($data = mysqli_fetch_array($hasil) ){ ?>
                      <option value="<?php echo $data['id_obat']; ?>"><?php echo "["; echo $data['tipe']; echo "] "; echo $data['nama_obat']; ?></option>
                    <?php } ?>
               </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="control-label">Nama Pasien</label>
            </div>
            <div class="col-lg-6">
              <select class="form-control select2bs4" name="pasien">
                    <?php 
                    $hasil1 = mysqli_query($conn, "select * from data_pasien order by id_pasien desc");
                    while($data1 = mysqli_fetch_array($hasil1) ){ ?>
                       <option value="<?php echo $data1['id_pasien']; ?>"><?php echo $data1['nama_pasien']; ?></option>
                    <?php } ?>
               </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="control-label">Jumlah</label>
            </div>
            <div class="col-lg-6">
              <input type="number" class="form-control" name="jumlah" required>
            </div>
          </div>
        </div>
        <div class="card-footer">
                <button name="simpan" type="submit" class="btn btn-success float-sm-right">Simpan</button>
              <?php include ('../../controller/admin/transaksi_obat.php');?>
        </div>
      </form>
        <!-- /.card-body -->
        <!-- /.card-footer-->
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
