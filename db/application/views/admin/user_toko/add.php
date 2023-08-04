
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Tambah Data User Toko</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('user_toko');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'user_toko/do_add'; ?>">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Username</label>
                      <input name="username" id="username" type="text" class="form-control" placeholder="username">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" id="password" type="text" class="form-control" placeholder="password">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Level</label>
                      <!-- <input name="level" id="level" type="number" class="form-control" placeholder="level"> -->
                      <select class="form-control" name="level" id="level">
                        <option value="2">Kurir</option>
                        <option value="3">Operator</option>
                        <option value="4">Pemilik</option>
                        <option value="5">Admin</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input name="nama" id="nama" type="text" class="form-control" placeholder="nama">
                    </div>
                  </div>
                  
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <label>Username</label>
                      <select class="form-control" name="username" id="username">
                        <?php foreach($opt_username as $o){?>
                          <option value="<?= $o->username; ?>" ><?= $o->username; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div> -->
                  
                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input name="jabatan" id="jabatan" type="text" class="form-control" placeholder="jabatan">
                    </div>
                  </div> -->
                  
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
  