<?php
require_once('func.php');

$baseUrl = 'https://efilo.urisuzy.com';
function requestLogin($email, $password)
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/auth/login', 'POST', ['email' => $email, 'password' => $password]));
}

function requestBillsAdmin()
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/admin/users/bill', 'GET'));
}

function requestListUsers()
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/admin/users', 'GET'));
}

function requestListBill()
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/bills', 'GET'));
}

function requestGetUser()
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/user', 'GET'));
}

function requestSendReport($data)
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/report', 'POST', $data));
}

function requestGetUserById($id)
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/admin/user/' . $id, 'GET'));
}

function requestUpdateUserByIdAdmin(array $data)
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/admin/user/' . $data['id'], 'PUT', $data));
}

function requestSendPay($userId, $roomId, $total, $month, $year)
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/admin/bill', 'POST', [
        'user_id' => $userId,
        'room_id' => $roomId,
        'total' => $total,
        'month' => $month,
        'year' => $year
    ]));
}

function requestListRoomAdmin()
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/admin/rooms', 'GET'));
}

function requestListReports()
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/reports', 'GET'));
}

function requestAddUser($data)
{
    global $baseUrl;
    return json_decode(curl($baseUrl . '/api/admin/user', 'POST', $data));
}
