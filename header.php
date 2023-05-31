

<?php
    // 로그인 정보가 없다면 session_start()
    if(empty($_SESSION["userid"])) session_start();
                            
    if (isset($_SESSION["userid"])) 
        $userid = $_SESSION["userid"];
    else
        $userid = "";

    if (isset($_SESSION["username"])) 
        $username = $_SESSION["username"];
    else 
        $username = "";

    if (isset($_SESSION["userlevel"])) 
        $userlevel = $_SESSION["userlevel"];
    else 
        $userlevel = "";
?>

    <!--사이드메뉴 생길 때 배경색 검게 하기 위한 공간-->
    <div class="sth"></div>

    <!--헤더-->
    <header>
        <!--모바일, 태블릿 메뉴-->
        <nav id="mobileMenu">
            <a href="javascript:void(0);" class="icon menu">
                <img class="menuButton" src="./images/icon/header_mobile_menu.png">
            </a>
            <!--사이드 메뉴-->
            <div class="sideMenu_wrap">
                <div class="sideMenu">
                    <div class="side_icon">
                        <a href="javascript:void(0);" class="icon close">
                            <img class="closeButton" src="./images/icon/header_mobile_close.png">
                        </a>

                        <a href="javascript:void(0);" class="icon search">
                            <img class="searchButton" src="./images/icon/header_search.png">
                        </a>
                    </div>

                    <div class="side_link">
                        <?php
                            if(!$userid) {
                        ?>
                            <span><a href="./loginForm.php"> 로그인 </a></span>
                            <span><a href="./signupForm.php"> 회원가입 </a></span>

                        <?php
                            }

                            else {
                                $logged = $username."님(".$userid.")";
                        ?>
                            <span> <a href="./memberModifyForm.php"> <?= $logged ?> </a> </span>
                            <span> <a href="./logout.php"> 로그아웃 </a> </span>
                        <?php
                            }

                            // 최고관리자로 로그인했다면(레벨1) 관리자 모드 메뉴 보여주기
                            if($userid=='admin') {
                        ?>
                            <span> <a href="admin.php"> 관리자 모드 </a> </span>
                        <?php
                            }
                        ?>
                    </div>

                    <div class="side_menu">
                        <ul>
                            <li>
                                <button class="side_menuList" type="button">
                                    <a href="javascript:void(0);"> 백화점 안내 </a>
                                </button>
                                
                                <div class="side_dropMenu">
                                    <ul>
                                        <a href="detail.html"><li> 프라자점 안내 </li></a>
                                        <a href="#"><li> 층별 안내 </li></a>
                                        <a href="#"><li> 편의 시설 </li></a>
                                        <a href="#"><li> 찾아오시는 길 </li></a>
                                    </ul>
                                </div>
                            </li>
        
                            <li>
                                <button class="side_menuList" type="button">
                                    <a href="javascript:void(0);"> 쇼핑정보 </a>
                                </button>
        
                                <div class="side_dropMenu">
                                    <ul>
                                        <a href="#"><li> 쇼핑뉴스 </li></a>
                                        <a href="#"><li> 이벤트 </li></a>
                                        <a href="#"><li> 공지사항 </li></a>
                                    </ul>
                                </div>
                            </li>
        
                            <li>
                                <button class="side_menuList" type="button">
                                    <a href="javascript:void(0);"> 대백 브랜드 </a>
                                </button>
        
                                <div class="side_dropMenu">
                                    <ul>
                                        <a href="#"><li> 액티브 시니어 </li></a>
                                        <a href="#"><li> 해외 브랜드 </li></a>
                                    </ul>
                                </div>
                            </li>
        
                            <li>
                                <button class="side_menuList" type="button">
                                    <a href="javascript:void(0);"> 아트 & 컬쳐 </a>
                                </button>
        
                                <div class="side_dropMenu">
                                    <ul>
                                        <a href="#"><li> 문화센터 </li></a>
                                        <a href="#"><li> 갤러리 </li></a>
                                        <a href="#"><li> 문화홀 </li></a>
                                        <a href="#"><li> 아트 & 컬쳐 소식 </li></a>
                                    </ul>
                                </div>
                            </li>
        
                            <li>
                                <button class="side_menuList" type="button">
                                    <a href="javascript:void(0);"> 고객 서비스 </a>
                                </button>
        
                                <div class="side_dropMenu">
                                    <ul>
                                        <a href="#"><li> VIP 클럽 </li></a>
                                        <a href="#"><li> 멤버십 </li></a>
                                        <a href="#"><li> 고객센터 </li></a>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="side_info">
                        <p> 영업시간 : 10:30 - 20:00 </p>
                        <p> 연장영업 : 10:30 - 20:30 </p>
                        <p> (금, 토, 일/공휴일) </p>
                        <p> 정기휴점 : 2022-10-17 </p>
                    </div>

                    <div class="side_sns">
                        <a href="https://blog.naver.com/debec_1944" target="_blank">
                            <span><img src="./images/icon/sns_blog.png" alt="블로그"></span>
                        </a>
                        <a href="https://www.instagram.com/debec365/" target="_blank">
                            <span><img src="./images/icon/sns_insta.png" alt="인스타"></span>
                        </a>
                        <a href="https://ko-kr.facebook.com/DEBEClover/" target="_blank">
                            <span><img src="./images/icon/sns_facebook.png" alt="페이스북"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="logo">
                <a href="index.php"><img class="logo" src="./images/icon/header_logo.png"></a>
            </div>

            <a href="javascript:void(0);" class="icon search">
                <img class="searchButton" src="./images/icon/header_search.png">
            </a>
        </nav>

        <!--PC 메뉴-->
        <nav id="pcMenu">
            <div class="logo">
                <a href="index.php"><img class="logo" src="./images/icon/header_logo.png"></a>
            </div>

            <section class="menu">
                <div class="pcMenu">
                    <button class="tablinks" onmouseover="dropMenu(event, 'info')"> 백화점 안내 </button>
                    <button class="tablinks" onmouseover="dropMenu(event, 'shop')"> 쇼핑 정보 </button>
                    <button class="tablinks" onmouseover="dropMenu(event, 'brand')"> 대백브랜드 </button>
                    <button class="tablinks" onmouseover="dropMenu(event, 'art')"> 아트 & 컬쳐 </button>
                    <button class="tablinks" onmouseover="dropMenu(event, 'service')"> 고객서비스 </button>
                </div>
            
                <div id="info" class="dropMenu">
                    <ul>
                        <li><a href="detail.html"> 프라자점 안내 </a></li>
                        <li><a href="#"> 층별 안내 </a></li>
                        <li><a href="#"> 편의시설 </a></li>
                        <li><a href="#"> 찾아오시는 길 </a></li>
                    </ul>
                </div>
            
                <div id="shop" class="dropMenu">
                    <ul>
                        <li><a href="#"> 쇼핑뉴스 </a></li>
                        <li><a href="#"> 이벤트 </a></li>
                        <li><a href="#"> 공지사항 </a></li>
                    </ul>
                </div>
            
                <div id="brand" class="dropMenu">
                    <ul>
                        <li>
                            <a href="#"> 액티브 시니어 </a>
                            <ul>
                                <li><a href="#"> 어울마당 </a></li>
                                <li><a href="#"> 시니어 온라인 상품 </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> 해외브랜드 </a>
                            <ul>
                                <li><a href="#"> 로레나 안토니아찌 </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            
                <div id="art" class="dropMenu">
                    <ul>
                        <li>
                            <a href="#"> 문화센터 </a>
                            <ul>
                                <li><a href="#"> 문화센터 소개 </a></li>
                                <li><a href="#"> 수강관리 </a></li>
                                <li><a href="#"> 수강신청&#183;검색 </a></li>
                                <li><a href="#"> 추천&#183;신설 강좌 </a></li>
                                <li><a href="#"> 회원문의/제안 </a></li>
                                <li><a href="#"> 강좌지원 </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> 갤러리 </a>
                            <ul>
                                <li><a href="#"> 갤러리 소개 </a></li>
                                <li><a href="#"> 전시안내 </a></li>
                                <li><a href="#"> 대관안내 </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> 문화홀 </a>
                            <ul>
                                <li><a href="#"> 프라임홀 </a></li>
                                <li><a href="#"> 레오문화홀 </a></li>
                                <li><a href="#"> 대관안내 </a></li>
                            </ul>
                        </li>
                        <li><a href="#"> 아트&컬쳐 소식 </a></li>
                    </ul>
                </div>
            
                <div id="service" class="dropMenu">
                    <ul>
                        <li>
                            <a href="#"> VIP 클럽 </a>
                            <ul>
                                <li><a href="#"> 선정기준 안내 </a></li>
                                <li><a href="#"> 혜택 안내 </a></li>
                                <li><a href="#"> VIP 카드 </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> 멤버십 </a>
                            <ul>
                                <li><a href="#"> 포인트 </a></li>
                                <li><a href="#"> 카드 </a></li>
                                <li><a href="#"> 상품권 </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> 고객센터 </a>
                            <ul>
                                <li><a href="#"> 자주묻는 질문 </a></li>
                                <li><a href="#"> 상담실 안내 </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </section>

            <div class="rightSide">
                <div class="rightSide_link">
                    <?php
                        if(!$userid) {
                    ?>
                        <span><a href="./loginForm.php"> 로그인 </a></span>
                        <span><a href="./signupForm.php"> 회원가입 </a></span>
                    <?php
                        }

                        else {
                            $logged = $username."님(".$userid.")";
                    ?>
                        <span> <a href="./memberModifyForm.php"> <?= $logged ?> </a> </span>
                        <span> <a href="./logout.php"> 로그아웃 </a> </span>
                    <?php
                        }

                        // 최고관리자로 로그인했다면(레벨1) 관리자 모드 메뉴 보여주기
                        if($userid=='admin') {
                    ?>
                        <span> <a href="admin.php"> 관리자 </a> </span>
                    <?php
                        }
                    ?>
                </div>

                <a href="javascript:void(0);" class="icon search">
                    <img class="searchButton" src="./images/icon/header_search.png">
                </a>
            </div>
        </nav>
    </header>


    <!--JS jQuery 플러그인-->
    <script src="js/jquery-3.6.1.js"></script>

    <script>
        // 모바일, 태블릿 버전에서 사이드 메뉴
        $(document).ready(function() {
            let toggle = $('a.menu');
            let x = $('a.close');
            let sideMenu = $('div.sideMenu');
            let list = $('button.side_menuList');

            // 토글 버튼 누르면 사이드 메뉴 나타남
            $(toggle).on('click', function(){
                sideMenu.show().animate({
                    left: 0
                });
                $(".sth").css("display", "block");
                $(".sth").css("background-color", "rgba(0,0,0,0.8)");
                $("body").css("overflow-y", "hidden");
            });

            // X 버튼 누르면 사이드 메뉴 사라짐
            $(x).on('click', function(){
                sideMenu.animate({
                    left: '-' + 80 + '%'
                },
                function(){
                    sideMenu.hide();
                });
                $(".sth").css("display", "none");
                $("body").css("overflow-y", "scroll");
            });

            // 사이드 메뉴 - 드롭다운 메뉴
            $(list).click(function(){
                let dropMenu = $(this).next();
                dropMenu.slideToggle();
            });
        });

            // 사이드 메뉴 - 드롭다운 버튼 방향 바꾸기
            let menuList = document.getElementsByClassName("side_menuList");
            let i;

            for (i = 0; i < menuList.length; i++) {
                menuList[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                });
            };
    </script>


    <script>
        // PC 버전에서 드롭메뉴
        // 내비게이션 메뉴에 마우스오버시 하위메뉴 나타남
        function dropMenu(evt, section) {
            let i, tablinks, dropMenu;

            dropMenu = document.getElementsByClassName("dropMenu");
            for (i = 0; i < dropMenu.length; i++) {
                dropMenu[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(section).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // 내비게이션 메뉴에서 마우스를 뗄 때 하위메뉴 사라짐
        $("section.menu").mouseleave(function(){
            $("div.dropMenu").css("display", "none");
            $("button.tablinks").removeClass("active");
        });
    </script>


    <script>
        // 스크롤 내릴 때 내비 메뉴가 사라지고, 스크롤 올릴 때 내비 메뉴가 나타남
        var prevScrollpos = window.pageYOffset;

        window.onscroll = function() {

        var currentScrollPos = window.pageYOffset;

        if (prevScrollpos > currentScrollPos) {
            document.getElementsByTagName("header")[0].style.top = "0";
        } else {
            document.getElementsByTagName("header")[0].style.top = "-100px";
        }
        prevScrollpos = currentScrollPos;
        }
    </script>