<?php 
	include('koneksi.php');
	session_start();
	// session_unset();
	$kode=$_SESSION['kode_user'];

	$kodepenj='12333';
	$totitem=0;
	$bayar=123;
	$kembali=222;
	$totharga=222;
	$profit=0;
	
	
	
	$query="insert into tbl_penjualan values 
			('$kodepenj',NOW(),'$totitem','$bayar','$kembali','$totharga','$profit')";
	$result=mysqli_query($koneksi,$query);

	$query="select *,sum(kuantitas) qty,sum(total) total from tbl_orderlist where kode_user=$kode group by kode_produk";
	$result=mysqli_query($koneksi,$query);
	while ($data=mysqli_fetch_assoc($result)) {
		$kodepenj='12333';
		$kodeproduk=$data['kode_produk'];
		$namaproduk=$data['nama_produk'];
		$qty=$data['qty'];
		$hargamodal="(select harga_modal from tbl_produk where kode_produk='$kodeproduk')";
		$hargajual="(select harga_jual from tbl_produk where kode_produk='$kodeproduk')";
		$diskon="(select diskon from tbl_produk where kode_produk='$kodeproduk')";
		$total=$data['total'];
		$profit="$total-$hargamodal*$qty";

				// insert to penjualan detail
		$query2="insert into tbl_penjualandetail 
				values ('$kodepenj','$kodeproduk','$namaproduk','$qty',$hargamodal,$hargajual,$diskon,'$total',$profit)";
		$result2=mysqli_query($koneksi,$query2);

		}

		// update total profit dan total qty di penjualan
		$query="update tbl_penjualan a 
				inner join (select kode_penjualan, 
							SUM(profit) totalprofit, SUM(kuantitas) totalqty 
							from tbl_penjualandetail where kode_penjualan = '$kodepenj') b
		 		on a.kode_penjualan = b.kode_penjualan
				set a.profit = totalprofit, a.total_item = totalqty
				where a.kode_penjualan = '$kodepenj'";
		$result=mysqli_query($koneksi,$query);

		if($result){
			echo "penjualan berhasil ditambahkan dan selesai";
		}
		else {
			die("ada yg error".mysqli_error($koneksi));
		}
	
 ?>