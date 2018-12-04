<?php include('header.php');?>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h1>All Articles</h1>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<a href="<?= base_url('article/add_article') ?>" class="btn btn-success">Add Article</a>
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
					<th scope="col">Title</th>
					<th scope="col">Event</th>	
					<th scope="col">Brief</th>
					<th scope="col">Action</th>
				</thead>
				<tbody>
					<?php if(count($data)):
						$count= $this->uri->segment(3,0);?>
					<?php foreach($data as $data):?>

						<tr>
							<td><?= ++$count?></td>
							<td><?= $data->title?></td>
							<td><?= $data->event?></td>
							<td><?= $data->description?></td>
							<td>
								<a class="btn btn-info" href="<?= base_url("article/edit_article/{$data->id}") ?>">Update</a> 
								<?=anchor("article/delete_article/{$data->id}","Delete",array('class'=>"btn btn-danger",'onclick' => "return confirm('Do you want delete this record')"))?>
						</tr>
					<?php endforeach;?>
				<?php endif?>
				</tbody>
			</table>
		</div>
	</div>
	<?= $this->pagination->create_links(); ?>
</div>




<?php include('footer.php');?>