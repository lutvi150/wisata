  <!-- General JS Scripts -->
  <script src="<?=base_url();?>assets/modules/jquery.min.js"></script>
  <script src="<?=base_url();?>assets/modules/popper.js"></script>
  <script src="<?=base_url();?>assets/modules/tooltip.js"></script>
  <script src="<?=base_url();?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?=base_url();?>assets/modules/moment.min.js"></script>
  <script src="<?=base_url();?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
	<script src="<?=base_url();?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?=base_url();?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?=base_url();?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url();?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?=base_url();?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?=base_url();?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?=base_url();?>assets/modules/chart.min.js"></script>
  <script src="<?=base_url();?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?=base_url();?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?=base_url();?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="<?=base_url();?>assets/modules/form-master/dist/jquery.form.min.js"></script>
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?=base_url();?>assets/js/scripts.js"></script>
  <script src="<?=base_url();?>assets/js/custom.js"></script>
  <?php if ($content == 'admin/dashboard'): ?>
  <script src="<?=base_url()?>assets/js/costumejs/dashboard.js"></script>
  <?php elseif ($content == 'admin/user'): ?>
  <script src="<?=base_url()?>assets/js/costumejs/user.js"></script>
	<?php elseif ($content == 'pelanggan/keranjang'): ?>
  <script src="<?=base_url()?>assets/js/costumejs/keranjang.js"></script>
	<?php elseif ($content == 'admin/add_paket_wisata' || $content == 'admin/paket_wisata' || $content == 'admin/edit_paket_wisata'): ?>
		<script src="<?=base_url()?>assets/js/costumejs/paketwisata.js"></script>
  <?php endif;?>
  <script>
  	$("#table-1").dataTable({
  		"columnDefs": [{
  			"sortable": false,
  			"targets": [2, 3]
  		}]
  	});

  </script>
