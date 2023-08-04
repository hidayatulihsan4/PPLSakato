<body class="">
  <div class="wrapper ">
		<div class="sidebar" data-color="blue">
			<div class="logo">
				<!-- <a href="" class="simple-text logo-mini">
					PS
				</a> -->
				
				<a href="<?= base_url();?>" class="font-weight-bold simple-text logo-normal" style="font-size: 14pt;">
					PPL-SAKATO
				</a>				
				<a class="logo-normal text-light"><?= $identity;?></a>
			</div>
			<div class="sidebar-wrapper" id="sidebar-wrapper">
				<ul id="side-navigator" class="nav" data-nav="<?= $sidenav; ?>">
					<li id="dashboard" class="">
						<a href="<?= base_url('dashboard')?>">
							<i class="fa fa-tachometer-alt"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li id="produk" class="">
						<a href="<?= base_url('produk')?>">
							<i class="fa fa-box"></i>
							<p>Produk</p>
						</a>
					</li>
					<li id="pengiriman" class="">
						<a href="<?= base_url('pengiriman')?>">
							<i class="fa fa-truck"></i>
							<p>Pengiriman</p>
						</a>
					</li>
					<li id="Transaksi" class="">
						<a href="<?= base_url('Transaksi')?>">
							<i class="fa fa-file-invoice"></i>
							<p>Transaksi</p>
						</a>
					</li>
					<li id="pemesanan" class="">
						<a href="<?= base_url('pemesanan')?>">
							<i class="fa fa-shopping-cart"></i>
							<p>Pesanan</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel" id="main-panel">
	  <!-- Navbar -->
	  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
		<div class="container-fluid">
		  <div class="navbar-wrapper">
			<div class="navbar-toggle">
			  <button type="button" class="navbar-toggler">
				<span class="navbar-toggler-bar bar1"></span>
				<span class="navbar-toggler-bar bar2"></span>
				<span class="navbar-toggler-bar bar3"></span>
			  </button>
			</div>
			<a class="navbar-brand" href="<?= base_url("$menu");?>"><?= $header; ?></a>
		  </div>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-bar navbar-kebab"></span>
			<span class="navbar-toggler-bar navbar-kebab"></span>
			<span class="navbar-toggler-bar navbar-kebab"></span>
		  </button>
		  <div class="collapse navbar-collapse justify-content-end" id="navigation">
			<form>
			  <div class="input-group no-border">
				<input id="mySearch" type="text" value="" class="form-control" placeholder="Search...">
				<div class="input-group-append">
				  <div class="input-group-text">
					<i class="now-ui-icons ui-1_zoom-bold"></i>
				  </div>
				</div>
			  </div>
			</form>
			<ul class="navbar-nav">
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <i class="now-ui-icons users_single-02"></i>
				  <p>
					<span class="d-lg-none d-md-block">Account</span>
				  </p>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="#">
					  <i class="fa fa-user-cog"></i>
            Profile
          </a>
				  <hr>
				  <a class="dropdown-item" href="<?= base_url('log/out');?>">
						<i class="fa fa-sign-out-alt"></i>
						Logout
					</a>
				</div>
			  </li>
			</ul>
		  </div>
		</div>
	  </nav>
	  <!-- End Navbar -->
		