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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi Obat</li>
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
          <h3 class="card-title">Transaksi Obat</h3>

          <div class="card-tools">
            <a  href="transaksi_obat_tambah.php"><button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button></a>
          </div>
        </div>
        <div class="card-body">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Nama Obat</th>
                  <th>Nama Pasien</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include('../../controller/conn.php');
                    $query=mysqli_query($conn,"select * from `transaksi_obat`");
                    while($row=mysqli_fetch_array($query)){
                      $id_o = $row['id_obat'];
                      $id_p = $row['id_pasien'];
                      $query_obat=mysqli_query($conn,"select nama_obat from `data_obat` where id_obat='$id_o'");
                      $orow = mysqli_fetch_array($query_obat); 
                      $query_pasien=mysqli_query($conn,"select nama_pasien from `data_pasien` where id_pasien='$id_p'");
                      $prow = mysqli_fetch_array($query_pasien); 
                  ?>
                <tr>
                  <td><?php echo $row['tanggal']; ?></td>
                  <td><?php echo $orow['nama_obat']; ?></td>
                  <td><?php echo $prow['nama_pasien']; ?></td>
                  <td><?php echo $row['jumlah']; ?></td>
                  <td><?php echo $row['keterangan']; ?></td>
                <td>
                  <button type='button' class='btn btn-danger' href="#del<?php echo $row['id_transaksi']; ?>" data-toggle='modal' title='Hapus Transaksi Obat'> <i class='fas fa-trash'></i></button> 
                  
<!-- Modal Delete -->
    <div class="modal fade" id="del<?php echo $row['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          $del=mysqli_query($conn,"select * from transaksi_obat where id_transaksi='".$row['id_transaksi']."'");
          $drow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menghapus Transaksi <strong><?php echo $drow['id_transaksi']; ?></strong> ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                  <form method="POST" action="../../controller/admin/transaksi_obat.php?id=<?php echo $row['id_transaksi']; ?>">
                    <button name="delete" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Hapus</button>
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
