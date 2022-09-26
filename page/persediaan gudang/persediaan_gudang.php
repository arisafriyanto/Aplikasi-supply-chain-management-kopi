<div class="panel panel-danger">
    <div class="panel-heading">
    	Persediaan Gudang
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
           	<thead>
                <tr>
                	<th style="text-align: center">No</th>
                	<th>Nama Produk</th>
                	<th style="text-align: center;">Tanggal Pesan</th>
                	<th style="text-align: center;">Expayer</th>
                	<th style="text-align: center;">Stok Awal</th>
                    <th style="text-align: center;">Terpakai</th>
                    <th style="text-align: center;">Stok Akhir</th>
                </tr>
            </thead>
            <tbody>
					<?php

						$no = 1;
						

						$sql = mysqli_query($conn, "select * from pemesanan_bahan where terima=1 ");


						
            			while ($data = mysqli_fetch_assoc($sql)) {

							$id = $data['id'];
                            @$tanggall = (date("d F Y",  strtotime($data['tanggal_pesan'])));
							@$total = ($data['harga_beli'] * $data['jumlah'] ) ;
							
							@$tgldb	= $data['tanggal_pesan'];
							@$pecah = explode("-", $tgldb);
							@$pp 	= $pecah[2]."-".$pecah[1]."-".$pecah[0];
							@$pecah_terima = explode("-", $pp);
							@$hass = mktime(0,0,0,$pecah_terima[1], $pecah_terima[0]+365, $pecah_terima[2]);
							@$expayer = date("d F Y", $hass);
							@$awal = $data['jumlah'];
							@$pakai = $data['pakai'];
							@$akhir = ($awal - $pakai);


								
            				

            		?>
            	<tr>
            		<td align="center"><?php echo $no++; ?></td>
            		<td><?php echo $data['nama_produk'] ."/" . $data['satuan']; ?></td>
            		<td align="center"><?php echo $tanggall; ?></td>
            		<td align="center"><?php echo $expayer; ?></td>
            		<td align="center"><?php echo $data['jumlah']; ?> Pcs</td>
            		<td align="center"><?php echo $data['pakai']; ?> Pcs</td>
            		<td align="center"><?php echo $akhir; ?> Pcs</td>
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