<main class="m-0 p-0">
  <div class="row m-0 p-0">
    <div class="col-md-8 bg-light text-center overflow-hidden">
      <img src="<?= base_url();?>public_assets/img/ppl_1.jpeg" style="height:30em;" alt="">
    </div>
    <div class="col-md-4 py-4 px-2">
      <form action="<?= base_url('log/regis')?>" method="POST">
        <div class="container">
          <div class="mb-3">
            <p class="fs-3">Form Pendaftaran</p>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Username">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput2" placeholder="Password Baru">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Konfirmasi Password</label>
            <input type="password" name="konf_password" class="form-control" id="exampleFormControlInput5" placeholder="Konfirmasi Password">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Nama Sekolah</label>
            <input type="text" name="nama" class="form-control" id="exampleFormControlInput3" placeholder="Nama Sekolah">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat Pengguna / Sekolah"></textarea>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-success w-100">Daftar</button>
          </div>
          <div class="mb-3">
            <a href="<?= base_url('main/login')?>" class="btn btn-primary w-100">Sudah Punya Akun</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>