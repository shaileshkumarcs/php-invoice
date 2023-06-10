<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
	}

	public function index()
	{
		$value['series_data'] = $this->MInvoice->get_for_chart();
		$data['invoice'] = '';
		$data['title'] = "Dashboard";
		$data['container'] = $this->load->view('dashboard/dashboard', $value, true);
		$this->load->view('master', $data);
	}

	public function error()
	{
		$data['invoice'] = '';
		$data['title'] = "Dashboard";
		$data['container'] = $this->load->view('error', '', true);
		$this->load->view('master', $data);
	}

	/*
	 * User Start
	 */

	public function add_user()
	{
		$data['invoice'] = '';
		$data['title'] = "User";
		$data['container'] = $this->load->view('user/add_user', '', true);
		$this->load->view('master', $data);
	}

	public function view_user()
	{
		$data['invoice'] = '';
		$data['title'] = "User";
		$value['users'] = $this->MAdmin->get_all_users();
		$data['container'] = $this->load->view('user/view_user', $value, true);
		$this->load->view('master', $data);
	}

	public function store_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_admin.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_admin.email]');
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run()) {
			$message = $this->MAdmin->store_user_record();
			$this->session->set_flashdata('message', $message);
			redirect('admin/add_user');
		} else {
			$this->add_user();
		}
	}

	public function change_user_status($id, $status)
	{
		$this->MAdmin->change_user_status_record($id, $status);
		redirect('admin/view_user');
	}

	public function delete_user($id)
	{
		$message = $this->MAdmin->delete_user_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('admin/view_user');
	}

	public function edit_user($id)
	{
		$data['invoice'] = '';
		$data['title'] = 'User';
		$value['user'] = $this->MAdmin->get_admin_records($id);
		$data['container'] = $this->load->view('user/edit_user', $value, true);
		$this->load->view('master', $data);
	}

	public function update_user()
	{
		$this->MAdmin->update_user_record();
		$this->session->set_flashdata('message', 'Record Updated Successfully');
		redirect('admin/view_user');
	}

	/*
	 * User End
	 */

	/*
	 * Settings Start
	 */

	public function edit_settings()
	{
		$data['invoice'] = '';
		$value['result'] = $this->MAdmin->get_settings_record();
		$data['title'] = 'Settings';
		$data['container'] = $this->load->view('settings/edit_settings', $value, true);
		$this->load->view('master', $data);
	}

	public function update_settings_record()
	{
		$this->MAdmin->update_settings_record();
		$this->session->set_flashdata('message', 'Record Updated Successfully');
		redirect('admin/edit_settings');
	}

	/*
	 * Settings End
	 */
}
