<main class="container">
      <!-- <div id="carouselExampleSlidesOnly" class="mx-5 carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?= base_url();?>public_assets/img/slide_1.jpg" class="d-block w-100" alt="slide_1.jpg">
          </div>
          <div class="carousel-item">
            <img src="<?= base_url();?>public_assets/img/slide_1.jpg" class="d-block w-100" alt="slide_1.jpg" style="filter: grayscale(100%);">
          </div>
          <div class="carousel-item">
            <img src="<?= base_url();?>public_assets/img/slide_1.jpg" class="d-block w-100" alt="slide_1.jpg" style="filter: sepia(100%);">
          </div>
        </div>
      </div> -->

      <div class="container mt-5 mx-auto px-auto row justify-content-start">
        
        <?php $n = 0; foreach($produk as $p){ $n++;?>
          <div class="col-md-4 mt-4">
            <div class="card" style="width: 18rem;">
              <img src="<?= base_url('images/produk/'.$p->foto_produk);?>" class="card-img-top" alt="<?= $p->nama?>">
              <div class="card-body">
                <h5 class="card-title"><?= $p->nama;?></h5>
                <p class="card-sm-text"><?= $p->keterangan;?></p>
                <p class="card-text">Rp. <?= number_format($p->harga,0,",",".");?>,-</p>
                <a href="<?= base_url('main/detail_produk/'.$p->id);?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Detail</a>
                <a href="<?= base_url('main/pemesanan/'.$p->id);?>" class="btn btn-sm btn-success"><i class="fa fa-cart-plus"></i> Pesan</a>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>

      <div class="container mt-5 row justify-content-between">
				<div class="col-4">
          <?php if($prev == 1){?>
					  <a href="<?= base_url('main/produk/'.($now_page - 1));?>"><i class="fa fa-arrow-left"></i> Produk Sebelumnya </a>
          <?php } ?>
        </div>
        <div class="col-4 text-end">
          <?php if($next == 1){?>
            <a href="<?= base_url('main/produk/'.($now_page + 1));?>"> Produk Selanjutnya <i class="fa fa-arrow-right"></i></a>
          <?php } ?>
				</div>
			</div>
    </main>