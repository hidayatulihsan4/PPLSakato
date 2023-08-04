<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>PPL SAKATO</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>public_assets/font-awesome/css/all.css" rel="stylesheet">
    <link href="<?= base_url();?>public_assets/dist/css/bootstrap.min.css" rel="stylesheet">

		<style>
			body {
				padding-top: 3.5rem;
			}
		</style>
  </head>
  <body>

  <?php if($this->session->flashdata('is_message') == true){?>

    <div class="modal fade" id="flashDataModal" tabindex="-1" aria-labelledby="flashDataModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="flashDataModalLabel"><?= $this->session->flashdata('title'); ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?= $this->session->flashdata('message'); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PPL SAKATO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="mx-5 input-group">
          <?php if($content == "index" || $content == "produk"){?>
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          <?php }?>
        </div>
        <ul class="navbar-nav d-flex">
          <li class="nav-item mx-1 px-1">
            <!-- <a class="nav-link" href="<?= base_url();?>">Beranda</a> -->
            <a class="nav-link" href="<?= base_url();?>"><i class="fa fa-home"></i></a>
          </li>
          <li class="nav-item mx-1 px-1">
            <!-- <a class="nav-link" href="<?= base_url('main/produk/1');?>">Produk</a> -->
            <a class="nav-link" href="<?= base_url('main/produk/1');?>"><i class="fa fa-box"></i></a>
          </li>
          <?php if($data_user == ""){?>
            <li class="nav-item mx-1 px-1">
              <!-- <a class="nav-link" href="<?= base_url('main/login');?>">Login</a> -->
              <a class="nav-link" href="<?= base_url('main/login');?>"><i class="fa fa-sign-in-alt"></i></a>
            </li>
            <li class="nav-item mx-1 px-1">
              <!-- <a class="nav-link" href="<?= base_url('main/register');?>">Daftar</a> -->
              <a class="nav-link" href="<?= base_url('main/register');?>"><i class="fa fa-user-plus"></i></a>
            </li>
          <?php }else{?>
            <?php if($data_user['level'] == "customer"){?>
              <li class="nav-item mx-1 px-1">
                <!-- <a class="nav-link" href="<?= base_url('main/pesanan');?>">Keranjang</a> -->
                <a class="nav-link" href="<?= base_url('main/pesanan');?>"><i class="fa fa-shopping-cart"></i></a>
              </li>
              <li class="nav-item mx-1 px-1">
                <!-- <a class="nav-link" href="<?= base_url('main/transaksi');?>">Transaksi</a> -->
                <a class="nav-link" href="<?= base_url('main/transaksi');?>"><i class="fa fa-clipboard-list"></i></a>
              </li>
              <li class="nav-item mx-1 px-1">
                <!-- <a class="nav-link" href="<?= base_url('main/pengiriman');?>">Pengiriman</a> -->
                <a class="nav-link" href="<?= base_url('main/pengiriman');?>"><i class="fa fa-truck"></i></a>
              </li>
              <li class="nav-item mx-1 px-1">
                <!-- <a class="nav-link" href="<?= base_url('main/profile');?>">Profile</a> -->
                <a class="nav-link" href="<?= base_url('main/profile');?>"><i class="fa fa-user"></i></a>
              </li>
              <li class="nav-item mx-1 px-1">
                <!-- <a class="nav-link" href="<?= base_url('log/out');?>">Logout</a> -->
                <!-- <a class="nav-link" href="<?= base_url('log/out');?>"><i class="fa fa-sign-out-alt"></i></a> -->
                <a class="nav-link" href="<?= base_url('log/out');?>"><i class="fa fa-power-off">&nbsp;<?= $data_user['username']; ?></i></a>
              </li>
            <?php }else if(
              $data_user['level'] == "kurir" || 
              $data_user['level'] == "operator" || 
              $data_user['level'] == "pemilik" || 
              $data_user['level'] == "admin" )
            {?>

          <?php }}?>
            
        </ul>
      </div>
    </div>
  </nav>