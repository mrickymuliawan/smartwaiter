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
				<div class="row">

					<div class="col-sm-8">
						<div class="tool-row">
							<div class="form-group row">
							
								<label class="col-form-label col-sm-3" for='kodepenjualan'>Kode Penjualan</label>
								<div class="col-sm-3">
									<input type="text" name="kodepenjualan" class="form-control kode-penjualan" readonly="">
								</div>
							
								<div class="col-sm-3">
									<input type="text" name="tanggal" class="form-control tgl" disabled="">
								</div>

								<label class="col-form-label col-sm-1" for='kodepenjualan'>Table</label>
								<div class="col-sm-2">
									<input type="text" value="<?= $_SESSION['username'] ?>" class="form-control" readonly>
									<input type="hidden" name=kode_user value="<?= $_SESSION['kode_user'] ?>" />
								</div>
								
							   
							</div>
						</div> 

						
						<div class="cart-row">	
							<ul class="nav nav-tabs" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active link-cart" data-toggle="tab" href="#keranjang" role="tab">Keranjang</a>
							  </li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane active" id="keranjang" role="tabpanel">
								  <div class="cart-row2">
										<table class="table table-striped table-keranjang">
											<thead>
												<tr>
													<th>Nama produk</th>
													<th>Harga</th>
													<th>Qty</th>
													<th>Diskon</th>
													<th>Total</th>
													<th>Keterangan</th>
													<th>Tools</th>
													</tr>
											</thead>
											<tbody></tbody>	
										</table>
									</div>
									
								</div>
							  <div class="tab-pane" id="pesanan" role="tabpanel">
							  	<div class="cart-row2">
										<table class="table table-striped table-pesanan">
											<thead>
												<tr>
													<th>Nama produk</th>
													<th>Harga</th>
													<th>Qty</th>
													<!-- <th>Diskon</th> -->
													<th>Total</th>
													<th>Keterangan</th>
													<th>Status</th>
													</tr>
											</thead>
												<tbody>
											 		
											 		 
											 	</tbody>	
										</table>
									</div>	
									<div class="alert alert-success alert-dismissible" role="alert" style="display: none">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								  <strong>Pesanan anda berhasil</strong> Mohon menunggu pesanan anda sedang dalam proses.
								</div>
							  </div>
							</div>
							
						</div>
						

					</div> 

				

					<div class="col-sm-4">	
						<div class="header-menu-row">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#makanan" role="tab">Makanan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#minuman" role="tab">Minuman</a>
								</li>
							</ul>
						</div>
						<div class="menu-row">
							
							
			 				<!-- Nav tabs -->
							

							<!-- Tab panes -->
							<div class="tab-content">

								<div class="tab-pane active" id="makanan" role="tabpanel">
									<div class="row">
										<div class="col-sm-12">
										  	<table class="table table-striped table-hover table-makanan">
												<thead>
													<tr>
														<th>Nama produk</th>
														<th>Harga</th>
														<th>Diskon %</th>
													</tr>
												</thead>
												<tbody></tbody>	
											</table>
										</div>
								 	</div>
								 	
								</div>
								<div class="tab-pane" id="minuman" role="tabpanel">

								  	<div class="row">
									  	<div class="col-sm-12">
									 		<table class="table table-striped table-hover table-minuman">
												<thead>
													<tr>
														<th>Nama produk</th>
														<th>Harga</th>
														<th>Diskon %</th>
													</tr>
												</thead>
												<tbody></tbody>	
											</table>

									  	</div>
									</div>
								</div>
							</div>				 			
							
							
						</div>	
					</div>

					
				</div>
