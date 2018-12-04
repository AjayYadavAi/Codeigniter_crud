<?php include_once('header.php');?>

<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h1>Add Employee</h1>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<a href="<?= base_url('login/dashboard') ?>" class="btn btn-success">View Empoyee</a>
		</div>
	</div>
	<hr>
	<?= form_open('login/store_employee')?>
	<?php  if($feedback = $this->session->flashdata('feedback')){?>
  		<div class="alert alert-dismissible alert-info">
  			<p><?= $feedback?>!</p>
  		</div>
  	<?php }?>
  <fieldset>
    <legend>Add New Employee</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Full Name</label>
      <input type="text" class="form-control" name="fullname" placeholder="Enter Full name">
   	<?php echo form_error('fullname'); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email Address</label>
      <input type="email" class="form-control" name="email" placeholder="Enter Email">
   	  <?php echo form_error('email'); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Enter Password">
   	  <?php echo form_error('password'); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Address</label>
      <textarea class="form-control" rows="4" name="address"></textarea>
   		<?php echo form_error('address'); ?>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
</div>

<?php include_once('footer.php');?>