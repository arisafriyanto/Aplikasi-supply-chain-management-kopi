<?php

    if(!isset($_GET['id'])) {
        header("location: ?page=data_supplier");
    }

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "select * from data_supplier where id= ". $id);

    if(mysqli_num_rows($sql) > 1) {
        header("location: ?page=data_supplier");
    }

    $data = mysqli_fetch_assoc($sql);

?>
<div class="panel panel-info">
	<div class="panel-heading">
		Update Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">
                       <input type="hidden" name="id" value="<?=$data['id']?>">
	  				<div class="form-group">
	    				<label>kode Supplier</label>
	    				<input class="form-control" name="kode_supplier" value="<?= $data['kode_supplier']; ?>" readonly />
	    			</div>


	  				<div class="form-group">
	    				<label>Nama Supplier</label>
	    				<input class="form-control" name="nama_supplier" value="<?= $data['nama_supplier']; ?>" />
	    			</div>

					
					<div class="form-group">
					<label>Alamat</label>
					<select class="form-control" name="alamat" >
						<option value="<?= $data['alamat']; ?>"><?= $data['alamat']; ?></option>
						<option value="Aceh">Aceh</option>
						<option value="Semarang">Semarang</option>
						<option value="Medan">Medan</option>
						<option value="Lampung">Lampung</option>
						<option value="Bandung">Bandung</option>
					</select>
					</div>

	    			<div class="form-group">
	    				<label>Telphone</label>
	    				<input class="form-control" type="number" name="telp" value="<?= $data['telp']; ?>" />
	    			</div>

	    			<div>
	    				<input type="submit" name="update" value="Update Data" class="btn btn-info">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['update'])) {

                        $id = $_POST['id'];
						$kode_supplier = $_POST['kode_supplier'];
						$nama_supplier = ucwords($_POST['nama_supplier']);
						$alamat = ucwords($_POST['alamat']);
						$telp = $_POST['telp'];

						if(empty($kode_supplier)) {
							echo "Kode Supplier Harus Diisi";
						}else if(empty($nama_supplier)) {
							echo "Nama Supplier Harus Diisi";
						}else if(empty($alamat)) {
							echo "alamat Harus Diisi";
						}else if(empty($telp)) {
							echo "Telepon Harus Diisi";
						}else{

                            $sql = mysqli_query($conn, "update data_supplier set kode_supplier = '$kode_supplier',
                                                        nama_supplier = '$nama_supplier', alamat = '$alamat', telp='$telp' 
                                                        where id =". $id);
							if($sql) {
								?> 
									<script type="text/javascript">
										alert("Data Berhasil DiUpdate");
										window.location.href="?page=data_supplier";
									</script>
								<?php
							}
						}
					}

	    		?>
	    	</div>
	    </div>
	</div>
</div>