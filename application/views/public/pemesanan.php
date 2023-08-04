<main class="m-0 p-0">
  <div class="row m-0 p-0 justify-content-center">
    <div class="col-md-4 row justify-content-center">
      <div class="col-md-12 py-4">
        <img src="<?= base_url('images/produk/'.$produk->foto_produk);?>" class="img-thumbnail" alt="<?= $produk->nama?>">
      </div>
    </div>
    <div class="col-md-4 py-4 px-2">
      <form action="<?= base_url('main/pesan')?>" method="POST">
        <div class="container">
          <div class="mb-3">
            <p class="fs-3"><?= $produk->nama ?></p>
            <input type="hidden" name="kd_produk" value="<?= $produk->id; ?>">
            <p class="fs-5">Rp. <?= number_format($produk->harga,0,",",".");?>,-</p>
          </div>
          <div class="mb-3">
            <label for="size" class="form-label">Ukuran</label>
            <select class="form-control" name="size" id="size">
                <option value="XXXL" >XXXL</option>
                <option value="XXL" >XXL</option>
                <option value="XL" >XL</option>
                <option value="L" >L</option>
                <option value="M" >M</option>
                <option value="S" >S</option>
                <option value="SS" >SS</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" min="1" value="1">
            <input type="hidden" class="form-control" id="harga" name="harga" placeholder="harga"  value="<?= $produk->harga; ?>">
            <!-- <small class="text-secondary">Pembelian minimal 50 pcs</small> -->
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-cart-plus"></i> Pesan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>