<?php include('header.php');?>
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<h1>Add Image</h1>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<a href="<?= base_url('login/dashboard/') ?>" class="btn btn-success">View Empoyee</a>
		</div>
	</div>
	<div class="card text-dark bg-light mb-3" style="max-width: 100%;">
		<div class="card-body">
	<?= form_open_multipart("login/upload_image/{$id}") ?>
  <fieldset>
    <legend>Upload Image</legend>
    <div class="form-group">
      <label for="exampleInputFile">Select Image</label>
      <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
      
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Upload</button>
  </fieldset>
</form>
</div>
</div></div>


<?php include('footer.php');?>