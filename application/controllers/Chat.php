<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
	public function __construct()
	{
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '2048M');
		parent::__construct();
		$this->load->model('Model_chat');
	}
	public function index()
	{
		if ($_SESSION['id_user'] == null) {
			redirect('chat/login', 'refresh');
		} else {
			$no =  $this->uri->segment(2);
			$data['user_active'] = $this->Model_chat->getDataById($no);
			$data['id_balas'] = $no;	
			if ($data == null) {
				die("user tidak ada nih");
			} else {
                $data['title'] = 'Chat Admin';
                $this->load->view('layout/user/header', $data);
                $this->load->view('chat', $data);
                $this->load->view('layout/user/footer');
			}
		}
	}
	public function loadChat()
	{
		$id_user = $this->input->post('id_user');
		$id_balas = $this->input->post('id_balas');
		$data = $this->Model_chat->getPesan($id_user, $id_balas);
		echo json_encode(array(
			'data' => $data
		));
	}
	public function KirimPesan()
	{
		$now = date("Y-m-d H:i:s");
		$pesan = $this->input->post('pesan');
		$id_user = $this->input->post('id_user');
		$id_balas = $this->input->post('id_balas');
		$in = array(
			'id_user' => $id_user,
			'id_balas' => $id_balas,
			'chat' => $pesan,
			'waktu' => $now,
		);
		$this->Model_chat->TambahChatKeSatu($in);
		$log = array('status' => true);
		echo json_encode($log);
		return true;
	}
	public function GetAllOrang()
	{
		$data = $this->Model_chat->getDataAdmin();
		echo json_encode(array(
			'data' => $data
		));
	}
}
    