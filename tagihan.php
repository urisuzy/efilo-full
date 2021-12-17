<?php
include 'headerPenyewa.php';
include 'sidebarPenyewa.php';


$user = requestGetUser()->result;
$bills = requestListBill()->result;

$period = new DatePeriod(
    new DateTime($user->entry_date),
    new DateInterval('P1M'),
    new DateTime($user->out_date)
);
$arr = [];
foreach ($period as $key => $value) {
    $arr[$value->format('Y')][$value->format('m')] = $value->format('F');
}
$arrBill = (array) $bills;
?>

<div id="content">
    <div id="contentTitle">
        <p id="tagihanTitle">Tagihan</p>
    </div>
    <div id="contentIsi">
        <?php
        $sc = 0;
        foreach ($arr as $year => $months) :
        ?>
            <p class="tagihanTahun"><?= $year ?></p>
            <div class="tagihanContainer">
                <div class="flex-row">
                    <?php
                    $c = 0;
                    foreach ($months as $num => $month) :
                        $newMo = str_pad($num, 2, '0', STR_PAD_LEFT);
                        $fullDate = $year . '-' . $newMo . '-15 00:00:00';
                        if (!($user->entry_date < $fullDate) || !($fullDate < $user->out_date))
                            continue;

                        $newDate = null;
                        $index = array_search($num, array_column($arrBill, 'month'));
                        $c++;
                        if (is_numeric($index)) {
                            $icon = 'assets/check.png';
                            $text = 'Tunai';
                            $originalDate = $arrBill[$index]->pay_date;
                            $newDate = date("d", strtotime($originalDate));
                        } else {
                            $icon = 'assets/alert.png';
                            $text = 'Segera Bayar!';
                        }
                    ?>
                        <div class="box">
                            <div class="boxBulan">
                                <h2 class="bulan"><?= $month ?></h2>
                            </div>
                            <div class="boxTanggal">
                                <div class="statusImage">
                                    <img src="<?= $icon ?>" alt="">
                                </div>
                                <div class="statusPembayaran">
                                    <p class="tanggal"><?= $newDate ?? '-' ?></p>
                                    <p><?= $text ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                        if ($c == 5) {
                            echo '</div><div class="flex-row">';
                            $c = 0;
                        }
                    endforeach; ?>
                </div>
            </div>
        <?php
        endforeach;
        ?>
        <br>
    </div>
</div>
<?php
include 'footerPenyewa.php';
