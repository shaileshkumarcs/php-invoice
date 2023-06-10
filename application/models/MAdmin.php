<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MAdmin extends CI_Model
{
	public function get_admin_details($username)
	{
		return $this->db->where('username', $username)
			->or_where('email', $username)
			->where('status', 1)
			->get('tbl_admin')->row();
	}

	public function get_admin_records($id)
	{
		return $this->db->where('id', $id)->get('tbl_admin')->row();
	}

	public function upload_image()
	{
		$config['upload_path'] = './image/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 25169930;
		$config['max_width'] = 5200;
		$config['max_height'] = 3500;
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')) {
			$data = $this->upload->data();
			return "image/$data[file_name]";
		} else {
			return false;
		}
	}

	public function store_user_record()
	{
		if ($_FILES['image']['name'] != '' || $_FILES['image']['size'] != 0) {
			$image = $this->upload_image();
			if (!$image) {
				return "Please Upload Valid Image";
			}
		} else {
			$image = '';
		}
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'username' => $this->input->post('username', true),
			'phone' => $this->input->post('phone', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'role' => $this->input->post('role', true),
			'status' => 1,
			'image' => $image
		);
		$this->db->insert('tbl_admin', $data);
		return 'Record Insert Successfully';
	}

	public function get_all_users()
	{
		return $this->db->get('tbl_admin')->result();
	}

	public function change_user_status_record($id, $status)
	{
		$data['status'] = $status;
		$this->db->where('id', $id);
		$this->db->update('tbl_admin', $data);
	}

	public function delete_user_record($id)
	{
		if ($id == 1) {
			return "You can't delete admin";
		} else {
			$this->db->delete('tbl_admin', array('id' => $id));
			if ($this->db->affected_rows() > 0) {
				return "Data Deleted Successfully";
			}
		}
	}

	public function update_user_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'username' => $this->input->post('username', true),
			'phone' => $this->input->post('phone', true),
			'role' => $this->input->post('role', true)
		);

		if ($_FILES['image']['name'] != '' || $_FILES['image']['size'] != 0) {
			$data['image'] = $this->upload_image();
			unlink($this->input->post('userImage', true));
		} else {
			$data['image'] = $this->input->post('userImage', true);
		}

		$password = $this->input->post('password', true);
		$confirm_password = $this->input->post('confirm_password', true);
		$user_id = $this->input->post('id', true);

		if (!empty($password)) {
			if ($password == $confirm_password) {
				$data['password'] = password_hash($password, PASSWORD_DEFAULT);
				$this->db->where('id', $user_id);
				$this->db->update('tbl_admin', $data);
			} else {
				$this->session->set_flashdata('message', 'Password and Confirm password are not match');
				redirect("admin/edit_user/$user_id");
			}
		} else {
			$user_password = $this->db->select('password')->from('tbl_admin')->where('id', $user_id)->get()->row();
			$data['password'] = $user_password->password;
		}
		$this->db->where('id', $user_id);
		$this->db->update('tbl_admin', $data);
	}

	public function count_all_user()
	{
		return $this->db->count_all_results('tbl_admin');
	}

	public function count_all_invoice()
	{
		return $this->db->count_all_results('tbl_invoice');
	}

	public function count_all_client()
	{
		return $this->db->count_all_results('tbl_client');
	}

	public function count_all_item()
	{
		return $this->db->count_all_results('tbl_item');
	}

	public function get_settings_record()
	{
		return $this->db->where('id', 1)->get('tbl_settings')->row();
	}

	public function update_settings_record()
	{
		$data = array(
			'name' => $this->input->post('name', true),
			'email' => $this->input->post('email', true),
			'address' => $this->input->post('address', true),
			'phone' => $this->input->post('phone', true),
			'currency' => $this->input->post('currency', true)
		);

		if ($_FILES['image']['name'] != '' || $_FILES['image']['size'] != 0) {
			$data['logo'] = $this->upload_image();
			if(!empty($this->input->post('old_logo',true))){
			unlink($this->input->post('old_logo', true));
			}
		} else {
			$data['logo'] = $this->input->post('old_logo', true);
		}

		$this->db->where('id', 1);
		$this->db->update('tbl_settings', $data);
	}

}
