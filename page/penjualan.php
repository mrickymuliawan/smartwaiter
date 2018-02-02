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
		 			<div class="col-sm-3">
		 				<div class="card">
		 					
		 					<div class="card-block info-row">
		 						<div class="row ">
		 							<div class="col-sm-5">
		 								<i class="fa fa-shopping-cart fa-4x"></i>
		 							</div>
		 							<div class="col-sm-7 ">
		 								<h5 class="info-1 input-format"></h5>
		 								<b><p>Penjualan</p></b>
		 							</div>
		 						</div>
		 					</div>
		 				
		 				</div>
		 			</div>
		 			<div class="col-sm-3">
		 				<div class="card">
		 					
		 					<div class="card-block info-row">
		 						<div class="row ">
		 							<div class="col-sm-5">
		 								<i class="fa fa-tags fa-4x"></i>
		 							</div>
		 							<div class="col-sm-7">
		 								<h5 class="info-2 input-format"></h5>
		 								<b><p>Item Terjual</p></b>
		 								
		 							</div>
		 						</div>
		 					</div>
		 					
		 				</div>
		 			</div>
		 			<div class="col-sm-3">
		 				<div class="card">
		 					
		 					<div class="card-block info-row">
		 						<div class="row ">
		 							<div class="col-sm-5">
		 								<i class="fa fa-usd fa-4x"></i>
		 							</div>
		 							<div class="col-sm-7">
		 								<h5 class="info-3 input-format"></h5>
		 								<b><p>Total</p></b>
		 								
		 							</div>
		 						</div>
		 					</div>
		 					
		 				</div>
		 			</div>
		 			
		 			<div class="col-sm-3">
		 				<div class="card">
		 					
		 					<div class="card-block info-row">
		 						<div class="row ">
		 							<div class="col-sm-5">
		 								<i class="fa fa-money fa-4x"></i>
		 							</div>
		 							<div class="col-sm-7 ">
		 								<h5 class="info-4 input-format"></h5>
		 								<b><p>Profit</p></b>
		 							</div>
		 						</div>
		 					</div>
		 					
		 				</div>
		 			</div>
		 		</div>



		 		<div class="row">
			 			
				 	<div class="col-sm-3">
				 		<div class="input-group">
							<div class="input-group-addon">
								<span class="fa fa-search "></span>
							</div>
							<input type="text" name="caridata" placeholder="Search.." class="form-control cari-data" >
							
						</div>
				 	</div>
				 	
				 	<div class="offset-sm-7 col-sm-2">
						<a href='transaksi.php' class="btn btn-custom">Tambah Penjualan</a>
					</div>
			 		
				</div>

		 		<div class="row">
		 			<div class="col-sm-2">
			 			<select name='date-type' class="form-control">
							<option value='today' selected="true">Today</option>
							<option value='tanggal'>Tanggal</option>
						</select>
					</div>
			 	
						
					<div class="offset-sm-8 col-sm-2 div-maxdata">
						 	<select name='maxdata' class="form-control maxdata">	
								<option value='10' selected="true">10</option>
								<option value='25'>25</option>
								<option value='50'>50</option>
								<option value='100'>100</option>
							</select>
					</div>		
					
		 		</div>	
		 		<div class="row">
		 			<div class="date-range">
						<div class="col-sm-2">
							<input type="text" name="tanggal1" class="form-control tgl-1" >
						</div>
						<label class="col-form-label col-sm-1" for='tanggal'>To</label>
						<div class="col-sm-2">
							<input type="text" name="tanggal2" class="form-control tgl-2" >
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

				<table class="table-data table table-striped">
					<thead>
						<tr>
							<td>Kode Penjualan</td>
							<td>Tanggal</td>		 					
		 					<td>Total Item</td>
		 					<td>Bayar</td>
		 					<td>Kembali</td>
		 					<td>Total</td>
		 					<td>Profit</td>
		 					
				 		</tr>
					</thead>
					<tbody></tbody>
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


	<div class="modal fade modal-view" role="dialog">
		<div class="modal-dialog ">
			<div class="modal-content">
			    <div class="modal-header">
			    	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Penjualan</h4>
			    </div>
				<div class="modal-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" data-toggle="tab" href="#detail" role="tab">Detail</a>
					  </li>
					 
					  
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
					  <div class="tab-pane active" id="detail" role="tabpanel">
					  	<div class="row">
						  	<div class="col-sm-6">
							  	
								<div class="form-group row">
								 	<label for="kodepenjualan" class="col-form-label col-sm-4 ">Kode:</label>
								 	<div class="col-sm-8">
								 		<input readonly type="text" name="kodepenjualan" class="form-control" >	
								 	</div>
								</div>
								<div class="form-group row">	
								 	<label for="tanggal" class="col-form-label col-sm-4 ">Tanggal:</label>
								 	<div class="col-sm-8">
								 		<input readonly type="text" name="tanggal" class="form-control" >	
								 	</div>
								</div>

							 	<div class="form-group row">	
							 		<label for="totalitem" class="col-form-label col-sm-4 ">Jumlah Item</label>
							 		<div class="col-sm-8">
							 			<input readonly type="text" name="totalitem" class="form-control" >	
							 		</div>
							 	</div>
						  	</div>
					 		<div class="col-sm-6">
						 		<div class="form-group row">				 
								 	<label for="totalharga" class="col-form-label col-sm-5 ">Total Harga:</label>
								 	<div class="col-sm-7">
								 		<input type="text" name="totalharga" class="input-format2 form-control" readonly>	
								 	</div>
							 	</div>
							 	<div class="form-group row">
								 	<label for="bayar" class="col-form-label col-sm-5 ">Bayar:</label>
								 	<div class="col-sm-7">
								 		<input type="text" name="bayar" class="input-format2 form-control" readonly>	
								 	</div>
							 	</div>
							 	<div class="form-group row">
								 	<label for="kembali" class="col-form-label col-sm-5 ">Kembali:</label>
								 	<div class="col-sm-7">
								 		<input type="text" name="kembali" class="input-format2 form-control" readonly>	
								 	</div>
							 	</div>
						  	</div>
						  
					 	
					 		
					 	</div>
					 	<div class='row'>
					 		<div class="col-sm-12">
					 			<table class="table table-striped">
					 			<thead>
					 				<tr>
								 		<td>Kode produk</td>
								 		<td>Nama produk</td>
								 		<td>Qty</td>
								 		<td>Diskon</td>
								 		<td>Harga Modal</td>
								 		<td>Harga Jual</td>
								 		<td>Total</td>
								 		<td>Profit</td>
							 		</tr>
							 	</thead>
							 	<tbody>
							 		
							 	</tbody>
					 			</table>
					 		</div>
					 	</div>
					 
					  </div>
					 
					</div>
						
					   
				</div>
				<div class="modal-footer">
					
						<button type="button" class="btn btn-primary btn-print">Print</button>
				       	<button type="button" class="btn btn-secondary" data-dismiss='modal'>Close</button>
					
				</div>
			</div>
 		</div>
 	</div>
	
	<div class="modal fade modal-info" role="dialog">
	 		<div class="modal-dialog ">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Informasi</h4>
			      </div>
			      <div class="modal-body infobody">
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default tutup" data-dismiss="modal" >Tutup</button>
			      </div>
			    </div>
 			</div>
 	</div>
 		<div class="modal fade modal-confirm" role="dialog">
	 		<div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Informasi</h4>
			      </div>
			      <div class="modal-body infobody">
			        	Anda yakin?
			      </div>
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-custom btn-submit">Submit</button>
			        <button type="button" class="btn btn-default cancel" data-dismiss="modal" >Cancel</button>
			        
			      </div>
			    </div>
 		</div>
 	</div>

