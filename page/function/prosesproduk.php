<?php 
include('koneksi.php');


	if (isset($_REQUEST['ambileditdata'])) {
		
		$kode=filterdata($_REQUEST['kodeproduk']);
		$query="select*from tbl_produk where kode_produk='$kode' ";
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
		
		$nama=filterdata($_REQUEST['namaproduk']);
		$hargamodal=filterdata($_REQUEST['hargamodal']);
		$hargajual=filterdata($_REQUEST['hargajual']);
		$kategori=filterdata($_REQUEST['kategori']);
		$diskon=filterdata($_REQUEST['diskon']);
		$query="insert into tbl_produk (nama_produk,kategori,harga_modal,harga_jual,diskon)
		values ('$nama','$kategori',$hargamodal,$hargajual,$diskon)";
		$result=mysqli_query($koneksi,$query);
		if($result){
			echo "produk dengan nama <b>'$nama'</b> berhasil ditambahkan";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}

	elseif(isset($_REQUEST['getkategori'])){
		getkategori($koneksi);
	}
	// FORM EDIT DATA
	elseif(isset($_REQUEST['editdata'])) {
		
		$kode=filterdata($_REQUEST['kodeproduk']);
		$nama=filterdata($_REQUEST['namaproduk']);
		$hargamodal=filterdata($_REQUEST['hargamodal']);
		$hargajual=filterdata($_REQUEST['hargajual']);
		$kategori=filterdata($_REQUEST['kategori']);
		$diskon=filterdata($_REQUEST['diskon']);
		$query="update tbl_produk set nama_produk='$nama', kategori='$kategori' , harga_modal='$hargamodal', harga_jual='$hargajual', diskon=$diskon where kode_produk='$kode' ";
		$result=mysqli_query($koneksi,$query);
		if($result){
			echo "produk dengan kode <b>'$kode'</b> berhasil diedit";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}

	elseif(isset($_REQUEST['hapusdata'])){
		
		$kode=filterdata($_REQUEST['kodeproduk']);
		$query="delete from tbl_produk where kode_produk='$kode' ";
		$result=mysqli_query($koneksi,$query);
		if($result){
			echo "produk dengan kode <b>'$kode'</b> berhasil dihapus";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}

	elseif(isset($_REQUEST['setdiskon'])){
		
		$kategori=filterdata($_REQUEST['kategori']);
		$diskon=filterdata($_REQUEST['diskon']);
		$query="update tbl_produk set diskon=$diskon where kategori='$kategori'";
		$result=mysqli_query($koneksi,$query);
		if($result){
			echo "Stok dengan kode <b>'$kode'</b> berhasil ditambah";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	}
 ?>