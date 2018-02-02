<?php 
	session_start();
	include("function/koneksi.php");
	if (!isset($_SESSION['username'])) {
		header('location:login.php?pesan=Anda harus login dahulu');
	}
?>
<!DOCTYPE html>
<html>
<head>
		<title></title>
		<?php include("templates/header.php"); ?>
</head>

<body>

<div class="wrapper">
	
	<div class="sidebar-wrapper">
			<?php include ('templates/sidebar.php'); ?>
	</div>


 	<div class="page-wrapper">
	 	<div class="container-fluid">
		<button class="btn btn-secondary toggle-sidebar"><i class="fa fa-bars"></i></button>	<br /><br />
		 	<div class="tool-row">
		 		<div class="row">
		 			<div class="col-sm-5">
				 		<div class="input-group">
							<div class="input-group-addon">
								Tanggal
							</div>
							<input type="text" name="caridata" value="<?= date('d m Y  h:i:s') ?>" class="form-control" >
							
						</div>
				 	</div>
			 	</div>
		 	
			</div>

			<div class="table-row">
				<div class="row">
			 		<div class="col-sm-2 row-total-data">
		 				<h5>Total Data <span class="tag tag-custom">  </span></h5>
					</div>
		 			<div class="offset-sm-8 col-sm-2 row-button">
		 				
					</div>
					
		 		</div>	
		 		
		 				<table class="table-pesanan table table-bordered table-hover">
						 	<thead>
						 		<tr>
						 		<th>No</th>
									<th>Table</th>
									<th>Nama produk</th>
									<th>Harga</th>
									<th>Qty</th>
									<!-- <th>Diskon</th> -->
									<th>Total</th>
									<th>Keterangan</th>
									<th>Tools</th>
								</tr>
						 	</thead>
						 	<tbody>
						 		
						 	</tbody>
						 </table>
				<div class="row">
					<div class="offset-sm-10 col-sm-2 row-button">
		 				
					</div>
				</div>	
		 	</div>		
	 		
	 	</div>	
 	</div>
 		
</div>

</body>
</html>


<script type="text/javascript">
		
function getpesanan()
{
	var total=0;
	$.ajax({
	url:'function/prosesorderlist.php',
	data:{getpesanan:true},
	dataType:'html',
	success:function(data){
			$('.table-pesanan tbody').html(data);

		}
	})
	

}			
// ========================================================================================================/	
	$('.toggle-sidebar').click(function(){
		$('.wrapper').toggleClass('toggled');
	})

getpesanan();

setInterval(function(){ 
        getpesanan();
      }, 2000);
$('.table-pesanan').on('click','.btn-selesai',function(){
	var kode=$(this).val();
	// alert(kode)
	$.ajax({
		url:'function/prosesorderlist.php',
		data:{kode:kode,updatestatus:true},
		success:function(data){
			 getpesanan();
		}
	})
})
	</script>
