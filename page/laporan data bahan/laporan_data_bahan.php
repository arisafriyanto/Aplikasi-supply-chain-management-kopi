<a href="./laporan/pdf/cetak.php" target="blank" class="btn btn-success" style="margin-bottom: 5px;">
    <i class="fa fa-print "> Cetak</i>
</a>

<div class="panel panel-success">
    <div class="panel-heading">
    	Laporan Data Bahan
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
            				

            		?>
            	<tr>
            		<td align="center"><?php echo $no++; ?></td>
            		<td><?php echo $data['nama_supplier']; ?></td>
            		<td><?php echo $data['nama_produk']. "/" .$data['satuan']; ?></td>
            		<td align="center"><?php echo number_format($data['harga_beli']); ?></td>
            		<td align="center"><?php echo $tanggall; ?></td>
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