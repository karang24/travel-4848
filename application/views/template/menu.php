<?php if(!$this->session->userdata('username')){ ?>
       
<div class="container-fluid">
<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo site_url(""); ?>">Dashboard Menu <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo site_url("web/jadwal"); ?>"><li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Booking</a></li>
            <li><a href="<?php echo site_url(""); ?>"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>  Data Kursi</a></li>
            <li><a href="<?php echo site_url("web/kat_mobil"); ?>"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>  Data Mobil</a></li>
          </ul>
        </div>
      <div class="col-md-10 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="panel panel-info">
        <div class="panel-heading">
            <br>
        </div>
        <div class="panel-body">
            
<?php } else { ?>
            <div class="container-fluid">
<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo site_url(""); ?>">Dashboard Menu <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo site_url('c_pemesan/index');?>"><li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>  Pemesan</a></li>
            <li><a href="<?php echo site_url('jadwal');?>"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>  Jadwal</a></li>
            <li><a href="<?php echo site_url('dashboard/pengguna');?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Data Pengguna</a></li>
            <li><a href="<?php echo site_url('c_mobil');?>"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>  Data Mobil</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>  Help</a></li>
          </ul>
        </div>
      <div class="col-md-10 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="panel panel-info">
        <div class="panel-heading">
            <br>
        </div>
        <div class="panel-body">
<?php } ?>
