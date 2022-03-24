<html>
<head>
<title>Add Book</title>
<link rel='stylesheet' type='text/css' href="<?= base_url('tool/css/bootstrap.css'); ?>">	
<link rel="stylesheet" type="text/css" href="<?= base_url('tool/css/style.css'); ?>">
<script src="<?= base_url('tool/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?= base_url('tool/js/bootstrap.js');?>"></script>
<script>
$(document).ready(function(){
	$('#bbtn').click(function(){
		name=$('#name').val();
		price=$('#price').val();
		if(name=="")
		{
			$('#aerr1').html("<font size='3'>Enter Name</font>");
		}
		else if(price=="")
		{
			$('#aerr2').html("<font size='3'>Enter Price</font>");
		}
		else
		{
			$.ajax({
                type:'POST',
                url:'add_book',
                data:new FormData($("#f1")[0]),
                contentType:false,
                processData:false,
                success:function(fb){
                   if(fb=='Insert')
				   {
					   $('#msg').html("<center><font size='3'>Book Insert</font></center>");
				   }
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
	height:380px;
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
	height:350px;
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
	<center><font color="red" size="3">Book Insert</font><center><br>
	<? form_open('Welcome/add_book'); ?>
	<form id="f1">
	<table  class="table">
		<tr>
			<td>Enter Book Name</td>
			<td><?= form_input(['name'=>'bname','id'=>'bname','placeholder'=>'Enter Book Name','class'=>'form-control']); ?></td>
			<td><span id='aerr1'></span></td>
		</tr>
		<tr>
			<td>Select Publisher</td>
			<td>
			<select name='spublish' class="form-control">
				<?php
			foreach($pl as $pl2)
			{
				?>
				<option><?= $pl2->pname; ?></option>
				<?php
			}
			?>
			</select>
			</td>
			<td>Select Author</td>
			<td>
			<select name='sauthor' class="form-control">
			<?php
			foreach($al as $al2)
			{
				?>
				<option><?= $al2->aname; ?></option>
				<?php
			}
			?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Enter Book Price</td>
			<td><?= form_input(['name'=>'price','id'=>'price','placeholder'=>'Enter Book Price','class'=>'form-control']); ?></td>
			<td><span id='aerr2'></span></td>
		
			<td colspan="3"></td>
		</tr>
		<tr>
			
		</tr>
	</table>
	</form>
<table>
<tr>
<td width="10%"><button id='bbtn' class="btn btn-primary">Add Book</button></td>
<td width="90%"><span id="msg"></span></td>
</tr>
</table>
	</div> 
	</div>
	<!--Body End-->
</div>
</body>
</html>