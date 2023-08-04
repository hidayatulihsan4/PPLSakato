
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Data Transaksi</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('transaksi');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'transaksi/do_update/'.$data->kd_transaksi; ?>">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kd Pemesanan</label>
                      <select data-opt="<?= $data->kd_pemesanan;?>"class="form-control" name="kd_pemesanan" id="kd_pemesanan">
                        <?php foreach($opt_kd_pemesanan as $o){?>
                          <option value="<?= $o->kd_pemesanan; ?>" ><?= $o->kd_pemesanan; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Total Harga</label>
                      <input value="<?= $data->total_harga;?>" name="total_harga" id="total_harga" type="number" class="form-control" placeholder="total_harga">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status Pembayaran</label>
                      <input value="<?= $data->status_pembayaran;?>" name="status_pembayaran" id="status_pembayaran" type="number" class="form-control" placeholder="status_pembayaran">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tgl</label>
                      <input value="<?= $data->tgl;?>" name="tgl" id="tgl" type="date" class="form-control" placeholder="tgl">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-info">Update</button>
                      <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	  </div>
  