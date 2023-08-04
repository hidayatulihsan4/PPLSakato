<?php 
  $sts_p = ['Belum dibayar','Menunggu Konfirmasi Pembayaran','Pembayaran Ditolak','Pembayaran Diterima'];
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
              <h5 class="card-title">Transaksi</h5>
            </div>
            <div class="card-body">
              <!-- <a href="<?= base_url('transaksi/add_data');?>" class="btn btn-info">
                <i class="fa fa-plus-circle"></i>  Tambah Data
              </a> -->
              <div class="table-responsive">
                <table class="table" id="x-data-tables" style="width:100%">
                  <thead class="text-info">
                    <th>#</th>
                    <th>Kode Transaksi</th>
                    <th>Total Harga</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status Pembayaran</th>
                    <th>Tanggal</th>
                    <th class="text-right">Action</th>
                  </thead>
                  
                  <tbody>
                    <?php $no = 0; foreach($data as $d){ $no++; ?>
                      <tr>
                        <th><?= $no;?></th>
                        <td><?= $d->kd_transaksi;?></td>
                        <td><?= $d->total_harga;?></td>
                        <td>
                          <img src="<?= base_url('images/bukti_pembayaran/'.$d->bukti_pembayaran)?>" class="img-thumbnail" style="max-width:150px; max-height:150px">
                        </td>
                        <td><?= $sts_p[$d->status_pembayaran-1];?></td>
                        <td><?= $d->tgl;?></td>
                        <td>
                          <?php if($d->status_pembayaran <= 4 && $d->status_pembayaran > 1){?>
                          <a class="btn btn-info" href="<?= base_url("transaksi/update_data/$d->kd_transaksi");?>">
                            <i class="fa fa-edit"></i>
                          </a>
                          <!-- <a class="btn btn-danger" href="<?= base_url("transaksi/do_delete/$d->kd_transaksi");?>">
                            <i class="fa fa-trash"></i>
                          </a> -->
                          <?php }?>
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
  