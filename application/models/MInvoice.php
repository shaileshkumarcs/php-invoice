<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MInvoice extends CI_Model
{
	public function store_invoice_record()
	{
		$data = array(
			'invoice_no' => $this->input->post('invoice_no', true),
			'client_id' => $this->input->post('client_id', true),
			'date' => $this->input->post('date', true),
			'vat' => $this->input->post('vat', true),
			'total_paid' => $this->input->post('paid', true)
		);
		$item_price = $this->input->post('price[]', true);
		$item_qty = $this->input->post('qty[]', true);
		$amount = 0;
		for ($i = 0; $i < count($item_price); $i++) {
			$amount += ($item_price[$i] * $item_qty[$i]);
		}
		$vat = $this->input->post('vat', true);
		$vat_amount = $amount * ($vat / 100);
		$total_amount = $amount + $vat_amount;
		$paid = $this->input->post('paid', true);
		$data['subtotal'] = $amount;
		$data['total_due'] = $total_amount - $paid;
		$data['total'] = $total_amount;
		$this->db->insert('tbl_invoice', $data);
		return $this->db->insert_id();
	}

	public function store_invoice_item_record($insert_id)
	{
		$item_id = $this->input->post('item_id[]', true);
		$item_description = $this->input->post('description[]', true);
		$item_price = $this->input->post('price[]', true);
		$item_qty = $this->input->post('qty[]', true);
		$data = array();
		for ($i = 0; $i < count($item_id); $i++) {
			$data[$i] = array(
				'item_id' => $item_id[$i],
				'description' => $item_description[$i],
				'price' => $item_price[$i],
				'qty' => $item_qty[$i],
				'invoice_id' => $insert_id
			);
		}
		$this->db->insert_batch('tbl_invoice_item', $data);
	}

	public function update_invoice_record()
	{
		$data = array(
			'invoice_no' => $this->input->post('invoice_no', true),
			'client_id' => $this->input->post('client_id', true),
			'date' => $this->input->post('date', true),
			'vat' => $this->input->post('vat', true),
			'total_paid' => $this->input->post('paid', true)
		);
		$item_price = $this->input->post('price[]', true);
		$item_qty = $this->input->post('qty[]', true);
		$amount = 0;
		for ($i = 0; $i < count($item_price); $i++) {
			$amount += ($item_price[$i] * $item_qty[$i]);
		}
		$vat = $this->input->post('vat', true);
		$vat_amount = $amount * ($vat / 100);
		$total_amount = $amount + $vat_amount;
		$paid = $this->input->post('paid', true);
		$data['subtotal'] = $amount;
		$data['total_due'] = $total_amount - $paid;
		$data['total'] = $total_amount;
		$this->db->where('id', $this->input->post('old_invoice_id', true));
		$this->db->update('tbl_invoice', $data);
	}

	public function update_invoice_item_record()
	{
		$item_id = $this->input->post('item_id[]', true);
		$item_description = $this->input->post('description[]', true);
		$item_price = $this->input->post('price[]', true);
		$item_qty = $this->input->post('qty[]', true);
		$old_id = $this->input->post('old_item_id[]', true);
		$data = array();
		for ($i = 0; $i < count($item_id); $i++) {
			$data[$i] = array(
				'item_id' => $item_id[$i],
				'description' => $item_description[$i],
				'price' => $item_price[$i],
				'qty' => $item_qty[$i]
			);
			$this->db->where('id', $old_id[$i]);
			$this->db->update('tbl_invoice_item', $data[$i]);
		}
	}

	public function get_all_invoice()
	{
		return $this->db->get('tbl_invoice')->result();
	}

	public function get_invoice_record($invoice_id)
	{
		return $this->db->where('id', $invoice_id)->get('tbl_invoice')->row();
	}

	public function get_all_items_by_invoice($invoice_id)
	{
		return $this->db->where('invoice_id', $invoice_id)->get('tbl_invoice_item')->result();
	}

	public function count_item_record_by_invoice($invoice_id)
	{
		return $this->db->where('invoice_id', $invoice_id)->count_all_results('tbl_invoice_item');
	}

	public function get_settings_record()
	{
		return $this->db->where('id', 1)->get('tbl_settings')->row();
	}

	public function delete_invoice_record($id)
	{
		$this->db->delete('tbl_invoice_item', array('invoice_id' => $id));
		$this->db->delete('tbl_invoice', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return "Data Deleted Successfully";
		}
	}

	public function get_for_chart()
	{
		$data = $this->db->query('SELECT client_id, SUM(total) as amount FROM `tbl_invoice` GROUP BY client_id')->result_array();
		if($data) {
			foreach ($data as $d) {
				$client = $this->MClient->get_record($d['client_id']);
				$d['amount'] = (int)$d['amount'];
				$name = $client->name;
				$data = array($d['amount']);
				$series_data[] = array('name' => $name, 'data' => $data);

			}
			return $series_data = json_encode($series_data);
		}
	}
}
