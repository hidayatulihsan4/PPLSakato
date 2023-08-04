<?php 
  $status = ['Belum dibayar','Sudah dibayar',''];
?>
<main class="m-0 p-0">
  <div class="m-0 p-0 row justify-content-center">
    <div class="col-md-10 mt-5">
      <h4>Data Transaksi</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Bukti Pembayaran</th>
            <th scope="col">Status Pembayaran</th>
          </tr>
        </thead>
        <tbody>
          <?php $n = 0; foreach($transaksi as $t){ $n++?>
            <tr>
              <th scope="row"><?= $n; ?></th>
              <td><?= $t->nama_produk; ?></td>
              <td>Rp. <?= number_format($t->harga,0,",",".");?>,-</td>
              <td><?= $t->jumlah; ?> Set</td>
              <td>Rp. <?= number_format(($t->jumlah * $t->harga),0,",",".");?>,-</td>
              <td><?= $t->tgl; ?></td>
              <td>
                  <img src="<?= base_url('images/bukti_pembayaran/'.$t->bukti_pembayaran)?>" class="img-thumbnail" style="width:150px">
              </td>
              <td><?= $status[$t->status_pembayaran-1]; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>