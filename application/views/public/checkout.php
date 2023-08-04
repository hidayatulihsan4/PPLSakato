<?php 
  $status = ['Belum dibayar','Sudah dibayar'];
?>
<main class="m-0 p-0">
  <div class="m-0 p-0 row justify-content-center">
    <div class="col-md-10 mt-5">
      <h4>Checkout</h4>
      <form id="f-checkout" class="needs-validation" action="<?= base_url('main/do_checkout')?>" method="POST">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
            <!-- <th scope="col">Aksi</th> -->
          </tr>
        </thead>
        <tbody>
          <?php 
            $total_harga = 0; 
            $total_berat = 0;
            $n = 0; 
            foreach($pesanan as $p){ 
              $n++;
              $total_harga += $p->jumlah * $p->harga;
              $total_berat += $p->jumlah * $p->berat; 
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
              <!-- <td>
								<a href="<?= base_url('main/batalkan_pesanan/'.$p->kd_pemesanan);?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              </td> -->
            </tr>
          <?php } ?>
        </tbody>
      </table>
			<div class="mx-5">
					<div class="mb-3">
						<label for="total_harga" class="form-label">Total Harga</label>
						<input type="number" name="total_harga" class="form-control" id="total_harga" value="<?= $total_harga?>" readonly>
					</div>
					<div class="mb-3">
						<label for="ekspedisi" class="form-label">Ekspedisi</label>
						<select type="text" name="ekspedisi" class="form-control" id="ekspedisi" required>
							<option value="" disabled>Pilih Ekspedisi</option>
							<option value="jne">JNE</option>
							<option value="pos" >POS</option>
							<!-- <option value="tiki">TIKI</option> -->
							<option value="et">Ekspedisi Toko</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="service" class="form-label">Layanan</label>
						<select id="service" type="text" name="service" class="form-control" required>
							<option value="" disabled>Pilih Layanan</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="ongkir" class="form-label">Ongkir</label>
						<input type="number" name="ongkir" class="form-control" id="ongkir" value="0" readonly>
					</div>
					<div class="mb-3">
						<label for="etd" class="form-label">Estimasi Pengiriman</label>
						<input type="text" name="etd" class="form-control" id="etd" value="" readonly>
					</div>
					<div class="mb-3">
						<label for="total_biaya" class="form-label">Total Biaya</label>
						<input type="number" name="total_biaya" class="form-control" id="total_biaya" value="<?= $total_harga?>" readonly>
					</div>
					<div class="mb-3">
						<input type="hidden" name="total_berat" class="form-control" id="total_berat" value="<?= $total_berat?>">
					</div>
					<button type="button" data-bs-toggle="modal" data-bs-target="#checkoutModal" class="btn btn-sm btn-primary"><i class="fa fa-money-bill"></i> Checkout</button>
			</div>
      </form>
    </div>
  </div>
</main>
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Lakukan checkout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-primary" id="do_this" data-form="checkout">Ya</button>
      </div>
    </div>
  </div>
</div>