<html>
<head>
<title>Add Author</title>
<link rel='stylesheet' type='text/css' href="<?= base_url('tool/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">
<script src="<?= base_url('tool/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('tool/js/bootstrap.js');?>"></script>
<script>
$(document).ready(function(){
	$('#abtn').click(function(){
		aname=$('#aname').val();
		if(aname=="")
		{
			$('#aerr').html("<font size='3'>Enter Author Name</font>");
		}
		else
		{
			$.post('add_author',{aname:aname},function(data){
			if(data=="Insert")
			{
				$('#msg').html("<font size='3'>Author Add Success</font>");
			}
		})
		}
	});
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
	height:300px;
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
	width:70%;
	height:200px;
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
	<center><font color="red" size="3">Add Author</font><center><br>
	<? form_open('Welcome/add_author'); ?>
	<table  class="table">
		<tr>
			<td>Enter Author Name</td>
			<td><?= form_input(['name'=>'aname','id'=>'aname','placeholder'=>'Enter Author Name','class'=>'form-control']); ?></td>
			<td><span id='aerr'></span></td>
		</tr>
		<tr>
			<td colspan=""><button id='abtn' class="btn btn-primary">Add Author</button></td>
			<td colspan="2"><span id="msg"></span></td>
		</tr>
	</table>	
	</div>
	<!--Body End-->
</div>
</body>
</html>