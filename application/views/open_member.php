<html>
<head>
<title>Add Members</title>
<link rel='stylesheet' type='text/css' href="<?= base_url('tool/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">
<script src="<?= base_url('tool/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('tool/js/bootstrap.js');?>"></script>
<script>
$(document).ready(function(){
	/*$('#bbtn').click(function(){
		name=$('#name').val();
		address=$('#address').val();
		mno=$('#mno').val();
		email=$('#email').val();
		if(name=="")
		{
			$('#aerr1').html("<font size='3'>Enter Name</font>");
		}
		else if(address=="")
		{
			$('#aerr2').html("<font size='3'>Enter Address</font>");
		}
		else if(mno=="")
		{
			$('#aerr3').html("<font size='3'>Enter Mobile No</font>");
		}
		else if(email=="")
		{
			$('#aerr4').html("<font size='3'>Enter E-Mail</font>");
		}
		else
		{
			$.post('insert_member',{name:name,address:address,mno:mno,email:email},function(data){
				alert(data);
			});
		}
	});*/
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
	height:420px;
	background:#148BC6;
	position:absolute;
	z-index:5px;
	margin-left:12%;
	margin-top:140px;
	opacity:0.9;
	border-radius:10px;
	box-shadow:1px 1px 3px 4px  black;
	padding:5px;	
}
.login{
	width:100%;
	height:300px;
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
	 /*if(!$sun)
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
	<font color="red" size="3">Add Members</font><?= anchor('Welcome/m_list','Member List',['class'=>'pull-right','id'=>'a1']) ?><br>
	<?= form_open('Welcome/insert_member'); ?>
	<table  class="table">
		<tr>
			<td>Enter Name</td>
			<td><?= form_input(['name'=>'bname','id'=>'name','placeholder'=>'Enter Name','value'=>set_value('bname'),'class'=>'form-control']); ?></td>
			<td><span id='aerr1'><?= form_error('bname'); ?></span></td>
		</tr>
		<tr>
			<td>Enter Address</td>
			<td>
			<textarea name="address" id="address"></textarea>
			<td><span id='aerr12'><?= form_error('address'); ?></span></td>
			</td>
		</tr>
		<tr>
		<td>Enter Mobile No</td>
		<td><?= form_input(['name'=>'mno','id'=>'mno','placeholder'=>'Enter Mobile No','class'=>'form-control']); ?></td>
		<td><span id='aerr3'><?= form_error('mno'); ?></span></td>
		</tr>
		<tr>
			<td>E-Mail</td>
			<td><?= form_input(['name'=>'email','id'=>'email','placeholder'=>'Enter E-Mail','class'=>'form-control']); ?></td>
			<td><span id='aerr4'><?= form_error('email'); ?></span></td>
			
		</tr>
		<tr>
			<td colspan="3"><button id='bbtn' class="btn btn-primary">Add Book</button></td>
		</tr>
	</table>
	</div> 
	</div>
	<!--Body End-->
</div>
</body>
</html>