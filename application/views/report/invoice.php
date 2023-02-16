<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?=$judul . $transaksi->nomor_booking?>></title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" border="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
									<img src="<?=base_url();?>assets/img/logo_padang_panjang.png" style="width: 50%; max-width: 300px" />
								</td>
								<td>
									Invoice #: <?=$transaksi->nomor_booking?><br />
									Tanggal: <?=$transaksi->tanggal_booking?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
									<!-- Sparksuite, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, CA 12345 -->
								</td>

								<td>
									<?=$transaksi->nama?><br />
									<?=$transaksi->no_hp?><br />
									<?=$transaksi->username?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Rincian Paket</td>

					<td>Harga</td>
					<td>Total Booking</td>
					<td>Total Harga</td>
				</tr>
				<?php if ($transaksi->satuan == 1) {
    $satuan = 'Per Orang';
} elseif ($transaksi->satuan == 2) {
    $satuan = 'Per Kelompok';
} elseif ($transaksi->satuan == 3) {
    $satuan = 'Per Pax';
}?>
				<tr class="item">
					<td><?=$transaksi->nama_paket?></td>

					<td>Rp. <?=number_format($transaksi->harga_paket) . "/" . $satuan?></td>
					<td><?=$transaksi->jumlah_peserta?></td>
					<td>Rp.<?=number_format($transaksi->harga_paket * $transaksi->jumlah_peserta)?></td>
				</tr>

				<tr class="total">
					<td></td>
					<td></td>
					<td></td>
					<td style="font-weight: bold;" >Total: Rp.<?=number_format($transaksi->total_biaya)?></tdht>
				</tr>
			</table>
		</div>
	</body>
</html>
