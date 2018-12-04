<?php 

class Image extends CI_Model
{
	public function multiple_images($image = array())
	{
		return $this->db->insert_batch('images',$image);
	}
	public function all_images()
	{
		$q = $this->db->get('images');
		return $q->result();
	}
	public function delete_image($article_id)
	{
		return $this->db->delete('images',['id'=>$article_id]);
	}
}