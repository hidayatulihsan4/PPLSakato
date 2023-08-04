
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
              <h5 class="card-title">Data Pengiriman</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('pengiriman/add_data');?>" class="btn btn-info">
                <i class="fa fa-plus-circle"></i>  Tambah Data
              </a>
              <div class="table-responsive">
                <table class="table" id="x-data-tables" style="width:100%">
                  <thead class="text-info">
                    <th>Kd Pengiriman</th>
                    <th>Kd Transaksi</th>
                    <th>User Toko</th>
                    <th>Status Pengiriman</th>
                    <th class="text-right">Action</th>
                  </thead>
                  
                  <tbody>
                    <?php foreach($data as $d){ ?>
                      <tr>
                        <td><?= $d->kd_pengiriman;?></td>
                        <td><?= $d->kd_transaksi;?></td>
                        <td><?= $d->nama_user_toko;?></td>
                        <td><?= $d->status_pengiriman;?></td>
                        <td>
                          <a class="btn btn-info" href="<?= base_url("pengiriman/update_data/$d->kd_pengiriman");?>">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a class="btn btn-danger" href="<?= base_url("pengiriman/do_delete/$d->kd_pengiriman");?>">
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
  