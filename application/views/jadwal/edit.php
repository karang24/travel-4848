<?php echo validation_errors();?>
<?php echo $message;?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">Keberangkatan</label>
        <div class="col-lg-5">
            <input type="text" name="keberangkatan" class="form-control" value="<?php echo $jadwal['keberangkatan'];?>">
            <input type="hidden" name="id_jadwal" value="<?php echo $jadwal['id_jadwal'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Kendaraan</label>
        <div class="col-lg-5">
            <select name="nama_kendaraan" class="form-control">
                <option value="<?php echo $jadwal['nama_kendaraan'];?>"><?php echo $jadwal['nama_kendaraan'];?></option>
                <option value="Keramat Jati"> Keramat Jati</option>
                <option value="Pahala Kencana"> Pahala Kencana</option>
		<option value="Lorena"> Lorena</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tujuan</label>
        <div class="col-lg-5">
            <select name="tujuan" class="form-control">
                <option value="<?php echo $jadwal['tujuan'];?>"><?php echo $jadwal['tujuan'];?></option>
                <option value="Bandung">Bandung</option>
                <option value="Jakarta">Jakarta</option>
				<option value="Palembang">Palembang</option>
				<option value="Surabaya">Surabaya</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Jam Keberangkatan</label>
        <div class="col-lg-5">
            <input type="text" name="jam_keberangkatan" class="form-control" value="<?php echo $jadwal['jam_keberangkatan'];?>">
        </div>
    </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">Kelas</label>
        <div class="col-lg-5">
            <select name="kelas" class="form-control">
                <option value="<?php echo $jadwal['kelas'];?>"><?php echo $jadwal['kelas'];?></option>
                <option value="Eksekutf">Eksekutf</option>
                <option value="Ekonomi">Ekonomi</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"> Harga</label>
        <div class="col-lg-5">
            <input type="text" name="harga" class="form-control" value="<?php echo $jadwal['harga'];?>">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Update</button>
        <a href="<?php echo site_url('jadwal');?>" class="btn btn-default">Kembali</a>
    </div>
</form>