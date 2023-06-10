<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MItem extends CI_Model
{
	public function store_item_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'description' => $this->input->post('description', true)
		);
		$this->db->insert('tbl_item', $data);
	}

	public function get_all()
	{
		return $this->db->get('tbl_item')->result();
	}

	public function get_record($id)
	{
		return $this->db->where('id', $id)->get('tbl_item')->row();
	}

	public function update_item_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'description' => $this->input->post('description', true)
		);
		$this->db->where('id', $this->input->post('id', true));
		$this->db->update('tbl_item', $data);
	}

	public function delete_item_record($id)
	{
		$this->db->delete('tbl_item', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		}
	}
}
