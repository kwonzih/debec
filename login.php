<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    $id = $_POST["id"];
    $pw = $_POST["pw"];

    $con = mysqli_connect("localhost", "hjk9354", "wjddl4519!", "debec");
    $sql = "select * from members where id = '$id'";
    
    $result = mysqli_query($con, $sql);
    $num_match = mysqli_num_rows($result);


    if(!$num_match) {
        echo (
            "<script>
                window.alert('등록되지 않은 아이디입니다.')
                history.go(-1)
            </script>"
        );
    }

    else {
        $row = mysqli_fetch_array($result);
        $db_pw = $row["pw"];
        mysqli_close($con);

        if($pw != $db_pw) {
            echo (
                "<script>
                    window.alert('비밀번호가 틀렸습니다.')
                    history.go(-1)
                </script>"
            );
            exit;
        }

        else {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];

            echo (
                "<script>
                    location.href = 'index.php';
                </script>"
            );
        };
    };
?>
</body>
</html>