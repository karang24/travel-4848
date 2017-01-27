<?php echo $message;?>
<?php echo validation_errors();?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label class="col-lg-3 control-label">Username</label>
        <div class="col-lg-5">
            <input type="hidden" name="id" value="<?php echo $pengguna['user_id'];?>">
            <input type="text" name="user" value="<?php echo $pengguna['user'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-3 control-label">Password</label>
        <div class="col-lg-5">
            <input type="password" name="password" value="<?php echo $pengguna['password'];?>" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <div class="col-lg-5">
            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            <a href="<?php echo site_url('dashboard/pengguna');?>" class="btn btn-default">Kembali</a>
        </div>
    </div>
</form>