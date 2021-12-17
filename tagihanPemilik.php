<?php
require_once 'header.php';
require 'sidebar.php';
require 'bootstrap.html';

if (isset($_REQUEST['year'], $_REQUEST['month'], $_REQUEST['room_id'], $_REQUEST['user_id'], $_REQUEST['total'])) {
    requestSendPay($_REQUEST['user_id'], $_REQUEST['room_id'], $_REQUEST['total'], $_REQUEST['month'], $_REQUEST['year']);
}

$response = requestBillsAdmin();
$year = $_GET['year'] ?? date("Y");
$nextY = $year + 1;
$prevY = $year - 1;
?>

<div class="content-container">
    <div class="container-fluid">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5 mt-3">
                        <h2 class="heading-section">TAGIHAN</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="contact-table table table-curved">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;">Kmr</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;">Nama</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center; "><a href="/tagihanPemilik.php?year=<?= $prevY ?>"><i style='font-size:24px' class='fas'> &#xf536;</i></a></th>
                                    <th colspan="12" class="text-center"><?= $year ?></th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;"><a href="/tagihanPemilik.php?year=<?= $nextY ?>"><i style='font-size:24px' class='fas'>&#xf531;</i></a></th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background: #5C8E9E;">Jan</th>
                                    <th class="text-center">Feb</th>
                                    <th class="text-center" style="background: #5C8E9E;">Mar</th>
                                    <th class="text-center">Apr</th>
                                    <th class="text-center" style="background: #5C8E9E;">Mei</th>
                                    <th class="text-center">Jun</th>
                                    <th class="text-center" style="background: #5C8E9E;">Jul</th>
                                    <th class="text-center">Agu</th>
                                    <th class="text-center" style="background: #5C8E9E;">Sep</th>
                                    <th class="text-center">Okt</th>
                                    <th class="text-center" style="background: #5C8E9E;">Nov</th>
                                    <th class="text-center">Des</th>
                                </tr>


                            </thead>
                            <tbody class="text-center">
                                <?php
                                foreach ($response->result as $user) :
                                    if (!empty($user->room_id)) :
                                ?>
                                        <tr>
                                            <td><?= $user->room->code ?></td>
                                            <td><?= $user->name ?></td>
                                            <td></td>
                                            <?php
                                            $arr = (array) $user->bills;
                                            foreach (range(1, 12) as $month) {
                                                $index = array_search($month, array_column($arr, 'month'));

                                                if (is_numeric($index)) {
                                                    if ($arr[$index]->year == $year) {
                                                        echo "<td><i class='fas fa-check' style='font-size:24px; color: #505050'></i></td>";
                                                        continue;
                                                    }
                                                }
                                                $newMo = str_pad($month, 2, '0', STR_PAD_LEFT);
                                                $fullDate = $year . '-' . $newMo . '-15 00:00:00';
                                                if ($user->entry_date < $fullDate && $fullDate < $user->out_date)
                                                    echo '<td><a onclick="return confirm_alert(this);" href="/tagihanPemilik.php?user_id=' . $user->id . '&room_id=' . $user->room_id . '&total=' . $user->room->price . '&month=' . $month . '&year=' . $year . '"><i class="far fa-credit-card" style="color: #000" data-toggle="tooltip" title="Pay"></i></a></td>';
                                                else
                                                    echo '<td></td>';
                                            }
                                            ?>
                                            <td></td>
                                        </tr>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        <script type="text/javascript">
                            function confirm_alert(node) {
                                return confirm("Konfirmasi bahwa user telah bayar?");
                            }
                        </script>
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

                            table td:nth-child(4) {
                                background: #5C8E9E;
                            }

                            table td:nth-child(6) {
                                background: #5C8E9E;
                            }

                            table td:nth-child(8) {
                                background: #5C8E9E;
                            }

                            table td:nth-child(10) {
                                background: #5C8E9E;
                            }

                            table td:nth-child(12) {
                                background: #5C8E9E;
                            }

                            table td:nth-child(14) {
                                background: #5C8E9E;
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