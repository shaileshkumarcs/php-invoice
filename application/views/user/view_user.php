<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		User | <a href="<?php echo base_url('admin/add_user'); ?>">
			<button class="btn btn-info btn-sm">Add User</button>
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
					<h3 class="box-title">View Users</h3>
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
							<th>SL No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php $i = 1;
						foreach ($users as $user):
							?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?= $user->name; ?></td>
								<td><?= $user->email; ?></td>
								<td><?= $user->username; ?></td>
								<?php if ($user->status == 1) { ?>
									<td><span class="label label-success">Active</span></td>
								<?php } else { ?>
									<td><span class="label label-danger">Inactive</span></td>
								<?php } ?>
								<td>
									<?php if ($user->status == 1) { ?>
										<a class="btn btn-danger btn-edit mr-1 btn-sm"
										   href="<?php echo base_url("admin/change_user_status/$user->id/0"); ?>">Inactive</a>
									<?php } else { ?>
										<a class="btn btn-success btn-edit mr-1 btn-sm"
										   href="<?php echo base_url("admin/change_user_status/$user->id/1"); ?>">Active</a>
									<?php } ?>
									<a class="btn btn-info btn-edit mr-1 btn-sm"
									   href="<?php echo base_url("admin/edit_user/$user->id"); ?>">Edit</a>
									<a class="btn btn-danger del btn-sm"
									   href="<?php echo base_url("admin/delete_user/$user->id"); ?>"
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
