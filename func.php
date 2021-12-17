<?php
function curl($url, $method, $data = [], $headers = [], $size = null)
{
    $initHeaders = ['Accept: application/json'];
    !empty($_COOKIE['accessToken']) ? $initHeaders[] = 'Authorization: Bearer ' . $_COOKIE['accessToken'] : null;
    $headers = array_merge($initHeaders, $headers);
    $curl = curl_init();
    $curlOptions = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers
    );
    if (!empty($data))
        $curlOptions[CURLOPT_POSTFIELDS] = http_build_query($data);

    if ($size)
        $curlOptions[CURLOPT_INFILESIZE] = $size;

    curl_setopt_array($curl, $curlOptions);

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}
