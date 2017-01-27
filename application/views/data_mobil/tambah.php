<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Flat No Travel</label>
        <div class="col-lg-5">
            <input type="text" name="flat_travel" placeholder="Flat No jangan di pisah contoh : BG-5454-CD" class="form-control">
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Nama Travel</label>
        <div class="col-lg-5">
            <input type="text" name="nama_travel" class="form-control">
        </div>
    </div>    
    <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Travel</label>
        <div class="col-lg-5">
            <input type="text" name="jenis_travel" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Keterangan</label>
        <div class="col-lg-10">
            <textarea name="keterangan"></textarea>
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Jumlah Kursi</label>
        <div class="col-lg-5">
            <input type="text" name="jumlah_kursi" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Gambar Travel</label>
        <div class="col-lg-5">
            <input type="file" name="gambar">
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('c_mobil');?>" class="btn btn-default">Kembali</a>
    </div>
</form>