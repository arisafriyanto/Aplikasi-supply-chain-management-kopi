<a href="?page=pemakaian_bahan&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px;"><i class="fa fa-plus"> Pakai</i></a>

<div class="panel panel-info">
    <div class="panel-heading">
    	Pemakaian Bahan
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
           	<thead>
                <tr>
                	<th style="text-align: center">No</th>
                	<th>Nama Supplier</th>
                	<th>Nama Produk</th>
                    <th style="text-align: center;">Harga Pakai</th>
                	<th style="text-align: center;">Jumlah Pakai</th>
               		<th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            		<?php 

            			$no = 1;

            			$sql = mysqli_query($conn, "select * from pemakaian_bahan ");

            			while ($data = mysqli_fetch_assoc($sql)) {
                            @$tanggall = (date("d F Y",  strtotime($data['tanggal_pesan'])));
            				

            		?>
            	<tr>
            		<td align="center"><?php echo $no++; ?></td>
            		<td><?php echo $data['nama_supplier']; ?></td>
            		<td><?php echo $data['nama_produk'] . "/" . $data['satuan']; ?></td>
            		<td align="center"><?php echo number_format($data['harga_beli'] + 2000); ?></td>
            		<td align="center"><?php echo $data['jumlah_pakai']; ?> Pcs</td>
            		<td align="center">
            			<a href="?page=pemakaian_bahan&aksi=edit&id=<?=$data['id']?>" class="btn btn-default">
                            <i class=" fa fa-refresh "></i> Update
                        </a>
            			<a href="?page=pemakaian_bahan&aksi=hapus&id=<?=$data['id']?>&id_pemesanan=<?=$data['id_pemesanan']?>" class="btn btn-danger">
                            <i class="fa fa-pencil"></i> Delete
                        </a>
            		</td>
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