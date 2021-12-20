<?php
require 'header.php';
require 'sidebar.php';

if (isset($_POST['submit'])) {
  $response = requestAddUser($_POST);
  if (!empty($response->errors)) {
    echo 'Ada data yang kosong atau format tanggal salah, silahkan ulangi';
  } else if (!empty($response->result)) {
    echo 'user berhasil dibuat';
  }
}
?>

<div class="content-container">
  <div class="container-fluid">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-3 mt-5">
            <h2 class="heading-section">Edit Data Penyewa</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form method="POST">
                    <div class="form-group row">
                      <label for="email" class="col-3 col-form-label">Nama Lengkap</label>
                      <div class="col-8">
                        <input id="Namalengkap" name="name" placeholder="Nama Lengkap" class="form-control here" required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-3 col-form-label">Email</label>
                      <div class="col-8">
                        <input id="username" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-3 col-form-label">Password</label>
                      <div class="col-8">
                        <input id="pass" name="password" placeholder="Password" class="form-control here" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kamar" class="col-3 col-form-label">Kamar</label>
                      <div class="col-8">
                        <input id="kamar" name="room_code" placeholder="No. Kamar" class="form-control here" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="text" class="col-3 col-form-label">Tanggal Masuk</label>
                      <div class="col-8">
                        <input id="text" name="start_date" placeholder="DD-MM-YYYY" class="form-control here" required="required" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="text" class="col-3 col-form-label">Tanggal Keluar</label>
                      <div class="col-8">
                        <input id="text" name="end_date" placeholder="DD-MM-YYYY" class="form-control here" required="required" type="text">
                      </div>
                    </div>
                    <button class="button" name="submit" type="submit">Tambah Penyewa</button>
                </div>
                </form>
              </div>
            </div>
            <style>
              .button {
                background-color: #5C8E9E;
                display: block;
                margin-left: auto;
                margin-right: auto;
                border: none;
                border-radius: 15px;
                margin-top: 30px;
                width: 150px;
                height: 40px;
                color: white;
              }

              label {
                color: #5C8E9E;
                font-weight: bolder;
              }
            </style>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>