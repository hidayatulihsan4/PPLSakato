
    <!-- <main class="container"> -->
    <main class="m-0 p-0">
		
		<div class="m-0 p-0 row justify-content-center">
			<div class="col-md-10 mt-5">
			<h4>Upload Bukti Pembayaran</h4>
				<?php foreach($pemesanan as $p){ ?>
				<div class="row my-2 mx-0 p-0 justify-content-center">
					<div class="col-md-4 row justify-content-center">
						<div class="col-md-12 py-2 text-center img-thumbnail">
							<img src="<?= base_url("images/produk/".$p->foto_produk);?>" class="" style="max-height:350px; max-width:350px" alt="">
						</div>
					</div>
					<div class="col-md-4 py-4 px-2">
						
						<div class="container">
							<div class="mb-3">
								<input type="hidden" name="kd_pemesanan" value="<?= $p->kd_pemesanan ?>">
								<input type="hidden" name="total_harga" value="<?= $p->jumlah * $p->harga ?>">
								<p class="fs-3"><?= $p->nama_produk ?></p>
								<p class="">Harga Satuan  : Rp. <?= number_format($p->harga,0,",",".");?>,-</p>
								<p class="">Jumlah : <?= $p->jumlah ?></p>
								<p class="">Total : Rp. <?= number_format(($p->jumlah * $p->harga),0,",",".");?>,-</p>
							</div>
							<!-- <div class="mb-3">
								<label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
								<input class="form-control" type="file" name="foto" id="bukti_pembayaran">
							</div> -->
							<!-- <div class="mb-3">
								<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-cart-plus"></i> Pesan</button>
							</div> -->
						</div>
					</div>
				</div>
				<?php }?>
				<div class="row my-4 mx-0 p-0 justify-content-center">
					<div class="col-md-8 mt-4">
						<p>Total Harga : Rp. <?= number_format($transaksi->total_harga,0,",",".");?>,-</p>
						<p>Total Ongkir : Rp. <?= number_format($transaksi->total_biaya-$transaksi->total_harga,0,",",".");?>,-</p>
						<p>Total Biaya : Rp. <?= number_format($transaksi->total_biaya,0,",",".");?>,-</p>
					<div> 
					<div class="col-md-8 mt-4">
						<h5>Cara Pembayaran</h5>
						<ol>
							<li>Lakukan pembayaran dengan nominal yang tertera pada form diatas ke nomor rekening <b>0982398 AN DASRIL</b>.</li>
							<li>Upload foto bukti pembayaran pada form berikut.</li>
							<li>Tunggu Konfirmasi pembayaran telah diterima oleh pihak toko.</li>
						</ol>
					</div>
					<div class="col-md-8 mt-4">
						<form action="<?= base_url('main/up_bukti_pembayaran/'.$transaksi->kd_transaksi); ?>" method="POST" enctype="multipart/form-data">			
							<div class="mb-1">
								<label for="input1" class="form-label">Upload Bukti Pembayaran</label>
								<input type="file" name="foto" class="form-control" id="input1" required>
							</div>
							<div class="my-1">
								<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </main>
    <!-- </main> -->
    
