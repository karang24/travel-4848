<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('web/cari_dt');?>" method="post">
        <div class="form-group">
            <label>Cari Nama Travel</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Gambar Travel</td>
            <td>Flat No.Travel</td>
            <td>Nama Travel</td>
            <td>Jenis Travel</td>
            <td>Keterangan</td>
			<td>Jumlah Kursi</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($travel as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><img src="<?php echo base_url('assets/images_travel/'.$row->image);?>" height="100px" width="100px"></td>
        <td><?php echo $row->flat_travel;?></td>
        <td><?php echo $row->nama_travel;?></td>
        <td><?php echo $row->jenis_travel;?></td>
        <td><?php echo $row->keterangan;?></td>
		<td><?php echo $row->jumlah_kursi;?></td>
    </tr>
    <?php endforeach;?>
</Table>