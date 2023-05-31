
<?php
    $id = $_GET["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email1 = $_POST["email"];
    $email2 = $_POST["email_domain"];
    $email = $email1."@".$email2;
    $postnum = $_POST["postnum"];
    $address = $_POST["address"];
    $detailAdd = $_POST["detailAdd"];
    $addr = $address.",".$detailAdd;
    $membership = $_POST["membership"];
    $marketing_email = $_POST["marketing_email"];
    $marketing_sms = $_POST["marketing_sms"];
    $marketing_kakao = $_POST["marketing_kakao"];

    $con = mysqli_connect("localhost", "hjk9354", "wjddl4519!", "debec");
    $sql = "update members set pw='$pw', name='$name', phone='$phone', email='$email', postnum='$postnum', address='$addr',
                                membership='$membership', email_marketing='$marketing_email', sms_marketing='$marketing_sms', kakao_marketing='$marketing_kakao'";
    $sql .= " where id = '$id'";

    mysqli_query($con, $sql);
    mysqli_close($con);


    session_start();
    $_SESSION["username"] = $name;

    echo (
        "<script>
            location.href = 'index.php';
        </script>"
    )
?>