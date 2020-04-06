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
            <h1>Kunjungan Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="medical_record.php">Medical Record</a></li>
              <li class="breadcrumb-item active">Periksa Pasien Umum</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kunjungan Pasien Umum</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
           <form method="POST">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
              <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Tanggal Kunjungan</label>
            </div>
            <div class="col-lg-7">
              <?php $tanggal = date("Y-m-d"); ?>
              <input type="text" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nama Pasien</label>
            </div>
            <div class="col-lg-7">
                  <select class="form-control select2bs4" name="pasien">
                    <?php 
                    $query = "SELECT * FROM data_pasien ORDER BY id_pasien DESC";
                    $result = mysqli_query($conn, $query);

                    while($data = mysqli_fetch_assoc($result) ){?>
                      <option value="<?php echo $data['id_pasien']; ?>"><?php echo $data['nama_pasien']; ?></option>
                    <?php } ?>
                  </select>
          </div>
            </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Anamnesa</label>
            </div>
            <div class="col-lg-7">
              <textarea class="form-control" type="text" rows="4" name="anamnesa" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Pemeriksaan/Tindakan</label>
            </div>
            <div class="col-lg-7">
              <textarea class="form-control" type="text" rows="4" name="pt" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Diagnosa</label>
            </div>
            <div class="col-lg-7">
              <select class="select2bs4" multiple="multiple" data-placeholder="Pilih Diagnosa" name="diagnosa[]">
                    <?php 
                    $query = "SELECT * FROM penyakit ORDER BY id_penyakit ASC";
                    $result = mysqli_query($conn, $query);

                    while($data = mysqli_fetch_assoc($result) ){?>
                      <option value="<?php echo $data['id_penyakit']; ?>"><?php echo $data['nama_penyakit']; ?></option>
                    <?php } ?>
              </select>
            </div>
          </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-info"></i> Resep</h3><br>
                          <div class="table-responsive">
              <div class="col-sm-12">
                  <label class="col-sm-6"> <b>Nama Obat</b></label>
                  <label class="col-sm-5"> <b>Jumlah</b></label>
              </div>
          <div class="form-group row control-group after-add-more">
               <div class="col-sm-7">
                   <select class="form-control select2bs4" data-placeholder="Pilih Obat" name="obat[]">
                    <?php 
                    $query = "SELECT * FROM data_obat ORDER BY id_obat ASC";
                    $result = mysqli_query($conn, $query);

                    while($data = mysqli_fetch_assoc($result) ){?>
                      <option value="<?php echo $data['id_obat']; ?>"><?php echo "["; echo $data['tipe']; echo "] "; echo $data['nama_obat']; ?></option>
                    <?php } ?>
              </select>
                </div>
                <div class="col-sm-3">
                    <input name="jumlah[]" type="number" class="form-control" required>
                </div>
                <div class="col-sm-2">
                     <button class="btn btn-success add-more" type="button"><i class="fas fa-plus"></i></button>
                </div>
          </div>
                        
          <div class="copy hide">
              <div class="form-group control-group row"> 
              <div class="col-sm-7">
                   <select class="form-control select2bs4" data-placeholder="Pilih Obat" name="obat[]">
                    <?php 
                    $query = "SELECT * FROM data_obat ORDER BY id_obat ASC";
                    $result = mysqli_query($conn, $query);

                    while($data = mysqli_fetch_assoc($result) ){?>
                      <option value="<?php echo $data['id_obat']; ?>"><?php echo "["; echo $data['tipe']; echo "] "; echo $data['nama_obat']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-sm-3">
                    <input name="jumlah[]" type="number" class="form-control" required>
              </div>
              <div class="col-sm-2">
                <button class="btn btn-danger remove" type="button"><i class="fas fa-minus"></i></button>
              </div>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>
         <div class="card-footer">
            <button name="simpan" type="submit" class="btn btn-success float-sm-right"> Simpan</button>
            <?php include ('../../controller/dokter/medical_record.php'); ?>
         </div>
      </form>
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
