<main class="m-0 p-0">
  <div class="row m-0 p-0">
    <div class="col-md-8 mx-auto py-4 px-2">
      <form action="<?= base_url('main/up_profile')?>" method="POST">
        <div class="container">
          <div class="mb-3">
            <p class="fs-3">Profile</p>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput6" class="form-label">Nama Sekolah</label>
            <input type="text" name="nama" value="<?= $data_user['name']?>" class="form-control" id="exampleFormControlInput6" placeholder="Nama Sekolah" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput7" class="form-label">Nama Penanggung Jawab</label>
            <input type="text" name="nama_penanggung_jawab" value="<?= $data_user['nama_penanggung_jawab']?>" class="form-control" id="exampleFormControlInput7" placeholder="Nama Penanggung Jawab" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput8" class="form-label">Telp</label>
            <input type="text" name="telp" value="<?= $data_user['telp']?>" class="form-control" id="exampleFormControlInput8" placeholder="Telp" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput9" class="form-label">Provinsi</label>
            <!-- <input type="text" name="provinsi" class="form-control" id="exampleFormControlInput9" placeholder="Provinsi" required> -->
            <select id="provinsi" name="provinsi" data-opt="<?= $data_user['provinsi']?>" class="form-control" id="exampleFormControlInput9" required>
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
            <select id="kota" name="kota" data-opt="<?= $data_user['kota']?>" class="form-control" id="exampleFormControlInput10" required>
            </select>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput11" class="form-label">Kode Pos</label>
            <input type="text" name="kode_pos" value="<?= $data_user['kode_pos']?>" class="form-control" id="exampleFormControlInput11" placeholder="Kode Pos" required>
          </div>
          <div class="mb-1">
            <label for="exampleFormControlInput4" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat Pengguna / Sekolah"><?= $data_user['alamat']?></textarea required>
          </div>
          <div class="mb-1">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>