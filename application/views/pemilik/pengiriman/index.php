<?php 
  $status = ['Menunggu Konfirmasi Pembayaran','Belum Dikirim','Sedang dikirim','Telah diterima','Selesai'];
?>
	  <div class="panel-header panel-header-sm">
	  </div>
		<!-- Bigger panel header -->
		<!-- <div class="panel-header">
			<div class="header text-center">
				<h2 class="title">Notifications</h2>
				<p class="category">Describe</p>
			</div>
		</div> -->
	  <div class="content">
			<div class="row">
				<div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Pengiriman</h5>
            </div>
            <div class="card-body">
              <!-- <a href="<?= base_url('pengiriman/add_data');?>" class="btn btn-info">
                <i class="fa fa-plus-circle"></i>  Tambah Data
              </a> -->
              
              <a href="<?= base_url('print_data/pengiriman');?>" class="btn btn-info" target="_blank">
                <i class="fa fa-print"></i>  Print All
              </a>
              <div class="table-responsive">
                <table class="table" id="x-data-tables" style="width:100%">
                  <thead class="text-info">
                    <th>#</th>
                    <th>Kode Pengiriman</th>
                    <th>Kode Transaksi</th>
                    <th>Eksepedisi</th>
                    <th>Layanan</th>
                    <th>Ongkir</th>
                    <th>Status Pengiriman</th>
                    <th class="text-right">Nomor Resi</th>
                  </thead>
                  
                  <tbody>
                    <?php $no = 0; foreach($data as $d){ $no++;?>
                      <tr>
                        <th><?= $no;?></th>
                        <td><?= $d->kd_pengiriman;?></td>
                        <td><?= $d->kd_transaksi;?></td>
                        <td><?= $d->ekspedisi;?></td>
                        <td><?= $d->ekspedisi_service;?></td>
                        <td><?= $d->ongkir;?></td>
                        <td><?= $status[$d->status_pengiriman-1];?></td>
                        <td><?= $d->no_resi;?></td>
                        <!-- <td>
                          <a class="btn btn-info" href="<?= base_url("pengiriman/update_data/$d->kd_pengiriman");?>">
                            <i class="fa fa-edit"></i>
                          </a>
                        </td> -->
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
  