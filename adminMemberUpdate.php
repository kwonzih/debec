
<?php
    // 관리자가 아닐 경우 회원정보 관리를 못하도록
    session_start();
    
    $userid = $_SESSION["userid"];

    if ( $userid != 'admin' ) {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 관리는 관리자만 가능합니다!');
            location.href = 'index.php';
            </script>
        ");
        exit;
    }

    // admin.php 에서 넘겨받은 value 값을 새 변수 선언해서 대입
    $num = $_GET['num'];
    $level = $_POST['level'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // 데이터베이스에 접속해서 sql을 전달해 해당값 수정
    $con = mysqli_connect("localhost", "hjk9354", "wjddl4519!", "debec");
    $sql = "update members set phone='$phone', email='$email', level=$level where num=$num";

    mysqli_query($con, $sql); 

    mysqli_close($con);

    echo("
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ");
?>