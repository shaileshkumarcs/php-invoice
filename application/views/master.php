<?php
$id = $this->session->userdata('id');
$details = $this->MAdmin->get_admin_records($id);
?>
<!DOCTYPE html>
<html style="height: 100% !important;">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet"
		  href="<?= base_url('asset/bower_components/'); ?>bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet"
		  href="<?= base_url('asset/bower_components/'); ?>font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url('asset/bower_components/'); ?>Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet"
		  href="<?= base_url('asset/bower_components/'); ?>datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('asset/dist/'); ?>css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url('asset/dist/'); ?>css/custom.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url('asset/dist/'); ?>css/skins/_all-skins.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?= base_url('asset/bower_components/'); ?>morris.js/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?= base_url('asset/bower_components/'); ?>jvectormap/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet"
		  href="<?= base_url('asset/bower_components/'); ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet"
		  href="<?= base_url('asset/bower_components/'); ?>bootstrap-daterangepicker/daterangepicker.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('asset/'); ?>bower_components/select2/dist/css/select2.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet"
		  href="<?= base_url('asset/plugins/'); ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Google Font -->
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<style>
		.datepicker {
			z-index: 9999 !important;
		}
		#loading{
        background: url("<?=base_url()?>image/ajax-loader.gif") no-repeat scroll 50% 10% transparent;
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 999999;
        display:none;
    }
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="height: 100% !important;">
<!-- preloader start-->
 <div id="loading"></div>
<div class="invoice-overlay"
	 style="width: 100%; height: 100%; background: rgba(255, 255, 255, 1); z-index: 5000; position: fixed; top: 0px; left: 0px;">
	<i class="fa fa-refresh fa-spin nexo-refresh-icon"
	   style="color: rgb(0, 0, 0); font-size: 50px; position: absolute; top: 50%; left: 50%; margin-top: -25px; margin-left: -25px; width: 44px; height: 50px;"></i>
</div>
<!--Preloader end-->
<div class="wrapper" style="height: 100% !important;">

	<header class="main-header">
		<!-- Logo -->
		<a href="<?= base_url('admin'); ?>" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>A</b>D</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Admin</b></span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?= base_url("$details->image"); ?>" class="user-image"
								 alt="User Image">
							<span class="hidden-xs"><?= $details->name; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="<?= base_url("$details->image"); ?>"
									 class="img-circle" alt="User Image">

								<p>
									<?= $details->name; ?>
								</p>
							</li>
							<!-- Menu Body -->
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="<?= base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign
										out</a>
								</div>
							</li>
						</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->
				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?= base_url("$details->image"); ?>" class="img-circle"
						 alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?= $details->name; ?></p>
					<i class="fa fa-circle text-success"></i> Online
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li>
					<a href="<?= base_url('admin'); ?>">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span>
						<span class="pull-right-container">
            </span>
					</a>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-user"></i>
						<span>Clients</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?= base_url('client/add_client'); ?>"><i class="fa fa-circle-o"></i>Add
								Client</a></li>
						<li><a href="<?= base_url('client/view_client'); ?>"><i class="fa fa-circle-o"></i> View
								Client</a></li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa  fa-briefcase"></i>
						<span>Items</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?= base_url('item/add_item'); ?>"><i class="fa fa-circle-o"></i>Add
								Item</a></li>
						<li><a href="<?= base_url('item/view_item'); ?>"><i class="fa fa-circle-o"></i> View
								Item</a></li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-sticky-note"></i>
						<span>Invoice</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?= base_url('invoice/make_invoice'); ?>"><i class="fa fa-circle-o"></i>Make
								Invoice</a></li>
						<li><a href="<?= base_url('invoice/view_invoice'); ?>"><i class="fa fa-circle-o"></i> View
								Invoice</a></li>
					</ul>
				</li>

				<li class="treeview">
					<a href="#">
						<i class="fa fa-users"></i>
						<span>User</span>
						<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?= base_url('admin/add_user'); ?>"><i class="fa fa-circle-o"></i>Add User</a></li>
						<li><a href="<?= base_url('admin/view_user'); ?>"><i class="fa fa-circle-o"></i> View User</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?= base_url('admin/edit_settings'); ?>">
						<i class="fa fa-cog"></i> <span>Settings</span>
						<span class="pull-right-container">
            </span>
					</a>
				</li>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<?= $container; ?>
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer text-center">
		<strong>Copyright &copy; 2018 <a href="https://adminlte.io">Synchronise IT</a>.</strong> All rights
		reserved.
	</footer>

	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('asset/bower_components/'); ?>jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('asset/bower_components/'); ?>jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('asset/bower_components/'); ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('asset/'); ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('asset/bower_components/'); ?>raphael/raphael.min.js"></script>
