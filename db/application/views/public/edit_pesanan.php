<main class="m-0 p-0">
  <div class="row m-0 p-0 justify-content-center">
    <div class="col-md-4 row justify-content-center">
      <div class="col-md-12 py-4">
        <img src="<?= base_url('images/produk/'.$pesanan->foto_produk);?>" class="img-thumbnail" alt="<?= $pesanan->nama?>">
      </div>
    </div>
    <div class="col-md-4 py-4 px-2">
      <form action="<?= base_url('main/do_edit_pesanan/'.$pesanan->kd_pemesanan)?>" method="POST">
        <div class="container">
          <div class="mb-3">
            <p class="fs-3"><?= $pesanan->nama ?></p>
            <input type="hidden" name="kd_produk" value="<?= $pesanan->id; ?>">
            <p class="fs-5">Rp. <?= number_format($pesanan->harga,0,",",".");?>,-</p>
          </div>
          <div class="mb-3">
            <label for="size" class="form-label">Ukuran</label>
            <select data-opt="<?=$pesanan->size;?>" class="form-control" name="size" id="size">
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
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" min="!" value="<?= $pesanan->jumlah ?>">
            <input type="hidden" class="form-control" id="harga" name="harga" placeholder="harga"  value="<?= $pesanan->harga; ?>">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-cart-plus"></i> Ubah</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>