<!--...................................................................................................... -->
				<div class="row">
					<form class="form-total">
						<div class=" col-sm-12">
							<div class="tool-row">
							<div class="form-group row">
						 		<label for="total" class="col-form-label col-sm-1">Total</label>
						 		<div class="col-sm-3">
						 			<input type="text" name="totalharga" class="form-control form-control-lg totalharga input-format" value=0 readonly>	
						 		</div>
						 	</div>
						 		
						
						
							<div class="form-group row">
						 		<label for="bayar" class="col-form-label col-sm-1 ">Bayar</label>
						 		<div class="col-sm-3">
						 			<input type="text" name="bayar" class="form-control form-control-lg bayar input-format" >	
						 		</div>
						 		<label for="kembali" class="col-form-label col-sm-1 ">Kembali</label>
						 		<div class="col-sm-3">
						 			<input type="text" class="form-control form-control-lg kembali input-format" readonly>	
						 			<input type="hidden" name="kembali" class="kembali">
						 		</div>
						 		<div class="offset-sm-1 col-sm-3">
						 			
									 <button type='button' class="btn btn-outline-success btn-lg btn-bayar" disabled>Bayar
									  <i class="fa fa-dollar fa-1x"></i></button>
									 <button type='button' class="btn btn-outline-danger btn-lg btn-clear">Hapus
											   <i class="fa fa-trash-o fa-1x"></i></button>
								</div>
						 	</div>
						 	</div>
						</div>
					</form>
				</div>
<!--...................................................................................................... -->
			</div>
		</div>
	</div>
</body>
</html>


 		<div class="modal fade modal-print" role="dialog">
	 		<div class="modal-dialog ">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Informasi</h4>
			      </div>
			      <div class="modal-body info-body">
			        	Penjualan berhasil
			      </div>
			      <div class="modal-footer">
			      <button type="button" class="btn btn-primary btn-print">Print</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			      </div>
			    </div>
 			</div>
 		</div>



<!-- ---------------------------------------------------------------------------------------------------- -->

<script type="text/javascript">
function showAlert(){
  $('.alert').show('slide', {direction: 'right'},400);
  setTimeout(function(){     
    $('.alert').hide('slide', {direction: 'right'},300); 
  }, 3500);
}
function changeqty(a)
{
	
	var qty=parseInt($(a).val());
	var harga=parseInt($(a).parent().siblings('.td-harga_jual').find('input').val());
	var diskon=parseFloat($(a).parent().siblings('.td-diskon').html())/100;
	var total=(harga-(harga*diskon))*qty;
	
	$(a).parent().siblings('.td-total').find('input').val(total);	

}
function hapussemua()
{
	$('.totalharga').val(0)
	$('.bayar').val("")
	$('.kembali').val("")
	$('.btn-bayar').attr('disabled','true')
	$('.bykirim-input').attr('readonly','true').val(0)
  	$('.bykirim-cbox').prop('checked',false)
}
function generate()
{
	var text = "";
	var possible = "0123456789";
	for( var i=0; i < 7; i++ )
	    text += possible.charAt(Math.floor(Math.random() * possible.length));
		return text;
	}
function load()
{
	$.ajax({
	url:'function/proseskasir.php',
	data:{load:true},
	dataType:'json',
	success:function(data){
			$('.table-makanan tbody').html(data['makanan']);
			$('.table-minuman tbody').html(data['minuman']);
		}
	})
}
function getpesanan()
{
	var total=0;
	$.ajax({
	url:'function/proseskasir.php',
	data:{getpesanan:true},
	dataType:'html',
	success:function(data){
			$('.table-pesanan tbody').html(data);
			$('.table-pesanan tbody tr .td-total2 input').each(function(){
				 total+=parseInt($(this).val())
				})
			$('.totalharga').val(total);
			$('.table-keranjang tbody').children().remove();
			hapussemua();
		}
	})
	

}			
			
//=======================================================================================================//

	$('.toggle-sidebar').click(function(){
		$('.wrapper').toggleClass('toggled');
	})
		



$(document).ajaxSuccess(function(){
	$('.input-format').number(true,0,',','.')

})
// CEK KODE
var gen=generate()
var kodepenjualan=$('input[name=kodepenjualan').val(gen)
$.ajax({
	url:'function/proseskasir.php',
	data:{kodepenjualan:$('input[name=kodepenjualan').val(),cekkode:true},
	success: function(data){
		if (data=='true') {
			location.reload();
		}
	}
})

// LOAD DATA 
load();
getpesanan();

$('.tgl').datepicker().datepicker("setDate",new Date()).datepicker('option','dateFormat','yy-mm-dd');


