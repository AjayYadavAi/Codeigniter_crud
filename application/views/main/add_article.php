<?php include_once('header.php');?>
<script type="text/javascript" src="<?=base_url('ckeditor')?>/ckeditor.js"></script>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h1>Add Article</h1>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<a href="<?= base_url('article/article_list') ?>" class="btn btn-success">View Articles</a>
		</div>
	</div>
	<hr>
  <?php  if($feedback = $this->session->flashdata('feedback')){?>
      <div class="alert alert-dismissible alert-info">
        <p><?= $feedback?>!</p>
      </div>
    <?php }?>
  <div class="alert alert-dark">
	<?= form_open('article/store_article')?>
  <fieldset>
    <legend>Add New Article</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Article Title</label>
      <input type="text" class="form-control" name="title" placeholder="Enter Full name">
   	<?php echo form_error('title'); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Event date</label>
      <input type="date" class="form-control" name="event">
   	  <?php echo form_error('event'); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Description</label>
      <textarea name="description" id="description"></textarea>
      <script> CKEDITOR.replace( 'description' );</script>
   	  <?php echo form_error('description'); ?>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
</div></div>

<?php include_once('footer.php');?>