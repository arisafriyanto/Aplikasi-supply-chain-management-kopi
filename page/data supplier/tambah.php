<?php

    $result = mysqli_query($conn, "select max(kode_supplier) from data_supplier ");
    $datakode = mysqli_fetch_array($result, MYSQLI_NUM);

    if($datakode) {
        $nilaikode = substr($datakode[0], 1);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "S" . str_pad($kode, 4, "0", STR_PAD_LEFT);
    }else{
        $hasilkode = "S0001";
    }

?>
<div class="panel panel-info">
	<div class="panel-heading">
		Tambah Data
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">
	  				<div class="form-group">
	    				<label>kode Supplier</label>
	    				<input class="form-control" name="kode_supplier" value="<?= $hasilkode; ?>" readonly />
	    			</div>


	  				<div class="form-group">
	    				<label>Nama Supplier</label>
	    				<input class="form-control" name="nama_supplier" />
	    			</div>

					<div class="form-group">
					<label>Alamat</label>
					<select class="form-control" name="alamat" >
						<option value="Aceh">Aceh</option>
						<option value="Semarang">Semarang</option>
						<option value="Medan">Medan</option>
						<option value="Lampung">Lampung</option>
						<option value="Bandung">Bandung</option>
					</select>
					</div>

	    			<div class="form-group">
	    				<label>Telphone</label>
	    				<input class="form-control" type="number" name="telp" />
	    			</div>

	    			<div>
	    				<input type="submit" name="tambah" value="Tambah Data" class="btn btn-info">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['tambah'])) {

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

							$sql = mysqli_query($conn, "INSERT INTO data_supplier (kode_supplier, nama_supplier, alamat, telp) 
							VALUES ('$kode_supplier', '$nama_supplier', '$alamat', '$telp')");
							if($sql) {
								?> 
									<script type="text/javascript">
										alert("Data Berhasil Ditambah");
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