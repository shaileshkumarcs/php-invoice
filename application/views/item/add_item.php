<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Item | <a href="<?php echo base_url('item/view_item'); ?>">
			<button class="btn btn-info btn-sm">View Item</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Item</li>
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
					<h3 class="box-title">Add Item</h3>
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
						<form role="form" action="<?= base_url('item/store_item'); ?>" method="post"
							  enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Item Name</label>
									<input type="text" class="form-control" name="name" id="exampleInputPassword1"
										   placeholder="Enter Name">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Item Price</label>
									<input type="number" step="any" class="form-control" name="price" id="exampleInputPassword1"
										   placeholder="Enter Price">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Item Description</label>
									<textarea class="form-control" rows="3" name="description"
											  placeholder="Enter ..."></textarea>
								</div>
							</div>
							<!-- /.box-body -->

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
