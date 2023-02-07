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
											<th>Role</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($user as $key => $value): ?>
										<tr>
											<td>
												<?=$key + 1?>
											</td>
											<td><?=$value->nama?></td>
											<td class="">
												<?=$value->no_hp?>
											</td>
											<td class="ionicons">
												<?php if ($value->jenis_kelamin == 'L'): ?>
												<i class="ion-man" data-pack="default" data-tags="male, guy, boy, dude"></i>
												<?php else: ?>
												<i class="ion-woman"  data-pack="default" data-tags="female, lady, girl, dudette"></i>
												<?php endif;?>
											</td>
											<td><?=$value->tgl_registrasi?></td>
											<td class="text-center">
												<a href="#" onclick="priview_foto('<?=$value->foto?>')" ><img alt="image" src="<?=base_url();?>assets/img/avatar/avatar-5.png" class="rounded-circle"
													width="35" data-toggle="tooltip" title="Wildan Ahdian"></a>
											</td>
											<td>
												<?php if ($value->role == 'pelanggan'): ?>
												<span class="badge badge-success">Pelanggan</span>
												<?php else: ?>
												<span class="badge badge-danger">Pengelola</span>
												<?php endif;?></td>
											<td><a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
												<button type="button" onclick="change_level(<?=$value->id_user?>)" class="btn btn-info btn-sm">Ganti Role</button>
											</td>
										</tr>
										<?php endforeach?>
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
<!-- Modal priview foto-->
<div class="modal fade" id="priview-photo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Priview Photo</h5>
			</div>
			<div class="modal-body show-photo">
				<img src="<?=base_url()?>assets/img/example-image-50.jpg" style="width: 100%;height: 400px;" alt="">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="ganti-role" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?=base_url('admin/update_role')?>" id="form-role" method="post">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
				  <label for="">Ganti Role Account</label>
				  <select name="role" class="form-control" id="">
					<option value="admin">Pengelola Aplikasi</option>
					<option value="pelanggan">Pelanggan</option>
				  </select>
				  <small id="helpId" class="text-muted"></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="update_role()" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		</div>
	</div>
</div>
