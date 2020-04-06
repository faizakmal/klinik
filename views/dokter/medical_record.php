<!DOCTYPE html>
<html>
<head>
  <?php
    $thisPage = "medical_record"; 
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
            <h1>Medical Record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Medical Record</li>
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
          <h3 class="card-title">Data Medical Record</h3>
          <div class="card-tools">
            <a  href="kunjungan_pasien.php"><button type="button" class="btn btn-tool"><i class="fas fa-plus"></i> Pasien Umum</button></a>
            <a href="kunjungan_gigi.php"><button type="button" class="btn btn-tool"><i class="fas fa-plus"></i> Pasien Gigi</button></a>
          </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Id MR</th>
                  <th>Nama Pasien</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include('../../controller/conn.php');
                    $query=mysqli_query($conn,"select medical_record.tanggal, medical_record.id_mr, data_pasien.nama_pasien, medical_record.kategori from data_pasien, medical_record where medical_record.id_pasien = data_pasien.id_pasien");
                    while($row=mysqli_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $row['tanggal']; ?></td>
                  <td><?php echo $row['id_mr']; ?></td>
                  <td><?php echo $row['nama_pasien']; ?></td>
                  <td><?php echo $row['kategori']; ?></td>
                <td>
                  <button type='button' class='btn btn-info' href="#detail<?php echo $row['id_mr']; ?>" data-toggle='modal' title='Edit Data Pasien'> <i class='fas fa-info-circle'></i></button> 
                  <button type='button' class='btn btn-danger' href="#del<?php echo $row['id_mr']; ?>" data-toggle='modal' title='Hapus Data Pasien'> <i class='fas fa-trash'></i></button> 
                <!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['id_mr']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          $del=mysqli_query($conn,"select * from medical_record where id_mr='".$row['id_mr']."'");
          $drow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menghapus Data Medical Record ini ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                  <form method="POST" action="../../controller/dokter/medical_record.php?id=<?php echo $row['id_mr']; ?>">
                    <button name="delete" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Hapus</button>
                </form>
                </div>
        
            </div>
        </div>
    </div>
<!-- /.modal -->
<!-- Detail -->
  <div class="modal fade" id="detail<?php echo $row['id_mr']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Medical Record</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
        <?php

          $viewd=mysqli_query($conn,"select * from medical_record where id_mr='".$row['id_mr']."'");
          $edrow=mysqli_fetch_array($viewd);
          
          $viewdiag=mysqli_query($conn,"select group_concat(nama_penyakit separator ', ') as penyakit from medical_record, cek_penyakit, penyakit where cek_penyakit.id_penyakit = penyakit.id_penyakit And medical_record.id_mr= cek_penyakit.id_mr and cek_penyakit.id_mr='".$row['id_mr']."'");
          $diag=mysqli_fetch_array($viewdiag);

        ?>
        <div class="container-fluid">
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">ID</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" value="<?php echo $edrow['id_mr']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Kategori</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" value="<?php echo $edrow['kategori']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Tanggal</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" value="<?php echo $edrow['tanggal']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Anamnesa</label>
            </div>
            <div class="col-lg-8">
               <textarea class="form-control" type="text" rows="4" readonly><?php echo $edrow['anamnesa']; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Pemeriksaan dan Tindakan</label>
            </div>
            <div class="col-lg-8">
              <textarea class="form-control" type="text" rows="4" readonly><?php echo $edrow['pemeriksaan_tindakan']; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Diagnosa</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" value="<?php echo $diag['penyakit']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
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
                    $kquery=mysqli_query($conn,"select data_obat.nama_obat, data_obat.tipe, resep.jumlah, resep.status from data_obat, resep where resep.id_obat = data_obat.id_obat and resep.status = 'Terima' and id_mr ='".$row['id_mr']."'");
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

                </div> 
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
        <div class="card-footer">
          
        </div>
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
