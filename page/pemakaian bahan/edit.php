<?php

    if(!isset($_GET['id'])) {
        header("location: ?page=pemakaian_bahan");
    }

    $id = $_GET['id'];

    $mysqli = mysqli_query($conn, "select * from pemakaian_bahan where id= ". $id);

    if(mysqli_num_rows($mysqli) > 1) {
        header("location: ?page=pemakaian_bahan");
    }

    $row = mysqli_fetch_assoc($mysqli);

?>
<div class="panel panel-info">
	<div class="panel-heading">
		Update Pakai
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">

	  				<div class="form-group">
	    				<label>Data Supplier & Data Produk</label>
	    				<select class="form-control" name="nama_supplier_produk" >
                            <?php
                                    echo "
                                        <option value='$row[id].$row[nama_supplier].$row[alamat].$row[nama_produk].$row[satuan].$row[harga_beli]'>
                                        $row[nama_supplier] | $row[alamat] | $row[nama_produk]/$row[satuan] | $row[harga_beli]
                                        </option>
                                        ";

                            ?>
	    				</select>
                    </div>                    

                    <div class="form-group">
	    				<label>Jumlah</label>
	    				<input class="form-control" type="number" name="jumlah" value="<?=$row['jumlah_pakai']?>" />
	    			</div>

	    			<div>
	    				<input type="submit" name="updatepakai" value="Update Pakai" class="btn btn-info">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['updatepakai'])) {

                        $nama_supplier_produk   = $_POST['nama_supplier_produk'];
                        $pecah_supplier_produk  = explode(".", $nama_supplier_produk);
                        $id_pakai          = $pecah_supplier_produk[0];
                        $nama_supplier          = $pecah_supplier_produk[1];
                        $alamat                 = $pecah_supplier_produk[2];
                        $nama_produk            = $pecah_supplier_produk[3];
                        $satuan                 = $pecah_supplier_produk[4];
                        $harga_beli             = $pecah_supplier_produk[5];
                        
                        
                        $jumlah                 = $_POST['jumlah'];
                        						
						
						$sql = mysqli_query($conn, "select * from pemesanan_bahan where alamat='$alamat' ");
						while ($data = mysqli_fetch_assoc($sql)) {
                            $sisa = $data['jumlah'];

                            $id_pemesanan = $data['id'];


							if($sisa < $jumlah) {
								?>
									<script type="text/javascript">
										alert("Stok Produk Kurang Dari Jumlah Yang Anda Minta ");
										window.location.href="?page=pemakaian_bahan&aksi=edit";
									</script>
                                <?php
									return false;                                
							}else{

                            $query = mysqli_query($conn, "update pemakaian_bahan set nama_supplier = '$nama_supplier', alamat = '$alamat',
                                    nama_produk = '$nama_produk', satuan = '$satuan', harga_beli = '$harga_beli', jumlah_pakai = '$jumlah' where id= ".$id_pakai);

							$sqll = mysqli_query($conn, "update pemesanan_bahan set pakai='$jumlah' where id= ".$id_pemesanan);
                            
							
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