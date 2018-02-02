


	<ul class="sidebar">
		<li class="brand text-sm-center"><p><b>Smart Waiter</p></b></li>
		<?php if ($_SESSION['role']=='admin'): ?>
			<li><a href="produk"><i class="fa fa-list-alt"></i> Menu</a></li>
			<li><a href="user"><i class="fa fa-user"></i> User</a></li>
			<li><a href="kasir"><i class="fa fa-cart-plus"></i> Kasir</a></li>
			<li><a href="orderlist"><i class="fa fa-cart-plus"></i> Order List</a></li>
			<li><a href="penjualan"><i class="fa fa-bar-chart"></i> Laporan</a></li>
			<li><a href="function/proseslogin"><i class="fa fa-sign-out"></i> Logout</a></li>
		<?php else: ?>
			<li><a href="transaksi"><i class="fa fa-cart-plus"></i> Transaksi</a></li>
			<li><a href="function/proseslogin"><i class="fa fa-sign-out"></i> Logout</a></li>
		<?php endif ?>

		<li class="version"><a href="#">v.1.0</a></li>
	</ul>
	
<script type="text/javascript">
	var url=window.location.pathname
	url=url.substr(url.lastIndexOf('/') + 1);
	$('.sidebar a').each(function(){
		var navurl=$(this).attr('href')
		if (navurl==url) {
			$(this).addClass('active')
		}
	})
</script>