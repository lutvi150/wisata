
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Paket Wisata</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Admin</a></div>
				<div class="breadcrumb-item"><a href="#">Data</a></div>
				<div class="breadcrumb-item">Paket Wisata</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Data Paket Wisata</h2>
			<p class="section-lead">
				Berikut paket wisata yang ada pada aplikasi
			</p>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Paket Wisata</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
							<button type="button" class="btn btn-warning" >Cetak</button> <a href="<?=base_url('admin/add_paket_wisata')?>" class="btn btn-success" >Tambah Paket</a>
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">
												NO.
											</th>
											<th>Nama Paket</th>
											<th>Harga Paket</th>
											<th>Satuan</th>
											<th>Keterangan</th>
											<th>Total Kunjungan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												1
											</td>
											<td>Nama</td>
											<td>Rp.
											</td>
											<td>Orang/ Rombongan
											</td>
											<td>-</td>
											<td class="text-center">
												<div class="badge badge-success">0</div>
											</td>
											<td><a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a><a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
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
