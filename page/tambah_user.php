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
			<h4 class="">Tambah user</h4>
	 		<form class="tambahdata">

	 			<div class="form-group row">
	 				<label for="Username" class="col-form-control col-sm-2">Username</label>
	 				<div class=" col-sm-9">
	 					<input type="text" name="username" class="form-control" >	
	 				</div>
	 			</div>

	 			<div class="form-group row">
	 				<label for="role" class="col-form-control col-sm-2">Role</label>
	 				<div class=" col-sm-2">
	 					<select name="role" class="form-control"> 
	 						<option value="meja">meja</option>
	 						<option value="admin">admin</option>
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
	            url:'function/prosesuser.php',
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
			username:{
				required:true
			},
			role:{
				required:true
			}
		},
		messages:{
			username:{
				required:'wajib diisi'
			},
			role:{
				required:'wajib diisi'
			}
		}		
	})

	</script>
