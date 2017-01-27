<!doctype html>
<html>
<head>    
    <title>Travel 4848</title>
	<!-- jquery default-->
    <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery-1.10.2.min.js'); ?>"></script>
	<!-- jquery fancxbox-->
    <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<!-- jquery auto isi textbox-->
	<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/tinymce/tinymce.min.js'); ?>"></script>
	<script>
    tinymce.init({selector:'textarea'});                
    </script>
    
	
	<!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dashboard.css'); ?>">  
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">  
	<!-- Custom styles for this template -->
</head>
</head>
<body>
      
<nav class="navbar navbar-default navbar-fixed-top cst-nav">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo site_url(""); ?>">Travel 4848</a>
    </div>
    <?php if(!$this->session->userdata('username')){ ?>
    <nav class="navbar navbar-default navbar-fixed-top cst-nav">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Travel 4848</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
          <li><a href="#" onclick="login()"> Login<span class="caret"></span></a></li>
    </ul>
    <!-- Collect the nav links, forms, and other content for toggling -->
  </div><!-- /.container-fluid -->
</nav>
untuk informasi 
  <script type="text/javascript">
    function login()
    {
      $('#login_form').modal('show'); // show bootstrap modal
    }
  </script>

  <!-- Form Login -->
  <div class="modal fade" id="login_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Person Form</h3>
      </div>
      <div class="modal-body form">
           <form class="form-horizontal" role="form" action="<?php echo site_url('web/proses');?>" method="post">
                                    <?php echo $this->session->flashdata('message');?>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">
                                            Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                                    <select name="level">
													<option name="" value="">--pilih level login--</option>
													<option name="" value="admin">Admin</option>
													<option name="" value="user">User</option>
													</select>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                Sign in</button>
                                                 <button type="reset" class="btn btn-default btn-sm">
                                                Reset</button>
                                        </div>
                                    </div>
                                </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End fom login -->
	
	
	
	<?php } else { ?>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo site_url('dashboard/logout');?>"> Logout<span class="caret"></span></a></li>
    </ul>
    <?php } ?>
    <!-- Collect the nav links, forms, and other content for toggling -->
  </div><!-- /.container-fluid -->
</nav>