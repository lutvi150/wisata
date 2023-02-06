$(document).ready(function () {
	get_image();
});
get_image = () => {
	$.ajax({
		type: "POST",
		url: baseUrl + "/ApiProduk/get_foto_paket",
		data: {
			id_paket: id_paket
		},
		dataType: "JSON",
		success: function (response) {
			let html = "";
			let foto_unggulan = "";
			$.each(response, function (index, value) {
				if (value.foto_unggulan == 0) {
					foto_unggulan =
						`<button type="button" onclick="jadikan_foto_unggulan('${value.id_foto}')" class="btn btn-info"  ><i class="fa fa-check"></i>Jadikan Foto Unggulan</button>`;
				} else {
					foto_unggulan =
						`<button type="button" class="btn btn-success"  ><i class="fa fa-check"></i>Foto Unggulan</button>`
				}
				html += `<tr class="row_${value.id_foto}">
										<td>
											<button type="button" onclick="image_priview('${value.foto}')" class="btn btn-info"  ><i class="fa fa-image"></i>Foto Produk</button>
										</td>
										<td>${foto_unggulan}</td>
										<td>
											<button type="button" onclick="remove_image(${value.id_foto})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
										</td>
									</tr>`;
			});
			$(".show_foto").html(html);
		}
	});
}

store_image = () => {
	$(".eimage").text('Foto yang diizinkan hanya JPG atau PNG');
	$("#store-image").ajaxForm({
		type: "POST",
		url: $("#store-image").attr('action'),
		data: {
			id_paket: id_paket
		},
		dataType: "JSON",
		success: function (response) {
			if (response.status == 'failed') {
				$('.eimage').text(response.error)
			} else {
				$("#add-foto").modal('hide');
				swal('Upload Foto Berhasil', 'success')
				get_image();
			}
		},
		error: function () {
			swal('Something went wrong', 'error');
		}
	}).submit();
};
//   use for make photo feature
jadikan_foto_unggulan = (id_foto) => {
	$.ajax({
		type: "POST",
		url: baseUrl + "/admin/jadikan_foto_unggulan",
		data: {
			id_foto: id_foto,
			id_paket: id_paket
		},
		dataType: "JSON",
		success: function (response) {
			if (response.status == 'success') {
				get_image();
				swal('Foto barhasil dijasikan foto unggulan', 'success');
			}
		},
		error: function () {
			swal('Something went wrong', 'error');
		}
	});
}
image_priview = (image) => {
	$(".image-priview").html(`<img style="width: 100%;height: 500px;" src="${baseUrl}${image}" alt="">`);
	$("#modal-priview-image").modal('show');
}
remove_image = (id) => {
	$(".row_" + id).remove();
	$.ajax({
		type: "POST",
		url: baseUrl + "/admin/remove_foto_paket",
		data: {
			id_foto: id
		},
		dataType: "JSON",
		success: function (response) {
			if (response.status == 'success') {
				swal('Hapus foto berhasil', 'success');
			}
		},
		error: function () {
			swal('Something went wrong', 'error');
		}
	});
}
store_paket = () => {
	$(".text-error").text('');
	$("#store-produk").ajaxForm({
		type: "POST",
		url: $("#store-produk").attr('action'),
		data: {
			id_paket: id_paket
		},
		dataType: "JSON",
		success: function (response) {
			if (response.status == 'foto produk not found') {
				swal(`${response.msg}`);
			} else if (response.status == 'validation failed') {
				$.each(response.msg, function (index, value) {
					$(".e" + index).html(value);
				});
			} else {
				swal({
					title: `${response.msg}`,
					confirmButtonText: 'Oke'
				}).then((result) => {
					if (result.isConfirmed) {
						location.href = baseUrl + '/admin/paket_wisata'
					}
				});
			}
		},
		error: function () {
			swal('Something went wrong', 'error');
		}
	}).submit();
}
