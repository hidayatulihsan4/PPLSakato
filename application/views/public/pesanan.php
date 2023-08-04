<?php 
  $status = ['Belum dibayar','Sudah dibayar'];
?>
<main class="m-0 p-0">
  <div class="m-0 p-0 row justify-content-center">
    <div class="col-md-10 mt-5">
      <h4>Keranjang</h4>
      <form action="<?= base_url('main/checkout')?>" method="POST">
      <table class="table">
        <thead>
          <tr>
            <th scope="col"><input id="check_all" type="checkbox">&nbsp; #</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $n = 0; foreach($pesanan as $p){ 
            if($p->kd_transaksi == NULL){$n++;?>
            <tr>
              <th scope="row">
                <input class="check_one" type="checkbox" name="kd[]" value="<?= $p->kd_pemesanan?>">&nbsp;
                <?= $n; ?>
              </th>
              <td><?= $p->nama; ?></td>
              <td>Rp. <?= number_format($p->harga,0,",",".");?>,-</td>
              <td><?= $p->size; ?></td>
              <td><?= $p->jumlah; ?> Set</td>
              <td>Rp. <?= number_format(($p->jumlah * $p->harga),0,",",".");?>,-</td>
              <td>								
                <!-- <a href="<?= base_url('main/bukti_pembayaran/'.$p->kd_pemesanan);?>" class="btn btn-sm btn-success"><i class="fa fa-money-bill"></i> Checkout</a> -->
                <a href="<?= base_url('main/edit_pesanan/'.$p->kd_pemesanan);?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ubah</a>
                <a href="<?= base_url('main/batalkan_pesanan/'.$p->kd_pemesanan);?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Batalkan</a>
              </td>
            </tr>
          <?php }} ?>
        </tbody>
      </table>
      <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-money-bill"></i> Checkout</button>
      </form>
    </div>
  </div>
</main>