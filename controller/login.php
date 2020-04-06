<?php
    if(isset($_POST['login'])){
    include ('controller/conn.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $login = mysqli_query($conn, "select * from akun where username='$username' and pass='$password'");
    $cek = mysqli_fetch_row($login);
    
    if($cek > 0){
        session_start();
        $_SESSION['role'] = $cek[2];
        $_SESSION['status'] = "login";

      if ($cek[2] == "Dokter") {
        print "<script>
      Toast.fire({
      type: 'success',
      title: 'Login Berhasil'
      });
      setTimeout(function(){
            window.location='views/dokter/home.php';
         }, 1000);
      </script>";
        }
      elseif ($cek[2] == "Apoteker") {
        print "<script>
      Toast.fire({
      type: 'success',
      title: 'Login Berhasil'
      });
      setTimeout(function(){
            window.location='views/apoteker/home.php';
         }, 1000);
      </script>";
        }
      else{
        print "<script>
      Toast.fire({
      type: 'success',
      title: 'Login Berhasil'
      });
      setTimeout(function(){
            window.location='views/admin/home.php';
         }, 1000);
      </script>";
        }
      }
     else{
      print"
      <script>
      Toast.fire({
      type: 'error',
      title: 'Username atau Password Salah'
      })
      </script>
      "; 

    }
  }
?>