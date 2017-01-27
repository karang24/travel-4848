<?php echo validation_errors();?>
<?php echo $message;?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-lg-2 control-label">Keberangkatan</label>
        <div class="col-lg-5">
            <input type="text" name="keberangkatan" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Kendaraan</label>
        <div class="col-lg-5">
            <select name="nama_kendaraan" class="form-control">
                <option value="">--Silakan Pilih--</option>
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
                <option value="">--Silakan Pilih--</option>
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
            <input type="text" name="jam_keberangkatan" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kelas</label>
        <div class="col-lg-5">
            <select name="kelas" class="form-control">></option>
                <option value="">--Silakan Pilih--</option>
                <option value="Eksekutf">Eksekutf</option>
                <option value="Ekonomi">Ekonomi</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"> Harga</label>
        <div class="col-lg-5">
            <input type="text" name="harga" class="form-control" value="Rp.">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('jadwal');?>" class="btn btn-default">Kembali</a>
    </div>
</form>