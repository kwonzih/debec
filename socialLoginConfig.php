
<?php
    include "const.php";

    class TokenModel {
        public $accessToken;
        public $refreshToken;

        public function __construct($data) {
            // 변수로 선언한 값 = 파라미터로 받아온 값
            $this->accessToken = $data['access_token'];
            $this->refreshToken = $data['refresh_token'];
        }
    }

    class ProfileModel {
        public $nickname;
        public $email;
        // 패스워드 대신 변하지 않는 데이터
        public $uid;

        public function __construct($uid, $nickname, $email) {
            // 변수로 선언한 값 = 파라미터로 받아온 값
            $this->nickname = $nickname;
            $this->email = $email;
            $this->uid = $uid;
        }
    }

    function getTokenModel($code, $state) {

        // apikey 초기화
        $restApiKey = '';
        // returnUrl 초기화
        $returnUrl = '';
        // loginUrl 초기화
        $loginUrl = '';
        // client 키 초기화
        $client_secret = '';
        // 공통 callbackUrl
        $callbackUrl = urlencode(SocialLoginKey::$redirectUrl);

        // 소셜로그인이 카카오라면
        if($state == 'kakao') {
            $restApiKey = SocialLoginKey::$kakaoApi;
            $loginUrl = "https://kauth.kakao.com/oauth";
        }

        // 소셜로그인이 네이버라면
        else if($state == 'naver') {
            $restApiKey = SocialLoginKey::$naverApi;
            $client_secret = SocialLoginKey::$naverClientSecret;
            $loginUrl = "https://nid.naver.com/oauth2.0";
        }

        // 소셜로그인이 구글이라면
        else {
            $restApiKey = SocialLoginKey::$googleApi;
            $client_secret = SocialLoginKey::$googleClientSecret;
            $loginUrl = "https://oauth2.googleapis.com";
        }

        $returnUrl = "$loginUrl/token?grant_type=authorization_code&client_id=".$restApiKey."&redirect_uri=".$callbackUrl."&code=".$code;
        $returnUrl .= $client_secret != '' ? "&client_secret=".$client_secret : '';

        // curl_init() : 세션 초기화
        // command line 초기화
        $ch = curl_init();

        // curl_setopt() : 옵션 세팅
        // url 지정
        curl_setopt($ch, CURLOPT_URL, $returnUrl);
        // 문자열로 지정
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post 방식으로 전송
        curl_setopt($ch, CURLOPT_POST, true);

        // curl_exec() : curl을 실행
        // json 데이터 반환
        $response = curl_exec($ch);
        //print($response);
        
        // json_decode() : JSON Object를 PHP Array 또는 Object로 변환
        $data = json_decode($response, true);
        //return $data;

        $tokenModel = new TokenModel($data);
        return $tokenModel;
    }

    function getProfile($accessToken, $state) {

        // accessToken을 이용하여 사용자 정보 가져오기, 사용자 인증 수단
        $header = array("Authorization: Bearer ".$accessToken);
        // 사용자 프로필 정보 조회 url
        $profile_url = '';

        // 소셜로그인이 카카오라면
        if($state == 'kakao') {
            $profile_url = "https://kapi.kakao.com/v2/user/me";
        }

        // 소셜로그인이 네이버라면
        else if($state == 'naver') {
            $profile_url = "https://openapi.naver.com/v1/nid/me";
        }

        // 소셜로그인이 구글이라면
        else {
            $profile_url = "https://www.googleapis.com/oauth2/v3/userinfo";
        }

        // curl_init() : 세션 초기화
        // command line 초기화
        $ch = curl_init();

        // curl_setopt() : 옵션 세팅
        // url 지정
        curl_setopt($ch, CURLOPT_URL, $profile_url);
        // 문자열로 지정
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 헤더 출력 여부
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        // curl_exec() : curl을 실행
        // json 데이터
        $response = curl_exec($ch);

        // curl_close() : curl 세션을 닫음
        curl_close($ch);
        // json_decode() : JSON Object를 PHP Array 또는 Object로 변환
        $decoded_data = json_decode($response, true);
        //return $decoded_data;

        $uid = '';
        $nickname = '';
        $email = '';

        // 소셜로그인이 카카오라면
        if($state == 'kakao') {
            $uid = $decoded_data['id'];
            $kakaoAccount = $decoded_data['kakao_account'];
            $nickname = $kakaoAccount['profile']['nickname'];
            $email = $kakaoAccount['email'];
        }

        // 소셜로그인이 네이버라면
        else if($state == 'naver') {
            $response = $decoded_data['response'];
            $uid = $response['id'];
            $nickname = $response['nickname'];
            $email = $response['email'];
        }

        // 소셜로그인이 구글이라면
        else {
            $uid = $decoded_data['sub'];
            $nickname = $decoded_data['name'];
            $email = $decoded_data['email'];
        }

        $profileModel = new ProfileModel($uid, $nickname, $email);
        return $profileModel;
    }

    function naverLogout($access_token){
        // 네이버 로그아웃
        // 로그인 할 때마다 동의창이 뜨도록
        $url = "https://nid.naver.com/oauth2.0/token?grant_type=delete&client_id=".SocialLoginKey::$naverApi."&client_secret=".SocialLoginKey::$naverClientSecret."&access_token=$access_token&service_provider=NAVER";
        
        $ch = curl_init();
        //command line tool
        curl_setopt($ch, CURLOPT_URL, $url);
        //문자열 반환
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl 실행
        $result = curl_exec($ch);
        // curl 닫기
        curl_close($ch);
        // curl 실행값 출력
        return $result;
    }

    function unlinkLogout($access_token) {
        // 카카오 로그아웃
        // 로그인 할 때마다 동의창이 뜨도록
        $header = array("Authorization: Bearer ".$access_token);
        $url = "https://kapi.kakao.com/v1/user/unlink";

        $ch = curl_init();
        // command line tool
        curl_setopt($ch, CURLOPT_URL, $url);
        // 문자열 반환
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 문자열 출력
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // curl 실행
        $result = curl_exec($ch);
        // curl 닫기
        curl_close($ch);
        // curl 실행값 출력
        return $result;
    }
?>