<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class SMSController extends Controller
{
    function SendMessage(Request $request){
        $sendNumber = $request->input('phone');
        $random = $request->input('random');
        // $smsdata['sendNumber'];  // 받는 전화번호
        // $sPhone = $smsdata['sPhone'];
        // $subject = $smsdata['subject'];
        // $sPhoneArray = explode("-", $sPhone);
        $sPhone1 = '010';   //처음 번호
        $sPhone2 = '9285';   //중간 번호
        $sPhone3 = '0290';   //마지막 번호

       /******************** 인증정보 ********************/
        $sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL

        $sms['user_id'] = base64_encode("ccitsms"); //SMS 아이디.
        $sms['secure'] = base64_encode("1cc4bc9ea5d24c9811d2cf30d430276f") ;//인증키
        $sms['msg'] = base64_encode(stripslashes('[중고땅땅] 인증번호는"'.$random.'"입니다.')); //인증번호가 들오가야하는 곳
        $sms['rphone'] = base64_encode($sendNumber); // 받는 전화번호
        $sms['sphone1'] = base64_encode($sPhone1);
        $sms['sphone2'] = base64_encode($sPhone2);
        $sms['sphone3'] = base64_encode($sPhone3);
        $sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.
        //$sms['returnurl'] = base64_encode($_POST['returnurl']);
        // $sms['testflag'] = base64_encode($testflag);
        //$sms['destination'] = strtr(base64_encode($POST['destination']), '+/=', '-,');
        //$returnurl = $_POST['returnurl'];
        //$sms['repeatFlag'] = base64_encode($_POST['repeatFlag']);
        //$sms['repeatNum'] = base64_encode($_POST['repeatNum']);
        //$sms['repeatTime'] = base64_encode($_POST['repeatTime']);
        //$nointeractive = $_POST['nointeractive']; //사용할 경우 : 1, 성공시 대화상자(alert)를 생략

        $host_info = explode("/", $sms_url);
        $host = $host_info[2];
        $path = $host_info[3];
        //$path = $host_info[3]."/".$host_info[4];

        srand((double)microtime()*1000000);
        $boundary = "---------------------".substr(md5(rand(0,32000)),0,10);
        //print_r($sms);
        // 헤더 생성
        $header = "POST /".$path ." HTTP/1.0\r\n";
        $header .= "Host: ".$host."\r\n";
        $header .= "Content-type: multipart/form-data, boundary=".$boundary."\r\n";
        $data = "";
        // 본문 생성
        foreach($sms AS $index => $value){
            $data .="--$boundary\r\n";
            $data .= "Content-Disposition: form-data; name=\"".$index."\"\r\n";
            $data .= "\r\n".$value."\r\n";
            $data .="--$boundary\r\n";
        }
        $header .= "Content-length: " . strlen($data) . "\r\n\r\n";

        $fp = fsockopen($host, 80);

        if ($fp) {
            fputs($fp, $header.$data);
            $rsp = '';
            while(!feof($fp)) {
                $rsp .= fgets($fp,8192);
            }
            fclose($fp);
            $msg = explode("\r\n\r\n",trim($rsp));
            $rMsg = explode(",", $msg[1]);
            $Result= $rMsg[0]; //발송결과
            $this->Count= $rMsg[1]; //잔여건수
            $this->ResultCode = 0;
        } else {
            $this->ResultMsg = "Connection Failed";
        }
        // return $rMsg;
        return response()->json(['data'=>$rMsg]);
    }

}
