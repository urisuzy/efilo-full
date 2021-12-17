<aside id="sidebar">
    <div id="sidebar-user">
        <div id="sidebar-userpicture">
            <img class="userPicture" src="assets/user.png" alt="">
        </div>
        <div id="sidebar-username">
            <h4 class="userName"><?= $_COOKIE['name'] ?? 'No Name' ?></h4>
            <h5 class="namaKamar">Kamar <?= $_COOKIE['room'] ?? 'Kamar' ?></h5>
        </div>
    </div>
    <div id="sidebar-menu">
        <ul>
            <li><a href="/berandaPenyewa.php"><i class="fas fa-home"></i>Beranda</a></li>
            <li><a href="/tagihan.php"><i class="fas fa-file-invoice-dollar"></i>Tagihan</a></li>
            <li><a href="/kritiksaran.php"><i class="fas fa-comment-dots"></i>Kritik Saran</a></li>
        </ul>
    </div>
    <div id="sidebar-logout">
        <a href="/logout.php">
            <img src="assets/sign-out.png" alt=""></a>
    </div>
</aside>