  <main class="m-0 p-0">
      <div class="row m-0 p-0 justify-content-center">
				<div class="col-md-4 row justify-content-center">
					<div class="col-md-12 py-4">
							<img src="<?= base_url('images/produk/'.$produk->foto_produk);?>" class="img-thumbnail" alt="<?= $produk->nama?>">
					</div>
				</div>
				<div class="col-md-4 py-4 px-2">
					<div class="container">
						<div class="mb-3">
							<p class="fs-3"><?= $produk->nama ?></p>
							<p class="fs-5">Rp. <?= number_format($produk->harga,0,",",".");?>,-</p>
							<p class=""><?= $produk->keterangan?></p>
						</div>
						<div class="mb-3">
							<a href="<?= base_url('main/pemesanan/'.$produk->id);?>" class="btn btn-sm btn-success"><i class="fa fa-cart-plus"></i> Pesan</a>
						</div>
					</div>
				</div>
			</div>
    </main>