<script type="text/javascript">

	
			
	function load(p){
		$.ajax({
		url:'function/prosespenjualan.php',
		data:{caridata:$('input[name=caridata]').val(),
					  
			  tgl1:$('.tgl-1').val(),
			  tgl2:$('.tgl-2').val(),
			  maxdata:$('.maxdata').val(),
			  page:p,
			  load:true},
		dataType:'json',
		success:function(data){
				$('.table-data tbody').html(data.table);
				$('.row-button').html(data.button);
				$('.row-total-data span').html(data.totaldata)
				// INFO BOX
				$('.info-1').html(data.penjualan);
				$('.info-2').html(data.item);
				$('.info-3').html(data.total);
				$('.info-4').html(data.profit);
				}
		})
	}
// ==============================================================================================================//
	$('.toggle-sidebar').click(function(){
		$('.wrapper').toggleClass('toggled');
	})

	// BUAT TANGGAL TAHUN LALU DAN SET TANGGAL
	var date = new Date(), y = date.getFullYear(), m = date.getMonth();
	var tgltoday=new Date(); tgltoday.setDate(tgltoday.getDate());
	var tglsatu=new Date(y, m, 1);
	$('.tgl-1').datepicker().datepicker('option','dateFormat','yy-mm-dd').datepicker('setDate',tgltoday)
	$('.tgl-2').datepicker().datepicker('option','dateFormat','yy-mm-dd').datepicker('setDate',tgltoday);
	$('.date-range').hide()
	
	// FORMAT ANGKA
	$(document).ajaxSuccess(function(){
		$('.input-format').number(true,0,',','.')
		$('.input-format2').number(true,0,',','.')
		
	})	

	// LOAD DATA 
	load(1);

	// SEARCH DATA 
	$('.tgl-1,.tgl-2,.cari-data').change(function(){ 
		load(1) 
	})
	$('select[name=date-type]').change(function(){
		if ($(this).val()=='tanggal') {
			$('.date-range').toggle()
			$('.tgl-1').datepicker().datepicker('option','dateFormat','yy-mm-dd').datepicker('setDate',tglsatu)
			$('.tgl-2').datepicker().datepicker('option','dateFormat','yy-mm-dd').datepicker('setDate',tgltoday);
			
		}
		else{
			$('.date-range').toggle()
			$('.tgl-1').datepicker().datepicker('option','dateFormat','yy-mm-dd').datepicker('setDate',tgltoday)
	
			$('.tgl-2').datepicker().datepicker('option','dateFormat','yy-mm-dd').datepicker('setDate',tgltoday);
			
		}
		load(1)
	})
	
	
	// ATUR JUMLAH DATA YANG DITAMPILKAN
	$('.maxdata').change(function(){
		load(1)
	})

	$('.row-button').on('click','.btn-page',function(){
		load($(this).val())
	})

