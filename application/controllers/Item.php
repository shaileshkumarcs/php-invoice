<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
	}

	public function add_item()
	{
		$data['invoice'] = '';
		$data['title'] = "Item";
		$data['container'] = $this->load->view('item/add_item', '', true);
		$this->load->view('master', $data);
	}

	public function store_item()
	{
		$this->MItem->store_item_record();
		$this->session->set_flashdata('message', 'Record Inserted Successfully');
		redirect('item/add_item');
	}

	public function view_item()
	{
		$data['invoice'] = '';
		$value['items'] = $this->MItem->get_all();
		$data['title'] = "Item";
		$data['container'] = $this->load->view('item/view_item', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_item($id)
	{
		$data['invoice'] = '';
		$value['item'] = $this->MItem->get_record($id);
		$data['title'] = "Item";
		$data['container'] = $this->load->view('item/edit_item', $value, true);
		$this->load->view('master', $data);
	}

	public function update_item()
	{
		$this->MItem->update_item_record();
		$this->session->set_flashdata('message', 'Record Updated Successfully');
		redirect('item/view_item');
	}

	public function delete_item($id)
	{
		$message = $this->MItem->delete_item_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('item/view_item');
	}

	public function get_price_by_item()
	{
		$item = $this->input->post('item', true);
		$price = $this->MItem->get_record($item);
		if ($price) {
			$price_text_box = $price->price;
		} else {
			$price_text_box = '';
		}
		echo json_encode($price_text_box);
	}
	public function get_description_by_item()
	{
		$item = $this->input->post('item', true);
		$price = $this->MItem->get_record($item);
		if ($price) {
			$description_text_box = $price->description;
		} else {
			$description_text_box = '';
		}
		echo json_encode($description_text_box);
	}
}
