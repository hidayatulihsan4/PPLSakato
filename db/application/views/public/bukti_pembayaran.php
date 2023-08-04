
    <!-- <main class="container"> -->
    <main class="m-0 p-0">
      <div class="row m-0 p-0 justify-content-center">
				<div class="col-md-4 row justify-content-center">
					<div class="col-md-12 py-4">
						<img src="<?= base_url("images/produk/".$pemesanan->foto_produk);?>" class="img-thumbnail" alt="">
					</div>
				</div>
				<div class="col-md-4 py-4 px-2">
					
					<form action="<?= base_url('main/up_bukti_pembayaran'); ?>" method="POST" enctype="multipart/form-data">
						<div class="container">
							<div class="mb-3">
								<input type="hidden" name="kd_pemesanan" value="<?= $pemesanan->kd_pemesanan ?>">
								<input type="hidden" name="total_harga" value="<?= $pemesanan->jumlah * $pemesanan->harga ?>">
								<p class="fs-3">Nama Produk : <?= $pemesanan->nama_produk ?></p>
								<p class="">Harga Satuan  : Rp. <?= number_format($pemesanan->harga,0,",",".");?>,-</p>
								<p class="">Jumlah : <?= $pemesanan->jumlah ?></p>
								<p class="">Total : Rp. <?= number_format(($pemesanan->jumlah * $pemesanan->harga),0,",",".");?>,-</p>
							</div>
							<div class="mb-3">
								<label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
								<input class="form-control" type="file" name="foto" id="bukti_pembayaran">
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-cart-plus"></i> Pesan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
    </main>
    <!-- </main> -->
    
