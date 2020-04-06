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
  include('../../controller/conn.php');
  $id = $_GET['id'];
  $view=mysqli_query($conn,"select COUNT(DISTINCT(medical_record.id_mr)) as total_kunjungan, count(cek_penyakit.id_mr) as total_diagnosa, data_pasien.nama_pasien, data_pasien.jenis_kelamin, data_pasien.umur, data_pasien.kelas, data_pasien.asrama, data_pasien.goldar, data_pasien.tinggi_badan, data_pasien.berat_badan 
from medical_record, data_pasien, cek_penyakit
where medical_record.id_mr = cek_penyakit.id_mr AND medical_record.id_pasien = data_pasien.id_pasien AND medical_record.id_pasien= '$id'");

  $erow=mysqli_fetch_array($view);
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
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item"><a href="pasien.php">Pasien</a></li>
              <li class="breadcrumb-item active"><?php echo $erow['nama_pasien'];?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Pasien</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total Kunjungan</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $erow['total_kunjungan'];?></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Jumlah Diagnosa</span>
                      <span class="info-box-number text-center text-muted mb-0"><?php echo $erow['total_diagnosa'];?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Medical Record</h4>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Kategori</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query=mysqli_query($conn,"select * from medical_record where id_pasien='$id'");
                    while($row=mysqli_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $row['id_mr']; ?></td>
                  <td><?php echo $row['kategori']; ?></td>
                  <td><?php echo $row['tanggal']; ?></td>
                  <td>
                    <button type='button' class='btn btn-info' href="#viewdetail<?php echo $row['id_mr']; ?>" data-toggle='modal' title='Detail Medical Record'><i class='fas fa-info-circle'></i></button> 
                    <!-- Detail -->
  <div class="modal fade" id="viewdetail<?php echo $row['id_mr']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-info"></i> Info Pasien</h3><br>
                      <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nama</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="nama_pasien" value="<?php echo $erow['nama_pasien']; ?>" readonly>
            </div>
              </div>
         <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Jenis Kelamin</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $erow['jenis_kelamin']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-4">
              <label class="control-label">Umur</label>
            </div>
            <div class="col-lg-8">
              <input type="number" class="form-control" name="umur" value="<?php echo $erow['umur']; ?>" readonly>
            </div>
        </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Kelas</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="kelas" value="<?php echo $erow['kelas']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Asrama</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="asrama" value="<?php echo $erow['asrama']; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Golongan Darah</label>
            </div>
             <div class="col-lg-8">
              <input type="text" class="form-control" name="goldar" value="<?php echo $erow['goldar']; ?>" readonly>
            </div>
          </div>
           <div class="form-group row">
                        <div class="col-lg-4">
              <label class="control-label">Tinggi</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="tinggi_badan" value="<?php echo $erow['tinggi_badan']; ?>" readonly>
            </div>
           </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Berat</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="berat_badan" value="<?php echo $erow['berat_badan']; ?>" readonly>
            </div>
          </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

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
