<?php
	include('../../controller/conn.php');

	if (isset($_POST['terima'])) {
			$id=$_GET['id'];
			$status = "Terima";
			
			$obat = array();
			$jumlah = array();
			$sisa = array();

			$hasil = mysqli_query($conn, "SELECT * from resep where id_mr='$id'");
  			while ($data = mysqli_fetch_array($hasil)) {
  				$obat[] = $data['id_obat'];
  				$jumlah[] = $data['jumlah'];
  			}
  			

  			for ($i=0; $i < count($obat); $i++) { 
  				  $result = mysqli_query($conn, "SELECT stok FROM data_obat where id_obat='$obat[$i]'");
  				  $row = mysqli_fetch_array($result);
  				  $sisa[] = $row['stok'] - $jumlah[$i];
  			}

  			for ($j=0; $j < count($sisa); $j++) { 
            
  				mysqli_query($conn,"update data_obat set stok='$sisa[$j]' where id_obat = '$obat[$j]'");
  			}

			mysqli_query($conn,"update resep set status = '$status' where id_mr='$id'");
      

      print "<script>
            setTimeout(function(){
            window.location='../../views/apoteker/resep_obat.php';
         }, 1000);
      Toast.fire({
      type: 'success',
      title: 'Konfirmasi Berhasil'
      });

      </script>";
      
	}

	if (isset($_POST['delete'])) {
			$id=$_GET['id'];
			$obat = array();
			$jumlah = array();
			$sisa = array();

			$hasil = mysqli_query($conn, "SELECT * from resep where id_mr='$id'");
  			while ($data = mysqli_fetch_array($hasil)) {
  				$obat[] = $data['id_obat'];
  				$jumlah[] = $data['jumlah'];
  			}
  			

  			for ($i=0; $i < count($obat); $i++) { 
  				  $result = mysqli_query($conn, "SELECT stok FROM data_obat where id_obat='$obat[$i]'");
  				  $row = mysqli_fetch_array($result);
  				  $sisa[] = $row['stok'] + $jumlah[$i];
  			}

  			for ($j=0; $j < count($sisa); $j++) { 

  				mysqli_query($conn,"update data_obat set stok='$sisa[$j]' where id_obat = '$obat[$j]'");
  			}
  			
			mysqli_query($conn,"delete from resep where id_mr='$id'");
      header('location:../../views/apoteker/resep_obat.php');
	}
	
	
?>