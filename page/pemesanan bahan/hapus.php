<?php 

	@$id = $_GET['id'];
	if(isset($_GET['id'])) {
		$sql = mysqli_query($conn, "delete from pemesanan_bahan where id= ".$id);
		?> 
			<script type="text/javascript">
				alert ("Data Berhasil DiHapus!!");
				window.location.href="?page=pemesanan_bahan";
			</script>
		<?php
	}

?>