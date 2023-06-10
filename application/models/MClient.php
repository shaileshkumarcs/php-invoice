<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MClient extends CI_Model
{
	public function store_client_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'phone' => $this->input->post('phone', true),
			'business' => $this->input->post('business', true),
			'address1' => $this->input->post('address1', true),
			'address2' => $this->input->post('address2', true),
			'country' => $this->input->post('country', true),
			'zip_code' => $this->input->post('zip_code', true)
		);
		$this->db->insert('tbl_client', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_client')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_client')->row();
	}

	public function update_client_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'phone' => $this->input->post('phone', true),
			'business' => $this->input->post('business', true),
			'address1' => $this->input->post('address1', true),
			'address2' => $this->input->post('address2', true),
			'country' => $this->input->post('country', true),
			'zip_code' => $this->input->post('zip_code', true)
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_client', $data);
	}

	public function delete_client_record($id)
	{
		$this->db->delete('tbl_client', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		}
	}
}
