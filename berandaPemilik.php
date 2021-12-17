<?php
require 'header.php';
require 'sidebar.php';
require 'bootstrap.html';

$rooms = requestListRoomAdmin();
$roomArr = [
    1 => [],
    2 => [],
    3 => [],
    4 => [],
    5 => [],
    6 => [],
    7 => [],
    8 => [],
    9 => [],

    110 => [],
    111 => [],
    112 => [],
    113 => [],
    114 => [],
    115 => [],
    116 => [],
    117 => [],
    118 => [],
    119 => [],
    120 => [],
    121 => [],
    122 => [],
    123 => [],
    124 => [],
    125 => [],
    126 => [],
    127 => [],
    128 => [],
    129 => [],

    200 => [],
    201 => [],
    202 => [],
    203 => [],
    204 => [],
    205 => [],
    206 => [],
    207 => [],
    208 => [],
    209 => [],
    210 => [],
    211 => [],
    212 => [],
    213 => [],
    214 => [],
    215 => [],
    216 => [],
    217 => [],
    218 => [],
    219 => [],
    220 => [],
    221 => [],
    222 => [],
    223 => [],
    224 => [],
    225 => [],
    226 => [],
    227 => [],
    228 => [],
    229 => [],
];

$color = [
    'kosong' => '#FFF',
    'isi' => '#5C8E9E',
    'hampir' => '#DE3B3B'
];

foreach ($rooms->result as $room) {
    if (!empty($room->user->entry_date) && !empty($room->user->out_date)) {
        $nowDate = date("Y-m-d H:i:s");
        $inBetween = $room->user->entry_date < $nowDate && $room->user->out_date > $nowDate;

        // get date diff
        $firstDate = strtotime($nowDate);
        $secondDate = strtotime($room->user->out_date);
        $datediff = abs($firstDate - $secondDate);
        $days = round($datediff / (60 * 60 * 24));
        if ($inBetween && $days <= 7) {
            $status = 'hampir';
        } else if ($inBetween) {
            $status = 'isi';
        } else {
            $status = 'kosong';
        }
    } else {
        $status = 'kosong';
    }

    $roomArr[$room->code] = [
        'status' => $status,
        'type' => $room->type ?? 'N',
    ];
}

function colorStatus($room)
{
    global $color, $roomArr;
    return !empty($roomArr[$room]['status']) ? $color[$roomArr[$room]['status']] : $color['kosong'];
}

function roomType($room)
{
    global $roomArr;
    return $roomArr[$room]['type'] ?? 'N';
}
?>

