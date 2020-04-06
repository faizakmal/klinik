<?php
	include('../../controller/conn.php');
   
	
	if (isset($_POST['simpan'])) {
		$hasil = mysqli_query($conn, "SELECT max(id_obat) as maxKode FROM data_obat");
  		$data = mysqli_fetch_array($hasil);
   		
   		$id_obat = $data['maxKode'];
   		$noUrut = (int) substr($id_obat, 1, 5);
   		$noUrut++;
   		$char = "O";
   		
   		$id_obat = $char . sprintf("%04s", $noUrut);
		
		$nama_obat = $_POST['nama_obat'];
   		$tipe = $_POST['tipe'];
   		$stok = $_POST['stok'];

		mysqli_query($conn,"insert into data_obat (id_obat, nama_obat, tipe, stok) values ('$id_obat', '$nama_obat', '$tipe', '$stok')");

	   print "<script>
            setTimeout(function(){
            window.location='../../views/admin/master_obat.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Data Berhasil Diinput'
      });

      </script>";
			
	}

	if (isset($_POST['edit'])) {
			$id=$_GET['id'];
			$nama_obat = $_POST['nama_obat'];
   			$tipe = $_POST['tipe'];
   			$stok = $_POST['stok'];
	
			mysqli_query($conn,"update data_obat set nama_obat='$nama_obat', tipe='$tipe', stok='$stok' where id_obat='$id'");

			  print "<script>
            setTimeout(function(){
            window.location='../../views/admin/master_obat.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Data Berhasil Diedit'
      });

      </script>";

	}

	if (isset($_POST['tambahstok'])) {
			$id=$_GET['id'];
         $sql=mysqli_query($conn,"select stok from data_obat where id_obat='$id'");
            $stok=mysqli_fetch_array($sql);

            $jumlah = $_POST['pertambahanstok'] + $stok['stok'];

			mysqli_query($conn,"update data_obat set stok='$jumlah' where id_obat='$id'");
				  print "<script>
            setTimeout(function(){
            window.location='../../views/admin/master_obat.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Stok Berhasil DItambah'
      });

      </script>";

	}

		if (isset($_POST['delete'])) {
				$id=$_GET['id'];
				mysqli_query($conn,"delete from data_obat where id_obat='$id'");
				header('location:../../views/admin/master_obat.php');
	}
	



?>