
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Transaksi Wisata</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Admin</a></div>
				<div class="breadcrumb-item"><a href="#">Data</a></div>
				<div class="breadcrumb-item">Transaksi Wisata</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Data Transaksi Wisata</h2>
			<p class="section-lead">
				Berikut paket wisata yang ada pada aplikasi
			</p>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Transaksi Wisata</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
							<button type="button" class="btn btn-warning" >Cetak</button>
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">
												NO.
											</th>
											<th>Nomor Booking</th>
											<th>Nama Paket</th>
											<th>Tanggal Booking</th>
											<th>Perserta/Jumlah</th>
											<th>Jumlah Biaya</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($transaksi as $key => $value): ?>
											<?php if ($value->satuan == 1) {
    $satuan = 'Orang';
} elseif ($value->satuan == 2) {
    $satuan = 'Kelompok';
} elseif ($value->satuan == 3) {
    $satuan = 'Pax';
}?>
										<tr>
											<td>
												<?=$key + 1?>
											</td>
											<td><?=$value->nomor_booking?></td>
											<td><?=$value->nama_paket?>
											</td>
											<td>
												<?=$value->tanggal_booking?>
											</td>
											<td>
												<?php if ($value->satuan == 1): ?>
													<button type="button" class="btn btn-success btn-sm"><?=$value->jumlah_peserta?> Orang</button>
													<?php else: ?>
														<span class="badge badge-success"><?=$value->jumlah_peserta . "/" . $satuan?></span>
														<?php endif;?>
											</td>
											<td class="text-center">
												Rp. <?=number_format($value->total_biaya);?>
											</td>
											<td></td>
											<td>
												<?php if ($value->status_pembayaran == "Menunggu Pembayaran"): ?>
												<a href="#" onclick="hapus(<?=$value->id_paket?>)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
												<?php endif;?>
												<a class="btn btn-warning btn-sm" href="<?=base_url('report/invoice/'.$value->id_booking)?>" target="_blank">Invoice</a>
											</td>
										</tr>
										<?php endforeach;?>
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
