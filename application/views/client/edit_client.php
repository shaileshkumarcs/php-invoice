<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Client | <a href="<?php echo base_url('client/view_client'); ?>">
			<button class="btn btn-info btn-sm">View Client</button>
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
					<h3 class="box-title">Edit Client</h3>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="text text-center">
							<?php
							$message = '';
							if (isset($this->session->message)) {
								$message = $this->session->message;
								if ($message == "Record Inserted Successfully") { ?>
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
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<form role="form" action="<?= base_url('client/update_client'); ?>" method="post"
							  enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Full Name</label>
									<input type="text" class="form-control" name="name" id="exampleInputPassword1"
										   value="<?= $client->name; ?>" placeholder="Enter Name">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input type="text" class="form-control" name="email" id="exampleInputPassword1"
										   value="<?= $client->email; ?>" placeholder="Enter Email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Business</label>
									<input type="text" class="form-control" name="business" id="exampleInputPassword1"
										   value="<?= $client->business; ?>" placeholder="Enter Business">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Phone</label>
									<input type="text" class="form-control" name="phone" id="exampleInputPassword1"
										   value="<?= $client->phone; ?>" placeholder="Enter Phone">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Address 1</label>
									<textarea class="form-control" rows="3" name="address1"
											  placeholder="Enter ..."><?= $client->address1; ?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Address 2</label>
									<textarea class="form-control" rows="3" name="address2"
											  placeholder="Enter ..."><?= $client->address2; ?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Country</label>
									<input type="text" class="form-control" name="country" id="exampleInputPassword1"
										   value="<?= $client->country; ?>" placeholder="Enter Country">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Zip Code State</label>
									<input type="text" class="form-control" name="zip_code" id="exampleInputPassword1"
										   value="<?= $client->zip_code; ?>" placeholder="Enter Zip Code State">
								</div>
							</div>
							<!-- /.box-body -->

							<input type="hidden" value="<?= $client->id; ?>" name="id">

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
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
