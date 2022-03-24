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
	height:400px;
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
	<font size="3" color="red">Book Issue</font> <?= anchor('Welcome/open_ibook_list','Issue Book List',['class'=>'pull-right','id'=>'a1']) ?>
	<?= form_open('Welcome/msearch');?>
	<table class="table">
	<tr>
	<td>Enter Member ID</td>
	<td><?= form_input(['name'=>'sid','placeholder'=>'Enter Member ID','class'=>'form-control']); ?></td>
	<td><span id="aerr"></td>
	<td><button id="sbtn" class="btn btn-primary">Search</td>
	</tr>
	</table>
	<?= form_close(); ?>
	<?php //form_close();
	if(isset($res))
	{
	?>
	<?= form_open('Welcome/bissue') ?>
	<input type="hidden" name="price" value="d" />
	<table class="table">
	<tr>
	<td>ID</td>
	<td><?= form_input(['name'=>'mid','value'=>$res->id,'class'=>'form-control']); ?></td>
	<td>Name</td>
	<td><?= form_input(['name'=>'name','value'=>$res->bname,'class'=>'form-control']); ?></td>
	</tr>
	<tr>
	<td>Address</td>
	<td><?= form_input(['name'=>'address','value'=>$res->address,'class'=>'form-control']); ?></td>
	<td>E-Mail</td>
	<td><?= form_input(['name'=>'email','value'=>$res->email,'class'=>'form-control']); ?></td>
	</tr>
	<tr>
	<td>Select Book</td>
	<td><select name="bn" class="form-control">
	<?php
	foreach($res2 as $re)
	{
		?>
		<option value="<?= $re->id; ?>"><?= $re->bname; ?></option>
		<?php
	}
	?>
	</select></td>
	</tr>
	<tr>
	<td><button id="ibtn" class="btn btn-primary">Book Now</button></td>
	</tr>
	</table>
	<?php
	}
	else
	{
		echo "Data Not Found";
	}
	?>
	</div> 
	</div>
	<!--Body End-->
</div>
</body>
</html>