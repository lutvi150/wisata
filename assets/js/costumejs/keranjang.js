count_harga = () => {
	let harga = $("input[name=harga]").val();
	let total_order = $('input[name=total_order]').val();
	let total = parseInt(harga) * parseInt(total_order);
	$(".total_biaya").text(total);
	$.ajax({
		type: "POST",
		url: baseUrl + "/ApiProduk/terbilang_angka",
		data: {
			angka: total
		},
		dataType: "JSON",
		success: function (response) {
			$(".terbilang").text(response);
		}
	});
}
store_booking = () => {
	$("#store-keranjang").ajaxForm({
		type: "POST",
		url: baseUrl + "/pelanggan/store_booking",
		dataType: "JSON",
		success: function (response) {
			if (response.status == 'validation failed') {
				$.each(response.msg, function (index, value) {
					$(".e" + index).text(value);
				});
			} else if (response.status == 'success') {
				window.location.href = baseUrl + "/pelanggan/transaksi"
			}
		},
		error: function () {
			swal('Something went wrong');
		}
	}).submit();
}
