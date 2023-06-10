<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Invoice | <a href="<?php echo base_url('invoice/view_invoice'); ?>">
			<button class="btn btn-info btn-sm">View Invoice</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Invoice</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Make Invoice</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form role="form" action="<?= base_url('invoice/update_invoice'); ?>" method="post"
							  enctype="multipart/form-data">
							<div class="box-body">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputPassword1">Select Client</label>
											<select class="form-control select2" name="client_id">
												<option value="">--Select--</option>
												<?php foreach ($clients as $client):
													if ($invoice->client_id == $client->id) {
														?>
														<option value="<?= $client->id; ?>"
																selected><?= $client->name; ?></option>
													<?php } else { ?>
														<option
															value="<?= $client->id; ?>"><?= $client->name; ?></option>
													<?php } endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputPassword1">Invoice No#</label>
											<input type="text" class="form-control" name="invoice_no"
												   id="exampleInputPassword1" value="<?= $invoice->invoice_no; ?>"
												   placeholder="Enter Invoice No">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="exampleInputPassword1">Date</label>
											<input type="text" class="form-control datepicker" name="date"
												   value="<?= $invoice->date; ?>"
												   id="exampleInputPassword1">
										</div>
									</div>
								</div>
								<input type="hidden" value="<?= $invoice->id; ?>" name="old_invoice_id">
								<br><br><br>
								<?php
								$invoice_items = $this->MInvoice->get_all_items_by_invoice($invoice->id);
								?>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-bordered table-striped">
											<thead>
											<tr>
												<th>Item</th>
												<th>Description</th>
												<th>Price $</th>
												<th>Qty</th>
												<th>Total</th>
											</tr>
											</thead>
											<tbody id="tBody">
											<?php
											$i = 1;
											$sub_total = 0;
											foreach ($invoice_items as $invoice_item):
												?>
												<tr>
													<td>
														<select class="select2 item form-control" name="item_id[]"
																id="eitem<?= $i; ?>">
															<option value="admin">--Select--</option>
															<?php foreach ($items as $item):
																if ($invoice_item->item_id == $item->id) {
																	?>
																	<option value="<?= $item->id; ?>"
																			selected><?= $item->name; ?></option>
																<?php } else { ?>
																	<option
																		value="<?= $item->id; ?>"><?= $item->name; ?></option>
																<?php } endforeach; ?>
														</select>
													</td>
													<td>
													<textarea type="text" cols="35px" rows="1.5px" class="form-control"
															  name="description[]"
															  id="exampleInputPassword1"><?= $invoice_item->description; ?></textarea>
													</td>
													<td>
														<input type="text" class="eprice<?= $i; ?> form-control"
															   name="price[]"
															   value="<?= $invoice_item->price; ?>"
															   id="exampleInputPassword1">
													</td>
													<td>
														<input type="text" class="cal<?= $i; ?> form-control"
															   name="qty[]"
															   value="<?= $invoice_item->qty; ?>"
															   id="eqty<?= $i; ?>">
													</td>
													<td>
														<label
															id="eoutput<?= $i; ?>"><?php echo($invoice_item->price * $invoice_item->qty); ?></label>
													</td>
												</tr>
												<input type="hidden" value="<?= $invoice_item->id; ?>"
													   name="old_item_id[]">
												<?php
												$sub_total += ($invoice_item->price * $invoice_item->qty);
												$i++; endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 pull-right">
										<table class="table table-striped">
											<tr class="text-right">
												<td colspan="4">Subtotal $:</td>
												<td><label id="sub">
														<?php
														echo $sub_total;
														?>
													</label></td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Vat $:</td>
												<td><input style="width: 50px" type="text" class="" name="vat"
														   value="<?= $invoice->vat; ?>"
														   id="evat">%
												</td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Total $:</td>
												<td><label id="etotalAmount"><?= $invoice->total; ?></label></td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Total Paid $:</td>
												<td><input style="width: 50px" type="text" class="" name="paid"
														   value="<?= $invoice->total_paid; ?>"
														   id="epaid"></td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Total Due $:</td>
												<td><label id="etotalDue"><?= $invoice->total_due; ?></label></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<!-- /.box-body -->

							<div class="box-footer pull-right">
								<button type="submit" class="btn btn-primary">Generate Invoice</button>
							</div>
						</form>
					</div>
				</div>
				<!-- form start -->
			</div>
			<!-- /.box -->

		</div>
		<!--/.col (left) -->
	</div>
	<!-- /.row -->
	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
		<section class="col-lg-7 connectedSortable">

		</section>
		<!-- /.Left col -->
		<!-- right col (We are only adding the ID to make the widgets sortable)-->
		<section class="col-lg-5 connectedSortable">


		</section>
		<!-- right col -->
	</div>
	<!-- /.row (main row) -->

</section>
<!-- /.content -->
