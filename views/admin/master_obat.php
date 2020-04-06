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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master Obat</li>
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
          <h3 class="card-title">Master Obat</h3>

          <div class="card-tools">
               <a  href="master_obat_tambah.php"><button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button></a>
          </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Obat</th>
                  <th>Nama Obat</th>
                  <th>Jenis</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include('../../controller/conn.php');
                    $query=mysqli_query($conn,"select * from `data_obat`");
                    while($row=mysqli_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $row['id_obat']; ?></td>
                  <td><?php echo $row['nama_obat']; echo " ";
                    if ($row['stok'] <= 10) {
                      ?>
                        <span class="badge badge-danger">Stok Harus Diisi</span>
                      <?php
                    }
                  ?></td>
                  <td><?php echo $row['tipe']; ?> </td>
                  <td><?php echo $row['stok']; ?></td>
                <td>
                  <a href="master_obat_edit.php?id=<?php echo $row['id_obat'];?>"><button type='button' class='btn btn-warning' title='Edit Data Pasien'> <i class='fas fa-edit'></i></button></a> 
                  <button type='button' class='btn btn-danger' href="#del<?php echo $row['id_obat']; ?>" data-toggle='modal' title='Hapus Data Obat'> <i class='fas fa-trash'></i></button> 
                 
                <!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['id_obat']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          $del=mysqli_query($conn,"select * from data_obat where id_obat='".$row['id_obat']."'");
          $drow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menghapus Obat <strong><?php echo $drow['nama_obat']; ?></strong> ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                  <form method="POST" action="../../controller/admin/master_obat.php?id=<?php echo $row['id_obat']; ?>">
                    <button name="delete" type="submit" class="btn btn-danger"> Hapus</button>
                </form>
                </div>
        
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
