 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="../../dist/img/logo.jpg"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Klinik NFBS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Apoteker</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="home.php" 
                <?php 
                    if($thisPage == "home") {
                      echo "class='nav-link active'"; 
                    }
                    else
                      echo "class='nav-link'";
                ?> >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="resep_obat.php" 
                <?php 
                    if($thisPage == "resep_obat") {
                      echo "class='nav-link active'"; 
                    }
                    else
                      echo "class='nav-link'";
                ?> >
              <i class="nav-icon fas fa-prescription-bottle-alt"></i>
              <p>
                Resep
              </p>
            </a>
          </li>
          <li 
            <?php 
                    if($thisPage == "transaksi_obat" || $thisPage == "master_obat") {
                      echo "class='nav-item has-treeview menu-open'> 
                            <a href='#' class='nav-link active'"; 
                    }
                    else
                      echo "class='nav-item has-treeview'> 
                            <a href='#' class='nav-link'"; 
                ?>>
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Obat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="transaksi_obat.php" 
                <?php 
                    if($thisPage == "transaksi_obat") {
                      echo "class='nav-link active'"; 
                    }
                    else
                      echo "class='nav-link'";
                ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="master_obat.php"
                 <?php 
                    if($thisPage == "master_obat") {
                      echo "class='nav-link active'"; 
                    }
                    else
                      echo "class='nav-link'";
                ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Obat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="../../controller/logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>