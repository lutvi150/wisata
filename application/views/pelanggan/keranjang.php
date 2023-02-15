<?php if ($paket->satuan == 1) {
    $satuan = "Orang";
} elseif ($paket->satuan == 2) {
    $satuan = 'Kelompok';
} else {
    $satuan = 'Pax';
}
;?>
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Booking Paket Wisata</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Pelanggan</a></div>
				<div class="breadcrumb-item"><a href="#">Booking</a></div>
				<div class="breadcrumb-item">Booking Paket Wisata</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Booking Paket Wisata</h2>
			<p class="section-lead">Silahkan order paket wisata anda disini</p>

			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4>Booking Paket Wisata</h4>
						</div>
						<form action="#" id="store-keranjang" method="post">
							<input type="text" hidden name="id_paket" value="<?=$paket->id_paket?>">
							<div class="card-body row">
								<div class="col-12 col-md-6 col-lg-6">
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Nama Paket Wisata</label>
										<div class="col-sm-12 col-md-9">
											<input readonly  type="text" name="nama_paket" value="<?=$paket->nama_paket?>" class="form-control">
											<span class="text-error enama_paket"></span>
										</div>
									</div>
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Harga</label>
										<div class="col-sm-12 col-md-9">
											<input readonly value="<?=$paket->harga_paket?>" type="text" name="harga" class="form-control">
											<span class="text-error eharga"></span>
										</div>
									</div>
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Satuan</label>
										<div class="col-sm-12 col-md-9">
											<input hidden type="text" name="satuan" value="<?=$paket->satuan?>">
											<input type="text" class="form-control" name="" readonly value="Per <?=$satuan?>" >
											<span class="text-error esatuan"></span>
										</div>
									</div>
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Keterangan</label>
										<div class="col-sm-12 col-md-9">
											<textarea name="" class="form-control" id="" cols="30" readonly rows="10"><?=$paket->keterangan?></textarea>
											<span class="text-error eketerangan"></span>
										</div>
									</div>
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Tanggal Kegiatan</label>
										<div class="col-sm-12 col-md-9">
											<input type="text" name="tanggal_booking"  value="" class="form-control datepicker">
											<span class="text-error elong"></span>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6">
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Lokasi</label>
										<div class="col-sm-12 col-md-9">
											<iframe
												src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6771792870254!2d100.43572655578873!3d-0.48193562613786234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd525796494e639%3A0x38443bc46df2d52c!2sDesa%20Wisata%20Kubu%20Gadang%20Kota%20Padang%20Panjang!5e0!3m2!1sid!2sid!4v1675584719619!5m2!1sid!2sid"
												width="100%" height="200" style="border:0;" allowfullscreen=""
												loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
										</div>
									</div>
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Lat</label>
										<div class="col-sm-12 col-md-9">
											<input type="text" name="lat" readonly value="<?=$paket->lat?>" class="form-control">
											<span class="text-error elat"></span>
										</div>
									</div>
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Long</label>
										<div class="col-sm-12 col-md-9">
											<input type="text" name="long" readonly value="<?=$paket->long?>" class="form-control">
											<span class="text-error elong"></span>
										</div>
									</div>
								</div>
								<?php if ($paket->satuan == 1): ?>
								<div class="col-12 col-md-12 col-lg-12">
									<h5>Peserta</h5>
									<table class="table table-bordered text-center">
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th style="width: 10%;"><button type="button" class="btn btn-success btn-sm"
												data-toggle="modal" data-target="#add-foto"><i class="fa fa-plus"></i>
												Tambah</button></th>
										<tbody class="show_foto">
											<tr>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
								<?php else: ?>
								<div class="col-12 col-md-6 col-lg-6">
									<div class="form-group row mb-12">
										<label class="col-form-label col-md-3 text-md-right">Total <?=$satuan?></label>
										<div class="col-sm-12 col-md-9">
											<input type="number" name="total_order"  onkeyup="count_harga()"  value="0" class="form-control">
											<span class="text-error etotal_order"></span>
										</div>
									</div>
								</div>
									<?php endif;?>
									<table class="table">
										<tr>
											<td>Total Biaya</td>
											<td class="total_biaya"></td>
										</tr>
										<tr>
											<td>Terbilang</td>
											<td class="terbilang"></td>
										</tr>
									</table>
								<div class="col-12 col-md-12 col-lg-12">
									<button type="button" onclick="store_booking()" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan
										Paket</button>
										<a href="<?=base_url('admin/paket_wisata')?>" class="btn btn-info btn-sm"><i class="fa fa-reply"></i> Kembali</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- Modal -->

<script>
	let id_paket = "<?=$id_paket?>";

</script>
