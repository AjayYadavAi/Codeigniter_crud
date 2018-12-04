<?php


class Articlemodel extends CI_Model
{
	public function add_article(Array $data)
	{
		return  $this->db->insert('article',$data);
	}
	public function show_article($limit, $offset)
	{
		$q =  $this->db
						->select(['id','title','event','description'])
						->limit($limit,$offset)
						->get('article');
		return $q->result();
	}
	public function edit_article($article_id)
	{
		$q = $this->db->select(['id','title','event','description'])
				->where('id',$article_id)
				->get('article');
		return $q->row();
	}
	public function update_article($article_id, Array $article)
	{
		return $this->db
				->where('id', $article_id)
				->update('article',$article);
	}
	public function delete_article($article_id)
	{
		return $this->db->delete('article',['id'=>$article_id]);
	}
	public function count_all_articles()
	{
		$query = $this->db
							->select(['title'])
							->from('article')
							->get();
		 return $query->num_rows();
	}
}