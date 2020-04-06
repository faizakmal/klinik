<?php
	include('../conn.php');
	
	if (isset($_POST['simpan'])) {
		$hasil = mysqli_query($conn, "SELECT max(id_penyakit) as maxKode FROM penyakit");
  		$data = mysqli_fetch_array($hasil);
   		
   		$id_penyakit = $data['maxKode'];
   		$noUrut = (int) substr($id_penyakit, 1, 5);
   		$noUrut++;
   		$char = "P";
   		
   		$id_penyakit = $char . sprintf("%04s", $noUrut);
		
		   $nama_penyakit = $_POST['nama_penyakit'];

		mysqli_query($conn,"insert into penyakit (id_penyakit, nama_penyakit) values ('$id_penyakit', '$nama_penyakit')");
		header('location:../../views/admin/penyakit.php');
			
	}

	if (isset($_POST['edit'])) {
			$id=$_GET['id'];
			$nama_penyakit = $_POST['nama_penyakit'];
	
			mysqli_query($conn,"update penyakit set nama_penyakit='$nama_penyakit' where id_penyakit='$id'");
			header('location:../../views/admin/penyakit.php');

	}

		if (isset($_POST['delete'])) {
				$id=$_GET['id'];
				mysqli_query($conn,"delete from penyakit where id_penyakit='$id'");
				header('location:../../views/admin/penyakit.php');
	}
	
?>