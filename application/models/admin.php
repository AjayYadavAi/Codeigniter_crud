<?php
class Admin extends CI_Model
{
	public function login($name, $pwd)
	{
		$q = $this->db
				->where(['name'=>$name,'pwd'=>$pwd])
				->get('admin');
		return $q->num_rows();
	}
	public function store_employee(Array $data)
	{
		return $this->db->insert('employee',$data);
	}
	public function show_employee($limit, $offset)
	{
		$q =  $this->db
						->select(['id','fullname','email','address','image_path'])
						->limit($limit,$offset)
						->get('employee');
		return $q->result();
	}
	public function count_all_employee()
	{
		$q = $this->db->get('employee');
		return $q->num_rows();
	}
	public function find($id)
	{
		$q = $this->db
						->select(['id','fullname','email','password','address'])
						->where('id',$id)
						->get('employee');
		return $q->row();
	}
	public function update_employee($id, Array $post)
	{
		return $this->db
					->where('id',$id)
					->update('employee',$post);
	}
	public function delete_employee($id)
	{
		return $this->db->delete('employee',['id'=>$id]);
	}
	public function upload_image($id,$path)
	{
		$data = array('image_path'=>$path);
		return $this->db
						->where('id',$id)
						->update('employee',$data);
	}
}