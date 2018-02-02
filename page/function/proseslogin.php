<?php 
	session_start();
	include 'koneksi.php';
	
	if (isset($_POST['login'])) {
		$username=$_POST['username'];
		$pass=md5($_POST['pass']);

		$result=mysqli_query($koneksi,"select * from tbl_user where username='$username' and password='$pass' ");
		$data=mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) > 0 ) {
			$_SESSION['username']=$username;
			$_SESSION['kode_user']=$data['kode_user'];
			$_SESSION['role']=$data['role'];

			if ($_SESSION['role']=='meja') {
				header("location:../transaksi.php");
			}
			else{
				header("location:../produk.php");
			}
			
		}
		else{
			header('location:../login.php?pesan=Username atau password salah');
		}
	}
	else{
		session_unset();
		header("location:../login.php");
	}
 ?>