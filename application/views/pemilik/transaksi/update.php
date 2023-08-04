    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="<?= base_url('images/bukti_pembayaran/'.$data->bukti_pembayaran)?>" class="w-100">          
          </div>
        </div>
      </div>
    </div>

	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Konfirmasi Pembayaran</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('transaksi');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'transaksi/konf_bukti_pembayaran/'.$data->kd_transaksi; ?>"  enctype="multipart/form-data">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kode Transaksi</label>
                      <input value="<?= $data->kd_transaksi;?>" id="total_harga" type="text" class="form-control" placeholder="total_harga" readonly>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Total Harga</label>
                      <input value="<?= $data->total_harga;?>" id="total_harga" type="number" class="form-control" placeholder="total_harga" readonly>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Bukti Pembayaran</label>
                      <div data-toggle="modal" data-target="#exampleModal">
                        <img src="<?= base_url('images/bukti_pembayaran/'.$data->bukti_pembayaran)?>" class="img-thumbnail" style="width:150px">
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input value="<?= $data->tgl;?>" id="tgl" type="date" class="form-control" placeholder="tgl" readonly>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status Pembayaran</label>
                      <select data-opt="<?= $data->status_pembayaran ?>" name="status_pembayaran" class="form-control">
                        <option value="2">Menunggu Konfirmasi Pembayaran</option>
                        <option value="3">Pembayaran Ditolak</option>
                        <option value="4">Pembayaran Diterima</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-info">Update</button>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	  </div>
  