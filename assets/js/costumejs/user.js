priview_foto = (foto) => {
	$(".show-photo").html(`<img src="${baseUrl}${foto}" style="width: 100%;height: 400px;" alt="">`)
	$("#priview-photo").modal('show');
}
change_level = (id) => {
	sessionStorage.setItem('id_user', id);
	$("#ganti-role").modal('show');
}
update_role = () => {
	$("#form-role").ajaxForm({
		type: "POST",
		url: $("#form-role").attr('action'),
		data: {
			id_user: sessionStorage.getItem('id_user')
		},
		dataType: "JSON",
		success: function (response) {
			if (response.status == 'success') {
				$("#form-role").modal('hide');
				swal(`${response.msg}`).then((id) => {
					if (id) {
						window.location.reload();
					}
				});
			}
		},
		error: function () {
			swal('Something went wrong')
		}
	}).submit();
}
