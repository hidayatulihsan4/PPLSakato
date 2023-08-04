<?php 
  $status = ['Menunggu Konfirmasi Pembayaran','Sedang diprosses','Sedang dikirim','Telah diterima','Selesai'];
?>
<main class="m-0 p-0">
  <div class="m-0 p-0 row justify-content-center">
    <div class="col-md-10 mt-5">
      <h4>Data Pengiriman</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Transaksi</th>
            <th scope="col">Ekspedisi</th>
            <th scope="col">Layanan</th>
            <th scope="col">Total Harga</th>
            <th scope="col">Ongkir</th>
            <th scope="col">Total Biaya</th>
            <th scope="col">Status Pengiriman</th>
            <th scope="col">Nomor Resi</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $n = 0; foreach($pengiriman as $p){ $n++?>
            <tr>
              <th scope="row"><?= $n; ?></th>
              <td><?= $p->kd_transaksi; ?></td>
              <td><?= $p->ekspedisi; ?></td>
              <td><?= $p->ekspedisi_service; ?></td>
              <td>Rp. <?= number_format($p->total_harga,0,",",".");?>,-</td>
              <td>Rp. <?= number_format($p->ongkir,0,",",".");?>,-</td>
              <td>Rp. <?= number_format($p->total_biaya,0,",",".");?>,-</td>
              <td><?= $status[$p->status_pengiriman-1]?></td>
              <td><?= $p->no_resi; ?></td>
              <td>
                <?php if($p->status_pengiriman == 3){?>
                  <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#pengirimanModal<?= $p->kd_pengiriman;?>">
                    <i class="fa fa-check"></i> Konfirmasi
                  </button>
                  
                  <div class="modal fade" id="pengirimanModal<?= $p->kd_pengiriman;?>" tabindex="-1" aria-labelledby="pengirimanModal<?= $p->kd_pengiriman;?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="pengirimanModal<?= $p->kd_pengiriman;?>Label">Pengiriman</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Konfirmasi Pesanan Telah diterima?
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <a type="button" class="btn btn-primary" href="<?= base_url("main/konf_pengiriman/$p->kd_pengiriman")?>">Ya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>