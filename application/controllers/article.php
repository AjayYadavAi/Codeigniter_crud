<?php

class Article extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('user_id') )
		{
			return redirect('login');
		}
		$this->load->helper('form');
		$this->load->model('articlemodel','article');
	}
	public function index()
	{
		echo "hello";
	}
	public function article_list()
	{
		$this->load->library('pagination');
		$config = [
				'base_url'			=>	base_url('article/article_list'),
				'per_page'			=>  5,
				'total_rows'		=>	$this->article->count_all_articles()
			];
			$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
			$config['full_tag_close'] = '</ul></nav></div>';
			$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] = '</span></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close'] = '</span></li>';
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close'] = '</span></li>';
			$this->pagination->initialize($config);
		$data = $this->article->show_article($config['per_page'],$this->uri->segment(3));
		$this->load->view('main/article_list',compact('data'));
	}
	public function add_article()
	{
		$this->load->view('main/add_article');	
	}
	public function store_article()
	{
		$post = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-warning">', '</p>');
		if($this->form_validation->run('add_article') && $this->article->add_article($post))
		{
			$this->session->set_flashdata('feedback','Successfully Added ...');
			return redirect('article/add_article');
		}else
		{
			$this->session->set_flashdata('feedback','Try Again !!!!!');
			return redirect('article/add_article');
		}
	}
	public function edit_article($id)
	{
		$data = $this->article->edit_article($id);
		$this->load->view('main/edit_article',compact('data'));

	}
	public function update_article($id)
	{
		$post = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-warning">', '</p>');
		if($this->form_validation->run('add_article') && $this->article->update_article($id,$post))
		{
			$this->session->set_flashdata('feedback','Successfully updated ...');
			return redirect('article/article_list');
		}else
		{
			$this->session->set_flashdata('feedback','Try Again !!!!!');
			return redirect('article/article_list');
		}
	}
	public function delete_article($id)
	{
		if($this->article->delete_article($id))
		{
			$this->session->set_flashdata('feedback','Successfully Deleted ...');
			return redirect('article/article_list');
		}else
		{
			$this->session->set_flashdata('feedback','Try Again !!!!!');
			return redirect('article/article_list');
		}

	}
}