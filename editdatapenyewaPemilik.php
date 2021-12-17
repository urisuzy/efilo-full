<?php
require 'header.php';
require 'sidebar.php';
require 'bootstrap.html';
$id = $_GET['id'] ?? null;
if (!$id) {
    echo 'userid tidak ada';
    die();
}

if (isset($_REQUEST['submit'])) {
    $column = '';
    $valueValue = '';
    foreach ($_REQUEST as $key => $value) {
        if ($key != 'submit' && $key != 'id') {
            $column = $key;
            $valueValue = $value;
            break;
        }
    }

    if (!empty($column)) {
        $data = [
            'id' => $_REQUEST['id'],
            'column' => $column,
            'value' => $valueValue
        ];
        $response = requestUpdateUserByIdAdmin($data);
        // print_r($response);
    }
}

$user = requestGetUserById($id)->result;
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
                                    <div class="form-group row">
                                        <label for="username" class="col-3 col-form-label">Email</label>
                                        <div class="col-6">
                                            <input id="username" name="email" placeholder="Email" class="form-control here" type="text" value="<?= $user->email ?>" disabled>
                                        </div>
                                    </div>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="name" class="col-3 col-form-label">Password</label>
                                            <div class="col-6">
                                                <input id="pass" name="password" placeholder="Password" class="form-control here" type="text">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="kamar" class="col-3 col-form-label">Kamar</label>
                                            <div class="col-6">
                                                <input id="kamar" name="room_code" placeholder="No. Kamar" class="form-control here" type="text" value="<?= $user->room->code ?? '' ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="text" class="col-3 col-form-label">Tanggal Masuk</label>
                                            <div class="col-6">
                                                <input id="text" name="entry_date" placeholder="Tanggal Masuk" class="form-control here" required="required" type="text" value="<?= date("d-m-y", strtotime($user->entry_date))  ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="text" class="col-3 col-form-label">Tanggal Keluar</label>
                                            <div class="col-6">
                                                <input id="text" name="out_date" placeholder="Tanggal Keluar" class="form-control here" required="required" type="text" value="<?= date("d-m-y", strtotime($user->out_date)) ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="email" class="col-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-6">
                                                <input id="Namalengkap" name="name" placeholder="Nama Lengkap" class="form-control here" required="required" type="text" value="<?= $user->name ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="website" class="col-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-6">
                                                <input id="TTL" name="birthdate" placeholder="Tanggal Lahir" class="form-control here" type="text" value="<?= $user->birthday ? date("d-m-Y", strtotime($user->birthday)) : '' ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="newpass" class="col-3 col-form-label">No. Telp</label>
                                            <div class="col-6">
                                                <input id="telp" name="phone_number" placeholder="No. Telp" class="form-control here" type="text" value="<?= $user->phone_number ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="newpass" class="col-3 col-form-label">Asal</label>
                                            <div class="col-6">
                                                <input id="Asal" name="city" placeholder="Asal" class="form-control here" type="text" value="<?= $user->city ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="newpass" class="col-3 col-form-label">Alamat</label>
                                            <div class="col-6">
                                                <input id="Alamat" name="address" placeholder="Alamat" class="form-control here" type="text" value="<?= $user->address ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form method="post">
                                        <div class="form-group row">
                                            <label for="newpass" class="col-3 col-form-label">Kontak Keluarga</label>
                                            <div class="col-6">
                                                <input id="kontak" name="parents_number" placeholder="Kontak Keluarga" class="form-control here" type="text" value="<?= $user->parents_number ?>">
                                            </div>
                                            <div>
                                                <button class="button" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <style>
                                .button {
                                    background-color: #5C8E9E;
                                    border: none;
                                    border-radius: 30px;
                                    width: 100px;
                                    height: 30px;
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
            </div>
        </section>
    </div>
</div>