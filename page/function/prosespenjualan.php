<?php 
include('koneksi.php');

if (isset($_REQUEST['load']) ) {
	$caridata=$_REQUEST['caridata'];
	$tgl1=$_REQUEST['tgl1'];
	$tgl2=$_REQUEST['tgl2'];
	$page=$_REQUEST['page'];
	$maxdata=$_REQUEST['maxdata'];
	$where="where kode_penjualan like '%$caridata%' 
			and date(tanggal) between '$tgl1' and '$tgl2' 
			order by tanggal desc "; 

	// AMBIL DATA INFO
	$result=mysqli_query($koneksi,
		"select count(*) penjualan,sum(total_item) item, 
		sum(total_harga) total, sum(profit) profit from tbl_penjualan $where ");
	while ($data=mysqli_fetch_assoc($result)) {
		$arr=$data;
	}	

	//AMBIL DATA INFO (TOTAL DATA)
	$result=mysqli_query($koneksi,
		"select count(*) totaldata from tbl_penjualan $where ");
	$data=mysqli_fetch_assoc($result);
	$arr['totaldata']=$data['totaldata'];
	

	// JIKA DATA > 0
	if ($arr['totaldata'] > 0) {
	$result=ambildata($koneksi,"tbl_penjualan",$where,$page,$maxdata);
		 	
		while ($data=mysqli_fetch_assoc($result)) {		
			$arr['table'][]= "<tr>
				<td>$data[kode_penjualan]</td>
				<td>$data[tanggal]</td>
				<td>$data[total_item]</td>
				<td class='input-format'>$data[bayar]</td>
				<td class='input-format'>$data[kembali]</td>
				<td class='input-format'>$data[total_harga]</td>
				<td class='input-format'>$data[profit]</td>
				<td><button class='btn btn-outline-custom btn-view' value='$data[kode_penjualan]'>
				<i class='fa fa-search-plus'></i></button></td>
				
			</tr>";
					
		}
	}
	else{
		$arr['table'][]="";
	}

	$btn=buatbutton($koneksi,"tbl_penjualan",$where,$maxdata);
	if ($btn>=5) {
		for ($i=1; $i < $btn; $i++) { 
			if ($page>=4 ) {
				if ($i==1) {
					$arr['button'][]= "<button class='btn btn-sm btn-secondary btn-page' value='$i'> $i </button>&nbsp";
				}
				elseif ($i==$page-1 or $i==$page or $i==$page+1 ) {
					$arr['button'][]= "<button class='btn btn-sm btn-secondary btn-page' value='$i'> $i </button>";
				}	
			}
			elseif($i<=4 ) {
				$arr['button'][]= "<button class='btn btn-sm btn-secondary btn-page' value='$i'> $i </button>";
			}
		}	
		$arr['button'][]= "&nbsp<button class='btn btn-sm btn-secondary btn-page' value='$btn'> $btn </button>";
	}
	else{
		for ($i=1; $i <= $btn; $i++) { 
			$arr['button'][]= "<button class='btn btn-sm btn-secondary btn-page' value='$i'> $i </button>";
		}
	}
	
	echo json_encode($arr);
}


elseif (isset($_REQUEST['ambildatapenj'])) {
		$kode=filterdata($_REQUEST['kodepenjualan']);
		$query="select*from tbl_penjualan where kode_penjualan='$kode' ";
		
		$result=mysqli_query($koneksi,$query);

		if($result){
			$data=mysqli_fetch_assoc($result);
			$arr=$data;
			
		}
		$query="select*from tbl_penjualandetail where kode_penjualan='$kode' ";
		$result=mysqli_query($koneksi,$query);

		while ($data=mysqli_fetch_assoc($result)) {
			$totaldiskon=$data['harga_jual']-($data['harga_jual']*$data['diskon']);
			$data['diskon']*=100;
			$arr['penjdetail'][]=
				 "<tr>
					<td>$data[kode_produk]</td>
					<td>$data[nama_produk]</td>
					<td>$data[kuantitas]</td>
					<td>$data[diskon] %</td>
					<td class='input-format'>$data[harga_modal]</td>
					<td class='input-format'>$totaldiskon</td>
					<td class='input-format'>$data[total]</td>
					<td class='input-format'>$data[profit]</td>
				  </tr>";
		}
		echo json_encode($arr);
	}
	
// elseif (isset($_REQUEST['complete'])) {
// 		$kode=filterdata($_REQUEST['kodepenjualan']);
// 		$query="update tbl_penjualan set status='complete' where kode_penjualan='$kode' ";
// 		$result=mysqli_query($koneksi,$query);
// 		echo "Status berhasil dirubah";
		
// 	}	
// elseif (isset($_REQUEST['refund'])) {
// 		$kode=filterdata($_REQUEST['kodepenjualan']);
// 		$result=mysqli_query($koneksi,"select * from tbl_penjualandetail where kode_penjualan='$kode'");
// 		while ($data=mysqli_fetch_assoc($result)) {
// 			$kodeproduk=$data['kode_produk'];
// 			$kuantitas=$data['kuantitas'];
// 			$query="update tbl_produk set stok_produk=(stok_produk+$kuantitas) 
// 					where kode_produk='$kodeproduk' ";
// 			mysqli_query($koneksi,$query);
// 		}
// 		mysqli_query($koneksi,"delete from tbl_penjualan where kode_penjualan='$kode'");
// 		mysqli_query($koneksi,"delete from tbl_penjualandetail where kode_penjualan='$kode'");
	
// 	}		
 ?>