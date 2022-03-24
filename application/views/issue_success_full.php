<html>
<head>
<title>Book Issue & Submit</title>
<link rel='stylesheet' type='text/css' href="<?= base_url('tool/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">
<script src="<?= base_url('tool/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('tool/js/bootstrap.js');?>"></script>
<script>
$(document).ready(function(){
	
});
</script/>
<style>
.banner{
	background:url(<?= base_url('tool/img/std_banner.png'); ?>);
	height:400px;
	background-size:100%;
	background-repeat:no-repeat;
	position:absolute;
	z-index:1px;
}
.inner{
	width:70%;
	height:340px;
	background:#148BC6;
	position:absolute;
	z-index:5px;
	margin-left:12%;
	margin-top:180px;
	opacity:0.9;
	border-radius:10px;
	box-shadow:1px 1px 3px 4px  black;
	padding:7px;
}
.login{
	width:100%;
	height:200px;
}
#a1{
	color:red;
}

</style>
</head>
<body>
<div class="container-fluid">
	<!--Header Start -->
	<div class="container-fluid" style="background:#148BC6;color:white;">
		<div class="container">
			<div class="col-sm-3">
			<h2 style="font-family:Cooper;">LMS</h2>
			</div>
		</div>
	</div>
	<!--Header End-->
	
	<!--body start-->
	<div class="container banner">
	</div>
	<div class="inner">
	<h1>Welcome Admin</h1>
	<?php 
	 $ua1=$this->input->cookie('u1',true);
	 $pa=$this->input->cookie('p1',true);
	 $sun=$this->session->userdata('un');
	/* if(!$sun)
	 {
		 ?>
			<script>window.location.href="admin/index";</script>
		 <?php
	 }*/
	?>
	<div class="login">
	<div class="col-sm-4" style="">
	<?php include('admin_menu.php'); ?>
	</div>
	<div class="col-sm-8">
	<?= anchor('Welcome/open_ibook_list','Issue Book List',['class'=>'pull-right','id'=>'a1']) ?>
	<?php
	if(isset($msg))
	{
		?>
		<h1>Book Issue Successfull</h1>
		<?php
	}
	?>
	</div>
	</div> 
	</div>
	<!--Body End-->
</div>
</body>
</html>