
$(document).ready(function () {
	get_data();
});
get_data=()=>{
	$.ajax({
		type: "GET",
		url: baseUrl+"/admin/get_chart",
		dataType: "JSON",
		success: function (response) {
			make_chart(response)
		},error: function (){
			swal('Something went wrong','error');
		}
	});
}
make_chart=(response)=>{
	const ctx = document.getElementById('grafik-kunjungan');

	new Chart(ctx, {
	  type: 'bar',
	  data: {
		labels: response.month_name,
		datasets: [{
		  label: 'Data Kunjungan',
		  data: response.month_data,
		  borderWidth: 1,
		  borderColor: '#36A2EB',
		  backgroundColor: '#9BD0F5',
		}]
	  },
	  options: {
		scales: {
		  y: {
			beginAtZero: true
		  }
		}
	  }
	});
}
