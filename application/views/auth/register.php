<?php $this->load->view('auth/header')?>
<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div
						class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
						<img src="<?=base_url();?>assets/img/logo_padang_panjang.png" alt="logo" width="100"
								class="shadow-light">
						</div>

						<div class="card card-primary">
							<div class="card-header">
								<h4><?=$this->config->item('app_name')?></h4>
							</div>

							<div class="card-body">
								<form method="POST" id="register-form" action="#" class="needs-validation" novalidate="">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input id="nama" type="nama" class="form-control" name="nama" tabindex="1"
											required autofocus>
										<span class=" text-error enama">

										</span>
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input id="email" type="email" class="form-control" name="email" tabindex="2"
											required autofocus>
										<span class="text-error eemail">

										</span>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
										</div>
										<input id="password" type="password" class="form-control" name="password"
											tabindex="3" required>
										<span class="text-error epassword">

										</span>
									</div>
									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Ulangi Password</label>
										</div>
										<input id="upassword" type="password" class="form-control" name="upassword"
											tabindex="4" required>
										<span class="text-error eupassword">

										</span>
									</div>

									<div class="form-group">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="remember" class="custom-control-input"
												tabindex="3" id="remember-me">
											<label class="custom-control-label" for="remember-me">Setuju dengan semua kebijakan</label>
										</div>
									</div>

									<div class="form-group">
										<button type="button" onclick="register()" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Daftar
										</button>
									</div>
								</form>

							</div>
						</div>
						<div class="mt-5 text-muted text-center">
							Suda punya account? <a href="<?=base_url('controller/login')?>">Login Disini</a>
						</div>
						<div class="simple-footer">
							Copyright &copy; <?=$this->config->item('app_name') . " tahun " . date('Y')?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php $this->load->view('auth/script');
?>
</body>
<script>
	function register() {
		$(".text-error").text('');
		$("#register-form").ajaxForm({
			type: "POST",
			url: baseUrl+"/controller/register_user",
			dataType: "JSON",
			success: function (response) {
				if (response.status=='validation failed') {
					$.each(response.msg, function (index, value) {
						 $(".e"+index).text(value);
					});
				}else if(response.status=='password not match') {
					Swal.fire(`${response.msg}`)
				}else{
					$("input").val('');
					Swal.fire(`${response.msg}`)
				}
			},error:function(){
				Swal.fire('Something went wrong');
			}
		}).submit();
	 }
</script>

</html>
