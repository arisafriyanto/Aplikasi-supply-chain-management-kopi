<?php

    if(!isset($_GET['id'])) {
        header("Location: ?page=data_bahan");
    }

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "select * from data_bahan where id=". $id);

    if(mysqli_num_rows($sql) < 1 ) {
        header("Location: ?page=data_bahan");
    }

    $data = mysqli_fetch_assoc($sql);

?>

<div class="panel panel-success">
	<div class="panel-heading">
		Update Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">
                       <input type="hidden" name="id" value="<?=$data['id']?>">
	  				<div class="form-group">
	    				<label>kode Bahan</label>
	    				<input class="form-control" name="kode_bahan" value="<?= $data['kode_bahan']; ?>" readonly />
	    			</div>


	  				<div class="form-group">
	    				<label>Nama Produk</label>
	    				<input class="form-control" name="nama_produk" value="<?= $data['nama_bahan']; ?>" />
	    			</div>

	  				<div class="form-group">
	    				<label>Satuan</label>
	    				<select class="form-control" name="satuan" >
                            <option value="<?=$data['satuan'];?>"><?=$data['satuan'];?></option>
                            <option value="kg">Kg</option>
                            <option value="buah">Buah</option>
                            <option value="bungkus">Bungkus</option>
                            <option value="karung">Karung</option>
                            <option value="botol">Botol</option>
	    				</select>
	    			</div>

                    <div class="form-group">
	    				<label>Harga Beli</label>
	    				<input class="form-control" type="number" name="harga_beli" value="<?=$data['harga_beli'];?>" />
	    			</div>

	    			<div>
	    				<input type="submit" name="update" value="Update Data" class="btn btn-success">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['update'])) {
                        $id = $_POST['id'];
						$kode_bahan = $_POST['kode_bahan'];
						$nama_produk = ucwords($_POST['nama_produk']);
						$satuan = $_POST['satuan'];
						$harga_beli = $_POST['harga_beli'];

						if(empty($kode_bahan)) {
							echo "Kode Bahan Harus Diisi";
						}else if(empty($nama_produk)) {
							echo "Nama Produk Harus Diisi";
						}else if(empty($satuan)) {
							echo "Satuan Harus Diisi";
						}else if(empty($harga_beli)) {
							echo "Harga Beli Harus Diisi";
						}else{

                            $sql = mysqli_query($conn, "update data_bahan set kode_bahan='$kode_bahan', nama_bahan = '$nama_produk',
                                                        satuan= '$satuan', harga_beli= '$harga_beli' where id= ". $id);
							if($sql) {
								?> 
									<script type="text/javascript">
										alert("Data Berhasil DiUpdate");
										window.location.href="?page=data_bahan";
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