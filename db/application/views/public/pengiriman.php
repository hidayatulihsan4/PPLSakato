<?php 
  $status = ['Sedang diprosses','Sedang dikirim','Telah diterima','Selesai'];
?>
<main class="m-0 p-0">
  <div class="m-0 p-0 row justify-content-center">
    <div class="col-md-10 mt-5">
      <h4>Data Pengiriman</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Status Pengiriman</th>
          </tr>
        </thead>
        <tbody>
          <?php $n = 0; foreach($pengiriman as $p){ $n++?>
            <tr>
              <th scope="row"><?= $n; ?></th>
              <td><?= $p->nama_produk; ?></td>
              <td>Rp. <?= number_format($p->harga,0,",",".");?>,-</td>
              <td><?= $p->jumlah; ?> Set</td>
              <td>Rp. <?= number_format(($p->jumlah * $p->harga),0,",",".");?>,-</td>
              <td><?= $p->tgl; ?></td>
              <td><?= $status[$p->status_pengiriman-1]?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>