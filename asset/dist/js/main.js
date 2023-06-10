$(document).ready(function () {
	$('#item1').change(function () {
		var item = $(this).val();
		var base_url = location.protocol + '//' + location.host + '/invoiceMaker/';
		$.ajax({
			url: base_url + 'item/get_price_by_item',
			type: "POST",
			data: {'item': item},
			cache: false,
			success: function (msg) {
				var data = $.parseJSON(msg);
				$('.price1').val(data);
			},
			error: function () {
				alert('Error Occur...');
			}
		});
	});
});
