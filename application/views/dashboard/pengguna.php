<a href="<?php echo site_url('dashboard/add_pengguna');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<?php echo $message;?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
            <td>Username</td>
            <td>Password</td>
            <td colspan="2"></td>
        </tr>
    </thead>
    <?php $no=0; foreach($pengguna as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row->user;?></td>
        <td><?php echo $row->password;?></td>
        <td><a href="<?php echo site_url('dashboard/edit/'.$row->user_id);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="<?php echo site_url('dashboard/hapus/'.$row->user_id);?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
</table>