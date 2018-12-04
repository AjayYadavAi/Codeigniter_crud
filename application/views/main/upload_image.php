<?php include_once('header.php');?>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h1>Upload Image</h1>
		</div>
	<div class="col-lg-4"></div>
	    <div class="col-lg-4">
	    	<a href="<?= base_url('images/gallery_image') ?>" class="btn btn-success">Upload Image</a>
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
	<?= form_open_multipart("images/store_image") ?>
  <fieldset>
    <legend></legend>
    <div class="form-group">
      <label for="exampleInputFile">Select Images</label>
      <input type="file" class="form-control-file" name="image_name[]" aria-describedby="fileHelp" multiple>
      <?php if(isset($upload_error)) { echo $upload_error;} ?>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Upload</button>
  </fieldset>
</form>
</div>
</div></div>
</div>

<?php include_once('footer.php');?>