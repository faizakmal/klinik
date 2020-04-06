<!DOCTYPE html>
<html>
<head>
  <?php
    $thisPage = "penyakit"; 
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
            <h1>Penyakit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Penyakit</li>
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
          <h3 class="card-title">Master Penyakit</h3>
          <div class="card-tools">
            <button href="#tambah" data-toggle="modal" type="button" class="btn btn-tool" title="Tambah Data">
              <i class="fas fa-plus"></i></button>
              <!-- Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Penyakit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <div class="modal-body">
        <div class="container-fluid">
        <form method="POST" action="../../controller/dokter/penyakit.php">
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nama Penyakit</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="nama_penyakit" required>
            </div>
           </div>
          </div> 
        </div>
                <div class="modal-footer">
                    <button name="simpan" type="submit" class="btn btn-success">Simpan</a>
        </form>
                </div>
        
            </div>
        </div>
    </div>

          </div>
        </div>
        <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
      <thead>
        <th>ID Penyakit</th>
        <th>Nama Penyakit</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
          $query=mysqli_query($conn,"select * from `penyakit`");
          while($row=mysqli_fetch_array($query)){
          ?>
          <tr>
            <td><?php echo $row['id_penyakit']; ?></td>
            <td><?php echo $row['nama_penyakit']; ?></td>
            <td>
            <button type='button' class='btn btn-warning' href="#edit<?php echo $row['id_penyakit']; ?>" data-toggle='modal' title='Edit Data Pasien'> <i class='fas fa-edit'></i></button> 
            <button type='button' class='btn btn-danger delete' href="#del<?php echo $row['id_penyakit']; ?>" data-toggle='modal' title='Hapus Data Pasien'> <i class='fas fa-trash'></i></button> 
              <!-- Delete -->

    <div class="modal fade" id="del<?php echo $row['id_penyakit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Konfirmasi Hapus</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
        <?php
          $del=mysqli_query($conn,"select * from penyakit where id_penyakit='".$row['id_penyakit']."'");
          $drow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menghapus Master Penyakit <strong><?php echo $drow['nama_penyakit']; ?></strong> ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                  <form method="POST" action="../../controller/dokter/penyakit.php?id=<?php echo $row['id_penyakit']; ?>">
                    <button name="delete" type="submit" class="btn btn-danger"> Hapus</button>
                </form>
                </div>
        
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id_penyakit']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit penyakit</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
        <?php
          $edit=mysqli_query($conn,"select * from penyakit where id_penyakit='".$row['id_penyakit']."'");
          $erow=mysqli_fetch_array($edit);
        ?>
        <div class="container-fluid">
        <form method="POST" action="../../controller/dokter/penyakit.php?id=<?php echo $erow['id_penyakit']; ?>">
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nama penyakit</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="nama_penyakit" value="<?php echo $erow['nama_penyakit']; ?>" required>
              </div>
            </div>
          </div> 
        </div>
                <div class="modal-footer">
                    <button name="edit" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Simpan</button>
                </div>
        </form>
            </div>
        </div>
    </div>
<!-- /.modal -->


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
