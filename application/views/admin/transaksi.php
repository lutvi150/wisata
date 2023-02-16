
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Booking Paket Wisata</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Admin</a></div>
				<div class="breadcrumb-item"><a href="#">Data</a></div>
				<div class="breadcrumb-item">Booking Paket Wisata</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Data Booking Paket Wisata</h2>
			<p class="section-lead">
				Berikut daftar booking paket wisata
			</p>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Data Booking Paket Wisata</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
							<a href="<?=base_url('report/data_booking');?>" target="_blank" type="button" class="btn btn-warning" >Cetak</a>
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">
												NO.
											</th>
											<th>Nomor Booking</th>
											<th>Nama User</th>
											<th>Nama Paket</th>
											<th>Tanggal Booking</th>
											<th>Peserta/Satuan</th>
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
											<td><?=$value->nama?></td>
											<td><?=$value->nama_paket;?>
											</td>
											<td><?=$value->tanggal_booking;?>
											</td>
											<td><div class="badge badge-success"><?=$value->jumlah_peserta . " " . $satuan?></div></td>
											<td class="text-center">
												<div class="badge badge-success">Rp.<?=number_format($value->total_biaya)?></div>
											</td>
											<td>Lunas</td>
											<td></td>
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
