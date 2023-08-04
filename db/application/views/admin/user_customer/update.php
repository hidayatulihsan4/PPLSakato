
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Data User Customer</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('user_customer');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'user_customer/do_update/'.$data->id; ?>">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input value="<?= $data->nama;?>" name="nama" id="nama" type="text" class="form-control" placeholder="nama">
                    </div>
                  </div>
                  
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" value="<?= $data_customer->password;?>" id="password" type="text" class="form-control" placeholder="password">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Username</label>
                      <input name="username" value="<?= $data->username?>" id="username" type="text" class="form-control" placeholder="username">
                    </div>
                  </div>

                  <!-- <div class="col-md-12">
                    <div class="form-group">
                      <label>Username</label>
                      <select data-opt="<?= $data->username;?>"class="form-control" name="username" id="username">
                        <?php foreach($opt_username as $o){?>
                          <option value="<?= $o->username; ?>" ><?= $o->username; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div> -->
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input value="<?= $data->alamat;?>" name="alamat" id="alamat" type="text" class="form-control" placeholder="alamat">
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
  