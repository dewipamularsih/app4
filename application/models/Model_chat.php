<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_chat extends CI_Model
{

	public function getPesan($id_user, $id_balas)
	{
		$this->db->from('chat');
		$this->db->where('id_user= ' . $id_user . ' 
		and id_balas=' . $id_balas . ' 
		or id_user= ' . $id_balas . ' 
		and id_balas=' . $id_user);
		$r = $this->db->get();
		return $r->result();
	}
	public function TambahChatKeSatu($in)
	{
		$this->db->insert('chat', $in);
	}
	public function getData($u, $p)
	{
		$this->db->from('user');
		$this->db->where('username', $u);
		$this->db->where('password', $p);
		return $sql = $this->db->get()->row();
	}
	public function getDataById($no)
	{
		$this->db->from('user');
		$this->db->where('id_user', $no);
		return $sql = $this->db->get()->row();
	}
	public function getDataUser()
	{
		$this->db->from('chat');
		$this->db->join('user', 'user.id_user = chat.id_user', 'inner');
		$this->db->where('level=', 0);
		$this->db->group_by('user.id_user');
		return $sql = $this->db->get()->result();
	}
	public function getDataAdmin()
	{
		$this->db->from('user');
		$this->db->where('level=', 1);
		return $sql = $this->db->get()->result();
	}
	public function Tambah($tabel, $in)
	{
		$this->db->insert($tabel, $in);
	}
}
                        
/* End of file ChatModel.php */
