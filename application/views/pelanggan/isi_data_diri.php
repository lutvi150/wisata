<?php $this->load->view('layout/header')?>

<body>
	<style>
		.main-content {
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 80px;
    width: 100%;
    position: relative;
}
	</style>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			
			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Isi Data Diri</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Admin</a></div>
							<div class="breadcrumb-item"><a href="#">Input</a></div>
							<div class="breadcrumb-item">Data Diri</div>
						</div>
					</div>

					<div class="section-body">
						<h2 class="section-title">Data Diri</h2>
						<p class="section-lead"><div class="alert alert-info" role="alert">
							<strong>Info</strong>
							Aplikasi mendeteksi kami sebagai pengguna baru, silahkan isi data diri untuk melanjutkan ke menu berikutnya
						</div></p>

						<div class="row">
							<div class="col-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4>Isi Data diri</h4>
									</div>
									<form action="<?=base_url('pelanggan/update_data_diri')?>" id="store-data-diri"
										method="post">
										<div class="card-body row">
											<div class="col-12 col-md-6 col-lg-6">
												<div class="form-group row mb-12">
													<label class="col-form-label col-md-3 text-md-right">Nama</label>
													<div class="col-sm-12 col-md-9">
														<input type="text" name="nama_paket" value="<?=$this->session->userdata('nama')?>" readonly class="form-control">
														<span class="text-error enama_paket"></span>
													</div>
												</div>
												<div class="form-group row mb-12">
												<label class="col-form-label col-md-3 text-md-right">Nomor Kontak</label>
													<div class="col-sm-12 col-md-9">
														<input type="text" name="nomor_kontak" class="form-control">
														<span class="text-error enomor_kontak"></span>
													</div>
												</div>
												<div class="form-group row mb-12">
													<label class="col-form-label col-md-3 text-md-right">Alamat</label>
													<div class="col-sm-12 col-md-9">
														<textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
														<span class="text-error ealamat"></span>
													</div>
												</div>
												<div class="form-group row mb-12">
													<label class="col-form-label col-md-3 text-md-right">Jenis Kelamin</label>
													<div class="col-sm-12 col-md-9">
														<select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
															<option value="L">Laki Laki</option>
															<option value="P">Perempuan</option>
														</select>
														<span class="text-error ejenis_kelamin"></span>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-6">
												<div class="form-group row mb-12">
													<label class="col-form-label col-md-3 text-md-right">Foto</label>
													<div class="col-sm-12 col-md-9">
														<input type="file" name="foto" onchange="loadFile(event)" class="form-control">
														<span class="text-error efoto"></span>	
													</div>
												</div>
												<div class="form-group row mb-12">
													<label class="col-form-label col-md-3 text-md-right"></label>
													<div class="col-sm-12 col-md-9">
														<div class="image">
															<img id="output" style="width: 300px;height: 300px;" src="<?=base_url();?>assets/img/no_image.jpg" alt="">
														</div>
													</div>
												</div>
											</div>
											<button type="button" onclick="store_data()"
												class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan
												Paket</button>
											<a href="<?=base_url('controller/logout')?>" class="btn btn-info btn-sm"><i
													class="fa fa-reply"></i> Logout</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- use for priview produk -->

			

			<?php $this->load->view('layout/footer')?>
		</div>
	</div>

	<?php $this->load->view('layout/script');?>
</body>
<script>
	store_data=()=>{
		$(".text-error").text("");
		$("#store-data-diri").ajaxForm({
			type: "POST",
			url: $("#store-data-diri").attr('action'),
			dataType: "JSON",
			success: function (response) {
				if (response.status=='validation failed') {
					$.each(response.msg, function (index, value) { 
						 $(".e"+index).text(value);
					});
				}else{
					window.location.href="<?=base_url('pelanggan')?>"
				}
			},error:function(){
				swal('Something went wrong');
			}
		}).submit();
	}
		var loadFile = function (event) {
				var reader = new FileReader();
				reader.onload = function () {
					var output = document.getElementById('output');
					output.src = reader.result;
				};
				reader.readAsDataURL(event.target.files[0]);
			};
</script>
</html>
