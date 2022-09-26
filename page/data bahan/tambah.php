<?php

    $result = mysqli_query($conn, "select max(kode_bahan) from data_bahan ");
    $datakode = mysqli_fetch_array($result, MYSQLI_NUM);

    if($datakode) {
        $nilaikode = substr($datakode[0], 1);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "B" . str_pad($kode, 4, "0", STR_PAD_LEFT);
    }else{
        $hasilkode = "B0001";
    }

?>
<div class="panel panel-success">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">
	  				<div class="form-group">
	    				<label>kode Bahan</label>
	    				<input class="form-control" name="kode_bahan" value="<?= $hasilkode; ?>" readonly />
	    			</div>


	  				<div class="form-group">
	    				<label>Nama Produk</label>
	    				<input class="form-control" name="nama_produk" />
	    			</div>

	  				<div class="form-group">
	    				<label>Satuan</label>
	    				<select class="form-control" name="satuan" >
                            <option value="kg">Kg</option>
                            <option value="buah">Buah</option>
                            <option value="bungkus">Bungkus</option>
                            <option value="karung">Karung</option>
                            <option value="botol">Botol</option>
	    				</select>
	    			</div>

                    <div class="form-group">
	    				<label>Harga Beli</label>
	    				<input class="form-control" type="number" name="harga_beli" />
	    			</div>

	    			<div>
	    				<input type="submit" name="tambah" value="Tambah Data" class="btn btn-success">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['tambah'])) {

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

							$sql = mysqli_query($conn, "INSERT INTO data_bahan (kode_bahan, nama_bahan, satuan, harga_beli) 
							VALUES ('$kode_bahan', '$nama_produk', '$satuan', '$harga_beli')");
							if($sql) {
								?> 
									<script type="text/javascript">
										alert("Data Berhasil Ditambah");
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