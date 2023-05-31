
<?php
    $id = $_POST["id"];
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
    $sql = "insert into members(id, pw, name, phone, email, postnum, address,
                                membership, email_marketing, sms_marketing, kakao_marketing) ";
    $sql .= "values('$id', '$pw', '$name', '$phone', '$email', '$postnum', '$addr',
                    '$membership', '$marketing_email', '$marketing_sms', '$marketing_kakao')";

    mysqli_query($con, $sql);
    mysqli_close($con);


    echo "<script>
	          location.href = 'loginForm.php';
	      </script>";
?>