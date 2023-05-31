<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> 회원가입 </title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300&display=swap');
    </style>

    <link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>

<body>
    <?php include "header.php";?>

    <!--회원가입 폼-->
    <section class="signup_wrap">
        <div class="signup_title">
            <h1>회원가입</h1>
        </div>

        <div class="signup_sub">
            <div class="signup_subtitle">
                <h2> 회원정보 입력 </h2>
                <p> 필수 정보를 정확하게 입력해주세요. </p>
            </div>
            <div class="signup_progress">
                <button type="button" id="pg1"> 1 </button>
                <span> &nbsp; -- &nbsp; </span>
                <button type="button" id="pg2"> 2 </button>
                <span> &nbsp; -- &nbsp; </span>
                <button type="button" id="pg3"> 3 </button>
            </div>
        </div>

        <form name="signup" action="memberInsert.php" method="post">
        <div class="signup_form">
            <section class="form id">
                <p> 아이디 <span class="dot">*</span> </p>
                <div>
                    <div class="input">
                        <input type="text" name="id" value="" id="id" 
                                placeholder="영소문자, 숫자 조합 6~20자리" minlength="6" maxlength="20">
                    </div>
                    <div>
                        <button type="button" id="duplicate_btn" class="input_btn"
                        onclick="checkId()"> 중복확인 </button>
                    </div>
                </div>
                <p class="error_txt id"> 영문과 숫자를 조합하여 6~20자리로 입력하세요. </p>
            </section>


            <section class="form pw">
                <p> 비밀번호 <span class="dot">*</span> </p>
                <div class="input">
                    <input type="password" name="pw" value="" id="pw" 
                            placeholder="영소문자, 숫자, 특수문자 조합 8~20자리" minlength="8" maxlength="20">
                </div>
                <p class="error_txt pw"> 영문과 숫자, 특수문자를 조합하여 8~20자리로 입력하세요. </p>
            </section>


            <section class="form pw_check">
                <p> 비밀번호 확인 <span class="dot">*</span> </p>
                <div class="input">
                    <input type="password" name="pw_chk" value="" id="pw_chk" 
                            placeholder="입력하신 비밀번호를 다시 한번 입력해주세요." minlength="6" maxlength="12">
                </div>
                <p class="error_txt pw_chk"> 비밀번호가 일치하지 않습니다. </p>
            </section>


            <section class="form name">
                <p> 이름 <span class="dot">*</span> </p>
                <div class="input">
                    <input type="text" name="name" value="" id="name">
                </div>
                <p class="error_txt name"> 이름을 입력하세요. </p>
            </section>


            <section class="form phone">
                <p> 휴대폰번호 <span class="dot">*</span> </p>
                <div class="input">
                    <input type="tel" name="phone" value="" id="phone" 
                            placeholder="'-' 제외하고 입력">
                </div>
                <p class="error_txt phone"> 휴대폰 번호를 입력하세요. </p>
            </section>


            <section class="form email">
                <p> 이메일 </p>
                <div>
                    <div class="email_input">
                        <div class="input">
                            <input type="email" name="email" value="" id="email" 
                                    placeholder="이메일 아이디(이메일 계정)">
                        </div>
                        <span> @ </span>
                        <div class="input">
                            <input type="email" name="email_domain" value="" id="email_domain" readonly="readonly">
                        </div>
                    </div>

                    <div class="domain_select">
                        <select name="select_domain" id="select_domain">
                            <option selected="selected" disabled="disabled"> 선택해주세요 </option>
                            <option value="direct"> 직접 입력 </option>
                            <option value="naver.com"> naver.com </option>
                            <option value="daum.net"> daum.net </option>
                            <option value="gmail.com"> gmail.com </option>
                            <option value="kakao.com"> kakao.com </option>
                        </select>
                    </div>
                </div>
            </section>


            <section class="form address">
                <p> 자택주소 </p>

                <div class="postnum">
                    <div class="input">
                        <input type="text" name="postnum" value="" id="postnum" 
                                placeholder="우편번호" readonly="readonly">
                    </div>
                    <div>
                        <button type="button" id="postnum_btn" class="input_btn" 
                        onclick="sample6_execDaumPostcode()"> 우편번호 찾기 </button>
                    </div>
                </div>

                <div class="input">
                    <input type="text" name="address" value="" id="address">
                </div>

                <div class="input">
                    <input type="text" name="detailAdd" value="" id="detailAdd" 
                            placeholder="상세주소">
                </div>
            </section>


            <section class="membership">
                <h4> 대구백화점 멤버십 회원 </h4>

                <div class="membership_info">
                    <h5> 대백멤버십 회원이란? </h5>
                    <p> 대구백화점 멤버십 카드를 소지하고 있는 고객 </p>
                    <p> ※ 상단의 개인정보는 대구백화점 홈페이지 웹회원에게만 적용되는 것으로, 
                    <p> 대백멤버십카드(대백포인트카드 · 대백씨티카드 · 대백대구은행카드) 정보와는 무관합니다. </p>

                    <h5> 대백제휴카드 </h5>
                    <p> 대백 씨티카드 아인스, 대백 대구은행카드, 대백플러스 체크카드 </p>

                    <h5> 대백포인트카드 </h5>
                    <p> 대백플러스 체크카드 </p>
                </div>

                <div class="check">
                    <input type="checkbox" name="membership" value="" id="membership">
                    <label for="membership"> 대백멤버십 회원으로 가입 </label>
                </div>
            </section>

            
            <section class="marketingConsent">
                <h4> 마케팅 수신동의 </h4>

                <div class="marketing_info">
                    <p> 대백에서 제공하는 상품 및 서비스 홍보, 이벤트 정보 제공(할인 쿠폰, 포인트 추가 적립, 상품 할인 등), 제휴행사를 안내해 드립니다. </p>
                    <p> 수신동의 변경은 신세계포인트 고객센터 및 홈페이지에서 가능합니다. </p>
                    <p> ※ 서비스 주요 정책 및 공지사항 안내 등은 수신동의 여부와 관계없이 발송됩니다.</p>
                </div>

                <div class="marketing_check">
                    <div class="check">
                        <input type="checkbox" name="marketing_email" value="" id="marketing_email">
                        <label for="marketing_email"> 이메일 </label>
                    </div>

                    <div class="check">
                        <input type="checkbox" name="marketing_sms" value="" id="marketing_sms">
                        <label for="marketing_sms"> 문자 </label>
                    </div>

                    <div class="check">
                        <input type="checkbox" name="marketing_kakao" value="" id="marketing_kakao">
                        <label for="marketing_kakao"> 카카오 알림톡 </label>
                    </div>
                </div>
            </section>


            <section class="submit">
                <input type="button" value="확인" id="submit_btn">
            </section>
        </div>
        </form>
    </section>

    <!--top button-->
    <a id="topButton" href="#">
        <img src="./images/icon/all_expandless.png" alt="top button">
    </a>

    <?php include "footer.php";?>


    <!--JS jQuery 플러그인-->
    <script src="js/jquery-3.6.1.js"></script>


    <script>
        // top button 클릭시 부드럽게 상단으로 이동
        $("#topButton").click(function(){
            $('html,body').animate({
                scrollTop:0
            }, 400);
            return false;
        });
    </script>


    <script>
        $(".input > input").on("propertychange change keyup paste input", function() {
            /*
            // input에 값 입력하면 입력 가이드 문구가 사라짐
            $(this).next().children(".in_box").css("display", "none");

            // input에 값을 지우면 입력 가이드 문구가 다시 나타남
            if($(this).val()==='') {
                $(this).next().children(".in_box").css("display", "table-cell");
            }
            */

            // 빨간색의 error text 문구가 보이는 상태라면 없애주기
            if($(".error_txt").css("display", "block")) {
                $(".error_txt").css("display", "none");
            }
        });
    </script>


    <script>
        function checkId() {
            window.open("checkId.php?id=" + document.signup.id.value,
            "IDcheck",
            "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
        }
    </script>


    <script>
        // 이메일 도메인 선택
        $("#select_domain").change(function() {
            $("#select_domain option:selected").each(function() {
                // 직접 입력
                if($(this).val()==="direct") {
                    $("#email_domain").val(''); // 값 초기화
                    $("#email_domain").attr("readonly", false); // 활성화
                    $("#email_domain").focus(); // 바로 입력 가능
                }
                // 직접 입력이 아닌 경우
                if($(this).val()!=="direct") {
                    $("#email_domain").val($(this).text()); // 선택값 입력
                    $("#email_domain").attr("readonly", false); // 비활성화
                }
            });
        });
    </script>


    <script>
        // 확인 버튼 클릭 함수
        // 필수 입력칸 공란일 때 입력 유도(아이디, 비밀번호, 이름)
        // 체크박스 값 제출
        $("#submit_btn").click(function() {

            // 아이디 입력값이 없을 때
            if(!document.signup.id.value) {
                $(".id").css("display", "block");
                document.signup.id.focus();
                return;
            }

            // 비밀번호 입력값이 없을 때
            if(!document.signup.pw.value) {
                $(".pw").css("display", "block");
                document.signup.pw.focus();
                return;
            }

            // 비밀번호 입력값과 비밀번호 확인 입력값이 다를 때
            if(document.signup.pw.value != document.signup.pw_chk.value) {
                $(".pw_chk").css("display", "block");
                document.signup.pw.focus();
                document.signup.pw.select();
                return;
            }

            // 이름 입력값이 없을 때
            if(!document.signup.name.value) {
                $(".name").css("display", "block");
                document.signup.name.focus();
                return;
            }

            // 전화번호 입력값이 없을 때
            if(!document.signup.phone.value) {
                $(".phone").css("display", "block");
                document.signup.phone.focus();
                return;
            }

            // 체크박스 값
            $(".check > input").each(function() {
                if($(this).prop("checked")==true) {
                    $(this).val("Y");
                }
            });
            
            // 앞의 조건들이 참일 때 입력값 제출
            document.signup.submit();
        });
    </script>


    <!-- 우편번호 찾기 -->
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <!-- 우편번호(호스팅)-->
    <!-- <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> -->
    
    <script>
        // 우편번호찾기
        function sample6_execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var addr = ''; // 주소 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.querySelector('#postnum').value = data.zonecode;
                    document.querySelector("#address").value = addr;
                    // 커서를 상세주소 필드로 이동한다.
                    document.querySelector("#detailAdd").focus();
                }
            }).open();
        }
    </script>
</body>
</html>