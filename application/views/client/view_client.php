<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Client | <a href="<?php echo base_url('client/add_client'); ?>">
			<button class="btn btn-info btn-sm">Add Client</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Client</li>
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
					<h3 class="box-title">View Clients</h3>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="text text-center">
							<?php
							$message = '';
							if (isset($this->session->message)) {
								$message = $this->session->message;
								if ($message == "Record Updated Successfully") { ?>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert">×</button>
										<?php echo $message; ?>
									</div>
								<?php } elseif ($message == "Data Deleted Successfully") { ?>
									<div class="alert alert-success">
										<button class="close" data-dismiss="alert">×</button>
										<?php echo $message; ?>
									</div>
								<?php } else { ?>
									<div class="alert alert-danger">
										<button class="close" data-dismiss="alert">×</button>
										<?php echo $message; ?>
									</div>
								<?php } ?>
							<?php }
							?>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Business</th>
							<th>Country</th>
							<th>Zip Code</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($clients as $client):
							?>
							<tr>
								<td><?= $client->name; ?></td>
								<td><?= $client->email; ?></td>
								<td><?= $client->phone; ?></td>
								<td><?= $client->business; ?></td>
								<td><?= $client->country; ?></td>
								<td><?= $client->zip_code; ?></td>
								<td>
									<a class="btn btn-info btn-edit mr-1 btn-sm"
									   href="<?php echo base_url("client/edit_client/$client->id"); ?>">Edit</a>
									<a class="btn btn-danger del btn-sm"
									   href="<?php echo base_url("client/delete_client/$client->id"); ?>"
									   onclick="return confirm('Are you want to delete');">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
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