<script src="<?= base_url('asset/bower_components/'); ?>morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('asset/bower_components/'); ?>jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('asset/plugins/'); ?>jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('asset/plugins/'); ?>jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- DataTables -->
<script src="<?= base_url('asset/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script
	src="<?= base_url('asset/'); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('asset/bower_components/'); ?>jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('asset/bower_components/'); ?>moment/min/moment.min.js"></script>
<script src="<?= base_url('asset/bower_components/'); ?>bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script
	src="<?= base_url('asset/bower_components/'); ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('asset/plugins/'); ?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('asset/bower_components/'); ?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('asset/bower_components/'); ?>fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/dist/'); ?>js/adminlte.js"></script>

<script src="<?= base_url('asset/dist/'); ?>js/jspdf.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('asset/dist/'); ?>js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/dist/'); ?>js/demo.js"></script>

<script src="<?= base_url('asset/dist/'); ?>js/main.js"></script>

<?php
if ($invoice != '') {
	$invoice_items = $this->MInvoice->get_all_items_by_invoice($invoice->id);
	$i = 1;
	echo '<script>';
	$total_item = count($invoice_items);
	echo "var total_item = $total_item;";
	foreach ($invoice_items as $invoice_item):
		echo '
				$("#eitem' . $i . '").change(function() {
				    var item = $(this).val();
					var base_url = location.protocol + \'//\' + location.host + \'/invoiceMaker/\';
					$.ajax({
					url: base_url + \'item/get_price_by_item\',
					type: "POST",
					data: {\'item\': item},
					cache: false,
					success: function (msg) {
						var data = $.parseJSON(msg);
						$(".eprice' . $i . '").val(data);
					},
					error: function () {
						alert(\'Error Occur...\');
					}
				  });
				});
					
				$("#eqty' . $i . '").keyup(function () {
					var result = 0;
					$("#eqty' . $i . '").each(function () {
					result = parseFloat($(".eprice' . $i . '").val()) * parseFloat($(this).val());
					});
				   $("#eoutput' . $i . '").text(result);
				});
			  ';
		if ($i != 1) {
			echo '
				$(".cal' . $i . '").change(function() {
					calculate_count();	   
				});
			';
		}
		$i++;
	endforeach;
	echo '
			$(".cal1").change(function() {
				calculate_count();	   
			});
			
			function calculate_count() {
				var total = 0;
				for(var i = 1; i <= total_item; i++) {
					total += (parseFloat($(\'.eprice\' + i + \'\').val()) * parseFloat($(\'#eqty\' + i + \'\').val()));
				}
				$(\'#sub\').text(total);
			}
	';
	echo '</script>';
}
?>
<script>
	function imagePreview(input) {
		if (input.files && input.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function (ev) {
				$('#img').attr('src', ev.target.result);
			};
			fileReader.readAsDataURL(input.files[0]);
		}
	}

	$('#example1').DataTable();
	$('.select2').select2();
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
	});
</script>
<script>
	$(document).ready(function () {
		var count = 1;
		$('#add').click(function () {
			count++;
			$('#tBody').append(
				'<tr class="yTr' + count + '">\n' +	
				
				'<td>\n' +
				'<button type="button" name="add" id="' + count + '"\n' +
				'class="btn btn-danger btn_remove btn-xs">X\n' +
				'</button>\n' +
				'<select class="select2 item form-control" name="item_id[]" id="item' + count + '">\n' +
				'<option value="admin">--Select--</option>\n' +
				'<?php foreach ($items as $item): ?>\n' +
				'<option\n' +
				'value="<?= $item->id; ?>"><?= $item->name; ?></option>\n' +
				'<?php endforeach; ?>\n' +
				'</select>\n' +
				'</td>\n' +
				'<td>\n' +
				'<textarea type="text" cols="35px" rows="1.5px" class="form-control"\n' +
				'name="description[]"\n' +
				'id="description"></textarea>\n' +
				'</td>\n' +
				'<td>\n' +
				'<input type="text" class="price' + count + ' form-control" name="price[]"\n' +
				'id="price' + count + '">\n' +
				'</td>\n' +
				'<td>\n' +
				'<input type="text" class="calTotal' + count + ' form-control" name="qty[]"\n' +
				'id="qty' + count + '">\n' +
				'</td>\n' +
				'<td>\n' +
				'<label id="output' + count + '">0</label>\n' +
				'</td>\n' +
			
				'</tr>');
			$('.select2').select2();

			$('#item' + count + '').change(function () {
				var item = $(this).val();
				var base_url = location.protocol + '//' + location.host + '/invoiceMaker/';
				$.ajax({
					url: base_url + 'item/get_price_by_item',
					type: "POST",
					data: {'item': item},
					cache: false,
					success: function (msg) {
						var data = $.parseJSON(msg);
						$('#price' + count + '').val(data);
					},
					error: function () {
						alert('Error Occur...');
					}
				});
				
			});
			
			
				$('#item' + count + '').change(function () {
				var item = $(this).val();
				var base_url = location.protocol + '//' + location.host + '/invoiceMaker/';
				$.ajax({
					url: base_url + 'item/get_description_by_item',
					type: "POST",
					data: {'item': item},
					cache: false,
					success: function (msg) {
						var data = $.parseJSON(msg);
						$('#description' + count + '').val(data);
					},
					error: function () {
						alert('Error Occur...');
					}
				});
						
			});

			$('#qty' + count + '').keyup(function () {
				var result = 0;
				$('#qty' + count + '').each(function () {
					result = parseFloat($('.price' + count + '').val()) * parseFloat($(this).val());
				});
				$('#output' + count + '').text(result);
			});

			$('.calTotal' + count + '').change(function () {
				cal_count();
			});
		});

		$(document).on('click', '.btn_remove', function () {
			var button_id = $(this).attr("id");
			var price = parseFloat($('.price' + button_id + '').val()) * parseFloat($('#qty' + button_id + '').val());
			var final_amount = $('#subTotal').text();
			var result = parseFloat(final_amount) - price;
			$('#subTotal').text(result);
			count--;
			$('.yTr' + button_id + '').remove();
		});

		$('#qty1').keyup(function () {
			var result = 0;
			$('#qty1').each(function () {
				result = parseFloat($('.price1').val()) * parseFloat($(this).val());
			});
			$('#output1').text(result);
		});

		$('.calTotal').change(function () {
			cal_count();
		});

		$('#vat').change(function () {
			var sub_total = $('#subTotal').text();
			var vat = $('#vat').val();
			var price = parseFloat(sub_total) * (vat / 100);
			var amount = parseFloat(sub_total) + price;
			$('#totalAmount').text(amount);
		});

		$('#paid').change(function () {
			var total_amount = $('#totalAmount').text();
			var paid = $('#paid').val();
			var amount = parseFloat(total_amount) - parseFloat(paid);
			$('#totalDue').text(amount);
		});

		function cal_count() {
			var total_price = 0;
			for (var i = 1; i <= count; i++) {
				total_price += (parseFloat($('.price' + i + '').val()) * parseFloat($('#qty' + i + '').val()));
			}
			$('#subTotal').text(total_price);
		}

		$('#evat').change(function () {
			var sub_total = $('#sub').text();
			var vat = $('#evat').val();
			var price = parseFloat(sub_total) * (vat / 100);
			var amount = parseFloat(sub_total) + price;
			$('#etotalAmount').text(amount);
		});

		$('#epaid').change(function () {
			var total_amount = $('#etotalAmount').text();
			var paid = $('#epaid').val();
			var amount = parseFloat(total_amount) - parseFloat(paid);
			$('#etotalDue').text(amount);
		});
	});
</script>
<script>
	function pdf() {
		var pdf = new jsPDF('p', 'pt', 'letter');
		source = $('#printableArea')[0];
		specialElementHandlers = {
			'#bypassme': function (element, renderer) {
				return true
			}
		}
		margins = {
			top: 50,
			left: 60,
			width: 545
		};
		pdf.fromHTML(
			source // HTML string or DOM elem ref.
			, margins.left // x coord
			, margins.top // y coord
			, {
				'width': margins.width // max width of content on PDF
				, 'elementHandlers': specialElementHandlers
			},
			function (dispose) {
				// dispose: object with X, Y of the last line add to the PDF
				//          this allow the insertion of new lines after html
				pdf.save('invoice.pdf');
			}
		)
	}
	//prealoder loading
    $(window).on('load', function () {
		$('.invoice-overlay').fadeOut('slow');
	})
	//Ajax star and end loading 
	$(document).ajaxStart(function(){
            $("#loading").css("display", "block");
        });
    $(document).ajaxComplete(function(){
            $("#loading").css("display", "none");
    });
</script>
</body>
</html>
