<?php

$items = $this->MAdmin->count_all_item();
$clients = $this->MAdmin->count_all_client();
$users = $this->MAdmin->count_all_user();
$invoices = $this->MAdmin->count_all_invoice();

?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?= $items; ?></h3>

					<p>Items</p>
				</div>
				<div class="icon">
					<i class="fa fa-briefcase"></i>
				</div>
				<a href="<?= base_url('item/view_item'); ?>" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?= $clients; ?></h3>

					<p>Clients</p>
				</div>
				<div class="icon">
					<i class="fa fa-user"></i>
				</div>
				<a href="<?= base_url('client/view_client'); ?>" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?= $invoices; ?></h3>

					<p>Invoice</p>
				</div>
				<div class="icon">
					<i class="fa fa-sticky-note"></i>
				</div>
				<a href="<?= base_url('invoice/view_invoice'); ?>" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?= $users; ?></h3>

					<p>Users</p>
				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="<?= base_url('admin/view_user'); ?>" class="small-box-footer">More info <i
						class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->

	<script src="<?= base_url('asset/dist/'); ?>js/mine.js"></script>
	<script src="<?= base_url('asset/dist/'); ?>js/highchart.js"></script>

	<!-- Main row -->
	<div class="row">
		<!-- Left col -->
		<section class="col-lg-12 connectedSortable">
			<script>
				jQuery(document).ready(function () {
					var myChart = Highcharts.chart('earning1', {
						chart: {
							type: 'column'
						},
						title: {
							text: 'Yearwise Fee Collection'
						},
						xAxis: {
							//categories: ['Apples', 'Bananas', 'Oranges']
						},
						yAxis: {
							title: {
								text: 'Fee'
							}
						},


						series:/* [{
				name: 'Jane',
				data: [1, 0, 4]
			}, {
				name: 'John',
				data: [5, 7, 3]
			}]*/
						<?php echo $series_data; ?>
					});
				});
			</script>
		</section>
		<!-- /.Left col -->
		<!-- right col (We are only adding the ID to make the widgets sortable)-->

		<!-- right col -->
	</div>
	<!-- /.row (main row) -->

</section>
<!-- /.content -->
