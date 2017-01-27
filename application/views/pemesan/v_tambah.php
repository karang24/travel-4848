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
            <input type="text" name="harga" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kursi</label>
        <div class="col-lg-5">
            <select name="kursi" class="form-control">
                  <option value="">--Silakan Pilih--</option>
                  <option value="nomor 1" onclick="add_person()">Nomor 1</option>
                  <option value="nomor 2" onclick="add_person()">Nomor 2</option>
                  <option value="nomor 3" onclick="add_person()">Nomor 3</option>
                  <option value="nomor 4" onclick="add_person()">Nomor 4</option>
                  <option value="nomor 5" onclick="add_person()">Nomor 5</option>
                  <option value="nomor 6" onclick="add_person()">Nomor 6</option>
                  <option value="nomor 7" onclick="add_person()">Nomor 7</option>
                  <option value="nomor 8" onclick="add_person()">Nomor 8</option>
                  <option value="nomor 9" onclick="add_person()">Nomor 9</option>
                  <option value="nomor 10" onclick="add_person()">Nomor 10</option>
                  <option value="nomor 11" onclick="add_person()">Nomor 11</option>
                  <option value="nomor 12" onclick="add_person()">Nomor 12</option>
                  <option value="nomor 13" onclick="add_person()">Nomor 13</option>
                  <option value="nomor 14" onclick="add_person()">Nomor 14</option> 
                  <option value="nomor 15" onclick="add_person()">Nomor 15</option>
                  <option value="nomor 16" onclick="add_person()">Nomor 16</option>
                  <option value="nomor 17" onclick="add_person()">Nomor 17</option>
                  <option value="nomor 18" onclick="add_person()">Nomor 18</option>
                  <option value="nomor 19" onclick="add_person()">Nomor 19</option>
                  <option value="nomor 20" onclick="add_person()">Nomor 20</option>
                  <option value="nomor 21" onclick="add_person()">Nomor 21</option>
                  <option value="nomor 22" onclick="add_person()">Nomor 22</option>
                  <option value="nomor 23" onclick="add_person()">Nomor 23</option>
                  <option value="nomor 24" onclick="add_person()">Nomor 24</option>
                  <option value="nomor 25" onclick="add_person()">Nomor 25</option>
            </select>
        </div>
    </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('jadwal');?>" class="btn btn-default">Kembali</a>
    </div>
</form>