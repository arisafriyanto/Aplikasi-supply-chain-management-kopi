<a href="?page=data_supplier&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px;"><i class="fa fa-plus"> Tambah Data</i></a>

<div class="panel panel-info">
    <div class="panel-heading">
    	Data Supplier
    </div>
    <div class="panel-body">
    <div class="table-responsive">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
           	<thead>
                <tr>
                	<th style="text-align: center">No</th>
                	<th>kode Supplier</th>
                	<th>Nama Supplier</th>
                	<th style="text-align: center;">Alamat</th>
               	 	<th style="text-align: center;">Telp</th>
               		<th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            		<?php 

            			$no = 1;

            			$sql = mysqli_query($conn, "select * from data_supplier ");

            			while ($data = mysqli_fetch_assoc($sql)) {
            				

            		?>
            	<tr>
            		<td align="center"><?php echo $no++; ?></td>
            		<td><?php echo $data['kode_supplier']; ?></td>
            		<td><?php echo $data['nama_supplier']; ?></td>
            		<td align="center"><?php echo $data['alamat']; ?></td>
            		<td align="center"><?php echo $data['telp']; ?></td>
            		<td align="center">
            			<a href="?page=data_supplier&aksi=edit&id=<?=$data['id']?>" class="btn btn-default">
                            <i class=" fa fa-refresh "></i> Update
                        </a>
            			<a href="?page=data_supplier&aksi=hapus&id=<?=$data['id']?>" class="btn btn-danger">
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