
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
              <h5 class="card-title">Produk</h5>
            </div>
            <div class="card-body">
              <!-- <a href="<?= base_url('produk/add_data');?>" class="btn btn-info">
                <i class="fa fa-plus-circle"></i>  Tambah Data
              </a> -->
              
              <a href="<?= base_url('print_data/produk');?>" class="btn btn-info" target="_blank">
                <i class="fa fa-print"></i>  Print All
              </a>
              <div class="table-responsive">
                <table class="table" id="x-data-tables" style="width:100%">
                  <thead class="text-info">
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Foto Produk</th>
                    <th>Keterangan</th>
                    <!-- <th class="text-right">Action</th> -->
                  </thead>
                  
                  <tbody>
                    <?php foreach($data as $d){ ?>
                      <tr>
                        <td><?= $d->id;?></td>
                        <td><?= $d->nama;?></td>
                        <td><?= $d->harga;?></td>
                        <td>
                          <img src="<?= base_url('images/produk/'.$d->foto_produk)?>" class="img-thumbnail" style="max-width:150px; max-height:150px">
                          <!-- <?= $d->foto_produk;?> -->
                        </td>
                        <td><?= $d->keterangan;?></td>
                        <!-- <td>
                          <a class="btn btn-info" href="<?= base_url("produk/update_data/$d->id");?>">
                            <i class="fa fa-edit"></i>
                          </a>
                          <a class="btn btn-danger" href="<?= base_url("produk/do_delete/$d->id");?>">
                            <i class="fa fa-trash"></i>
                          </a> -->
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
  