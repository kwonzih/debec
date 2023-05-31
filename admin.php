
<?php
    // 관리자가 아닐 경우 페이지 접근을 막기
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> 관리자 페이지 </title>

    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>

<body>
    <?php include "header.php";?>

    <!--관리자모드 섹션-->
    <section>
        <div id="admin_box">
            <h3 id="member_title">
                관리자 모드 > 회원 관리
            </h3>

            <ul id="member_list">
                <!-- member 테이블의 필드명 출력하기 -->
                <li>
					<span class="col1"> 번호 </span>
					<span class="col2"> 아이디 </span>
					<span class="col3"> 이름 </span>
					<span class="col4"> 레벨 </span>
					<span class="col5"> 연락처 </span>
					<span class="col6"> 이메일 </span>
					<span class="col7"> 수정 </span>
					<span class="col8"> 삭제 </span>
				</li>

                <!-- 데이터베이스 연동 변수값 불러오기, 사용자가 입력 가능한 form 태그 사용 -->
                <?php
                // 1. 데이터베이스에 접속해라(호스트명, 사용자명, 암호, db명)
                $con = mysqli_connect("localhost", "hjk9354", "wjddl4519!", "debec");
                // 2. 회원 정보가 있는 members 테이블의 내용을 보여달라
                $sql = "select * from members order by num desc";
                // 접속 정보와 쿼리를 이용해 데이터베이스 쿼리 실행
                $result = mysqli_query($con, $sql);
                // 3. 테이블에 내용이 있다면 해당하는 행의 갯수를 알아내라
                $total_record = mysqli_num_rows($result);
                // 4. 해당하는 행의 갯수를 알아내서 그 갯수만큼 반복해서 행 단위로 필드값을 불러와라
                $number = $total_record; // 화면에 출력할 번호
                while ($row = mysqli_fetch_array($result)) {
                        $num = $row["num"];
                        $id = $row["id"];
                        $name = $row["name"];
                        $level = $row["level"];
                        $phone = $row["phone"];
                        $email = $row["email"];
                ?>
                <li>
                    <form method="post" action="adminMemberUpdate.php?num=<?= $num ?>">
                    <span class="col1"> <?= $num ?> </span>
					<span class="col2"> <?= $id ?> </span>
					<span class="col3"> <?= $name ?> </span>
					<span class="col4"> <input type="text" name="level" value="<?= $level ?>"> </span>
					<span class="col5"> <input type="text" name="phone" value="<?= $phone ?>"> </span>
					<span class="col6"> <input type="text" name="email" value="<?= $email ?>"> </span>
					<span class="col7"> <button type="submit"> 수정 </button> </span>
					<span class="col8"> <button type="button" onclick="location.href='adminMemberDelete.php?num=<?= $num ?>'"> 삭제 </span>
                    </form>
                </li>
                <?php
                    // 반복문 실행할 때마다 $number 값 1씩 감소
                    $number--;
                }
                mysqli_close($con);
                ?>
            </ul>
        </div>
    </section>

    <?php include "footer.php";?>
</body>
</html>