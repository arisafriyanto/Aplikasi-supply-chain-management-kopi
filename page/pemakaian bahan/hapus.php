<?php 

	@$id = $_GET['id'];
	@$id_pemesanan = $_GET['id_pemesanan'];
	if(isset($_GET['id'])) {
		$sql = mysqli_query($conn, "delete from pemakaian_bahan where id= ".$id);
		$sql = mysqli_query($conn, "update pemesanan_bahan set pakai= 0 where id_pemesanan = '$id_pemesanan' ");
		?> 
			<script type="text/javascript">
				alert ("Data Berhasil DiHapus!!");
				window.location.href="?page=pemakaian_bahan";
			</script>
		<?php
	}

?>