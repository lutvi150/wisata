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
	<table cellpadding="5px" autosize="1" border="1" width="100%" style="overflow: wrap">
		<tr style="background-color: rgb(192, 120, 120);">
			<td class="text-center">
				NO.
			</td>
			<td>Nama Paket</td>
			<td>Harga Paket</td>
			<td>Satuan</td>
			<td>Keterangan</td>
			<td>Total Kunjungan</td>
		</tr>
		</tr>
		<tbody>
		<?php foreach ($paket_wisata as $key => $value): ?>
											<?php if ($value->satuan == 1) {
    $satuan = 'Per Orang';
} elseif ($value->satuan == 2) {
    $satuan = 'Per Kelompok';
} elseif ($value->satuan == 3) {
    $satuan = 'Per Pax';
}?>
										<tr>
											<td>
												<?=$key + 1?>
											</td>
											<td><?=$value->nama_paket?></td>
											<td  class="tdbreak">Rp. <?=number_format($value->harga_paket) . " /" . $satuan?>
											</td>
											<td>
												<?=$satuan?>
											</td>
											<td class="tdbreak" ><p class="pre-line"><?=$value->keterangan?></p></td>
											<td class="text-center">
												<div class="badge badge-success"><?=$value->total_kunjungan?></div>
											</td>
										</tr>
										<?php endforeach;?>
		</tbody>
	</table>
</body>


</html>
