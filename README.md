
## 소개 및 사이트 링크
 
!!생애 첫 web 사이트 개발!!

중고물품의 가치를 잘 모를경우 경매를 통해 가치를 판단하고 판매할 수 있게 도와주는 사이트.

- [중고땅땅 사이트](http://silent97.cafe24.com:8081/)

## 개발 인원

- [GyeongNam](https://github.com/GyeongNam/)
- [dorumamu](https://github.com/dorumamu)
- [zztto1](https://github.com/zztto1)
- [toropong](https://github.com/toropong)

## 개발 환경

- 운영체제:   Linux (CentOS 6.10)<br>
- 웹 서버:    Apache 2.2.15<br>
- DB:         MySQL 5.1.73<br>
- framework:  Laravel 7.10.3<br>

## 시스템 구성도
![image](https://user-images.githubusercontent.com/63902992/143731056-401abcd5-d72e-46ac-8a95-096aa6ccfee2.png)

## GyeongNam

해당 목록은 '경남' 이 만든 것만 설명되어있습니다.

개발 참고 사이트: <br>[laravel.7.x](https://laravel.kr/docs/7.x) <br> [pusher](https://pusher.com/channels?utm_source=google_ads&utm_medium=prod_page&utm_campaign=brand_search&campaignid=916184871&utm_source=adwords&utm_medium=cpc&utm_campaign=Brand_Pusher_Exact&utm_term=pusher&utm_creative=264982473776&gclid=EAIaIQobChMI3uSmkbu69AIV2a6WCh0xKgJxEAAYASAAEgJYGPD_BwE)

0. 기획
    - 스토리보드 생성

1. 개발환경 구축
    - APM 설치: yum 명령어를 이용했다.
    ```bash
    yum install [설치할것]
    ```
    - DB 테이블: 라라벨 마이그레이션 기능을 이용해 어디서나 mysql 만 연결되면(.env) 다음 명령어 하나로 실행 가능하게 만들었다.
    ```bash
    php artisan migrate
    ```
    ![image](https://user-images.githubusercontent.com/63902992/143731238-92557889-dee3-4270-9d11-9adf8d601b66.png)
    
    ```php
    Schema::create('users', function (Blueprint $table) {
       $table->string('id')->unique();
       $table->primary('id');
       $table->string('name');
       $table->string('phone');
       $table->string('email');
       $table->string('email_domain');
       $table->string('gender');
       $table->date('birthday');
       $table->string('password');
       $table->date('login_record')->nullable();
       $table->binary('user_image')->nullable();
       $table->rememberToken();
       $table->timestamps();
    });
    ```

2. 회원가입
    - sign_up.blade.php 에서 form을 이용해 post 형식으로 데이터를 보내고,
      UserController.php에서 Users Model을 불러와 저장했다. (MVC패턴)
    - SMS 서비스:
      [Cafe24 SMS 호스팅](https://hosting.cafe24.com/?controller=product_page&type=special&page=sms) 서비스를 이용했다.
    ```php
    function SendMessage(Request $request){
    $sendNumber = $request->input('phone');

    $sPhone1 = '010';   //처음 번호
    $sPhone2 = '1234';   //중간 번호
    $sPhone3 = '5678';   //마지막 번호

    /******************** 인증정보 ********************/
    $sms_url = "https://sslsms.cafe24.com/sms_sender.php"; // 전송요청 URL

    $sms['user_id'] = base64_encode("sms서비스 아이디"); //SMS 아이디.
    $sms['secure'] = base64_encode("인증키") ;//인증키
    $sms['msg'] = base64_encode(stripslashes('보낼 메시지 내용')); 
    $sms['rphone'] = base64_encode($sendNumber); // 받는 전화번호
    $sms['sphone1'] = base64_encode($sPhone1);
    $sms['sphone2'] = base64_encode($sPhone2);
    $sms['sphone3'] = base64_encode($sPhone3);
    $sms['mode'] = base64_encode("1"); // base64 사용시 반드시 모드값을 1로 주셔야 합니다.

    $host_info = explode("/", $sms_url);
    $host = $host_info[2];
    $path = $host_info[3];

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
    return response()->json(['data'=>$rMsg]);
    }
    ```
      
3. E-mail 
    - 비밀번호 재설정 방법을 E-mail을 이용하기로 하여 적용한 기능이다. 먼저 사용할 메일을 연결하고(.env)
    - Mailables를 명령어로 생성하고
    ```
    php artisan make:mail OrderShipped
    ```
    ```php
    class IDselect extends Mailable
    {
        use Queueable, SerializesModels;

        /**
         * Create a new message instance.
         *
         * @return void
         */
         public $data;
         public function __construct($data)
         {
           $this->data =  $data;
         }

         /**
          * Build the message.
          *
          * @return $this
          */
         public function build()
         {
             return $this->subject('제목')->view('내용이 될 php');
         }
    }
    ```
    컨트롤러에서 실행시키면 된다.
    ```php
    Mail::to($mail)->send(new IDselect($data));
    ```

4. 낙찰 시스템
   - app\Console\Commands\auction_update.php 를 확인하면 코드를 확인하실 수 있습니다.
   - item:success_update이라는 Command를 만들어 crontab으로 매일 0시에 실행한다.
    ```
    php artisan item:success_update
    ```
    - 경매 종료날이 지난 아이템들은 경매종료를 시켜주며 자동으로 낙찰된 순서 1~5위까지를 도출한다. <br> 만약 1위가 낙찰받지 않았다면 그 다음순위인 2위에게 권한이 넘어간다. 

5. 채팅 서비스
    - pusher를 이용해 웹소켓으로 실시간 채팅이 가능하게 만들었다. (1대1)
    ```
    composer require pusher/pusher-php-server "~버전"
    ```
    - 위에 명령어로 설치한 pusher를 연결하고 (.env) 컨트롤러에서
    ```php
    WebsocketEvent::dispatch(데이터);
    ```
    실행하면
    ```php
    class WebsocketEvent implements ShouldBroadcast
    {
        use Dispatchable, InteractsWithSockets, SerializesModels;

        public $message;
        public $id1;
        public $id2;
        public $time;

        /**
         * Create a new event instance.
         *
         * @return void
         */

        public function __construct($message, $id1, $id2, $time)
        {
            $this->message = $message;
            $this->id1 = $id1;
            $this->id2 = $id2;
            $this->time = $time;
        }

        /**
         * Get the channels the event should broadcast on.
         *
         * @return \Illuminate\Broadcasting\Channel|array
         */
        public function broadcastOn()
        {
            return new Channel('채널명');
        }
    }
    ```
    이벤트를 거쳐 같은 채널에 접속죽인 html에서 받을 수 있다.
    ```js
    import Echo from 'laravel-echo'

    window.Pusher = require('pusher-js');

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: false,
        wsHost: window.location.hostname,
        wsPort: 6001,
        // enabledTransports: ['ws', 'wss'],
        encrypted: false,
        disableStats: false
    });
    ```
    ```html
    <script src ="{{ asset('js/app.js')}}"></script>
    <script type="text/javascript">
    window.Echo.channel('')
      .listen('WebsocketEvent', (e) => {
        //웹 소켓으로 받은 내용 처리
        }
      });
    </script>
    ```

## dorumamu


## zztto1


## toropong