// ==============================================================================================================//
			

			//EDIT DATA
	$('.table-data').on('click','.btn-view',function(){
				
		$.ajax({
			url:'function/prosespenjualan.php',
			data: {kodepenjualan:$(this).val(),ambildatapenj:true},
			dataType:'json',
			success:function(data){
				
				$('.modal-view input[name=kodepenjualan]').val(data.kode_penjualan);
				$('.modal-view input[name=tanggal]').val(data.tanggal);
				$('.modal-view input[name=totalharga]').val(data.total_harga);
				$('.modal-view input[name=bayar]').val(data.bayar);
				$('.modal-view input[name=kembali]').val(data.kembali);
				$('.modal-view input[name=totalitem]').val(data.total_item);

				$('.modal-view table tbody').html(data.penjdetail);
				$('.modal-view').modal('show');
					
			}
		})
	})

	$('.modal-view').on('click','.btn-print',function(){
			var kode=$('input[name=kodepenjualan]').val();
			window.open("templates/print.php?kodepenjualan="+kode,"","width=200,height=700");
	});
	// $('.modal-view').on('click','.btn-complete',function(){
	// 	var value=$(this).val()
	// 	$('.modal-view').modal('toggle');
	// 	$('.modal-confirm').modal('toggle');
	// 	$('.btn-submit').click(function(){
	// 		$.ajax({
	// 			url:'function/prosespenjualan.php',
	// 			data:{kodepenjualan:value,complete:true},
	// 			success:function(data){
	// 				 location.reload()
	// 			}
	// 		})
	// 	})
				
	// })
	// .on('click','.btn-refund',function(){
	// 	var value=$(this).val()
	// 	$('.modal-view').modal('toggle');
	// 	$('.modal-confirm').modal('toggle');
	// 	$('.btn-submit').click(function(){
	// 		$.ajax({
	// 			url:'function/prosespenjualan.php',
	// 			data:{kodepenjualan:value,refund:true},
	// 			success:function(data){
	// 				 location.reload()
	// 			}
	// 		})
	// 	})
	// })

		



	</script>