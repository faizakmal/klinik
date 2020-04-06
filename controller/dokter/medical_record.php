<?php
	include('../../controller/conn.php');
		
	if (isset($_POST['simpan'])) {
		$hasil = mysqli_query($conn, "SELECT max(id_mr) as maxKode FROM medical_record");
  		$data = mysqli_fetch_array($hasil);
   		
   		$id_mr = $data['maxKode'];
   		$noUrut = (int) substr($id_mr, 10, 12);
   		$noUrut++;
   		$char = "MR". date("Ymd");

   		$id_mr = $char . sprintf("%03s", $noUrut);
   		//medical_record
   		$tanggal = $_POST['tanggal'];
   		$kategori = "Umum";
   		$pasien = $_POST['pasien'];
   		$anamnesa = $_POST['anamnesa'];
   		$pt = $_POST['pt'];
		$diagnosa = $_POST['diagnosa'];

		$jumlah_diagnosa = count($diagnosa);

		//resep
		$id_obat = $_POST['obat'];
   		$jumlah = $_POST['jumlah'];
   		$status = "Belum Diterima";

		$jumlah_obat = count($id_obat);
 		
 		mysqli_query($conn, "INSERT INTO medical_record values('$id_mr','$kategori', '$tanggal','$pasien', '$anamnesa','$pt')");
		
		for($x=0;$x<$jumlah_diagnosa;$x++){
			mysqli_query($conn, "INSERT INTO cek_penyakit values('$id_mr','$diagnosa[$x]')");
		}

		for($x=0;$x<$jumlah_obat;$x++){
			mysqli_query($conn, "INSERT INTO resep values('$id_mr','$id_obat[$x]','$jumlah[$x]', '$status')");
		}

		print "<script>
            setTimeout(function(){
            window.location='../../views/dokter/medical_record.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Data Berhasil Diinput'
      });

      </script>";
	
	}

	if (isset($_POST['simpan_gigi'])) {
		$hasil = mysqli_query($conn, "SELECT max(id_mr) as maxKode FROM medical_record");
  		$data = mysqli_fetch_array($hasil);
   		
   		$id_mr = $data['maxKode'];
   		$noUrut = (int) substr($id_mr, 10, 12);
   		$noUrut++;
   		$char = "MR". date("Ymd");

   		$id_mr = $char . sprintf("%03s", $noUrut);
   		//medical_record
   		$tanggal = $_POST['tanggal'];
   		$kategori = "Gigi";
   		$pasien = $_POST['pasien'];
   		$anamnesa = $_POST['anamnesa'];
   		$pt = $_POST['pt'];
		$diagnosa = $_POST['diagnosa'];

		$jumlah_diagnosa = count($diagnosa);

		//resep
		$id_obat = $_POST['obat'];
   		$jumlah = $_POST['jumlah'];
   		$status = "Belum Diterima";
   		
		$jumlah_obat = count($id_obat);
 		
 		mysqli_query($conn, "INSERT INTO medical_record values('$id_mr','$kategori', '$tanggal','$pasien', '$anamnesa','$pt')");
		
		for($x=0;$x<$jumlah_diagnosa;$x++){
			mysqli_query($conn, "INSERT INTO cek_penyakit values('$id_mr','$diagnosa[$x]')");
		}

		for($x=0;$x<$jumlah_obat;$x++){
			mysqli_query($conn, "INSERT INTO resep values('$id_mr','$id_obat[$x]','$jumlah[$x]', '$status')");
		}

	  print "<script>
            setTimeout(function(){
            window.location='../../views/dokter/medical_record.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Data Berhasil Diinput'
      });

      </script>";
	
	}

	if (isset($_POST['delete'])) {
				$id=$_GET['id'];
				mysqli_query($conn,"delete from medical_record where id_mr='$id'");
	header('location:../../views/dokter/medical_record.php');
	}
	



?>