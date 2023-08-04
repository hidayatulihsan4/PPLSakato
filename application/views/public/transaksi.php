<?php 
  $sts_t = ['Menunggu Pembayaran','Menunggu Konfirmasi Pembayaran','Proses Pengerjaan','Pengiriman','Selesai'];
  $sts_p = ['Belum dibayar','Menunggu Konfirmasi Pembayaran','Pembayaran Ditolak','Pembayaran Diterima'];
?>
<main class="m-0 p-0">
  <div class="m-0 p-0 row justify-content-center">
    <div class="col-md-10 mt-5">
      <h4>Pemesanan</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Transaksi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Total Biaya</th>
            <th scope="col">Bukti Pembayaran</th>
            <th scope="col">Status Pembayaran</th>
            <th scope="col">Status Transaksi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $n = 0; foreach($transaksi as $t){ $n++?>
            <tr>
              <th scope="row"><?= $n; ?></th>
              <td><?= $t->kd_transaksi; ?></td>
              <td><?= $t->tgl; ?></td>
              <td>Rp. <?= number_format($t->total_harga,0,",",".");?>,-</td>
              <td>Rp. <?= number_format(($t->total_biaya),0,",",".");?>,-</td>
              <td>
                <img src="<?= base_url('images/bukti_pembayaran/'.$t->bukti_pembayaran)?>" class="img-thumbnail" style="width:150px">
              </td>
              <td><?= $sts_p[$t->status_pembayaran-1]; ?></td>
              <td><?= $sts_t[$t->status_transaksi-1]; ?></td>
              <td>
                <a class="btn btn-sm btn-primary m-1" href="<?= base_url("main/detail_transaksi/$t->kd_transaksi")?>" >
                  <i class="fa fa-eye"></i>
                </a>
                <?php if($t->status_pembayaran-1 < 3){?>
                <a class="btn btn-sm btn-danger m-1" href="<?= base_url("main/bukti_pembayaran/$t->kd_transaksi")?>" >
                  <i class="fa fa-upload"></i> Bayar
                </a>
                <?php }?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>