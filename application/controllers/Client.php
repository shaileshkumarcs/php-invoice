<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
	}

	public function add_client()
	{
		$data['invoice'] = '';
		$data['title'] = "Client";
		$data['container'] = $this->load->view('client/add_client', '', true);
		$this->load->view('master', $data);
	}

	public function store_client()
	{
		$this->MClient->store_client_record();
		$this->session->set_flashdata('message', 'Record Inserted Successfully');
		redirect('client/add_client');
	}

	public function view_client()
	{
		$data['invoice'] = '';
		$value['clients'] = $this->MClient->get_all();
		$data['title'] = "Client";
		$data['container'] = $this->load->view('client/view_client', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_client($id)
	{
		$data['invoice'] = '';
		$value['client'] = $this->MClient->get_record($id);
		$data['title'] = "Client";
		$data['container'] = $this->load->view('client/edit_client', $value, true);
		$this->load->view('master', $data);
	}

	public function update_client()
	{
		$this->MClient->update_client_record();
		$this->session->set_flashdata('message', 'Record Updated Successfully');
		redirect('client/view_client');
	}

	public function delete_client($id)
	{
		$message = $this->MClient->delete_client_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('client/view_client');
	}
}
