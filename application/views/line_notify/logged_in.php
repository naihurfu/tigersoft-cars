<?php

$accToken = "YSOeBnvxrhFHvC8s7Juy2cGJGokdLU4d5CpLPnDyfa6";
$notifyURL = "https://notify-api.line.me/api/notify";

$headers = array(
   'Content-Type: application/x-www-form-urlencoded',
   'Authorization: Bearer ' . $accToken
);

$data = array(
   'message' =>   '' .
                  ' ได้เข้าสู่ระบบ'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $notifyURL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

// การเช็คสถานะการทำงาน 
// $result = json_decode($result, TRUE);

// ตรวจสอบข้อมูล ใช้เป็นเงื่อนไขในการทำงาน
// if (!is_null($result) && array_key_exists('status', $result)) {
//   if ($result['status'] == 200) {
//      echo "Pass";
//   }
// }