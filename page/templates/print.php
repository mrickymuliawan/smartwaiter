<?php 
	include("../function/koneksi.php");
	$kodepenjualan=$_REQUEST['kodepenjualan'];
	$query="select * from tbl_penjualan where kode_penjualan='$kodepenjualan'";
	$result1=mysqli_query($koneksi,$query);
	$query="select * from tbl_penjualandetail where kode_penjualan='$kodepenjualan'";
	$result2=mysqli_query($koneksi,$query);
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
 	<style type="text/css">
 	*{
 		line-height: 1.2;
 		font-size: 9px;
 	}
 		@media print {
		   @page {
		    size: auto;
		    margin: 1mm;
		    
		  }
		  
		/*   .print{position: absolute;
		    left: 0;
		    top: 0;
			} */
		}
		.table-print{
			width: 100%;
		}
		.td-lg{
			width: 150px;
		}
		.td-sm{
			width: 50px;
		}
		.td-md{
			width: 100px;
		}
		
 	</style>
 </head>
 <body>
 	<div class="container-fluid print">
 		<div class="row">
 			<div class="col-sm-4" align="center">
 			<?php $data=mysqli_fetch_assoc($result1); ?>
 				<img src="../images/logo.jpg"> <br>
 				<b><span>SATE TAICHAN PAK KUMIS</span></b><br>
 				<span>Jl. SD Inpres No. 1 Petukangan Selatan</span><br>
 				<span>Telp/WA: 082111084645</span><br>
 				<span>Tanggal:</span><span class="tgl"></span>
 					<?php echo "$data[tanggal]"; ?><br>
 				<span>Kode:</span><span class="Kode">
 					<?php echo "$data[kode_penjualan]"; ?>
 				</span><br>
 				<hr style="border-top: 1px black dashed">

 				<table class="table-print"> 
 					<?php 
 						while($data=mysqli_fetch_assoc($result2)){
 							echo "<tr>";
 							echo "
 								  <td class='td-lg'>".strtoupper($data['nama_produk'])."</td>
 								  <td class='td-sm'>".number_format($data['kuantitas'],0,',','.')."</td>
 								  <td class='td-md'>".number_format($data['harga_jual'],0,',','.')."</td>
 								  <td class='td-md'>".number_format($data['total'],0,',','.')."</td>";
 							echo "</tr>";
 						}
 					 ?>
 				</table>
 				<hr style="border-top: 1px black dashed">
 				<?php 
 					$query="select * from tbl_penjualan where kode_penjualan='$kodepenjualan'";
					$result1=mysqli_query($koneksi,$query);
 					$data=mysqli_fetch_assoc($result1); 
 				?>
 				<table class=" table-print">
 					<tr>
 						<td>TOTAL</td><td> :</td>
 						<td><?php echo number_format($data['total_harga'],0,',','.'); ?></td>
 					</tr>
 					<tr>
 						<td>TOTAL ITEM</td><td> :</td>
 						<td><?php echo number_format($data['total_item'],0,',','.');?></td>
 					</tr>
 					<tr>
 						<td>BAYAR</td><td> :</td>
 						<td><?php echo number_format($data['bayar'],0,',','.'); ?></td>
 					</tr>
 					<tr>
 						<td>KEMBALI</td><td> :</td>
 						<td><?php echo number_format($data['kembali'],0,',','.'); ?></td>
 					</tr>
 				</table>
 				<hr style="border-top: 1px black dashed">
 				<table class="">
 					<tr>
 						
 						<td><?php echo "$data[tanggal]"; ?></td>
 					</tr>
 					
 				</table>
 				Terimakasih atas kunjungan anda <br>
 				 Selamat menikmati :)
 			</div>
 		</div>
 	</div>
 	<br>
 </body>
 <script type="text/javascript">
 	window.print()
 	// window.onfocus=function(){ window.close();}
 </script>
 </html>