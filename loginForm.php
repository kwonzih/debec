<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> 로그인 </title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300&display=swap');
    </style>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>
    <?php include "const.php";?>
    <?php include "header.php";?>

    <!-- 로그인 -->
    <form class="login" name="login" action="login.php" method="post">
        <h1> 로그인 </h1>
        <ul>
            <li>
                <p> 아이디 </p>
                <input type="text" name="id" value="" id="id" placeholder="영소문자, 숫자 조합 6~20자리">
                <p class="error_txt id"> 아이디를 입력하세요. </p>
            </li>

            <li>
                <p> 비밀번호 </p>
                <input type="password" name="pw" value="" id="pw" placeholder="영소문자, 숫자, 특수문자 조합 8~20자리">
                <img class="show" src="./images/icon/login_visibility.png" alt="on">
                <img class="hide" src="./images/icon/login_visibility_off.png" alt="off">
                <p class="error_txt pw"> 비밀번호를 입력하세요. </p>
            </li>

            <!-- id와 for 연결 -->
            <li>
                <input type="checkbox" id="chk_id">
                <label for="chk_id"> 아이디 저장 </label>
            </li>

            <li>
                <button type="button" id="submit_btn"> 확인 </button>
            </li>
        </ul>

        <div id="id_link">
            <a href="#"> 아이디 찾기 </a>
            <a href="#"> 비밀번호 찾기 </a>
            <a href="./signupForm.php"> 회원가입 </a>
        </div>

        <div id="join_simple">
            <button type="button" id="join_kko">
                <a href="https://kauth.kakao.com/oauth/authorize?client_id=<?php echo SocialLoginKey::$kakaoApi?>&redirect_uri=<?php echo SocialLoginKey::$redirectUrl?>&response_type=code&state=kakao&prompt=login">
                    <span class="simple_img"><img src="./images/icon/login_kakaotalk.png" alt="kakao"></span>
                    <span class="simple_text"> 카카오 간편로그인 </span>
                </a>
            </button>

            <button type="button" id="join_nv">
                <a href="https://nid.naver.com/oauth2.0/authorize?client_id=<?php echo SocialLoginKey::$naverApi ?>&redirect_uri=<?php echo SocialLoginKey::$redirectUrl ?>&response_type=code&state=naver">
                    <span class="simple_img"><img src="./images/icon/login_naver.png" alt="naver"></span>
                    <span class="simple_text"> 네이버 간편로그인 </span>
                </a>
            </button>
           
            <button type="button" id="join_gg">
                <a href="https://accounts.google.com/o/oauth2/v2/auth?client_id=<?php echo SocialLoginKey::$googleApi ?>&redirect_uri=<?php echo SocialLoginKey::$redirectUrl ?>&response_type=code&state=google&scope=https://www.googleapis.com/auth/userinfo.email+https://www.googleapis.com/auth/userinfo.profile&access_type=offline&prompt=consent">
                    <span class="simple_img"><img src="./images/icon/login_google.png" alt="google"></span>
                    <span class="simple_text"> 구글 간편로그인 </span>
                </a>
            </button>
        </div>
    </form>

    <?php include "footer.php";?>


    <!--JS jQuery 플러그인-->
    <script src="js/jquery-3.6.1.js"></script>


    <script type="text/javascript">
        var passwordField = document.querySelector('#pw');
        var show = document.querySelector('.show');
        var hide = document.querySelector('.hide');

        show.onclick = function() {
            passwordField.setAttribute("type","text");
            show.style.display = "none";
            hide.style.display= "block";
        }
        hide.onclick = function() {
            passwordField.setAttribute("type","password");
            hide.style.display = "none";
            show.style.display= "block";
        }
    </script>


    <script>
        // 확인 버튼 클릭 함수
        // 아이디, 비밀번호 공란일 때 입력 유도
        $("#submit_btn").click(function() {

            if(!document.login.id.value) {
                $(".id").css("display", "block");
                document.login.id.focus();
                return;
            }

            if(!document.login.pw.value) {
                $(".pw").css("display", "block");
                document.login.pw.focus();
                return;
            }

            document.login.submit();
        });

    
        // 빨간색의 error text 문구가 보이는 상태라면 없애주기
        $("#inputId, #inputPw").on("propertychange change keyup paste input", function() {

            if($(".error_txt").css("display", "block")) {
                $(".error_txt").css("display", "none");
            };
        });
    </script>
</body>
</html>