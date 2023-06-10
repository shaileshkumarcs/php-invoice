<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Settings
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Settings</li>
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
					<h3 class="box-title">Edit Settings</h3>
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
						<form role="form" action="<?= base_url('admin/update_settings_record'); ?>" method="post"
							  enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Company Name</label>
									<input type="text" value="<?= $result->name; ?>" class="form-control" name="name"
										   id="exampleInputPassword1"
										   placeholder="Enter Name">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Company Email</label>
									<input type="text" class="form-control" value="<?= $result->email; ?>" name="email"
										   id="exampleInputPassword1"
										   placeholder="Enter Email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Address</label>
									<textarea class="form-control" rows="3" name="address"
											  placeholder="Enter ..."><?= $result->address; ?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Phone</label>
									<input type="text" class="form-control" name="phone" id="exampleInputPassword1"
										   value="<?= $result->phone; ?>"
										   placeholder="Enter Phone">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Currency</label>
									<input type="text" class="form-control" name="currency" id="exampleInputPassword1"
										   value="<?= $result->currency; ?>"
										   placeholder="Enter Currency">
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Image</label>
									<input type="file" id="exampleInputFile" name="image"
										   onchange="imagePreview(this);"><br>
									<?php if ($result->logo != '') { ?>
										<img src="<?= base_url("$result->logo"); ?>" class="img-thumbnail" id="img">
									<?php } else { ?>
										<img src="http://placehold.it/150x150" class="img-thumbnail" id="img">
									<?php } ?>
								</div>
							</div>
							<!-- /.box-body -->

							<input type="hidden" value="<?= $result->logo; ?>" name="old_logo">

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
