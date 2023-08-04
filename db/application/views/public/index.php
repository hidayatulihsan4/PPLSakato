<main class="container">
  <div id="carouselExampleSlidesOnly" class="mx-5 carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url();?>public_assets/img/ppl_1.jpeg" class="d-block w-100" alt="ppl_1.jpeg">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url();?>public_assets/img/ppl_2.jpeg" class="d-block w-100" alt="ppl_2.jpeg">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url();?>public_assets/img/ppl_3.jpeg" class="d-block w-100" alt="ppl_3.jpeg">
      </div>
    </div>
  </div>

  <div class="container mt-4 mx-auto px-auto row justify-content-start">
    
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
</main>