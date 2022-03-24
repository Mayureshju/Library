<?php 
class admin_model extends CI_Model
{
	public function login_admin($un,$ps)
	{
		$query=$this->db->select(['un','ps'])->from('admin')->where('un',$un)->where('ps',$ps)->get();
		return $query->row();
	}
	public function add_author($aname)
	{
		return $this->db->insert('author',$aname);
	}
	public function add_pub($aname)
	{
		return $this->db->insert('pub',$aname);
	}
	public function alist()
	{
		$query=$this->db->get('author');
		return $query->result();
	}
	public function plist()
	{
		$query=$this->db->get('pub');
		return $query->result();
	}
	public function insert_member($data)
	{
		return $this->db->insert('member',$data);
	}
	
	public function m_list()
	{
		$query=$this->db->get('member');
		return $query->result();
	}
	public function blist()
	{
		$query=$this->db->get('blist');
		return $query->result();
	}
	public function abook($data)
	{
		return $this->db->insert('blist',$data);
	}
	public function msearch($data)
	{
		$query=$this->db->select(['id','bname','address','mno','email'])->from('member')->where('id',$data)->get();
		return $query->row(); 
	}
	public function bissue($data)
	{
		return $this->db->insert('bissue',$data);
	}
	public function bissue1()
	{
		$query=$this->db->get('bissue');
		return $query->result();
	}
	public function book_info_fetch($id)
	{
		$q=$this->db->select('*')->from('blist')->where('id',$id)->get();
		return $q->row();
	}
	public function bsearch()
	{
		$query=$this->db->get('blist');
		return $query->result();
	}
	function book_submit($id)
	{
		$q=$this->db->select('*')->from('bissue')->where('id',$id)->get();
		return $q->row();
	}
	function insert($tbl_name,$data)
	{
		return $this->db->insert($tbl_name,$data);
	}
	function delete1($tbl_name,$data,$filed)
	{
		$this->db->where($data,$filed);
		return $this->db->delete($tbl_name);
	}
}
?>