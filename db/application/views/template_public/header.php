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
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url();?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('main/produk/1');?>">Produk</a>
          </li>
          <?php if($data_user == ""){?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('main/login');?>">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('main/register');?>">Daftar</a>
            </li>
          <?php }else{?>
            <?php if($data_user['level'] == "customer"){?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('main/pesanan');?>">Keranjang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('main/transaksi');?>">Transaksi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('main/pengiriman');?>">Pengiriman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('log/out');?>">Logout</a>
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