<style>
	.ionicons i {
    width: calc(100% / 8);
    font-size: 40px !important;
    list-style: none;
    text-align: center;
    border-radius: 3px;
    position: relative;
    cursor: pointer;
		color: #fc544b;
}
</style>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data user</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Admin</a></div>
				<div class="breadcrumb-item"><a href="#">Data</a></div>
				<div class="breadcrumb-item">Data User</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Data user</h2>
			<p class="section-lead">
				User yang terdaftar pada aplikasi
			</p>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data user</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">
												NO.
											</th>
											<th>Nama</th>
											<th>Nomor Kontak</th>
											<th>Jenis Kelamin</th>
											<th>Alamat</th>
											<th>Foto(Klik Priview)</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												1
											</td>
											<td>Nama</td>
											<td class="">
											</td>
											<td class="ionicons">
												<i class="ion-woman"  data-pack="default" data-tags="female, lady, girl, dudette"></i>
												<i class="ion-man" data-pack="default" data-tags="male, guy, boy, dude"></i>
											</td>
											<td>2018-01-20</td>
											<td class="text-center">
												<img alt="image" src="<?=base_url();?>assets/img/avatar/avatar-5.png" class="rounded-circle"
													width="35" data-toggle="tooltip" title="Wildan Ahdian">
											</td>
											<td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
