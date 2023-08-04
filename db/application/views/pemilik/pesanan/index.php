
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
              <h5 class="card-title">Data Pesanan</h5>
            </div>
            <div class="card-body">
              <!-- <a href="<?= base_url('pemesanan/add_data');?>" class="btn btn-info">
                <i class="fa fa-plus-circle"></i>  Tambah Data
              </a> -->
              <div class="table-responsive">
                <table class="table" id="x-data-tables" style="width:100%">
                  <thead class="text-info">
                    <th>#</th>
                    <th>Kd Pemesanan</th>
                    <th>Customer</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Bukti Pembayaran</th>
                    <th>Tgl</th>
                    <th class="text-right">Action</th>
                  </thead>
                  
                  <tbody>
                    <?php $no = 0; foreach($data as $d){ 
                      if($d->status_pemesanan == 1){
                      $no++; ?>
                      <tr>
                        <td><?= $no;?></td>
                        <td><?= $d->kd_pemesanan;?></td>
                        <td><?= $d->nama;?></td>
                        <td><?= $d->nama_produk;?></td>
                        <td><?= $d->jumlah;?></td>
                        <td>
                            <img src="<?= base_url('images/bukti_pembayaran/'.$d->bukti_pembayaran)?>" class="img-thumbnail" style="width:150px">
                        </td>
                        <td><?= $d->tgl;?></td>
                        <td>
                          <a class="btn btn-info" href="<?= base_url("pesanan/terima_pesanan/$d->kd_pemesanan/$d->kd_transaksi");?>">
                            <i class="fa fa-check"></i> Terima
                          </a>
                          <a class="btn btn-danger" href="<?= base_url("pesanan/tolak_pesanan/$d->kd_pemesanan");?>">
                            <i class="fa fa-times"></i> Tolak
                          </a>
                        </td>
                      </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                  
                  
				</div>
			</div>
	  </div>
  