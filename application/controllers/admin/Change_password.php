<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Change Password';
        $this->load->view('layout/admin/header', $data);
        $this->load->view('admin/change_password', $data);
        $this->load->view('layout/admin/footer');
    }

    public function process()
    {
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() !== FALSE) {
            $data = array('password' => password_hash($new_password, PASSWORD_BCRYPT));
            $id = array('id_user' => $this->session->userdata('id_user'));

            $this->db->where($id);
            $this->db->update('admin', $data);

            // Redirect to welcome page or any other appropriate page
            redirect('welcome');
        } else {
            $data['title'] = 'Change Password';
            $this->load->view('layout/admin/header', $data);
            $this->load->view('admin/change_password', $data);
            $this->load->view('layout/admin/footer');
        }
    }
}
?>
