<?php $this->load->view('layout/header')?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">

          <?php $this->load->view('layout/profil')?>
        </ul>
      </nav>
			<!-- side bar -->
			<?php $this->load->view('layout/sidebar');?>
			<!-- end side bar -->


      <!-- Main Content -->
      <?php $this->load->view($content);?>
			<?php $this->load->view('layout/footer')?>
    </div>
  </div>

<?php $this->load->view('layout/script');?>
</body>
</html>
