
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Data Pemesanan</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('pemesanan');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'pemesanan/do_update/'.$data->kd_pemesanan; ?>">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Id Customer</label>
                      <select data-opt="<?= $data->id_customer;?>"class="form-control" name="id_customer" id="id_customer">
                        <?php foreach($opt_id_customer as $o){?>
                          <option value="<?= $o->id; ?>" ><?= $o->id; ?> / <?= $o->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kd Produk</label>
                      <select data-opt="<?= $data->kd_produk;?>"class="form-control" name="kd_produk" id="kd_produk">
                        <?php foreach($opt_kd_produk as $o){?>
                          <option value="<?= $o->kd_produk; ?>" ><?= $o->kd_produk; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input value="<?= $data->jumlah;?>" name="jumlah" id="jumlah" type="number" class="form-control" placeholder="jumlah">
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
  