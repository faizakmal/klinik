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
  
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Resep</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Resep Obat</li>
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
          <h3 class="card-title">Resep Obat</h3>
                    <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Id MR</th>
                  <th>Nama Pasien</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include('../../controller/conn.php');
                    $query=mysqli_query($conn,"select DISTINCT medical_record.tanggal, resep.id_mr, data_pasien.nama_pasien, group_concat(concat ('[', tipe, '] ', nama_obat, ' (', jumlah, ') ') separator ', ') as nama_obat, resep.status 
                      from resep, medical_record, data_pasien, data_obat
                      WHERE medical_record.id_mr= resep.id_mr AND medical_record.id_pasien = data_pasien.id_pasien AND resep.id_obat = data_obat.id_obat GROUP BY resep.id_mr");
                    while($row=mysqli_fetch_array($query)){ 
                  ?>
                <tr>
                  <td><?php echo $row['tanggal']; ?></td>
                  <td><?php echo $row['id_mr']; ?></td>
                  <td><?php echo $row['nama_pasien']; ?></td>
                  <td>
                  <?php
                      if($row['status'] == 'Belum Diterima'){ ?>
                        <span class="badge badge-danger"><?php echo $row['status']; ?></span>
                  <?php 
                      } 
                      else{ ?>
                        <span class="badge bg-success"><?php echo $row['status']; ?></span>
                  <?php      
                      }

                  ?>
                  </td>
                <td>
                  <button type='button' class='btn btn-info' href="#detail<?php echo $row['id_mr']; ?>" data-toggle='modal' title='Konfirmasi Resep'> <i class='fas fa-info-circle'></i></button> 
                  <?php
                      if($row['status'] == 'Belum Diterima'){ ?>
                        <button type='button' class='btn btn-success' href="#konfirm<?php echo $row['id_mr']; ?>" data-toggle='modal' title='Hapus Resep'> <i class='fas fa-check'></i></button> 
                  <?php  }  ?>
                  <button type='button' class='btn btn-danger' href="#del<?php echo $row['id_mr']; ?>" data-toggle='modal' title='Hapus Resep'> <i class='fas fa-trash'></i></button> 
                
                <!-- Detail -->
      <div class="modal fade" id="detail<?php echo $row['id_mr']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Detail Obat</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
        <div class="container-fluid">
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
                    $kquery=mysqli_query($conn,"select data_obat.nama_obat, data_obat.tipe, resep.jumlah from data_obat, resep where resep.id_obat = data_obat.id_obat and id_mr ='".$row['id_mr']."'");
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
<!-- /.modal -->

<!-- Konfirmasi -->
    <div class="modal fade" id="konfirm<?php echo $row['id_mr']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Konfirmasi Terima</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
        <?php
          $terima=mysqli_query($conn,"select * from resep where id_mr='".$row['id_mr']."'");
          $trow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menerima Resep ini ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                <form method="POST" action="../../controller/admin/konfirmasi_resep.php?id=<?php echo $row['id_mr']; ?>">    <button name="terima" type="submit" class="btn btn-success">Terima</button>
                           </form>
                </div>
        
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['id_mr']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Konfirmasi Tolak</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
        <?php
          $del=mysqli_query($conn,"select * from resep where id_mr='".$row['id_mr']."'");
          $drow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menghapus Resep ini ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                  <form method="POST" action="../../controller/admin/konfirmasi_resep.php?id=<?php echo $row['id_mr']; ?>">
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
