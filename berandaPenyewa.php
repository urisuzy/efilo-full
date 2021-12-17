<?php
include 'headerPenyewa.php';
include 'sidebarPenyewa.php';

$response = requestGetUser();
$user = $response->result;
?>
<div id="content">
    <div id="contentTitleBeranda">
        <div style="flex-basis: 50%; text-align: right; margin: auto; ">
            <img class="userPicture" src="assets/userBlack.png" alt="" style="margin: auto;">
        </div>
        <div style="flex-basis: 50%; margin: auto;">
            <h3 class="userName" style="margin-left: 20px; font-size: 40px; padding:2px"><?= $user->name ?></h3>
            <h3 class="namaKamar" style="margin-left: 20px; font-size: 25px;">Kamar <?= $user->room->code ?? 'Kosong' ?></h3>
        </div>
    </div>
    <br><br>
    <div id="contentJangkaWaktu">
        <div id="container" style="margin: 0 auto; display: flex; padding: 10px;">
            <div style="flex-grow: 1; text-align: center; margin: 0 auto;">
                <h2>Kamar</h2>
                <p class="nomorkamar"><?= $user->room->code ?? 'Kosong' ?></p>
            </div>
            <div style="margin-left: 100px; margin-right: 100px;flex-grow: 1; text-align: center;">
                <h2>Dari</h2>
                <p class="awalSewa"><?= date("d-m-Y", strtotime($user->entry_date)); ?></p>
            </div>
            <div style="flex: 1; text-align: center;">
                <h2>Sampai</h2>
                <p class="awalAkhir"><?= date("d-m-Y", strtotime($user->out_date)); ?></p>
            </div>
        </div>
    </div>
    <div id="content-bawah">
        <div id="content-bawah-kiri" style="font-size: 10px;">
            <p>Nama Lengkap: <span id="namaLengkap"><?= $user->name ?></span></p>
            <p>TTL: <span id="ttl"><?= $user->city ?>, <?= $user->birthday ?></span></p>
            <p>No.Telp: <span id="notelp"><?= $user->phone_number ?></span></p>
            <p>Asal: <span id="asal"><?= $user->city ?></span></p>
            <p>Alamat: <span id="alamat"><?= $user->address ?></span></p>
            <p>Kontak Keluarga/Relasi:
                <?= $user->parents_number ?>
            </p>
            <p>Lembaga: <span id="lembaga"><?= $user->institution ?></span></p>
            <p>No.Plat Kendaraan: <span id="noplat"><?= $user->number_plate ?></span></p>
            <p>Jenis Kendaraan: <span id="kendaraan"><?= $user->vehicle ?></span></p>

            <div id="tombol-edit">
                <h3>EDIT</h3>
            </div>
        </div>
        <div id="content-bawah-kanan">
            <p>Foto KTP: </p>
            <img src="assets/ktp.png" alt="">
            <p>Foto KK: </p>
            <img src="assets/kk.png" alt="">
        </div>

    </div>

</div>
<?php
include 'footerPenyewa.php';
