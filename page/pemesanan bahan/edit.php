<?php

    if(!isset($_GET['id'])) {
        header("location: ?page=pemesanan_bahan");
    }

    $id = $_GET['id'];

    $mysqli = mysqli_query($conn, "select * from pemesanan_bahan where id= ". $id);

    if(mysqli_num_rows($mysqli) > 1) {
        header("location: ?page=pemesanan_bahan");
    }

    $row = mysqli_fetch_assoc($mysqli);

    $id_pemes = $row['id_pemesanan'];


?>
<div class="panel panel-danger">
	<div class="panel-heading">
		Update Pesanan
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
	   			<form role="form" action="" method="post">
                    <input type="hidden" name="id" value="<?=$row['id']?>">

                    <div class="form-group">
	    				<label>Nama Supplier</label>
	    				<select class="form-control" name="nama_supplier" >
                            <?php
                            echo "
                            <option value='$row[kode_supplier].$row[nama_supplier].$row[alamat]'>
                                $row[kode_supplier] | $row[nama_supplier] | $row[alamat]
                            </option>
                            ";

                            ?>

                            <?php

                                $sql = mysqli_query($conn, "select * from data_supplier order by nama_supplier asc ");

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
                            echo "
                            <option value='$row[nama_produk].$row[satuan].$row[harga_beli]'>
                                $row[nama_produk]/$row[satuan] | $row[harga_beli]
                            </option>
                            ";
                            ?>

                            <?php

                                $sql = mysqli_query($conn, "select * from data_bahan order by nama_bahan asc ");

                                while ($data = mysqli_fetch_assoc($sql)) {
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
	    				<input class="form-control" type="number" name="jumlah" value="<?=$row['jumlah']?>" />
	    			</div>

	    			<div class="form-group">
	    				<label>Tanggal Pesan</label>
	    				<input class="form-control" type="date" name="tanggal_pesan" value="<?=$row['tanggal_pesan']?>" />
                    </div>

	    			<div>
	    				<input type="submit" name="pesan" value="Update Pesan" class="btn btn-danger">
	    			</div>
	    		</form>

				<?php 
				
					if(isset($_POST['pesan'])) {

                        $id = $_GET['id'];
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
                            return false;
                        }else if(empty($tanggal_pesan)) {
                            echo "Tanggal Harus Diisi";
                            return false;
                        }else{

                            $query = mysqli_query($conn, "update pemesanan_bahan set
                            kode_supplier = '$kode_supplier', nama_supplier = '$name_supplier', alamat = '$alamat', 
                            nama_produk = '$nama_bahan', satuan = '$satuan', harga_beli = '$harga_beli', jumlah = '$jumlah',
                            tanggal_pesan = '$tanggal_pesan' where id= ". $id);













                            $queryy = mysqli_query($conn, "select * from pemesanan_bahan");
                        
            			while ($data = mysqli_fetch_assoc($queryy)) {
                            $iud= $data['id'];

							
							@$alamat                 = $data['alamat'];
                            


                            if($alamat == "Aceh") {
								
								
								@$pecah = explode("-", $tanggal_pesan);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+1, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Semarang") {
								
								
								@$pecah = explode("-", $tanggal_pesan);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+3, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Lampung") {
								
								
								@$pecah = explode("-", $tanggal_pesan);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+2, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Medan") {
								
								
								@$pecah = explode("-", $tanggal_pesan);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+1, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Bandung") {
								
								
								@$pecah = explode("-", $tanggal_pesan);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+2, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}

						}

                        $tgl = date("d F Y");
                       

                        if($hasile > $tgl || $hasile < $tanggal_pesan) {

                            @$terima = 0;
                            @$belum = 1;
                            $query = mysqli_query($conn, "update pemesanan_bahan set terima = '$terima', belum='$belum' where id= ".$id);
                            
                        }else{
                            @$terimak = 1;
                            @$belume = 0;
                            $query = mysqli_query($conn, "update pemesanan_bahan set terima = '$terimak', belum = '$belume' where id= ".$id);



                        }


                            
                            
                            
                            
                            
                            
                            
                            











                            $sqlll = mysqli_query($conn, "update pemakaian_bahan set
                            nama_supplier = '$name_supplier', alamat = '$alamat',
                            nama_produk = '$nama_bahan', satuan = '$satuan', harga_beli = '$harga_beli' where id_pemesanan='$id_pemes' ");








                                ?> 
                                    <script type="text/javascript">
                                        alert("Update Pesan Berhasil!!");
                                        window.location.href="?page=pemesanan_bahan";
                                    </script>
                                <?php
                        }

                    }
	    		?>
	    	</div>
	    </div>
	</div>
</div>