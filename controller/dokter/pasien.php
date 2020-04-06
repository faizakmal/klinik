<?php
	include('../../controller/conn.php');
   
	if (isset($_POST['simpan'])) {
		$hasil = mysqli_query($conn, "SELECT max(id_pasien) as maxKode FROM data_pasien");
  		$data = mysqli_fetch_array($hasil);
   		
   		$id_pasien = $data['maxKode'];
         $noUrut = (int) substr($id_pasien, 2, 8);
         $noUrut++;
         $char = "PS";
         
         $id_pasien = $char . sprintf("%06s", $noUrut);
		
		$nama_pasien = $_POST['nama_pasien'];
   		$jenis_kelamin = $_POST['jenis_kelamin'];
   		$umur = $_POST['umur'];
   		$kelas = $_POST['kelas'];
   		$asrama = $_POST['asrama'];
   		$goldar = $_POST['goldar'];
   		$tinggi_badan = $_POST['tinggi_badan'];
   		$berat_badan = $_POST['berat_badan'];

		mysqli_query($conn,"insert into data_pasien (id_pasien, nama_pasien, jenis_kelamin, umur, kelas, asrama, goldar, tinggi_badan, berat_badan) values ('$id_pasien', '$nama_pasien', '$jenis_kelamin', '$umur', '$kelas', '$asrama', '$goldar', '$tinggi_badan', '$berat_badan')");

      print "<script>
            setTimeout(function(){
            window.location='../../views/dokter/pasien.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Data Berhasil Diinput'
      });

      </script>";
			
	}

	if (isset($_POST['edit'])) {
			$id=$_GET['id'];
			$nama_pasien = $_POST['nama_pasien'];
   			$jenis_kelamin = $_POST['jenis_kelamin'];
   			$umur = $_POST['umur'];
   			$kelas = $_POST['kelas'];
   			$asrama = $_POST['asrama'];
   			$goldar = $_POST['goldar'];
   			$tinggi_badan = $_POST['tinggi_badan'];
   			$berat_badan = $_POST['berat_badan'];
	
			mysqli_query($conn,"update data_pasien set nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin', umur='$umur', kelas='$kelas', asrama='$asrama', goldar='$goldar', tinggi_badan='$tinggi_badan', tinggi_badan='$berat_badan' where id_pasien='$id'");

         print "<script>
            setTimeout(function(){
            window.location='../../views/dokter/pasien.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Data Berhasil Diedit'
      });

      </script>";

	}

		if (isset($_POST['delete'])) {
				$id=$_GET['id'];
				mysqli_query($conn,"delete from data_pasien where id_pasien='$id'");
            header('location:../../views/dokter/pasien.php');
	}
	



?>