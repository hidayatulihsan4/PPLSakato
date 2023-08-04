
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Tambah Data Pengiriman</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('pengiriman');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'pengiriman/do_add'; ?>">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Id User Toko</label>
                      <select class="form-control" name="id_user_toko" id="id_user_toko">
                        <?php foreach($opt_id_user_toko as $o){?>
                          <option value="<?= $o->id; ?>" ><?= $o->id; ?> / <?= $o->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kd Transaksi</label>
                      <select class="form-control" name="kd_transaksi" id="kd_transaksi">
                        <?php foreach($opt_kd_transaksi as $o){?>
                          <option value="<?= $o->kd_transaksi; ?>" ><?= $o->kd_transaksi; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status Pengiriman</label>
                      <input name="status_pengiriman" id="status_pengiriman" type="number" class="form-control" placeholder="status_pengiriman">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-info">Submit</button>
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
  