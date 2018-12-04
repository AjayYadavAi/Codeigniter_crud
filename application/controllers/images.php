<?php

class Images extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}
	public function gallery_image()
	{
		$this->load->model('image');
		$data = $this->image->all_images();
		$this->load->view('main/image_gallery',compact('data'));
	}
	public function upload_image()
	{
		$this->load->view('main/upload_image');
	}
	public function store_image()
	{
		$this->load->library('upload');
		$image = array();
		$ImageCount = count($_FILES['image_name']['name']);
        for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
            $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];

            // File upload configuration
            $uploadPath = './uploads';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                $uploadImgData[$i]['image_name'] = $imageData['file_name'];

            }
        }
         if(!empty($uploadImgData)){
            // Insert files data into the database
            $this->load->model('image');
            if($this->image->multiple_images($uploadImgData))
            {
            	$this->session->set_flashdata('feedback','Successfully uploaded ...');
            	return redirect('images/gallery_image');
            }
            else
            {
            	$this->session->set_flashdata('feedback','Try Again !!!!!');
            	return redirect('images/gallery_image');
            }
        }
    }
    public function delete_image($id)
    {
    	$this->load->model('image');
    	$article_id = $id;
    	if($this->image->delete_image($article_id))
    	{
    		$this->session->set_flashdata('feedback','Successfully Deleted ...');
            return redirect('images/gallery_image');
    	}
    	else
    	{
    		$this->session->set_flashdata('feedback','Try Again !!!!!');
            return redirect('images/gallery_image');
    	}
    }
}