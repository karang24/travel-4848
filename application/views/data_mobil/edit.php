<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Flat No.Travel</label>
        <div class="col-lg-5">
            <input type="text" name="flat_travel" class="form-control" value="<?php echo $travel['flat_travel'];?>" readonly="readonly">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Travel</label>
        <div class="col-lg-5">
            <input type="text" name="nama_travel" class="form-control" value="<?php echo $travel['nama_travel'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Travel</label>
        <div class="col-lg-5">
            <input type="text" name="jenis_travel" class="form-control" value="<?php echo $travel['jenis_travel'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Keterangan</label>
        <div class="col-lg-10">
            <textarea name="keterangan"><?php echo $travel['keterangan'];?></textarea>
        </div>
    </div>
	<div class="form-group">
        <label class="col-lg-2 control-label">Jumlah Kursi</label>
        <div class="col-lg-5">
            <input type="text" name="jumlah_kursi" class="form-control" value="<?php echo $travel['jumlah_kursi'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Gambar Travel</label>
        <div class="col-lg-10">
            <img src="<?php echo base_url('assets/images_travel/'.$travel['image']);?>" height="200px" width="200px">
        </div>
    </div>    
    <div class="form-group">
        <label class="col-lg-2 control-label"></label>
        <div class="col-lg-5">
            <input type="file" name="gambar">
        </div>
    </div> 
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('c_mobil');?>" class="btn btn-default">Kembali</a>
    </div>
</form>