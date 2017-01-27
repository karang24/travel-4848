<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('web/cari_jadwal');?>" method="post">
        <div class="form-group">
            <label>Cari Tujuan</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<button class="btn btn-primary" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Order Now</button>
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
        <th colspan="2"></td>
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
    </tr>
    <?php endforeach;?>
</Table>

  <script type="text/javascript">
    
    function add_person()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Input Data'); // Set Title to Bootstrap modal title
    }
    $(function () {        
	$("#kode").autocomplete({    //id kode sebagai key autocomplete yang akan dibawa ke source url
	minLength:0,            
	delay:0, 
           
	source:'<?php echo site_url('web/get_all'); ?>',   //nama source kita ambil langsung memangil fungsi get_allkota
            
	select:function(event, ui){                
		$('#nama_kendaraan').val(ui.item.nama_kendaraan);
		$('#jam_keberangkatan').val(ui.item.jam_keberangkatan);
		$('#kelas').val(ui.item.kelas);
		$('#harga').val(ui.item.harga);
		}
	});       
}); 
  </script>
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Person Form</h3>
      </div>
      <div class="modal-body form">
	<form class="form-horizontal" id="form" action="tambah" method="post" enctype="multipart/form-data">
    <div class="form-body">
			<div class="form-group">
              <label class="control-label col-md-3">Kota Tujuan</label>
              <div class="col-md-9">
                <input name="tujuan" id="kode" placeholder="Ketikan nama kota" class="form-control">
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">Keberangkatan</label>
              <div class="col-md-9">
                <select name="keberangkatan" placeholder="Keberangkatan" class="form-control" type="text">
				<option value="bandung">Bandung</option>
				<option value="Tasikmalaya">Tasikmalaya</option>
				<option value="Ciamis">Ciamis</option>
				</select>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">Nama Kendaraan</label>
              <div class="col-md-9">
                <input name="nama_kendaraan"  id="nama_kendaraan" placeholder="Nama Kendaraan" class="form-control" type="text" readonly>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">Jam Berangkat</label>
              <div class="col-md-9">
                <input name="jam_keberangkatan"  id="jam_keberangkatan" placeholder="Jam Berangkat" class="form-control" type="text" readonly>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">Kelas</label>
              <div class="col-md-9">
                <input name="kelas"  id="kelas" placeholder="Kelas" class="form-control" type="text" readonly>
              </div>
            </div>
			<div class="form-group">
              <label class="control-label col-md-3">Harga</label>
              <div class="col-md-9">
                <input name="harga"  id="harga" placeholder="Harga" class="form-control" type="text" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-9">
                <input name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" >Alamat Lengkap</label>
              <div class="col-md-9">
                <textarea name="alamat" placeholder="Alamat Lengkap"class="form-control" ></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-9">
                  <input name="email" placeholder="email" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">No.Kursi</label>
              <div class="col-md-9">
                <select name="no_kursi" class="form-control">
                    <option>--Pilih Kursi--</option>
                    <?php foreach($kursi as $row):?>
                    <option value="<?php echo $row->no_kursi;?>"><?php echo $row->no_kursi;?></option>
                    <?php endforeach;?>
                </select>
              </div>
            </div>
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="jadwal" class="btn btn-default">Kembali</a>
    </div>
</form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  </body>
</html>