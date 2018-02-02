<?php 
include('koneksi.php');


	if (isset($_REQUEST['ambileditdata'])) {
		
		$kode=filterdata($_REQUEST['kodeuser']);
		$query="select*from tbl_user where kode_user='$kode' ";
		$result=mysqli_query($koneksi,$query);

		if($result){
			$data=mysqli_fetch_assoc($result);
			$arr=$data;
			echo json_encode($arr);
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}
	
	else if (isset($_REQUEST['tambahdata'])) {
		
		$username=filterdata($_REQUEST['username']);
		$password=md5(filterdata($_REQUEST['username']));
		$role=filterdata($_REQUEST['role']);
		$query="insert into tbl_user (username,password,role)
		values ('$username','$password','$role')";
		$result=mysqli_query($koneksi,$query);
		if($result){
			echo "user berhasil ditambahkan";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}

	// FORM EDIT DATA
	elseif(isset($_REQUEST['editdata'])) {
		
		$kode=filterdata($_REQUEST['kodeuser']);
		$username=filterdata($_REQUEST['username']);
		$role=filterdata($_REQUEST['role']);
		$password=md5(filterdata($_REQUEST['password']));
		$query="update tbl_user set username='$username', role='$role',password='$password' where kode_user='$kode' ";
		$result=mysqli_query($koneksi,$query);
		if($result){
			echo "user dengan kode <b>'$kode'</b> berhasil diedit";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}

	elseif(isset($_REQUEST['hapusdata'])){
		
		$kode=filterdata($_REQUEST['kodeuser']);
		$query="delete from tbl_user where kode_user='$kode' ";
		$result=mysqli_query($koneksi,$query);
		if($result){
			echo "user dengan kode <b>'$kode'</b> berhasil dihapus";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}

	
 ?>