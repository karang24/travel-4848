<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('c_pemesan/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Tujuan</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
			<th>Alamat</th>
			<th>E-mail</th>
            <th>Kendaraan</th>
            <th>Tujuan</th>
            <th>Jam Berangkat</th>
            <th>Kelas</th>
			<th>Status Pembayaran</th>
            <th>Harga</th>
			<th>No.Kursi</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <?php $no=0; foreach($pemesan as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->nama_lengkap;?></td>
		<td><?php echo $row->alamat;?></td>
		<td><?php echo $row->email;?></td>
        <td><?php echo $row->nama_kendaraan;?></td>
        <td><?php echo $row->tujuan;?></td>
        <td><?php echo $row->jam_keberangkatan;?></td>
        <td><?php echo $row->kelas;?></td>
		<td><?php echo $row->status;?></td>
        <td><?php echo $row->harga;?></td>
		<td><?php echo $row->no_kursi;?></td>
		<form action="<?php echo site_url('c_pemesan/edit/'.$row->id_pemesan);?>">
		<td><select name="status" onChange="this.form.submit()">
				<option value="Belum Bayar">-</option>
				<option value="Sudah Bayar">Y</option>
            </select></td>
        </form>
		<td><a href="<?php echo site_url('c_pemesan/hapus/'.$row->id_pemesan);?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>