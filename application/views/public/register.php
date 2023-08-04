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
          <div class="mb-1">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="Username" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput2" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput2" placeholder="Password Baru" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput5" class="form-label">Konfirmasi Password</label>
            <input type="password" name="konf_password" class="form-control" id="exampleFormControlInput5" placeholder="Konfirmasi Password" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput6" class="form-label">Nama Sekolah</label>
            <input type="text" name="nama" class="form-control" id="exampleFormControlInput6" placeholder="Nama Sekolah" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput7" class="form-label">Nama Penanggung Jawab</label>
            <input type="text" name="nama_penanggung_jawab" class="form-control" id="exampleFormControlInput7" placeholder="Nama Penanggung Jawab" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput8" class="form-label">Telp</label>
            <input type="text" name="telp" class="form-control" id="exampleFormControlInput8" placeholder="Telp" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput9" class="form-label">Provinsi</label>
            <!-- <input type="text" name="provinsi" class="form-control" id="exampleFormControlInput9" placeholder="Provinsi" required> -->
            <select id="provinsi" name="provinsi" class="form-control" id="exampleFormControlInput9" required>
              <option value="" disabled>Pilih Provinsi</option>
              <?php foreach($province as $p){ 
                if($p->province_id == 1){?>
                  <option value="<?=$p->province_id?>"><?= $p->province?></option>
                <?php }else{?>
                  <option value="<?=$p->province_id?>"><?= $p->province?></option>
              <?php }} ?>
            </select>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput10" class="form-label">Kota</label>
            <select id="kota" name="kota" class="form-control" id="exampleFormControlInput10" required>
            </select>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput11" class="form-label">Kode Pos</label>
            <input type="text" name="kode_pos" class="form-control" id="exampleFormControlInput11" placeholder="Kode Pos" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput4" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat Pengguna / Sekolah"></textarea required>
          </div>
          <div class="mb-1">
            <button type="submit" class="btn btn-success w-100">Daftar</button>
          </div>
          <div class="mb-1">
            <a href="<?= base_url('main/login')?>" class="btn btn-primary w-100">Sudah Punya Akun</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>