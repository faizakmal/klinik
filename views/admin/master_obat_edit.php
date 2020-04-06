<!DOCTYPE html>
<html>
<head>
  <?php 
    $thisPage = "master_obat";
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
  $edit=mysqli_query($conn,"select * from data_obat where id_obat='".$id."'");
  $erow=mysqli_fetch_array($edit);
 
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
              <li class="breadcrumb-item"><a href="master_obat.php">Master Obat</a></li>
              <li class="breadcrumb-item active">Edit Data </li>
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
          <h3 class="card-title">Edit Master Obat</h3>
                    <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
         <form method="POST">
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="control-label">Nama Obat</label>
            </div>
            <div class="col-lg-9">
              <input type="text" class="form-control" name="nama_obat"  value="<?php echo $erow['nama_obat']; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="control-label">Tipe</label>
            </div>
                    <div class="col-sm-9">
                        <select class="form-control" name="tipe">
                          <option>Syirup</option>
                          <option>Drop</option>
                          <option>Tablet</option>
                          <option>Salep</option>
                          <option>Lain-lain</option>
                        </select>
                      </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <label class="control-label">Stok</label>
            </div>
            <div class="col-lg-9">
              <input type="number" class="form-control" name="stok"  value="<?php echo $erow['stok']; ?>" required>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button name="edit" type="submit" class="btn btn-success float-sm-right"></span> Simpan</button>
        </div>
        </form>
        <!-- /.card-footer-->
          </div>
        </div>
                <div class="col-lg-5">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tambah Stok</h3>
                    <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
         <form method="POST">
          <div class="row">
            <div class="col-lg-3">
              <label class="control-label">Stok</label>
            </div>
            <div class="col-lg-9">
              <input type="number" class="form-control" name="pertambahanstok" required>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
             <button name="tambahstok" type="submit" class="btn btn-success float-sm-right"> Tambah</button>
            <?php include ('../../controller/admin/master_obat.php');?>
        </div>
        </form>
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
