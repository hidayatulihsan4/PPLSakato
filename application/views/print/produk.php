<?php 
  $sts_t = ['Menunggu Pembayaran','Menunggu Konfirmasi Pembayaran','Pembayaran Ditolak','Proses Pengerjaan','Proses Pengiriman','Selesai'];
  $sts_p = ['Belum dibayar','Menunggu Konfirmasi Pembayaran','Pembayaran Ditolak','Pembayaran Diterima'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
	PPL SAKATO
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="<?= base_url();?>assets/fonts/fontawesome-5.15.4/css/all.css" rel="stylesheet"/>
  <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- <link href="<?= base_url();?>assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" /> -->
</head>
<body class="">
  <div class="wrapper ">
		
	  <div class="content">
			<div class="row m-0 p-0">
				<div class="col-md-12">
          <div class="mt-4 shadow-none">
            <div class="mx-3 row text-center">
            <div class="col-1">
                <img src="<?= base_url('images/logo.png')?>" class="" style="width:250px">
              </div>
              <div class="  col-10 text-right">
                <h3 class="card-title mx-auto">Persatuan Penjahit Limbanang Sakato</h3>
                <h4 class="card-title mx-auto">Jl. Tan Malaka, Limbanang, Kecamatan Suliki</h4>
                <h5 class="card-title mx-auto">No Telp: 0812-6604-6908</h5>
              </div>
            <div class="mx-3">
              <h5 class="card-title mx-4">Laporan Transaksi</h5>
            </div>
            <div class="card-body">
             
              <div class="table-responsive">
                <table class="table table-bordered mx-auto" id="x-data-tables" style="width:90%">
                  <thead class="text-dark">
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Foto Produk</th>
                    <th>Keterangan</th>
                    <!-- <th class="text-right">Action</th> -->
                  </thead>
                  
                  <tbody>
                    <?php foreach($data as $d){ ?>
                      <tr>
                        <td><?= $d->id;?></td>
                        <td><?= $d->nama;?></td>
                        <td><?= $d->harga;?></td>
                        <td>
                          <img src="<?= base_url('images/produk/'.$d->foto_produk)?>" class="img-thumbnail" style="max-width:150px; max-height:150px">
                          <!-- <?= $d->foto_produk;?> -->
                        </td>
                        <td><?= $d->keterangan;?></td>
                        <!-- <td>
                          <a class="btn btn-info" href="<?= base_url("produk/update_data/$d->id");?>">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a class="btn btn-danger" href="<?= base_url("produk/do_delete/$d->id");?>">
                            <i class="fa fa-trash"></i>
                          </a> -->
                        </td>
                      </tr>
                    <?php }?>
                  </tbody>
                </table>
                  <div style="width:200px;float:right">
                                    <br/>Tanda Tangan
                                    <br></br>
                                    <br></br>
                                    <p>(............................)<br/></p>											
                                  </div>
                            <div style="clear:both"></div>
                </div>
              </div>
            </div>
          </div>

				</div>
			</div>
	  </div>
  </div>
  <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
			print();
			window.close();
    });
  </script>
</body>

</html>