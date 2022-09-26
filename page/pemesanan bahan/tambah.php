<div class="panel panel-danger">
	<div class="panel-heading">
		Pesan
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">

	  				<div class="form-group">
	    				<label>Nama Supplier</label>
	    				<select class="form-control" name="nama_supplier" >
                            <?php

                                $sql = mysqli_query($conn, "select * from data_supplier order by kode_supplier asc ");

                                while ($data = mysqli_fetch_assoc($sql)) {
                                    echo "
                                        <option value='$data[kode_supplier].$data[nama_supplier].$data[alamat]'>
                                        $data[kode_supplier] | $data[nama_supplier] | $data[alamat]
                                        </option>
                                        ";
                                }

                            ?>
	    				</select>
                    </div>

	  				<div class="form-group">
	    				<label>Nama Produk</label>
	    				<select class="form-control" name="nama_produk" >
                            <?php

                                $db = mysqli_query($conn, "select * from data_bahan order by nama_bahan asc ");

                                while ($data = mysqli_fetch_assoc($db)) {
                                    echo "
                                        <option value='$data[nama_bahan].$data[satuan].$data[harga_beli]'>
                                            $data[nama_bahan]/$data[satuan] | $data[harga_beli]
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

	    			<div class="form-group">
	    				<label>Tanggal Pesan</label>
	    				<input class="form-control" type="date" name="tanggal_pesan" />
	    			</div>

	    			<div>
	    				<input type="submit" name="pesan" value="Pesan Bahan" class="btn btn-danger">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['pesan'])) {

                        $nama_supplier  = $_POST['nama_supplier'];
                        $pecah_supplier = explode(".", $nama_supplier);
                        $kode_supplier  = $pecah_supplier[0];
                        $name_supplier  = $pecah_supplier[1];
                        $alamat         = $pecah_supplier[2];

                        $nama_produk    = $_POST['nama_produk'];
                        $pecah_produk   = explode(".", $nama_produk);
                        $nama_bahan     = $pecah_produk[0];
                        $satuan         = $pecah_produk[1];
                        $harga_beli     = $pecah_produk[2];


                        $jumlah         = $_POST['jumlah'];
                        $tanggal_pesan  = $_POST['tanggal_pesan'];







                        if(empty($jumlah)) {
                            echo "Jumlah Harus Diisi";
                        }else if(empty($tanggal_pesan)) {
                            echo "Tanggal Harus Diisi";
                        }else{

                            $query = mysqli_query($conn, "insert into pemesanan_bahan (id_pemesanan, kode_supplier, nama_supplier, alamat, nama_produk, satuan, harga_beli, jumlah, tanggal_pesan, terima, belum, pakai)
                            values ('', '$kode_supplier', '$name_supplier', '$alamat', '$nama_bahan', '$satuan', '$harga_beli', '$jumlah', '$tanggal_pesan', 0, 0, 0) ");










                            $queryy = mysqli_query($conn, "select * from pemesanan_bahan");
                        
            			while ($data = mysqli_fetch_assoc($queryy)) {
                            $id= $data['id'];
							
							@$alamat                 = $data['alamat'];
                            @$tgldb             = $data['tanggal_pesan'];
                            


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

                            @$belum = 0;
                            $query = mysqli_query($conn, "update pemesanan_bahan set belum = '$belum' where id= ".$id);

                        }else{
                            @$terima = 1;
                            $query = mysqli_query($conn, "update pemesanan_bahan set terima = '$terima' where id= ".$id);


                        }


                            
                            
                            
                            
                            
                            
                            
                            
                            









                            if($query) {
                                ?> 
                                    <script type="text/javascript">
                                        alert("Pesan Berhasil!!");
                                        window.location.href="?page=pemesanan_bahan";
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