<div class="content-container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5 mt-3">
                <h2 class="heading-section">Info Kamar</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">

                <div class="card text-center" style="width:400px;border:2px solid black; border-radius:30px; margin-left: 50px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">F 110</h5>
                        <div class="card text-center mt-2 mb-2" style="width:350px;">
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(6) ?>">
                                        <h6 class="card-title">06</h6>
                                        <span class="card-text"><?= roomType(6) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(7) ?>">
                                        <h6 class="card-title">07</h6>
                                        <span class="card-text"><?= roomType(7) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(8) ?>">
                                        <h6 class="card-title">08</h6>
                                        <span class="card-text"><?= roomType(8) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(9) ?>">
                                        <h6 class="card-title">09</h6>
                                        <span class="card-text"><?= roomType(9) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body">
                                        <h6 class="card-title"></h6>
                                        <span class="card-text"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(1) ?>">
                                        <h6 class="card-title">01</h6>
                                        <span class="card-text"><?= roomType(1) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(2) ?>">
                                        <h6 class="card-title">02</h6>
                                        <span class="card-text"><?= roomType(2) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(3) ?>">
                                        <h6 class="card-title">03</h6>
                                        <span class="card-text"><?= roomType(3) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(4) ?>">
                                        <h6 class="card-title">04</h6>
                                        <span class="card-text"><?= roomType(4) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(5) ?>">
                                        <h6 class="card-title">05</h6>
                                        <span class="card-text"><?= roomType(5) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-center" style="width:400px; border:2px solid black; border-radius:30px; margin-left:50px; margin-top:20px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">F 25</h5>
                        <div class="card text-center mt-2 mb-2" style="width:350px;">
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-body" style="background-color: <?= colorStatus(120) ?>">
                                        <h6 class="card-title">120</h6>
                                        <span class="card-text"><?= roomType(6) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(121) ?>">
                                        <h6 class="card-title">121</h6>
                                        <span class="card-text"><?= roomType(7) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(122) ?>">
                                        <h6 class="card-title">122</h6>
                                        <span class="card-text"><?= roomType(8) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(123) ?>">
                                        <h6 class="card-title">123</h6>
                                        <span class="card-text"><?= roomType(9) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(124) ?>">
                                        <h6 class="card-title">124</h6>
                                        <span class="card-text"><?= roomType(124) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(110) ?>">
                                        <h6 class="card-title">110</h6>
                                        <span class="card-text"><?= roomType(110) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(111) ?>">
                                        <h6 class="card-title">111</h6>
                                        <span class="card-text"><?= roomType(111) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(112) ?>">
                                        <h6 class="card-title">112</h6>
                                        <span class="card-text"><?= roomType(112) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(113) ?>">
                                        <h6 class="card-title">113</h6>
                                        <span class="card-text"><?= roomType(113) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(114) ?>">
                                        <h6 class="card-title">114</h6>
                                        <span class="card-text"><?= roomType(114) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card text-center mt-2 mb-2" style="width:350px;">
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(125) ?>">
                                        <h6 class="card-title">125</h6>
                                        <span class="card-text"><?= roomType(125) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(126) ?>">
                                        <h6 class="card-title">126</h6>
                                        <span class="card-text"><?= roomType(126) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(127) ?>">
                                        <h6 class="card-title">127</h6>
                                        <span class="card-text"><?= roomType(127) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(128) ?>">
                                        <h6 class="card-title">128</h6>
                                        <span class="card-text"><?= roomType(128) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(129) ?>">
                                        <h6 class="card-title">129</h6>
                                        <span class="card-text"><?= roomType(129) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(115) ?>">
                                        <h6 class="card-title">115</h6>
                                        <span class="card-text"><?= roomType(115) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(116) ?>">
                                        <h6 class="card-title">116</h6>
                                        <span class="card-text"><?= roomType(116) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(117) ?>">
                                        <h6 class="card-title">117</h6>
                                        <span class="card-text"><?= roomType(117) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(118) ?>">
                                        <h6 class="card-title">118</h6>
                                        <span class="card-text"><?= roomType(118) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(119) ?>">
                                        <h6 class="card-title">119</h6>
                                        <span class="card-text"><?= roomType(119) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-sm-6">

                <div class="card text-center" style="width:400px; border:2px solid black; border-radius:30px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">F 29</h5>
                        <div class="card text-center mt-2 mb-2" style="width:350px;">
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(220) ?>">
                                        <h6 class="card-title">220</h6>
                                        <span class="card-text"><?= roomType(220) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(221) ?>">
                                        <h6 class="card-title">221</h6>
                                        <span class="card-text"><?= roomType(221) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(222) ?>">
                                        <h6 class="card-title">222</h6>
                                        <span class="card-text"><?= roomType(222) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(223) ?>">
                                        <h6 class="card-title">223</h6>
                                        <span class="card-text"><?= roomType(223) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(224) ?>">
                                        <h6 class="card-title">224</h6>
                                        <span class="card-text"><?= roomType(224) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(210) ?>">
                                        <h6 class="card-title">210</h6>
                                        <span class="card-text"><?= roomType(210) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(211) ?>">
                                        <h6 class="card-title">211</h6>
                                        <span class="card-text"><?= roomType(211) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(212) ?>">
                                        <h6 class="card-title">212</h6>
                                        <span class="card-text"><?= roomType(212) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(213) ?>">
                                        <h6 class="card-title">213</h6>
                                        <span class="card-text"><?= roomType(213) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(214) ?>">
                                        <h6 class="card-title">214</h6>
                                        <span class="card-text"><?= roomType(214) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card text-center mt-2 mb-2" style="width:350px;">
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(225) ?>">
                                        <h6 class="card-title">225</h6>
                                        <span class="card-text"><?= roomType(225) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(226) ?>">
                                        <h6 class="card-title">226</h6>
                                        <span class="card-text"><?= roomType(226) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(227) ?>">
                                        <h6 class="card-title">227</h6>
                                        <span class="card-text"><?= roomType(227) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(228) ?>">
                                        <h6 class="card-title">228</h6>
                                        <span class="card-text"><?= roomType(228) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(229) ?>">
                                        <h6 class="card-title">229</h6>
                                        <span class="card-text"><?= roomType(229) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(215) ?>">
                                        <h6 class="card-title">215</h6>
                                        <span class="card-text"><?= roomType(215) ?></span>
                                    </div>
                                </div>
                                <div class="card border-05">
                                    <div class="card-body" style="background-color: <?= colorStatus(216) ?>">
                                        <h6 class="card-title">216</h6>
                                        <span class="card-text"><?= roomType(216) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(217) ?>">
                                        <h6 class="card-title">217</h6>
                                        <span class="card-text"><?= roomType(217) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(218) ?>">
                                        <h6 class="card-title">218</h6>
                                        <span class="card-text"><?= roomType(218) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(219) ?>">
                                        <h6 class="card-title">219</h6>
                                        <span class="card-text"><?= roomType(219) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card text-center mt-2 mb-2" style="width:350px;">
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(205) ?>">
                                        <h6 class="card-title">205</h6>
                                        <span class="card-text"><?= roomType(205) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(206) ?>">
                                        <h6 class="card-title">206</h6>
                                        <span class="card-text"><?= roomType(206) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(207) ?>">
                                        <h6 class="card-title">207</h6>
                                        <span class="card-text"><?= roomType(207) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(208) ?>">
                                        <h6 class="card-title">208</h6>
                                        <span class="card-text"><?= roomType(208) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(209) ?>">
                                        <h6 class="card-title">209</h6>
                                        <span class="card-text"><?= roomType(209) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group">
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(200) ?>">
                                        <h6 class="card-title">200</h6>
                                        <span class="card-text"><?= roomType(200) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(201) ?>">
                                        <h6 class="card-title">201</h6>
                                        <span class="card-text"><?= roomType(201) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(202) ?>">
                                        <h6 class="card-title">202</h6>
                                        <span class="card-text"><?= roomType(202) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(203) ?>">
                                        <h6 class="card-title">203</h6>
                                        <span class="card-text"><?= roomType(203) ?></span>
                                    </div>
                                </div>
                                <div class="card border-5">
                                    <div class="card-body" style="background-color: <?= colorStatus(204) ?>">
                                        <h6 class="card-title">204</h6>
                                        <span class="card-text"><?= roomType(204) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-light" style="width:250px; margin-top:50px;">
                    <div class="card-body">
                        <p><span class="border border-dark" style="float:left; background-color: #5C8E9E"></span> = Isi</p>
                        <br>
                        <p><span class="border border-dark" style="float:left;"></span> = Kosong</p>
                        <br>
                        <p><span class="border border-dark" style="float:left; background-color: #DE3B3B"></span> = Segera Kosong</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
</div>

<style>
    .border {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin: -2px;
        border: 10px solid black;
    }

    .content-container {
        padding-top: 50px;
        padding-left: 220px;
    }
</style>