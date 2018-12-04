<?php

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->model('admin');
	}
	public function index()
	{
		$this->load->view('main/login');
	}
	public function dashboard()
	{
		$this->load->library('pagination');
		$config = [
			'base_url' 	=>	base_url('login/dashboard'),
			'per_page'	=>	4,
			'total_rows'=>	$this->admin->count_all_employee()
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
		$this->pagination->initialize( $config );
		$data = $this->admin->show_employee($config['per_page'],$this->uri->segment(3));

		$this->load->view('main/dashboard',compact('data'));
	}
	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-warning">', '</p>');
		$post = $this->input->post();
		if($this->form_validation->run('admin_login')){
			if($this->admin->login($post['name'],$post['pwd']))
			{
				$this->session->set_userdata('user_id',$post['name']);
				return redirect('login/dashboard');
			}else
			{
				$this->session->set_flashdata('feedback','Invalid Username of Password');
				return redirect('login');
			}

		}else{
			$this->load->view('main/login');
		}
	}
	public function add_employee()
	{
		$this->load->view('main/add_employee');
	}
	public function store_employee()
	{
		$post = $this->input->post();
		$post['image_path']='no';
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-warning">', '</p>');
		if($this->form_validation->run('store_employee')){
			if($this->admin->store_employee($post))
			{
				$this->session->set_flashdata('feedback','Successfully Added..');	
				return redirect('login/add_employee');
			}else
			{
				$this->session->set_flashdata('feedback','Try Again !!!!!1');
				return redirect('login/add_employee');
			}

		}else{
			$this->load->view('main/add_employee');
		}
	}
	public function edit_employee($id)
	{
		$data = $this->admin->find($id);
		$this->load->view('main/edit_employee',compact('data'));

	}
	public function update_employee($id)
	{
		$post = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-warning">', '</p>');
		if($this->form_validation->run('store_employee')){
			if($this->admin->update_employee($id,$post))
			{
				$this->session->set_flashdata('feedback','Successfully Updated..');	
				return redirect('login/dashboard');
			}else
			{
				$this->session->set_flashdata('feedback','Try Again !!!!!1');
				return redirect('login/dashboard');
			}

		}else{
			$this->load->view('main/dashboard');
		}
	}
	public function delete_employee($id)
	{
		if($this->admin->delete_employee($id)){
			$this->session->set_flashdata('feedback','Successfully Deleted..');	
				return redirect('login/dashboard');
		}
		else{
			$this->session->set_flashdata('feedback','Try Again !!!!');	
			return redirect('login/dashboard');
		}
	}
	public function image_employee($id)
	{
		$this->load->view('main/image_employee',['id'=>$id]);
	}
	public function upload_image($id)
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'jpg|jpeg|gif|png';

		$this->load->library('upload',$config);
		$this->load->library('form_validation');
		if($this->upload->do_upload('image'))
		{
			$data = $this->upload->data();
			$post = $this->input->post();
			
			$image_path = "uploads/".$data['file_name'];
			if($this->admin->upload_image($id,$image_path))
			{
				$this->session->set_flashdata('feedback','Successfully Uploaded..');	
				return redirect('login/dashboard');
			}
			else{
				$this->session->set_flashdata('feedback','Try Again !!!!');	
				return redirect('login/dashboard');
			}
		}
		else{

			$this->session->set_flashdata('feedback','Try Again !!!!');	
			return redirect('login/dashboard');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}

}














