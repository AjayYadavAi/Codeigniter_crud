<?php include_once('header.php');?>

<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h1>Image Gallery</h1>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<a href="<?= base_url('images/upload_image') ?>" class="btn btn-success">Upload Image</a>
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
			<div class="row">
			<?php if($data):
			    foreach ($data as $d):?>
			    	<div class="col-sm-3" style="margin-bottom: 20px;">
			    		<a href="<?= base_url("images/delete_image/{$d->id}")?>"><span class="fa fa-trash"></span></a>
			    		<img src="<?=base_url('uploads/'.$d->image_name)?>" class="img-thumbnail" width="250">
			    	</div>
			<?php endforeach;?>
		<?php endif;?>
	        </div>
		</div>
	</div>

<?php include_once('footer.php');?>