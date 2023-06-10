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
						<form role="form" action="<?= base_url('invoice/store_invoice'); ?>" method="post"
							  enctype="multipart/form-data">
							<div class="box-body">
								<div class="row">
								    <div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Select Client</label>
											<select class="form-control select2" name="client_id" style="height:34px !important;" required>
												<option value="">--Select--</option>
												<?php foreach ($clients as $client): ?>
													<option value="<?= $client->id; ?>"><?= $client->name; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
								    </div>
								    <div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Invoice No#</label>
											<input type="text" class="form-control" name="invoice_no"
												   id="exampleInputPassword1" value="<?= rand(10000, 20000); ?>"
												   placeholder="Enter Invoice No">
										</div>
								    </div>
								    <div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Payment Terms</label>
											<input class="form-control" name="payment-term" placeholder="Enter Payment Term">
										</div>
								    </div>
								    <div class="col-md-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Date</label>
											<input type="text" class="form-control datepicker" name="date"
												   id="exampleInputPassword1"
												   placeholder="Enter Invoice Date" required>
										</div>
								    </div>
								    
								</div>
								<br><br><br>
								<div class="row">
								    <div class="col-md-2">
										<div class="text-right">
											<button type="button" name="add" id="add"
													class="btn btn-info btn-custom-invoice mt-3"><i class="fa fa-plus"></i> Add
											</button>
										</div>
								    </div>
									<div class="col-md-10 table-responsive">
										<table class="table table-bordered table-striped select-invoice">
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
											<tr>
												<td>
													<select class="select2 item form-control" name="item_id[]" id="item1">
														<option value="admin">--Select--</option>
														<?php foreach ($items as $item): ?>
															<option
																value="<?= $item->id; ?>"><?= $item->name; ?></option>
														<?php endforeach; ?>
													</select>
												</td>
												<td>
													<textarea type="text" cols="35px" rows="1.5px" class="form-control"
															  name="description[]"
															  id="exampleInputPassword1"></textarea>
												</td>
												<td>
													<input type="text" class="price1 form-control" name="price[]"
														   id="exampleInputPassword1">
												</td>
												<td>
													<input type="text" class="calTotal form-control" name="qty[]"
														   id="qty1">
												</td>
												<td>
													<label id="output1">0</label>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 pull-right" style=" margin-top: 25px;">
										<table class="table table-striped">
											<tr class="text-right">
												<td colspan="4">Subtotal $:</td>
												<td><label id="subTotal">0.00</label></td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Vat $:</td>
												<td><input style="width: 50px" type="text" class="" name="vat"
														   id="vat">%
												</td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Total $:</td>
												<td><label id="totalAmount">0.00</label></td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Total Paid $:</td>
												<td><input style="width: 50px" type="text" class="" name="paid"
														   id="paid"></td>
											</tr>
											<tr class="text-right">
												<td colspan="4">Total Due $:</td>
												<td><label id="totalDue">0.00</label></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<!-- /.box-body -->
								<div class="col-md-12">
                            	<div class="row" style="margin:5px">
                            	    <p>Terms & conditions:</p>
                            	    <textarea class="form-control" rows="5">
                            	        
                            	    </textarea>
                            	</div>
                            	</div>
							<div class="box-footer text-right">
								<button type="submit" class="btn btn-info">Generate Invoice</button>
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
