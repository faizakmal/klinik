<!DOCTYPE html>
<html>
<head>
  <?php
    $thisPage = "pasien"; 
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
            <h1>Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pasien.php">Pasien</a></li>
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
          <h3 class="card-title">Tambah Data Pasien</h3>
                    <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
                  <form method="POST">
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Nama Pasien</label>
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="nama_pasien" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Jenis Kelamin</label>
            </div>
                    <div class="col-sm-6">
                        <select class="form-control" name="jenis_kelamin">
                          <option>Laki-laki</option>
                          <option>Perempuan</option>
                        </select>
                      </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Umur</label>
            </div>
            <div class="col-lg-6">
              <input type="number" class="form-control" name="umur" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Kelas</label>
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="kelas">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Asrama</label>
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="asrama">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Golongan Darah</label>
            </div>
            <div class="col-lg-6">
                        <select class="form-control" name="goldar">
                          <option>A</option>
                          <option>B</option>
                          <option>O</option>
                          <option>AB</option>
                        </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Tinggi</label>
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="tinggi_badan" placeholder="Cm">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label class="control-label">Berat</label>
            </div>
            <div class="col-lg-6">
              <input type="text" class="form-control" name="berat_badan" placeholder="Kg">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
                <button name="simpan" type="submit" class="btn btn-success float-sm-right">Simpan</button>
              <?php include ('../../controller/dokter/pasien.php');?>
        </div>
        <!-- /.card-footer-->
      </form>
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
