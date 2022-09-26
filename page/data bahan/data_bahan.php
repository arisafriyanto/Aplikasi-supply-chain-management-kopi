<a href="?page=data_bahan&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"> Tambah Data</i></a>

<div class="panel panel-success">
    <div class="panel-heading">
    	Data Bahan
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
           	<thead>
                <tr>
                	<th>No</th>
                	<th>kode Bahan</th>
                	<th>Nama Produk</th>
                	<th style="text-align: center;">Satuan</th>
               	 	<th style="text-align: center;">Harga Beli</th>
               		<th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            		<?php 

            			$no = 1;

            			$sql = mysqli_query($conn, "select * from data_bahan ");

            			while ($data = mysqli_fetch_assoc($sql)) {
            				

            		?>
            	<tr>
            		<td><?php echo $no++; ?></td>
            		<td><?php echo $data['kode_bahan']; ?></td>
            		<td><?php echo $data['nama_bahan']; ?></td>
            		<td align="center"><?php echo $data['satuan']; ?></td>
            		<td align="center"><?php echo number_format($data['harga_beli']); ?></td>
            		<td align="center">
            			<a href="?page=data_bahan&aksi=edit&id=<?=$data['id']?>" class="btn btn-default">
                            <i class=" fa fa-refresh "></i> Update
                        </a>
            			<a href="?page=data_bahan&aksi=hapus&id=<?=$data['id']?>" class="btn btn-danger">
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