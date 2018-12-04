<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assests/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assests/css/style.css') ?>">
  <script type="text/javascript" src="<?= base_url('assests/js/bootstrap.min.js')?>"></script>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 alert alert-light" style="margin-top: 14%;">
		<?= form_open('login/admin_login')?>
		<?php  if($feedback = $this->session->flashdata('feedback')){?>
  		<div class="alert alert-dismissible alert-primary">
  			<i><?= $feedback?>!</i>
  		</div>
  	<?php }?>
  <fieldset>
    <legend>Admin Login</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control"  placeholder="Enter Name" name="name">
      <?php echo form_error('name'); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
      <?php echo form_error('pwd'); ?>
    </div>
</fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<?php include('footer.php');?>