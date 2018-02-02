<?php 
include('koneksi.php');

if(isset($_REQUEST['getpesanan'])){

	$result=mysqli_query($koneksi,"select * from tbl_orderlist where status='menunggu' ");
	$no=1;
	while ($data=mysqli_fetch_assoc($result)) {

		$harga=formatangka($data['harga']);
		$total=formatangka($data['total']);
		echo "<tr>
		<td> $no</td>
		<td> $data[username]</td>
		<td> $data[nama_produk]</td>
		<td> $harga</td>
		<td> $data[kuantitas]</td>
		<td class='td-total'> $total <input type='hidden' name='total' value='$data[total]'/></td>
		<td> $data[keterangan]</td>
		<td><button class='btn btn-success btn-selesai' value=$data[kode_order]><i class='fa fa-check'></i></button></td>
		</tr>";
		$no++;
	}
}
elseif(isset($_REQUEST['updatestatus'])){

	$kode=filterdata($_REQUEST['kode']);
	$query="update tbl_orderlist set status='selesai' where kode_order='$kode' ";
	$result=mysqli_query($koneksi,$query);
	if($result){
		echo "user dengan kode <b>'$kode'</b> berhasil dihapus";
	}
	else {
		die("ada yg error".mysqli_error($koneksi));
	}
}
 ?>