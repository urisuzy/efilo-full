<?php
if (isset($_COOKIE['accessToken'], $_COOKIE['role']) && $_COOKIE['role'] == 'admin')
  header('Location: /berandaPemilik.php');
elseif (isset($_COOKIE['accessToken'], $_COOKIE['role']))
  header('Location: /berandaPenyewa.php');

include 'request.php';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $response = requestLogin($_POST['email'], $_POST['password']);
  if (!empty($response->message)) {
    $message = $response->message;
  } else {
    // print_r($response);
    setcookie('accessToken', $response->result->accessToken, time() + (86400 * 30), "/");
    setcookie('role', $response->result->role, time() + (86400 * 30), "/");
    setcookie('name', $response->result->name, time() + (86400 * 30), "/");
    setcookie('room', $response->result->room ?? 'Kosong', time() + (86400 * 30), "/");

    if ($response->result->role == 'admin')
      header('Location: /berandaPemilik.php');
    else
      header('Location: /berandaPenyewa.php');
  }
}
?>

<!-- Bootstrap CSS Tanpa Download -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!DOCTYPE html>
<html>

<head>
  <title>Efilo Kost</title>
  <style>
    ::placeholder {
      color: red;
      opacity: 1;
      /* Firefox */
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: red;
    }

    ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: red;
    }
  </style>
</head>

<body>
  <div class="bg-image d-flex justify-content-center align-items-center" style="
    background-image: url('bglogin.svg');
    height: 100vh;
  ">
    <div class="main">
      <div style="padding : 100px;">
        <div align="center">
          <h1 class=primary style="color: white"> LOGIN </h1>

          <div class=container>
            <form method="post">
              <div class="mt-5 mb-2">
                <input type="text" class="form-control" id="keyword" name="email" placeholder="Email" style="background-color: transparent; width:401px; height: 47px; left:514px; top:323px">
              </div>
              <div class="mb-2">
                <input type="password" class="form-control" id="keyword" name="password" placeholder="Password" style="background-color: transparent; width:401px; height: 47px; left:514px; top:323px">
              </div>
              <div class="button mt-5 py-5">
                <button type="submit" class="btn btn-outline-dark" name="login" style="background-color:white; width:401px; height: 47px; left:514px; bottom:20px; border-radius: 12px">
                  <h4 style="color:37525A;">LOGIN</h4>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
<style>
  ::placeholder {
    color: #FFFFFF
  }
</style>