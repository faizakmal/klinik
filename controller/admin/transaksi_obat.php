<?php
	include('../../controller/conn.php');
	

	if (isset($_POST['simpan'])) {
		
    $hasil = mysqli_query($conn, "SELECT max(id_transaksi) as maxKode FROM transaksi_obat");
  		$data = mysqli_fetch_array($hasil);
   		
   		$id_transaksi = $data['maxKode'];
   		$noUrut = (int) substr($id_transaksi, 8, 11);
   		$noUrut++;
   		$tgl = date("Ymd");
   		
   		$id_transaksi = $tgl . sprintf("%03s", $noUrut);

		$tanggal = $_POST['tanggal'];
   		$id_obat = $_POST['obat'];
   		$id_pasien = $_POST['pasien'];
   		$jumlah = $_POST['jumlah'];
   		$keterangan = "Tanpa Resep";

   		$result = mysqli_query($conn, "SELECT stok FROM data_obat where id_obat='$id_obat'");
  		$row = mysqli_fetch_array($result);

  		$sisa = $row['stok'] - $jumlah;

		mysqli_query($conn,"insert into transaksi_obat (id_transaksi, tanggal, id_obat, id_pasien, jumlah, keterangan) values ('$id_transaksi', '$tanggal', '$id_obat', '$id_pasien', '$jumlah', '$keterangan')");
		mysqli_query($conn,"update data_obat set stok='$sisa' where id_obat = '$id_obat'");
      print "<script>
            setTimeout(function(){
            window.location='../../views/admin/transaksi_obat.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Data Berhasil Diinput'
      });

      </script>";
  
  
	}

		if (isset($_POST['delete'])) {
				$id=$_GET['id'];

				$hasil = mysqli_query($conn, "SELECT * from transaksi_obat where id_transaksi='$id'");
  				$data = mysqli_fetch_array($hasil);
  				$id_obat = $data['id_obat'];

				$result = mysqli_query($conn, "SELECT stok FROM data_obat where id_obat='$id_obat'");
  				$row = mysqli_fetch_array($result);

  				$sisa = $row['stok'] + $data['jumlah'];

				mysqli_query($conn,"delete from transaksi_obat where id_transaksi='$id'");
				mysqli_query($conn,"update data_obat set stok='$sisa' where id_obat = '$id_obat'");

          
header('location:../../views/admin/transaksi_obat.php');

	}

?>