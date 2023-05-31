
<?php
    include_once dirname(__FILE__)."/socialLoginConfig.php";

    // loginForm.php -> a 태그에서 response_type code 받아오기
    $code = $_GET['code'];
    // 소셜 로그인 구분자 받아오기(카카오, 네이버, 구글 등)
    $state = $_GET['state'];

    // 인가받은 code를 통해 accessToken과 refreshToken 모델(인스턴스) 받기
    $model = getTokenModel($code, $state);
    // 토큰값 출력하기
    // echo '<pre>';
    // print_r($model);
    // echo '</pre>';

    // model 인스턴스에서 accessToken 입력
    $accessToken = $model->accessToken;
    // accessToken을 통해 사용자 정보를 받고 KakaoModel 출력
    $profileModel = getProfile($accessToken, $state);
    // 사용자 정보 출력하기
    // echo '<pre>';
    // print_r($profileModel);
    // echo '</pre>';

    // DB 저장
    // mysql 연결
    $con = $mysqlConnect;
    // 쿼리 작성 -> 이메일로 데이터 검사
    $sql = "select * from debec where email='$profileModel->email'";
    // 쿼리 실행
    $result = mysqli_query($con, $sql);
    // 레코드 수 반환
    $num_record = mysqli_num_rows($result);

    // DB에 데이터가 존재할 때
    // 이미 가입된 회원인 경우
    if($num_record != 0) {
        // 레코드 받아오기 -> dictionary 형태(key: value)
        $row = mysqli_fetch_array($result);
        // 데이터에 저장된 login_type이 $state와 일치한다면
        // sns 연동으로 가입된 경우
        if($row['login_type'] == $state) {
            session_start();
            // 모델값을 세션에 저장
            $_SESSION["userid"] = $profileModel->email;
            $_SESSION["username"] = $profileModel->nickname;
            $_SESSION["id"] = $profileModel->uid;
            $_SESSION["accessToken"] = $model->accessToken;

            echo ("
                <script>
                localStorage.setItem('token', '$accessToken');
                location.href = 'index.php';
                </script>
            ");
        }
        // sns 연동으로 가입되지 않은 경우
        else {
            $typeValue = array(
                "kakao"=>"카카오",
                "naver"=>"네이버",
                "google"=>"구글",
                "basic"=>"일반"
            );

            echo("
                <script>
                alert('가입된 이메일이 존재합니다(".$typeValue[$row['login_type']].")');
                location.href = 'index.php';
                </script>
            ");
        }
    }
    // DB에 데이터가 존재하지 않을 때
    // 가입하지 않은 회원인 경우
    else {
        $sql = "insert into debec(id, pw, name, phone, email, postnum, address,
                                membership, email_marketing, sms_marketing, kakao_marketing, login_type) ";
        $sql .= "values('$profileModel->email', '$profileModel->uid', '$profileModel->nickname', '$phone', '$profileModel->email', '$postnum', '$addr',
                    '$membership', '$marketing_email', '$marketing_sms', '$marketing_kakao', '$state')";

        mysqli_query($con, $sql);
        mysqli_close($con);

        // 세션 시작
        session_start();
        // 프로필 모델값을 세션에 저장
        $_SESSION["userid"] = $profileModel->email;
        $_SESSION["username"] = $profileModel->nickname;
        $_SESSION["id"] = $profileModel->uid;
        $_SESSION["accessToken"] = $model->accessToken;

        echo("
            <script>
                localStorage.setItem('token', '$accessToken');
                location.href = 'index.php';
            </script>
        ");
    }

    // // 세션 시작
    // session_start();
    // // 프로필 모델값을 세션에 저장
    // $_SESSION["userid"] = $profileModel->email;
    // $_SESSION["username"] = $profileModel->nickname;
    // $_SESSION["id"] = $profileModel->uid;
    // // $_SESSION["accessToken"] = $model->accessToken;
    // // $_SESSION["userlevel"] = $row["level"];
    // // $_SESSION["userpoint"] = $row["point"];

    // echo ("
    //     <script>
    //         location.href = 'index.php';
    //     </script>
    // ")
?>