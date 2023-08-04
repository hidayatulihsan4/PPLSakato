
	  <div class="panel-header panel-header-sm">
	  </div>
	  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Edit Data User</h5>
            </div>
            <div class="card-body">
              <a href="<?= base_url('user');?>" class="btn btn-info">
                <i class="fa fa-arrow-left"></i>  Kembali
              </a>
              <form method="post" action="<?= base_url().'user/do_update/'.$data->username; ?>">
                <div class="row">
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Username</label>
                      <input value="<?= $data->username;?>" name="username" id="username" type="text" class="form-control" placeholder="username">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input value="<?= $data->password;?>" name="password" id="password" type="text" class="form-control" placeholder="password">
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Level</label>
                      <input value="<?= $data->level;?>" name="level" id="level" type="number" class="form-control" placeholder="level">
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
  