$('.table-makanan,.table-minuman').on('click','tr',function(){
	$('.link-cart').tab('show')
 	var kode=$(this).children('input').val();
	var sudahada=false			
	$('.table-keranjang input[name=kodeproduk]').each(function(){
	    // JIKA SUDAH ADA DIKERANJANG 
	    if($(this).val()==kode){
	    			
	    	var qtyinput=$(this).siblings('.td-qty').find('input')
	    	var qty=parseInt(qtyinput.val())
	    	$(this).siblings('.td-qty').find('input').val(qty+1)

			// FUNSI CHANGEQTY
	    	changeqty(qtyinput)
			sudahada=true

	    }
	    		
	})
	// JIKA SUDAH ADA DIKERANJANG HITUNG ULANG TOTAL 
	if(sudahada){
	    var tot=0;
		$('.td-total input').each(function(){
			var value=parseInt($(this).val());
			tot += value;
			$('.totalharga').val(tot)
		})
		
	}
	// JIKA BELUM ADA DIKERANJANG, TAMBAHKAN DIKERANJANG LALU HITUNG TOTAL
	else{
	    $.ajax({
		url:'function/proseskasir.php',
		dataType:'html',
		data:{pilihproduk:kode},
		success:function(data){
			$('.table-keranjang tbody').append(data);
					
			// VALUE TOTAL	
			var tot=parseInt($('.totalharga').val())
			var value=parseInt($('.td-total input').last().val())
			tot += value
			$('.totalharga').val(tot)
				
		}

	})
	}			
 	
})

//TOMBOL CLEAR  HAPUS SEMUA
$('.btn-clear').click(function(){

	$('.table-keranjang tbody').children().remove();
	hapussemua()

})

//TOMBOL HAPUS, HAPUS SATU YANG DIPILIH DAN TOTAL DIKURANGI
$('.table-keranjang').on('click','.btn-hapus',function(){

	
	//isi total 
	var tot=parseInt($('.totalharga').val())
	var value=parseInt($(this).parent().siblings('.td-total').find('input').val())
	tot -= value
	$('.totalharga').val(tot)

	$(this).parents("tr").remove();
	if($('.table-keranjang tbody').children().length == 0){
		hapussemua()
	}
	
})

	// MENGGANTI QTY
$('.table-keranjang').on('change','.td-qty input',function(){
	changeqty(this)
		var tot=0;
	$('.td-total input').each(function(){
		var value=parseInt($(this).val());
		tot += value;
		$('.totalharga').val(tot)
	})
		
	
})

// AUTO FOCUS SAAT KLIK QTY
.on('focus','.td-qty input',function(){
	$(this).select();
})

// BAYAR 
$('.bayar').on('keyup mouseout',function(){
	var total=$('.totalharga').val();
	var bayar=$(this).val();
	$('.kembali').val(bayar-total)
	
	if ($('input[name=kembali]').val()>= 0) {
		$('.btn-bayar').removeAttr('disabled')
	}
	else{
		$('.btn-bayar').attr('disabled','true')
	}
})

	
 // BTN BAYAR 
$('.btn-bayar').click(function(){

	$('.table-keranjang tbody tr').each(function(){
		var value=
			$(this).find('input').serialize()+
			"&tambahorder=true"
		    
			// alert(value)
		$.ajax({
			url:'function/proseskasir.php',
			type:'post',
			// ISI TBL PENJUALAN DETAIL AMBIL DATA DARI SETIAP INPUT
			data:value
		});
	})
	$.ajax({
	    url:'function/proseskasir.php',	    // ISI TBL PENJUALAN
	    data:$('.form-total,input[name=kodepenjualan]').serialize()
	    	   +"&tambahpenjualan=true",
	   	success:function(data){
	   		$('.modal-print').modal('show');
				$('.modal-print').on('click','.btn-print',function(){
					location.reload();
					var kode=$('input[name=kodepenjualan]').val();
					window.open("templates/print.php?kodepenjualan="+kode,"","width=200,height=700");
				});
				$('.modal-print').on('hidden.bs.modal',function(){
					location.reload();
					
				});
	   	}
	    
	 });
})




			
		
	</script>