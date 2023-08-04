
<main class="m-0 p-0">
  <div class="row m-0 p-0">
    <div class="col-md-9 bg-light text-center overflow-hidden">
      <img src="<?= base_url();?>public_assets/img/ppl_1.jpeg" style="height:25em;" alt="">
    </div>
    <div class="col-md-3 py-4 px-2">
      <div class="container">
        <div class="mb-3">
          <p class="fs-3">Form Login</p>
        </div>
        <form action="<?= base_url('log/in');?>" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Username disini">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleFormControlInput2" placeholder="Masukkan Password disini">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-success w-100">Masuk</button>
          </div>
        </form>
        <div class="mb-3">
          <a href="<?= base_url('main/register');?>" class="btn btn-primary w-100">Mendaftar</a>
        </div>
      </div>
    </div>
  </div>
</main>