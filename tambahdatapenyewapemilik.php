<?php
require 'sidebar3.php';
require 'bootstrap.html';
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
                                        <form>
                                              <div class="form-group row">
                                                <label for="username" class="col-3 col-form-label">User Name</label> 
                                                <div class="col-8">
                                                  <input id="username" name="username" placeholder="Username" class="form-control here" required="required" type="text">
                                                </div> 
                                              </div>
                                              <div class="form-group row">
                                                <label for="name" class="col-3 col-form-label">Password</label> 
                                                <div class="col-8">
                                                  <input id="pass" name="pass" placeholder="Password" class="form-control here" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="kamar" class="col-3 col-form-label">Kamar</label> 
                                                <div class="col-8">
                                                  <input id="kamar" name="kamar" placeholder="No. Kamar" class="form-control here" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="text" class="col-3 col-form-label">Tanggal Sewa</label> 
                                                <div class="col-8">
                                                  <input id="text" name="text" placeholder="Nick Name" class="form-control here" required="required" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="email" class="col-3 col-form-label">Nama Lengkap</label> 
                                                <div class="col-8">
                                                  <input id="Namalengkap" name="Namalengkap" placeholder="Nama Lengkap" class="form-control here" required="required" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="website" class="col-3 col-form-label">TTL</label> 
                                                <div class="col-8">
                                                  <input id="TTL" name="TTL" placeholder="TTL" class="form-control here" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="newpass" class="col-3 col-form-label">No. Telp</label> 
                                                <div class="col-8">
                                                  <input id="telp" name="telp" placeholder="No. Telp" class="form-control here" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="newpass" class="col-3 col-form-label">Asal</label> 
                                                <div class="col-8">
                                                  <input id="Asal" name="Asal" placeholder="Asal" class="form-control here" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="newpass" class="col-3 col-form-label">Alamat</label> 
                                                <div class="col-8">
                                                  <input id="Alamat" name="Alamat" placeholder="Alamat" class="form-control here" type="text">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="newpass" class="col-3 col-form-label">Kontak Keluarga</label> 
                                                <div class="col-8">
                                                  <input id="kontak" name="kontak" placeholder="Kontak Keluarga" class="form-control here" type="text">
                                                </div>
                                              </div>
                                              <button class="button" name="submit" type="submit">Tambah Penyewa</button>
                                              </div>
                                            </form>
                                    </div>
                                </div>
                              <style>
                                .button{
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
                                label{
                                  color: #5C8E9E;
                                  font-weight: bolder;
                                }
                              </style>
