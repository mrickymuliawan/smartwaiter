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

			<div class="table-row">
				<div class="row">
			 				 			
			 		<div class="offset-sm-9 col-sm-1">
							<a class="btn btn-secondary btn-diskon">Diskon</a>
					</div>
					<div class="col-sm-2">
							<a href='tambah_produk.php' class="btn btn-custom">Tambah Produk</a>
					</div>
					
		 		</div>	
		 		
		 				<table class="table-data table table-striped table-hover" width="100%">
						 	<thead>
						 		<tr>
						 			<td>Kode produk</td>
				 					<td>Nama produk</td>
				 					<td>Harga Modal</td>
				 					<td>Harga Jual</td>
				 					<td>Kategori</td>				
				 					<td>Diskon</td>		
				 					<td>Diskon</td>
						 		</tr>
						 	</thead>
						 	<tbody>
						 		<?php 
						 			$result=mysqli_query($koneksi,"select * from tbl_produk");
						 		?>
						 		<?php	while ($data=mysqli_fetch_assoc($result)) { ?>
						 		<tr>
						 			<td><?= $data['kode_produk']  ?></td>
				 					<td><?= $data['nama_produk'] ?></td>
				 					<td><?= formatangka($data['harga_modal'])?></td>
				 					<td><?= formatangka($data['harga_jual']) ?></td>
				 					<td><?= $data['kategori'] ?></td>
				 					<td><?= $data['diskon']*100 ?> %</td>

				 					<td><button class='btn btn-outline-info btn-sm btn-edit' value="<?=$data['kode_produk']?>"><i class='fa fa-edit'></i></button>
				 					<button class='btn btn-outline-danger btn-sm btn-hapus' value="<?=$data['kode_produk']?>"><i class='fa fa-trash'></i></button></td>
				 				</tr>
						 		<?php	} ?>
						 		 
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

	<div class="modal fade modal-form-edit" role="dialog">
		<div class="modal-dialog ">
			<div class="modal-content">
			    <div class="modal-header">
			    	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Edit Data</h4>
			    </div>
			    <form class="editdata">
				<div class="modal-body">
					

			 			<div class="form-group row">
			 				<label for="kodeproduk" class="col-form-label col-sm-3">Kode produk</label>
			 				<div class="col-sm-9">
			 					<input type="text" name="kodeproduk" class="form-control" placeholder="b001" readonly="true">	
			 					<div class="error"></div>
			 				</div>
			 			</div>

			 			<div class="form-group row">
			 				<label for="namaproduk" class="col-form-label col-sm-3">Nama produk</label>
			 				<div class="col-sm-9">
			 					<input type="text" name="namaproduk" class="form-control" placeholder="Baju polos" >	
			 				</div>
			 			</div>

			 			<div class="form-group row">
			 				<label for="kategori" class="col-form-label col-sm-3">Kategori</label>
			 				<div class="col-sm-4">
			 					<select name="kategori" class="form-control kategori"> 
			 						<option value="makanan"> Makanan</option>
			 						<option value="minuman"> Minuman</option>
			 					</select>	
			 				</div>
			 			</div>

			 			<div class="form-group row">
			 				<label for="hargamodal" class="col-form-label col-sm-3">Harga Modal</label>
			 				<label for="hargamodal" class="col-form-label col-sm-1">Rp. </label>
			 				<div class="col-sm-4">
			 					<input type="text" name="hargamodal" class="form-control input-format" placeholder="100000">	
			 				</div>
			 			</div>
			 			<div class="form-group row">
			 				<label for="hargajual" class="col-form-label col-sm-3">Harga Jual</label>
			 				<label for="hargajual" class="col-form-label col-sm-1">Rp. </label>
			 				<div class="col-sm-4">
			 					<input type="text" name="hargajual" class="form-control input-format" placeholder="100000">	
			 				</div>
			 			</div>
				 			
			 			<div class="form-group row">
			 				<label for="diskon" class="col-form-label col-sm-3">Diskon</label>
			 					<div class="col-sm-4">
			 					<select name="diskon" class="form-control diskon">
			 						<?php 
			 							for($i=0;$i<=100;$i+=5){
											$diskon=0.01*$i;
											echo "<option value='$diskon'>$i</option>";
										}
			 						 ?>
			 					</select>	
			 					</div>
			 				<label for="diskon" class="col-form-label col-sm-1">%</label>	
			 			</div>
			 		   
				</div>
				<div class="modal-footer">
			      	<input type="submit" class="btn btn-custom">
			        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
			    </div>
			    </form>  
			</div>
 		</div>
 	</div>

	<div class="modal fade modal-setdiskon" role="dialog">
	 		<div class="modal-dialog ">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Set Diskon</h4>
			      </div>
			      <div class="modal-body infobody">
				      <div class="row">
				        
					 	
					 	<div class="col-sm-6">
							<select name='carikategori' class="form-control kategori">
								<option value='' selected="true">All</option>
								
							</select>
					 	</div>

					 	<div class="col-sm-3">
							<select name="diskon" class="form-control diskon">
				 				<?php 
				 					for($i=0;$i<=100;$i+=5){
										$diskon=0.01*$i;
										echo "<option value='$diskon'>$i %</option> ";
									}
				 				 ?>
				 			</select>	
					 	</div>
				      </div>
			      </div>
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-custom btn-submit">Submit</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
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
			        <button type="button" class="btn btn-default btn-tutup" data-dismiss="modal" >Close</button>
			      </div>
			    </div>
 			</div>
 	</div>
 	<div class="modal fade modal-confirm" role="dialog">
	 		<div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Hapus Data</h4>
			      </div>
			      <div class="modal-body infobody">
			        	Anda yakin?
			        	
			      </div>
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-custom btn-submit">Submit</button>
			        <button type="button" class="btn btn-default cancel" data-dismiss="modal" >Close</button>
			        
			      </div>
			    </div>
 		</div>
 	</div>



