<?php
$result = $this->MClient->get_record($invoice->client_id);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Invoice
		<small>#<?= $invoice->invoice_no; ?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Examples</a></li>
		<li class="active">Invoice</li>
	</ol>
</section>

<!-- Main content -->
<section class="invoice">
	<div id="printableArea">
		<!-- title row -->
		<div class="row">
			<div class="col-md-8">
				<h2 class="page-header" style="border:0px;">
					<img src="<?= base_url("$settings->logo"); ?>" width="200px" height="80px">

				</h2>
			</div>
		
			<div class="col-md-4">
				<div class="invoice-col" style="">
					<address>
						<strong><h6><?= $settings->name; ?></h6></strong>
						<p><?php echo $settings->address; ?></p>
						<p>Phone: <?= $settings->phone; ?></p>
						<p>Email: <?= $settings->email; ?></p>
					</address>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row container">
			<div class="invoice-info">
				<!-- /.col -->
				<div class="row">
				<div class="col-md-4 invoice-col">
					<h4 class="text-info font-weight-bold">Bill to</h4>
					<address>
						<h6><?= $result->name; ?></h6>
						<p><?= $result->address1; ?></p>
						<p>Email: <?= $result->email; ?></p>
					</address>
				</div>
				<div class="col-md-4 col-md-offset-3 invoice-col">
					<table class="table table-bordered table-invoice border border-dark" style="margin-right:50px">
						<tbody>
						<tr>
							<th scope="row">Date:</th>
							<td><?= date('jS M, Y ', strtotime($invoice->date)); ?></td>
						</tr>
						<tr>
							<th scope="row">Invoice</th>
							<td>#<?= $invoice->invoice_no; ?></td>
						</tr>
						<tr>
							<th scope="row">Payment Due(<?= $settings->currency; ?>):</th>
							<td class="text-danger"><?= $invoice->total_due; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	
		<!-- /.row -->

		<?php
		$items = $this->MInvoice->get_all_items_by_invoice($invoice->id);
		?>

		<!-- Table row -->
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<table class="table table-bordered table-full">
					<thead>
					<tr>
						<th>Qty</th>
						<th>Product</th>
						<th>Description</th>
						<th width="100px">Subtotal</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($items as $item):
						$product = $this->MItem->get_record($item->item_id);
						?>
						<tr>
							<td class=""><?= $item->qty; ?></td>
							<td class=""><?= $product->name; ?></td>
							<td class="text-right"><?= $item->description; ?></td>
							<td class="text-right"><?= $settings->currency . ' '; ?><?php echo $item->price * $item->qty; ?></td>
						</tr>
					<?php endforeach; ?>

					<tr>
						<th colspan="3" class="text-right">Subtotal:</th>
						<td class="text-right"><strong><?= $settings->currency . ' '; ?><?= $invoice->subtotal; ?></strong></td>
					</tr>
					<tr>
						<th colspan="3" class="text-right">VAT (<?= $invoice->vat; ?>%)</th>
						<td class="text-right"><?= $settings->currency . ' '; ?><?php echo $invoice->subtotal * (($invoice->vat) / 100); ?></td>
					</tr>
					<tr>
						<th colspan="3" class="text-right">Total:</th>
						<td class="text-right"><strong><?= $settings->currency . ' '; ?><?= $invoice->total; ?></strong></td>
					</tr>
					<tr>
						<th colspan="3" class="text-right">Total Paid:</th>
						<td class="text-right text-info"><?= $settings->currency . ' '; ?><?= $invoice->total_paid; ?></td>
					</tr>
					<tr>
						<th colspan="3" class="text-right">Total Due:</th>
						<td class="text-right text-danger"><?= $settings->currency . ' '; ?><?= $invoice->total_due; ?></td>
					</tr>
					</tbody>
				</table>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
<div class="col-md-12" style="margin-top:50px">
	    <p>Authorized Signature: ---------------------</p>
	</div>
	</div>
	

	<!-- this row will not appear when printing -->
	<div class="row no-print">
		<div class="col-xs-12">

			<button id="print" onclick="printDiv('printableArea')" class="btn btn-default pull-right"
					type="button"><span><i
						class="fa fa-print"></i> Print</span></button>
			<button type="button" class="btn btn-primary pull-right pdf" style="margin-right: 5px;" onclick="pdf();">
				<i class="fa fa-download"></i> Generate PDF
			</button>
		</div>
	</div>
</section>
<!-- /.content -->
<div class="clearfix"></div>

<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
</script>

