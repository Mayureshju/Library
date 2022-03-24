<html>
<head>
<title>Login Page</title>
<link rel='stylesheet' type='text/css' href="<?= base_url('tool/css/bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">
<script src="<?= base_url('tool/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('tool/js/bootstrap.js');?>"></script>
<script>
$(document).ready(function(){
	$('button').click(function(){
		un=$('#un').val();
		ps=$('#ps').val();
		r=$('#r:checked').val();
		if(un=="")
		{
			$('#p1').text("");
			$('#u').html('<b><font color="white">Enter Userame</font></b>');
		}
		else if(ps=="")
		{
				$('#u').text("");
				$('#p1').html('<b><font color="white">Enter Password</font></b>');
		}
		else
		{
			$.post('index.php/Welcome/login_admin',{un:un,ps:ps,r:r},function(data){
				if(data=='Right')
				{
					window.location.href="index.php/Welcome/desh_open";
				}
				else
				{
					alert('Wrong User');
				}
			});
		}
	
	});
});
</script>
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
	<h1>Admin Login</h1>
	<?php 
	echo $ua1=$this->input->cookie('u1',true);
	echo $pa=$this->input->cookie('p1',true);
	?>
	<center><div class="login">
	<? form_open('Welcome/login_admin'); ?>
	<table class="table">
	<tr>
	<td><font color="white"><b>Username</b></font></td>
	<td><?= form_input(['name'=>'un','id'=>'un','placeholder'=>'Entter Username','value'=>$ua1,'class'=>'form-control']);?></td>
	<td><span id="u"></span></td>
	</tr>
	<tr>
	<td><font color="white"><b>Password</b></font></td>
	<td><?= form_password(['name'=>'ps','id'=>'ps','value'=>$pa,'placeholder'=>'Entter Password','class'=>'form-control']);?></td>
	<td><span id="p1"></span></td>
	</tr>
	<tr>
	<td colspan="3"><input type="checkbox" value="yes" id="r" name="r" /> <b><font color="white">Remenber Me</font></b></td>
	</tr>
	<tr>
	<td colspan="1"><button class="btn btn-primary">Login</button></td>
	<td colspan='2'>
	<?php
	if(isset($err))
	{
		?>
			<font color="white" size="4">Userame and Password Not Metch</font>
		<?php
	}
	?>
	</td>
	</tr>
	</table>
	</div></center>
	<!--Body End-->
</div>
</body>
</html>