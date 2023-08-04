
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Kirim Pesanan</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('pengiriman');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'pengiriman/do_update/'.$data->kd_pengiriman; ?>">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pilih Kurir</label>
                      <select data-opt="<?= $data->id_user_toko;?>"class="form-control" name="id_user_toko" id="id_user_toko">
                        <?php foreach($opt_id_user_toko as $o){?>
                          <option value="<?= $o->id; ?>" ><?= $o->id; ?> / <?= $o->nama; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <input type="hidden" name="status_pengiriman" value="2">

                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-info">Pilih</button>
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
  