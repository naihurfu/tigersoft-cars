<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineNotify_model extends CI_Model {
          
   public function logged_in($empid, $fname, $lname, $finaldept) {
      if ($empid != '') {
         $accToken = "YSOeBnvxrhFHvC8s7Juy2cGJGokdLU4d5CpLPnDyfa6";
         $notifyURL = "https://notify-api.line.me/api/notify";
         $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $accToken
         );

         $data = array(
            'message' =>   "\r\n".
                           '---------- เข้าสู่ระบบ ----------'.
                           "\r\n". $empid .'  :  '. $fname . '  ' . $lname .
                           "\r\n". 'แผนก : '. '  ' . $finaldept .
                           "\r\n".'               '
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
      }
   }
}

/* End of file LineNotify_model.php */