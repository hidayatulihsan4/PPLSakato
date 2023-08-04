
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
              <h5 class="card-title">Data Transaksi</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('transaksi/add_data');?>" class="btn btn-info">
                <i class="fa fa-plus-circle"></i>  Tambah Data
              </a>
              <div class="table-responsive">
                <table class="table" id="x-data-tables" style="width:100%">
                  <thead class="text-info">
                    <th>Kd Transaksi</th>
                    <th>Kd Pemesanan</th>
                    <th>Total Harga</th>
                    <th>Status Pembayaran</th>
                    <th>Tgl</th>
                    <th class="text-right">Action</th>
                  </thead>
                  
                  <tbody>
                    <?php foreach($data as $d){ ?>
                      <tr>
                        <td><?= $d->kd_transaksi;?></td>
                        <td><?= $d->kd_pemesanan;?></td>
                        <td><?= $d->total_harga;?></td>
                        <td><?= $d->status_pembayaran;?></td>
                        <td><?= $d->tgl;?></td>
                        <td>
                          <a class="btn btn-info" href="<?= base_url("transaksi/update_data/$d->kd_transaksi");?>">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a class="btn btn-danger" href="<?= base_url("transaksi/do_delete/$d->kd_transaksi");?>">
                            <i class="fa fa-trash"></i>
                          </a>
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
  