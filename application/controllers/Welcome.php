<?php
class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('form_validation','session'));
		$this->load->helper('cookie');
		$this->load->model('admin_model');
	}
	public function index()
	{
		$this->load->view('Login');
	}
	public function login_admin()
	{
		$un=$this->input->post('un');
		$ps=$this->input->post('ps');
		$r=$this->input->post('r');
		if(!empty($r))
		{
			$ua=array(
			'name'=>'u1',
			'value'=>$un,
			'expire'=>'36000',
			);
			$this->input->set_cookie($ua);
			
			$pa=array(
			'name'=>'p1',
			'value'=>$ps,
			'expire'=>'36000',
			);
			 $this->input->set_cookie($pa);
			$this->input->cookie('u1',true);
		}
	$res=$this->admin_model->login_admin($un,$ps);
	if($res)
	{
		$this->session->set_userdata('un',$un);
		//$this->load->view('dashbord');
		echo "Right";
	}
	else
	{
		echo "Wrong User";
		//$this->load->view('Login',['err'=>'yes']);
	}
		
	}
	
	public function desh_open()
	{
		$this->load->view('dashbord');
	}
	public function book_manage_stoke_open()
	{
		$this->load->view('book_manage_stoke_open');
	}
	
	public function open_book_issue_submit()
	{
		$this->load->view('open_book_issue_submit');
	}
	public function open_amount_expen()
	{
		$this->load->view('open_amount_expen');
	}
	
	public function open_add_author()
	{
		$this->load->view('open_add_author');
	}
	public function open_publisher()
	{
		$this->load->view('open_publisher');
	}
	public function open_book()
	{
		$al=$this->admin_model->alist();
		$pl=$this->admin_model->plist();
		$this->load->view('open_book',['al'=>$al,'pl'=>$pl]);
	}
	public function open_booklist()
	{
		$res=$this->admin_model->blist();
		
		$this->load->view('open_booklist',['res'=>$res]);
	}
	public function open_member()
	{
		$this->load->view('open_member');
	}
	public function add_author()
	{
		 $aname=$this->input->post('aname');
		$data=array(
		'aname'=>$aname,
		);
		$res=$this->admin_model->add_author($data);
		if($res)
		{
			echo "Insert";
		}
		else
		{
			echo "Not Insert";
		}
	}
	
	public function add_pub()
	{
		$data=$this->input->post('pname');
		$d1=array(
		'pname'=>$data,
		);
		$res=$this->admin_model->add_pub($d1);
		if($res)
		{
			echo "Insert";
		}
		else
		{
			echo "Not Insert";
		}
	}
	
	public function add_book()
	{
		$data=$this->input->post();
		$r1=$this->admin_model->abook($data);
		if($r1)
		{
			echo "Insert";
		}
		else
		{
			echo "Not Insert";
		}
	}
	
	public function insert_member()
	{
		$this->form_validation->set_rules('bname','Enter Name','required');
		$this->form_validation->set_rules('address','Enter Address','required');
		$this->form_validation->set_rules('mno','Enter Mobile No','required');
		$this->form_validation->set_rules('email','Enter E-Mail','required');
		if($this->form_validation->run())
		{
		
		$data=$this->input->post();
		$res=$this->admin_model->insert_member($data);
		if($res)
		{
			$res=$this->admin_model->m_list();
			$this->load->view('m_list',['res'=>$res]);
		}
		else
		{
			echo "Not Inser";
		}
		}
		else
		{
			$this->load->view('open_member');
		}
	}
	public function m_list()
	{
		$res=$this->admin_model->m_list();
		$this->load->view('m_list',['res'=>$res]);
	}
	public function open_ibook_list()
	{
		$res=$this->admin_model->bissue1();
		$this->load->view('open_ibook_list',['res'=>$res]);
	}
	public function msearch()
	{
		$data=$this->input->post('sid');
		$res=$this->admin_model->msearch($data);
		$res2=$this->admin_model->bsearch();
		$this->load->view('open_book_issue_submit',['res'=>$res,'res2'=>$res2]);
	}
	public function bissue()
	{
		$data=$this->input->post();
		$book_number=$this->input->post('bn');
		$book_data=$this->admin_model->book_info_fetch($book_number);
		$price=$book_data->price;
		$data['price']=$price;
		if($this->admin_model->bissue($data))
		{
			$this->load->view('issue_success_full',['msg'=>'insert']);
		}			
		else
		{
			echo "Not INsert";
		}
	}
	function bsub($id)
	{
		$res=$this->admin_model->book_submit($id);
		$this->load->view('book_submit',['res'=>$res]);
	}
	function bsubmit()
	{
		$mid=$this->input->post('mid');
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$email=$this->input->post('email');
		$bid=$this->input->post('price');
		$bname=$this->input->post('book_name');
		$price=$this->input->post('price');
		$id=$this->input->post('id');
		$arr=array('mid'=>$mid,
				'name'=>$name,
				'email'=>$email,
				'bname'=>$bname,
				'bid'=>$bid,
				'price'=>$price,
		);
		$this->admin_model->delete1('bissue',$id,'id');
		$res=$this->admin_model->insert('submit_book',$arr);
		if($res)
		{
			
			echo "submit";
		}
		else
		{
			echo "not_submit";
		}
	}
	function book_submit()
	{
		echo "d";
	}
}