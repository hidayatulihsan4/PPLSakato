
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Data Produk</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('produk');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'produk/do_update/'.$data->id; ?>"  enctype="multipart/form-data">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input value="<?= $data->nama;?>" name="nama" id="nama" type="text" class="form-control" placeholder="nama">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Harga</label>
                      <input value="<?= $data->harga;?>" name="harga" id="harga" type="number" class="form-control" placeholder="harga">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Foto Produk</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto" value="<?= $data->foto_produk;?>" name="foto_produk">
                          <label class="custom-file-label" for="foto_produk">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea name="keterangan" id="keterangan"class="form-control" rows="5" placeholder="Keterangan"><?= $data->keterangan;?></textarea>
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
  