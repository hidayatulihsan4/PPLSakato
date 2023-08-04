<?php 
  $status = ['Belum dibayar','Sudah dibayar'];
?>
<main class="m-0 p-0">
  <div class="m-0 p-0 row justify-content-center">
    <div class="col-md-10 mt-5">
      <h4>Checkout</h4>
      <form action="<?= base_url('main/do_checkout')?>" method="POST">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $total_harga = 0; 
            $n = 0; 
            foreach($pesanan as $p){ 
              $n++;
              $total_harga += $p->jumlah * $p->harga; 
          ?>
            <tr>
              <th scope="row">
                <input type="hidden" name="kd[]" value="<?= $p->kd_pemesanan?>">&nbsp;
                <?= $n; ?>
              </th>
              <td><?= $p->nama; ?></td>
              <td>Rp. <?= number_format($p->harga,0,",",".");?>,-</td>
              <td><?= $p->size; ?></td>
              <td><?= $p->jumlah; ?> Set</td>
              <td>Rp. <?= number_format(($p->jumlah * $p->harga),0,",",".");?>,-</td>
              <td>
								<a href="<?= base_url('main/batalkan_pesanan/'.$p->kd_pemesanan);?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
			<div class="mx-5">
					<div class="mb-3">
						<label for="ekspedisi" class="form-label">Ekspedisi</label>
						<select type="text" name="ekspedisi" class="form-control" id="ekspedisi">
							<option>JNE</option>
							<option>POS</option>
							<option>TIKI</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="ongkir" class="form-label">Ongkir</label>
						<input type="number" name="ongkir" class="form-control" id="ongkir" value="0" readonly>
					</div>
					<div class="mb-3">
						<label for="total_biaya" class="form-label">Total Biaya</label>
						<input type="number" name="total_biaya" class="form-control" id="total_biaya" value="<?= $total_harga?>" readonly>
						<input type="hidden" name="total_harga" class="form-control" id="total_harga" value="<?= $total_harga?>">
					</div>
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-money-bill"></i> Checkout</button>
			</div>
      </form>
    </div>
  </div>
</main>