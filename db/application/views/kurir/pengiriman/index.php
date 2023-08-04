<?php 
  $status = ['Sedang diprosses','Sedang dikirim','Telah diterima','Selesai'];
  $up = ['Konfirmasi Pengiriman','Konfirmasi Penerimaan'];
?>
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
			<div class="row">
				<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Data Pengiriman</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="x-data-tables" style="width:100%">
                  <thead class="text-info">
                    <th>Kd Pengiriman</th>
                    <th>Kd Transaksi</th>
                    <th>Nama Kurir</th>
                    <th>Status Pengiriman</th>
                    <th class="text-right">Action</th>
                  </thead>
                  
                  <tbody>
                    <?php foreach($data as $d){ ?>
                      <tr>
                        <td><?= $d->kd_pengiriman;?></td>
                        <td><?= $d->kd_transaksi;?></td>
                        <td><?= $d->nama;?></td>
                        <td><?= $status[$d->status_pengiriman-1];?></td>
                        <td>
                          <?php if((($d->status_pengiriman-1) < 2) && (($d->status_pengiriman-1) >= 0)){ ?>
                            <a class="btn btn-info" href="<?= base_url("pengiriman/update_pengiriman/$d->kd_pengiriman/".($d->status_pengiriman+1));?>">
                              <i class="fa fa-truck"></i> <?= $up[$d->status_pengiriman-1];?>
                            </a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                  
                  
				</div>
			</div>
	  </div>
  