<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->id)) {
			redirect('login');
		}
	}

	public function make_invoice()
	{
		$data['invoice'] = '';
		$value['clients'] = $this->MClient->get_all();
		$value['items'] = $this->MItem->get_all();
		$data['items'] = $this->MItem->get_all();
		$data['title'] = "Invoice";
		$data['container'] = $this->load->view('invoice/make_invoice', $value, true);
		$this->load->view('master', $data);
	}

	public function store_invoice()
	{
		$insert_id = $this->MInvoice->store_invoice_record();
		$this->MInvoice->store_invoice_item_record($insert_id);
		redirect("invoice/show_invoice/$insert_id");
	}

	public function show_invoice($insert_id)
	{
		$data['invoice'] = '';
		$value['invoice'] = $this->MInvoice->get_invoice_record($insert_id);
		$value['settings'] = $this->MInvoice->get_settings_record();
		$data['title'] = "Invoice";
		$data['container'] = $this->load->view('invoice/show_invoice', $value, true);
		$this->load->view('master', $data);
	}

	public function view_invoice()
	{
		$data['invoice'] = '';
		$value['invoices'] = $this->MInvoice->get_all_invoice();
		$data['title'] = "Invoice";
		$data['container'] = $this->load->view('invoice/view_invoice', $value, true);
		$this->load->view('master', $data);
	}

	public function edit_invoice($id)
	{
		$invoice = $this->MInvoice->get_invoice_record($id);
		$value['invoice'] = $invoice;
		$value['clients'] = $this->MClient->get_all();
		$value['items'] = $this->MItem->get_all();
		$data['items'] = $this->MItem->get_all();
		$data['invoice'] = $invoice;
		$data['title'] = "Invoice";
		$data['container'] = $this->load->view('invoice/edit_invoice', $value, true);
		$this->load->view('master', $data);
	}

	public function update_invoice()
	{
		$this->MInvoice->update_invoice_record();
		$this->MInvoice->update_invoice_item_record();
		$this->session->set_flashdata('message', 'Record Updated Successfully');
		redirect('invoice/view_invoice');
	}

	public function delete_invoice($id)
	{
		$message = $this->MInvoice->delete_invoice_record($id);
		$this->session->set_flashdata('message', $message);
		redirect('invoice/view_invoice');
	}
}