<script type="text/javascript">
		$(document).ready(function(){

				$('.input-format').number(true,0,',','.')

			 $('.table-data').DataTable();
			

			$('.btn-diskon').on('click',function(){
			    $('.modal-setdiskon').modal('show');
			    $('.btn-submit').click(function(){
			    	$.ajax({
						url:'function/prosesproduk.php',
						data:{kategori:$('.modal-setdiskon select[name=carikategori]').val(),
							  diskon:$('.modal-setdiskon .diskon').val(),
							  setdiskon:true},
						success:function(data){
							 location.reload();
						}
					})
			        
			    }) 
				
			})
			// HAPUS DATA
			$('.table-data tbody').on('click','.btn-hapus',function(){
				var kodebrg=$(this).val();
			    $('.modal-confirm').modal('show');
			    $('.btn-submit').click(function(){
			    	$.ajax({
						url:'function/prosesproduk.php',
						data:{kodeproduk:kodebrg,hapusdata:true},
						success:function(data){
							 location.reload();
						}
					})
			        
			    }) 
				
			})


			//EDIT DATA
			$('.table-data tbody').on('click','.btn-edit',function(){
				$.ajax({
					url:'function/prosesproduk.php',
					data: {kodeproduk:$(this).val(),ambileditdata:true},
					dataType:'json',
					success:function(data){
						$('.modal-form-edit input[name=kodeproduk]').val(data.kode_produk);
						$('.modal-form-edit input[name=namaproduk]').val(data.nama_produk);
						$(".modal-form-edit select[name=kategori] option[value='"+data.kategori+"']").prop('selected','true');
						$('.modal-form-edit input[name=hargamodal]').val(data.harga_modal);
						$('.modal-form-edit input[name=hargajual]').val(data.harga_jual);
						$(".modal-form-edit .diskon option[value='"+data.diskon+"']").prop('selected','true');
			     	$('.modal-form-edit').modal('show');
						
					}
				})
			})
			// VALIDASI FORM EDIT
			$('.editdata').validate({
				submitHandler:function(form){
					 $.ajax({
			            url:'function/prosesproduk.php',
			            type:'post',
			            data:$(form).serialize()+"&editdata=true",
			            success: function(data){
			               $('.modal-info .infobody').html(data);
			               $('.modal-info').modal('show');
			               $('.modal-form-edit').modal('hide');
			               $('.btn-tutup').click(function(){
			               		location.reload();
			               }) 
			            }
			        });
				},
				rules:{
					kodeproduk:{
						required:true
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



		})
	</script>
