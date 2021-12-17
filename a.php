<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => 'http://localhost:8001/api/report',
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'POST',
//     CURLOPT_POSTFIELDS => array('image' => new CURLFILE('/C:/Users/rezam/OneDrive/Pictures/4JQpK_4f.jpg'), 'caption' => 'adssdsd'),
//     CURLOPT_HTTPHEADER => array(
//         'Authorization: Bearer 2|HQy7n0DMZuEYfeivi2OkKCxqjifTSWETROTXUIyJ'
//     ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

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

$TOKEN = '2|HQy7n0DMZuEYfeivi2OkKCxqjifTSWETROTXUIyJ';
// data fields for POST request
$fields = array("caption" => "value1");

// files to upload
$filenames = array('file' => "C:/Users/rezam/OneDrive/Pictures/EW4l7_4f.jpg");

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

var_dump($response);
$err = curl_error($curl);

echo "error";
var_dump($err);
curl_close($curl);
