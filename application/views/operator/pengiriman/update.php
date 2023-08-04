<?php 
  $status = ['Menunggu Konfirmasi Pembayaran','Sedang diprosses','Sedang dikirim','Telah diterima','Selesai'];
?>
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Update Pengiriman</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('pengiriman');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'pengiriman/do_update/'.$data->kd_pengiriman; ?>">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kode Transaksi</label>
                      <input value="<?= $data->kd_transaksi;?>" id="kd_transaksi" type="text" class="form-control" placeholder="kd_transaksi" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Ekspedisi</label>
                      <input value="<?= $data->ekspedisi;?>" id="ekspedisi" type="text" class="form-control" placeholder="ekspedisi" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Layanan</label>
                      <input value="<?= $data->ekspedisi_service;?>" id="ekspedisi_service" type="text" class="form-control" placeholder="ekspedisi_service" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Ongkir</label>
                      <input value="<?= $data->ongkir;?>" id="ongkir" type="number" class="form-control" placeholder="0" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nomor Resi</label>
                      <input name="no_resi" id="no_resi" type="text" class="form-control" placeholder="Nomor Resi" required>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status Pengiriman</label>
                      <select data-opt="<?= $data->status_pengiriman ?>" name="status_pengiriman" class="form-control">
                        <option value="2">Sedang Diproses</option>
                        <option value="3">Sedang Dikirim</option>
                        <option value="4">Telah Diterima</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-info">Update</button>
                      <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	  </div>
  