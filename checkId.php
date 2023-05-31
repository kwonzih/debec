<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> 아이디 중복 확인 </title>

    <style>
        * {
            text-align: center;
        }

        h3 {
            margin-top: 30px;
        }

        li {
            list-style: none;
            margin-top: 30px;
        }

        .close {
            margin-top: 30px;
        }

        button {
            border: none;
            outline: none;
            background-color: black;
            color: white;
            cursor: pointer;
            width: 80px;
            height: 30px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <h3> 아이디 중복 확인 </h3>

    <p>
        <?php
            $id = $_GET["id"];

            if(!$id) {
                echo("<li> 아이디를 입력해주세요. </li>");
            }

            else {
                $con = mysqli_connect("localhost", "hjk9354", "wjddl4519!", "debec");
                $sql = "select * from members where id='$id'";
                $result = mysqli_query($con, $sql);
                $num_record = mysqli_num_rows($result);

                if($num_record) {
                    echo "<li>".$id." 아이디는 사용할 수 없는 아이디입니다.</li>";
                }
                else {
                    echo "<li>".$id." 아이디는 사용 가능합니다.</li>";
                }

                mysqli_close($con);
            }
        ?>
    </p>

    <div class="close">
        <button onclick="javascript:self.close()"> 닫기 </button>
    </div>
</body>
</html>