<?php
include 'header.php';
include 'sidebar.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    echo 'id not found';
    die();
}

$response = requestGetUserById($id);
$user = $response->result;
?>
<div class="content-container">
    <div class="container-fluid">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8 text-center mb-5 mt-3">
                        <div class="row" style="margin-left: 230px;">
                            <div class="profile-pic">
                                <svg width="60" height="60" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M102.273 54.5455C102.273 61.7787 99.3991 68.7156 94.2845 73.8302C89.1699 78.9449 82.233 81.8182 74.9998 81.8182C67.7666 81.8182 60.8297 78.9449 55.715 73.8302C50.6004 68.7156 47.7271 61.7787 47.7271 54.5455C47.7271 47.3123 50.6004 40.3754 55.715 35.2608C60.8297 30.1461 67.7666 27.2728 74.9998 27.2728C82.233 27.2728 89.1699 30.1461 94.2845 35.2608C99.3991 40.3754 102.273 47.3123 102.273 54.5455V54.5455ZM88.6361 54.5455C88.6361 58.1621 87.1995 61.6305 84.6421 64.1879C82.0848 66.7452 78.6164 68.1819 74.9998 68.1819C71.3832 68.1819 67.9147 66.7452 65.3574 64.1879C62.8001 61.6305 61.3634 58.1621 61.3634 54.5455C61.3634 50.9289 62.8001 47.4604 65.3574 44.9031C67.9147 42.3458 71.3832 40.9091 74.9998 40.9091C78.6164 40.9091 82.0848 42.3458 84.6421 44.9031C87.1995 47.4604 88.6361 50.9289 88.6361 54.5455V54.5455Z" fill="#364041" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M75 0C33.5795 0 0 33.5795 0 75C0 116.42 33.5795 150 75 150C116.42 150 150 116.42 150 75C150 33.5795 116.42 0 75 0ZM13.6364 75C13.6364 89.25 18.4977 102.368 26.6455 112.786C32.3675 105.272 39.7493 99.1824 48.2143 94.993C56.6793 90.8037 65.9983 88.6282 75.4432 88.6364C84.7659 88.6275 93.9676 90.7468 102.347 94.8326C110.727 98.9185 118.063 104.863 123.798 112.214C129.705 104.465 133.683 95.4219 135.402 85.8313C137.12 76.2407 136.53 66.3786 133.681 57.0613C130.831 47.7439 125.804 39.239 119.015 32.2503C112.226 25.2615 103.87 19.99 94.639 16.8717C85.408 13.7533 75.5673 12.878 65.9309 14.318C56.2945 15.758 47.1395 19.472 39.2234 25.1526C31.3074 30.8333 24.8578 38.3173 20.4084 46.9854C15.959 55.6536 13.6376 65.2566 13.6364 75V75ZM75 136.364C60.9133 136.385 47.2518 131.539 36.3273 122.645C40.7245 116.35 46.5773 111.211 53.3877 107.664C60.1981 104.117 67.7645 102.267 75.4432 102.273C83.0261 102.267 90.5011 104.07 97.2472 107.532C103.993 110.995 109.816 116.017 114.232 122.182C103.222 131.364 89.3358 136.384 75 136.364V136.364Z" fill="#364041" />
                                </svg>
                            </div>
                            <div class="profile-info">
                                <h4><b><?= $user->name ?></b></h4>
                                <span> Kamar <?= $user->room->code ?? 'Kosong' ?></span>
                            </div>
                        </div>
                        <div class="card-group">
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#5C8E9E">Kamar</h5>
                                    <p class="card-text"><?= $user->room->code ?? 'Kosong' ?></p>
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#5C8E9E">Dari</h5>
                                    <p class="card-text"><?= date("d-m-Y", strtotime($user->entry_date)) ?></p>
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:#5C8E9E">Sampai</h5>
                                    <p class="card-text"><?= date("d-m-Y", strtotime($user->out_date)) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card border-0 ml-1">
                            <div class="card-body">
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">Nama Lengkap</h6>
                                <p class="card-text"><?= $user->name ?></p>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">TTL</h6>
                                <p class="card-text"><?= $user->city ?>, <?= date("d-m-Y", strtotime($user->birthday)) ?></p>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">No. Telp</h6>
                                <p class="card-text"><?= $user->phone_number ?></p>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">Asal</h6>
                                <p class="card-text"><?= $user->city ?></p>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">Alamat</h6>
                                <p class="card-text"><?= $user->address ?></p>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">Kontak Keluarga / Relasi</h6>
                                <li class="card-text"><?= $user->parents_number ?></li>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">Lembaga</h6>
                                <p class="card-text"><?= $user->institution ?></p>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">NO. Plat Kendaraan</h6>
                                <p class="card-text"><?= $user->number_plate ?></p>
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">Jenis Kendaraan</h6>
                                <p class="card-text"><?= $user->vehicle ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">Foto KTP</h6>
                                <img src="ktp.svg" alt="ktp" style="width:280; height:180;">
                                <h6 class="card-subtitle mt-2 mb-2" style="color:#5C8E9E">foto KK</h6>
                                <img src="kk.svg" alt="komplain" style="width:280; height:180;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </body>

    </html>