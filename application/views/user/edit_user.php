<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		User | <a href="<?php echo base_url('admin/view_user'); ?>">
			<button class="btn btn-info btn-sm">View User</button>
		</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">User</li>
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
					<h3 class="box-title">Edit User</h3>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="text text-center">
							<?php
							$message = '';
							if (isset($this->session->message)) {
								$message = $this->session->message;
								if ($message == "Record Insert Successfully") { ?>
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
						<form role="form" action="<?= base_url('admin/update_user'); ?>" method="post"
							  enctype="multipart/form-data">
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Name</label>
									<input type="text" class="form-control" name="name" id="exampleInputPassword1"
										   value="<?= $user->name; ?>" placeholder="Enter Name">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input type="text" class="form-control" name="email" id="exampleInputPassword1"
										   value="<?= $user->email; ?>" placeholder="Enter Email">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Username</label>
									<input type="text" class="form-control" name="username" id="exampleInputPassword1"
										   value="<?= $user->username; ?>" placeholder="Enter Username">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Phone</label>
									<input type="text" class="form-control" name="phone" id="exampleInputPassword1"
										   value="<?= $user->phone; ?>" placeholder="Enter Phone">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" name="password"
										   id="exampleInputPassword1"
										   placeholder="Enter Password">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirm Password</label>
									<input type="password" class="form-control" name="confirm_password"
										   id="exampleInputPassword1"
										   placeholder="Enter Confirm Password">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Role</label>
									<select class="form-control select2" name="role">
										<?php if ($user->role == 'admin') { ?>
											<option value="admin" selected>Admin</option>
											<option value="user">User</option>
										<?php } else { ?>
											<option value="admin">Admin</option>
											<option value="user" selected>User</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Image</label>
									<input type="file" id="exampleInputFile" name="image"
										   onchange="imagePreview(this);"><br>
									<?php if ($user->image != '') { ?>
										<img src="<?= base_url("$user->image"); ?>" class="img-thumbnail" id="img">
									<?php } else { ?>
										<img src="http://placehold.it/150x150" class="img-thumbnail" id="img">
									<?php } ?>
								</div>
							</div>
							<!-- /.box-body -->

							<input type="hidden" value="<?= $user->id; ?>" name="id">
							<input type="hidden" value="<?= $user->image; ?>" name="userImage">

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
