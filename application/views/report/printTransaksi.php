<?php $this->load->view('report/head');?>

<body>
	<style>


.tdbreak {
  word-break: break-all
}
.pre-line {
     white-space: pre-line;
 }
	</style>
	<?php $this->load->view('report/kopsurat');?>
	<table class="table table-striped" id="table-1" width="100%">
									<thead>
									<tr style="background-color: rgb(192, 120, 120);">
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
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
</body>


</html>
