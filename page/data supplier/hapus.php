<?php 

	@$id = $_GET['id'];
	if(isset($_GET['id'])) {
		$sql = mysqli_query($conn, "delete from data_supplier where id= ".$id);
		?> 
			<script type="text/javascript">
				alert ("Data Berhasil DiHapus!!");
				window.location.href="?page=data_supplier";
			</script>
		<?php
	}

?>