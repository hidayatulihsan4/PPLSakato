<?php 
  $sts_t = ['Menunggu Pembayaran','Menunggu Konfirmasi Pembayaran','Proses Pengerjaan','Pengiriman Pesanan','Selesai'];
  $sts_pr = ['Menunggu Konfirmasi Pembayaran','Sedang diprosses','Sedang dikirim','Telah diterima','Selesai'];
  $sts_p = ['Belum dibayar','Menunggu Konfirmasi Pembayaran','Pembayaran Ditolak','Pembayaran Diterima'];
?>
    <main class="m-0 p-0">
		
		<div class="m-0 p-0 row justify-content-center">
			<div class="col-md-10 mt-5">
				<div class="w-100 d-flex justify-content-between">
					<div class="my-1">
						<a href="<?= base_url("main/transaksi"); ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="my-1">
						<a href="<?= base_url("main/print_detail_transaksi/".$transaksi->kd_transaksi); ?>" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-print"></i> Print</a>
					</div>
				</div>
				<div class="w-100 my-3">
					<div class="row">
						<div class="col-1">
							<img src="<?= base_url('images/logo.png')?>" class="" style="width:250px">
						</div>
						<div class="col-11 text-end">
							<h3 class="card-title">Persatuan Penjahit Limbanang Sakato</h3>
							<h4 class="card-title">Jl. Tan Malaka, Limbanang, Kecamatan Suliki</h4>
							<h5 class="card-title">No Telp: 0812-6604-6908</h5>
						</div>
					</div>
				</div>
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
				<div class="col-md-12 row d-flex justify-content-end">
					<div class="col-md-3 text-center">
						Tanda Tangan
						<br><br><br><br>
						(<?= $sign->nama?>)
					</div>
				</div>
			</div>

				<!-- <?php
					print_r($data_user);
				?> -->
			</div>
		</div>
    </main>
    
