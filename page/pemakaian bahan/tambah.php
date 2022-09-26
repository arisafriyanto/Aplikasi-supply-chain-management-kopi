<div class="panel panel-info">
	<div class="panel-heading">
		Pakai
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">

	  				<div class="form-group">
	    				<label>Data Supplier & Data Produk</label>
	    				<select class="form-control" name="nama_supplier_produk" >
                            <?php

                                $sql = mysqli_query($conn, "select * from pemesanan_bahan order by nama_supplier asc ");

                                while ($data = mysqli_fetch_assoc($sql)) {
                                    echo "
                                        <option value='$data[id].$data[nama_supplier].$data[alamat].$data[nama_produk].$data[satuan].$data[harga_beli].$data[tanggal_pesan]'>
                                        $data[nama_supplier] | $data[alamat] | $data[nama_produk]/$data[satuan] | $data[harga_beli]
                                        </option>
                                        ";
                                }

                            ?>
	    				</select>
                    </div>


                    <div class="form-group">
	    				<label>Jumlah</label>
	    				<input class="form-control" type="number" name="jumlah" />
	    			</div>

	    			<div>
	    				<input type="submit" name="pakai" value="Pakai Bahan" class="btn btn-info">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['pakai'])) {

                        $nama_supplier_produk   = $_POST['nama_supplier_produk'];
                        $pecah_supplier_produk  = explode(".", $nama_supplier_produk);
                        $id_pemesanan          = $pecah_supplier_produk[0];
                        $nama_supplier          = $pecah_supplier_produk[1];
                        $nama_produk            = $pecah_supplier_produk[3];
                        $satuan                 = $pecah_supplier_produk[4];
                        $harga_beli             = $pecah_supplier_produk[5];
                        
                        
						$jumlah                 = $_POST['jumlah'];
						




						$sql = mysqli_query($conn, "select * from pemesanan_bahan where id='$id_pemesanan' ");
						while($row = mysqli_fetch_assoc($sql)) {
							@$acak = hash('sha256', $row['id']);
						}

                        
                        $queryy = mysqli_query($conn, "select * from pemesanan_bahan");
                        
            			while ($data = mysqli_fetch_assoc($queryy)) {
							
							@$alamat                 = $pecah_supplier_produk[2];
							@$tgldb             = $pecah_supplier_produk[6];


                            if($alamat == "Aceh") {
								
								
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+1, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Semarang") {
								
								
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+3, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Lampung") {
								
								
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+2, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Medan") {
								
								
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+1, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Bandung") {
								
								
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+2, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}

						}

                        
						$tgl = date("d F Y");





                        if($hasile > $tgl || $hasile < $tgldb) {
                            echo    "
                                        <script type='text/javascript'>
                                            alert('Produk Masih Dalam Proses Pengiriman!!');
                                        </script>
									";
									return false;
                        }else if(empty($jumlah)) {
                            echo    "
                                        <script type='text/javascript'>
                                            alert('Jumlah Harus Diisi!!');
                                        </script>
									";
									return false;
									
						}
						
						
						$sql = mysqli_query($conn, "select * from pemesanan_bahan where id='$id_pemesanan' ");
						while ($data = mysqli_fetch_assoc($sql)) {
							$sisa = $data['jumlah'];


							if($sisa < $jumlah) {
								?>
									<script type="text/javascript">
										alert("Stok Produk Kurang Dari Jumlah Yang Anda Minta ");
										window.location.href="?page=pemakaian_bahan&aksi=tambah";
									</script>
								<?php
							}else{

                            $query = mysqli_query($conn, "insert into pemakaian_bahan (id_pemesanan, nama_supplier, alamat, nama_produk, satuan, harga_beli, jumlah_pakai)
							values ('$acak', '$nama_supplier', '$alamat', '$nama_produk', '$satuan', '$harga_beli', '$jumlah') ");

							$sqll = mysqli_query($conn, "update pemesanan_bahan set id_pemesanan='$acak', pakai='$jumlah' where id= ".$id_pemesanan);

								?> 
                                    <script type="text/javascript">
                                        alert("Pakai Berhasil!!");
                                        window.location.href="?page=pemakaian_bahan";
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