<?php include_once('header.php');?>

<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h1>Employee List</h1>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<a href="<?= base_url('login/add_employee') ?>" class="btn btn-success">Add Employee</a>
		</div>
	</div>
	<hr>
	<?php  if($feedback = $this->session->flashdata('feedback')){?>
  		<div class="alert alert-dismissible alert-info">
  			<p><?= $feedback?>!</p>
  		</div>
  	<?php }?>
	<div class="card text-dark bg-light mb-3" style="max-width: 100%;">
		<div class="card-body">
			
			<table class="table ">
				<thead>
					<th scope="col">S.No</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Address</th>
					<th scope="col">Profile</th>
					<th scope="col">Action</th>
				</thead>
				<tbody>
					<?php if(count($data)):
						$count= $this->uri->segment(3,0);?>
					<?php foreach($data as $data):?>

						<tr>
							<td><?= ++$count?></td>
							<td><?= $data->fullname?></td>
							<td><?= $data->email?></td>
							<td><?= $data->address?></td>
							<td>
								<?php if($data->image_path == 'no'){?>
								<a href="<?= base_url("login/image_employee/{$data->id}") ?>"><i class="fas fa-image" style="font-size: 25px;color: black;"></i></a>
							    <?php } ?>
							    <?php if($data->image_path != 'no'){?>
							    	<img src="<?=base_url($data->image_path)?>" width="50">
							    <?php }?>
							</td>
							<td>
								<a class="btn btn-info" href="<?= base_url("login/edit_employee/{$data->id}") ?>">Update</a> 
								<?=anchor("login/delete_employee/{$data->id}","Delete",array('class'=>"btn btn-danger",'onclick' => "return confirm('Do you want delete this record')"))?>
						</tr>
					<?php endforeach;?>
				<?php endif?>
				</tbody>
			</table>
		</div>
	</div>
	<?= $this->pagination->create_links(); ?>
</div>

<?php include_once('footer.php');?>