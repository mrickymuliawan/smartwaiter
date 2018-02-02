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
			 				 			
					<div class="offset-sm-10 col-sm-2">
							<a href='tambah_user.php' class="btn btn-custom">Tambah user</a>
					</div>
					
		 		</div>	
		 		
		 				<table class="table-data table table-striped table-hover" width="100%">
						 	<thead>
						 		<tr>
						 			<td>No</td>
				 					<td>Username</td>
				 					<td>role</td>
				 					<td>Tools</td>
						 		</tr>
						 	</thead>
						 	<tbody>
						 		<?php 
						 			$result=mysqli_query($koneksi,"select * from tbl_user");
						 		?>
						 		<?php	$no=1;while ($data=mysqli_fetch_assoc($result)) { ?>
						 		<tr>
						 			<td><?= $no  ?></td>
				 					<td><?= $data['username'] ?></td>
				 					<td><?= $data['role'] ?></td>

				 					<td><button class='btn btn-outline-info btn-sm btn-edit' value="<?=$data['kode_user']?>"><i class='fa fa-edit'></i></button>
				 					<button class='btn btn-outline-danger btn-sm btn-hapus' value="<?=$data['kode_user']?>"><i class='fa fa-trash'></i></button></td>
				 				</tr>
						 		<?php	$no++;} ?>
						 		 
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
			 				<label for="kodeuser" class="col-form-label col-sm-3">Kode user</label>
			 				<div class="col-sm-9">
			 					<input type="text" name="kodeuser" class="form-control" readonly="true">	
			 					<div class="error"></div>
			 				</div>
			 			</div>

			 			<div class="form-group row">
			 				<label for="Username" class="col-form-label col-sm-3">Username</label>
			 				<div class="col-sm-9">
			 					<input type="text" name="username" class="form-control" >	
			 				</div>
			 			</div>
						<div class="form-group row">
			 				<label class="col-form-label col-sm-3">Password Baru</label>
			 				<div class="col-sm-9">
			 					<input type="password" name="password" class="form-control" >	
			 				</div>
			 			</div>
			 		  <div class="form-group row">
			 				<label for="role" class="col-form-control col-sm-3">Role</label>
			 				<div class=" col-sm-4">
			 					<select name="role" class="form-control role"> 
			 						<option value="meja">Meja</option>
			 						<option value="admin">Admin</option>
			 					</select>	
			 				</div>
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
			

			// HAPUS DATA
			$('.table-data tbody').on('click','.btn-hapus',function(){
				var kode=$(this).val();
			    $('.modal-confirm').modal('show');
			    $('.btn-submit').click(function(){
			    	$.ajax({
						url:'function/prosesuser.php',
						data:{kodeuser:kode,hapusdata:true},
						success:function(data){
							 location.reload();
						}
					})
			        
			    }) 
				
			})

			//EDIT DATA
			$('.table-data tbody').on('click','.btn-edit',function(){
				$.ajax({
					url:'function/prosesuser.php',
					data: {kodeuser:$(this).val(),ambileditdata:true},
					dataType:'json',
					success:function(data){
						$('.modal-form-edit input[name=kodeuser]').val(data.kode_user);
						$('.modal-form-edit input[name=username]').val(data.username);
						$(".modal-form-edit select[name=role] option[value='"+data.role+"']").prop('selected','true');
			      $('.modal-form-edit').modal('show');
						
					}
				})
			})
			// VALIDASI FORM EDIT
			$('.editdata').validate({
				submitHandler:function(form){
					 $.ajax({
			            url:'function/prosesuser.php',
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
					kodeuser:{
						required:true
					},
					username:{
						required:true
					}
				},
				messages:{
					kodeuser:{
						required:'wajib diisi',
						remote:'kode user tidak tersedia'
					},
					username:{
						required:'wajib diisi'
					}

				}		
			})



		})
	</script>
