<?php
include 'headerPenyewa.php';
include 'sidebarPenyewa.php';
if (!empty($_POST['caption'])) {
    $filedata = $_FILES['image']['tmp_name'];
    $filesize = $_FILES['image']['size'];
    move_uploaded_file($filedata, 'tmp/' . basename($_FILES["image"]["name"]));
    $dir = dirname(__FILE__) . '/tmp/' . basename($_FILES["image"]["name"]);


    function build_data_files($boundary, $fields, $files)
    {
        $data = '';
        $eol = "\r\n";

        $delimiter = '-------------' . $boundary;

        foreach ($fields as $name => $content) {
            $data .= "--" . $delimiter . $eol
                . 'Content-Disposition: form-data; name="' . $name . "\"" . $eol . $eol
                . $content . $eol;
        }


        foreach ($files as $name => $content) {
            $data .= "--" . $delimiter . $eol
                . 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $name . '"' . $eol
                //. 'Content-Type: image/png'.$eol
                . 'Content-Transfer-Encoding: binary' . $eol;

            $data .= $eol;
            $data .= $content . $eol;
        }
        $data .= "--" . $delimiter . "--" . $eol;


        return $data;
    }

    $TOKEN = $_COOKIE['accessToken'];
    // data fields for POST request
    $fields = array("caption" => $_POST['caption']);

    // files to upload
    $filenames = array('file' => $dir);

    $files = array();
    foreach ($filenames as $f) {
        $files['file'] = file_get_contents($f);
    }

    // URL to upload to
    $url = "http://localhost:8001/api/report";


    // curl

    $curl = curl_init();

    $url_data = http_build_query($fields);

    $boundary = uniqid();
    $delimiter = '-------------' . $boundary;

    $post_data = build_data_files($boundary, $fields, $files);


    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $post_data,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $TOKEN",
            "Content-Type: multipart/form-data; boundary=" . $delimiter,
            "Content-Length: " . strlen($post_data)

        ),


    ));


    //
    $response = curl_exec($curl);

    $info = curl_getinfo($curl);
    //echo "code: ${info['http_code']}";

    //print_r($info['request_header']);

    $err = curl_error($curl);

    curl_close($curl);

    echo 'success';
}
?>
<div id="content">
    <div id="contentTitle">
        <p id="tagihanTitle">Kritik dan Saran</p>
        <h3>Demi kenyamanan bersama pada fitur ini nama pengirim kritik dan saran akan disamarkan</h3>
    </div>
    <br><br><br>
    <div id="contentSaran">
        <form action="" method="post" style="display: flex; flex-direction: column" enctype="multipart/form-data">
            <textarea name="caption" id="kolomkomentar" cols="90" rows="20"></textarea>
            <p>Upload gambar disini</p>
            <div>
                <img src="assets/gambar.png" alt="">
                <input type="file" id="myfile" name="image" style="display: block;width: 4%;text-align: center;margin: auto;">
            </div>
            <button id="kirimButton">KIRIM</button>
        </form>
    </div>
</div>
<?php
include 'footerPenyewa.php';
?>