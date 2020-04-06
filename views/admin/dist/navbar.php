  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <?php
      include ('../../controller/conn.php');
      $sqlresep=mysqli_query($conn,"SELECT COUNT(status) as jumlah From resep WHERE status = 'Belum Diterima' ");
      $resep=mysqli_fetch_array($sqlresep);
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php
            if($resep['jumlah'] != 0){
          ?>
          <span class="badge badge-warning navbar-badge">1</span>
          <?php
           }
          ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php
            if($resep['jumlah'] != 0){
          ?>
          <span class="dropdown-item dropdown-header">1 Pemberitahuan</span>
          <div class="dropdown-divider"></div>
          <a href="resep_obat.php" class="dropdown-item">
            <i class="fas fa-prescription-bottle-alt"></i> <?php echo $resep['jumlah'] ?> Resep Belum Dikonfirmasi
          </a>
          <?php
           }
           else{
          ?>
          <span class="dropdown-item dropdown-header">Tidak Ada Pemberitahuan Terbaru</span>
          <?php
            }
          ?>
        </div>
      </li>
    </ul>
  </nav>