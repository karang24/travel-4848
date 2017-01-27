<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('jadwal/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Tujuan</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('jadwal/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>Keberangkatan</th>
            <th>Nama Kendaraan</th>
            <th>Tujuan</th>
            <th>Jam Berangkat</th>
            <th>Kelas</th>
            <th>Harga</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <?php $no=0; foreach($jadwal as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->keberangkatan;?></td>
        <td><?php echo $row->nama_kendaraan;?></td>
        <td><?php echo $row->tujuan;?></td>
        <td><?php echo $row->jam_keberangkatan;?></td>
        <td><?php echo $row->kelas;?></td>
        <td><?php echo $row->harga;?></td>
        <td><a href="<?php echo site_url('jadwal/edit/'.$row->id_jadwal);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="<?php echo site_url('jadwal/hapus/'.$row->id_jadwal);?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>