<div class="panel panel-danger">
    <div class="panel-heading">
    	Waktu Pemesanan
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
           	<thead>
                <tr>
                	<th style="text-align: center">No</th>
                	<th>Nama Supplier</th>
                	<th>Nama Produk</th>
                    <th style="text-align: center;">Harga Beli</th>
                	<th style="text-align: center;">Tanggal Pesan</th>
                	<th style="text-align: center;">Tanggal Terima</th>
                	<th style="text-align: center;">Jumlah</th>
                	<th style="text-align: center;">Total</th>
                </tr>
            </thead>
            <tbody>
            		<?php 

            			$no = 1;

            			$sql = mysqli_query($conn, "select * from pemesanan_bahan ");

            			while ($data = mysqli_fetch_assoc($sql)) {
                            @$tanggall = (date("d F Y",  strtotime($data['tanggal_pesan'])));
							@$total = ($data['harga_beli'] * $data['jumlah'] ) ;

							@$alamat = $data['alamat'];

							if($alamat == "Aceh") {
								
								
								@$tgldb	= $data['tanggal_pesan'];
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+1, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Semarang") {
								
								
								@$tgldb	= $data['tanggal_pesan'];
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+3, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Lampung") {
								
								
								@$tgldb	= $data['tanggal_pesan'];
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+2, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Medan") {
								
								
								@$tgldb	= $data['tanggal_pesan'];
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+1, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}else if($alamat == "Bandung") {
								
								
								@$tgldb	= $data['tanggal_pesan'];
								@$pecah = explode("-", $tgldb);
								@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
								@$pecah_terima = explode("-", $pp);
								@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+2, $pecah_terima[2]);
								@$hasile = date("d F Y", $hass);
								
							}
								
            		?>
            	<tr>
            		<td align="center"><?php echo $no++; ?></td>
            		<td><?php echo $data['nama_supplier']; ?></td>
            		<td><?php echo $data['nama_produk'] . "/" . $data['satuan']; ?></td>
            		<td align="center"><?php echo number_format($data['harga_beli']); ?></td>
            		<td align="center"><?php echo $tanggall; ?></td>
            		<td align="center"><?php echo $hasile; ?></td>
            		<td align="center"><?php echo $data['jumlah']; ?> Pcs</td>
            		<td align="center"><?php echo number_format($total); ?></td>
            	</tr>
            	<?php 

            		}

            	?>
                    </tbody>
                </table>
            </div>
    	</div>
	</div>
</div>