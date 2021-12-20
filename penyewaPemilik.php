<?php
require 'header.php';
require 'sidebar.php';
require 'bootstrap.html';

$response = requestListUsers();
?>
<div class="content-container">
    <div class="container-fluid">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5 mt-3">
                        <h2 class="heading-section">PENYEWA</h2>
                    </div>
                </div>
                <div class="row">
                    <div>
                    <a href="tambahdatapenyewapemilik.php" class="btn btn-outline-dark mb-3" name ="tambah" style="background-color:#5C8E9E; width:200px; height: 30px; float: right; border-radius: 12px"><i class="fa fa-plus-circle" style="color: #FFFFFF" title="tambah"> Tambah Penyewa</i></a>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="contact-table table table-curved">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">Kmr</th>
                                        <th class="text-center">Nama Lengkap</th>
                                        <th class="text-center">Asal</th>
                                        <th class="text-center">WA</th>
                                        <th class="text-center">Lembaga</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    foreach ($response->result as $user) :
                                    ?>
                                        <tr>
                                            <td><?= $user->room->code ?? 'Kosong' ?></td>
                                            <td style="color: #5C8E9E"><?= $user->name ?></td>
                                            <td><?= $user->city ?></td>
                                            <td><?= $user->phone_number ?></td>
                                            <td><?= $user->institution ?></td>
                                            <td>
                                                <a href="editdatapenyewapemilik.php?id=<?= $user->id ?>" class="edit"><i class="far fa-edit" style="color: #5C8E9E" data-toggle="tooltip" title="Edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <style>
                            .table-curved {
                                border-collapse: separate;
                                border: solid black 2px;
                                border-radius: 30px;
                                border-left: 0px;
                                border-top: 0px;
                            }

                            table.table-curved>thead>tr>th {
                                border: 2px solid black;
                            }

                            table.table-curved>tbody>tr>td {
                                border: 2px solid black;
                            }

                            .table-curved>thead:first-child>tr:first-child>th {
                                border-bottom: 2px;
                                border-top: solid black 2px;
                            }

                            .table-curved td,
                            .table-curved th {
                                border-left: 2px solid black;
                                border-top: 2px solid black;
                            }

                            .table-curved> :first-child> :first-child> :first-child {
                                border-top-left-radius: 30px;
                            }

                            .table-curved> :first-child> :first-child> :last-child {
                                border-top-right-radius: 30px;
                            }

                            .table-curved> :last-child> :last-child> :first-child {
                                border-bottom-left-radius: 30px;
                            }

                            .table-curved> :last-child> :last-child> :last-child {
                                border-bottom-right-radius: 30px;
                            }

                            .content-container {
                                padding-top: 50px;
                                padding-left: 220px;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
