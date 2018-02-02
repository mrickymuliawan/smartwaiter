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
			<div class="form-row">
			<h4 class="">Tambah Produk</h4>
	 		<form class="tambahdata">

<!-- 	 			<div class="form-group row">
	 				<label for="kodeproduk" class="col-form-control col-sm-2">Kode produk</label>
	 				<div class=" col-sm-7">
	 				<input type="text" name="kodeproduk" class="form-control kodeproduk" placeholder="b001" >
	 				</div>
	 				<div class="col-sm-2">
	 					<button type="button" class="btn btn-secondary btn-generate">Generate</button>
	 				</div>
	 			</div> -->

	 			<div class="form-group row">
	 				<label for="namaproduk" class="col-form-control col-sm-2">Nama produk</label>
	 				<div class=" col-sm-9">
	 					<input type="text" name="namaproduk" class="form-control" placeholder="Isi nama produk" >	
	 				</div>
	 			</div>

	 			<div class="form-group row">
	 				<label for="kategori" class="col-form-control col-sm-2">Kategori</label>
	 				<div class=" col-sm-2">
	 					<select name="kategori" class="form-control kategori"> 
	 						<option value="makanan"> Makanan</option>
	 						<option value="minuman"> Minuman</option>
	 					</select>	
	 				</div>
	 			</div>

	 			<div class="form-group row">
	 				<label for="hargamodal" class="col-form-control col-sm-2">Harga Modal</label>
	 				<label for="hargamodal" class="col-form-control  col-sm-1">Rp. </label>
	 				<div class="col-sm-4">
	 					<input type="text" name="hargamodal" class="form-control input-format" placeholder="100000">	
	 				</div>
	 			</div>
	 			<div class="form-group row">
	 				<label for="hargajual" class="col-form-control col-sm-2">Harga Jual</label>
	 				<label for="hargajual" class="col-form-control  col-sm-1">Rp. </label>
	 				<div class="col-sm-4">
	 					<input type="text" name="hargajual" class="form-control input-format" placeholder="100000">	
	 				</div>
	 			</div>
	 			<div class="form-group row">
	 				<label for="diskon" class="col-form-control col-sm-2">Diskon</label>
	 					<div class=" col-sm-2">
	 					<select name="diskon" class="form-control"> 
	 						<?php 
	 							for($i=0;$i<=100;$i+=5){
									$diskon=0.01*$i;
									echo "<option value='$diskon'>$i %</option>";
								}
	 						 ?>
	 					</select>	
	 				</div>	
	 			</div>

	 			<div class="form-group row">
	 				<div class="offset-sm-9 col-sm-1">
	 					<input type='reset' class="btn btn-outline-danger" value="Reset">
	 					
	 				</div>
	 				<div class="col-sm-1">
	 					<input type='submit' class="btn btn-outline-custom" value="Submit">
	 				</div>
	 			</div>
	 		</form>
			</div>
		</div>
 	</div>
</div>

</body>
</html>

<div class="modal fade modal-info" role="dialog">
<div class="modal-dialog ">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Informasi</h4>
    </div>
    <div class="modal-body info-body">
      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">



	$('.toggle-sidebar').click(function(){
		$('.wrapper').toggleClass('toggled');
	})

	$('.tambahdata').validate({
		submitHandler:function(form){
			 $.ajax({
	            url:'function/prosesproduk.php',
	            type:'post',
	            data:$(form).serialize()+"&tambahdata=true",
	            success: function(data){
	               $('.modal-info .info-body').html(data);
	               $('.modal-info').modal('show');
	               $('.tambahdata').trigger('reset')
	            }
	        });
		},
		rules:{
			kodeproduk:{
				required:true,
				remote:{
					url: "function/validasi.php",
					type: "post",
					data: {
						kodeproduk: function() {
        					return $( "input[name=kodeproduk]" ).val();
      						}
					}
				}
			},
			namaproduk:{
				required:true
			},
			hargamodal:{
				required:true,
				number:true
			},
			hargajual:{
				required:true,
				number:true
			}
		},
		messages:{
			kodeproduk:{
				required:'wajib diisi',
				remote:'kode produk tidak tersedia'
			},
			namaproduk:{
				required:'wajib diisi'
			},
			hargamodal:{
				required:'wajib diisi',
				number:'harus berupa angka'
			},
			hargajual:{
				required:'wajib diisi',
				number:'harus berupa angka'
			}
		}		
	})
		$('.input-format').number(true,0,',','.')


	</script>
