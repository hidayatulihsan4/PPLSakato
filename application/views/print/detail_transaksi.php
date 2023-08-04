<?php 
  $sts_t = ['Menunggu Pembayaran','Menunggu Konfirmasi Pembayaran','Proses Pengerjaan','Pengiriman Pesanan','Selesai'];
  $sts_pr = ['Menunggu Konfirmasi Pembayaran','Sedang diprosses','Sedang dikirim','Telah diterima','Selesai'];
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
  <div class="wrapper">
		<main class="container px-auto">
			<div class="content mx-auto">
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
									
							</div>
							<div class="card-body">
								
							<div class="m-0 p-0 row justify-content-center">
									<div class="col-md-10 mt-5">
										<div class="w-100 text-left mb-3">
											<h4><b>Detail Pesanan</b></h4>
										</div>
										<table class="table table-bordered table-light table-striped">
											<thead>
												<tr>
													<th scope="col">No</th>
													<th scope="col">Item</th>
													<th scope="col">Qty</th>
													<th scope="col">Harga Satuan</th>
													<th scope="col">Subtotal Harga</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 0; foreach($pemesanan as $p){ $no++; ?>
													<tr>
														<th scope="row"><?= $no?></th>
														<td><?= $p->nama_produk?></td>
														<td><?= $p->jumlah?> Set</td>
														<td>Rp. <?= number_format($p->harga,0,",",".");?>,-</td>
														<td>Rp. <?= number_format($p->sub_total,0,",",".");?>,-</td>
													</tr>
												<?php }?>
											</tbody>
											<tfoot>
												<tr>
													<th colspan="4" scope="row">Total Harga</th>
													<td>Rp. <?= number_format($transaksi->total_harga,0,",",".");?>,-</td>
												</tr>
												<tr>
													<th colspan="4" scope="row">Ongkir</th>
													<td>Rp. <?= number_format($transaksi->total_biaya-$transaksi->total_harga,0,",",".");?>,-</td>
												</tr>
												<tr>
													<th colspan="4" scope="row">Total Harga</th>
													<td>Rp. <?= number_format($transaksi->total_biaya,0,",",".");?>,-</td>
												</tr>
											</tfoot>
										</table>
										<div class="row my-4 mx-0 p-0">
											<div class="col-md-8 mx-0 p-0 mt-4">
												<table class="table table-sm table-primary">
													<tr>
														<th>Dipesan pada tanggal</th>
														<th>:</th>
														<td><?= $transaksi->tgl?></td>
													</tr>
													<tr>
														<th>Status Pembayaran</th>
														<th>:</th>
														<td><?= $sts_p[$pengiriman->status_pembayaran-1];?></td>
													</tr>
													<tr>
														<th>Status Transaksi</th>
														<th>:</th>
														<td><?= $sts_t[$transaksi->status_transaksi-1];?></td>
													</tr>
													<tr>
														<th>Status Pengiriman</th>
														<th>:</th>
														<td><?= $sts_pr[$pengiriman->status_pengiriman];?></td>
													</tr>
													<tr>
														<th>Ekspedisi</th>
														<th>:</th>
														<td><?= $pengiriman->ekspedisi;?></td>
													</tr>
													<tr>
														<th>Layanan Ekspedisi</th>
														<th>:</th>
														<td><?= $pengiriman->ekspedisi_service;?></td>
													</tr>
													<tr>
														<th>Nomor Resi</th>
														<th>:</th>
														<td><?= $pengiriman->no_resi?></td>
													</tr>
												</table>
													</div>
													</div>
											</div>

										</div>
										<div class="col-md-12 row d-flex justify-content-end w-100 ">
											<div class="col-md-3 text-right">
												Tanda Tangan
												<br><br><br><br>
												(<?= $sign->nama?>)
											</div>
										</div>
									</div>
								<div>
										<p id="tanggal-sekarang"></p>
									</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</main>
  </div>
  <script src="<?= base_url();?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url();?>assets/js/core/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
			var yyyy = today.getFullYear();

			today = dd + ' - ' + mm + ' - ' + yyyy;
			$('#tanggal-sekarang').html('Data ini dicetak pada tanggal '+today)
			print();
			window.close();
    });
  </script>
</body>

</html>