
<?php
    include_once dirname(__FILE__)."/socialLoginConfig.php";

    session_start();
    $accessToken = $_SESSION["accessToken"];
    $result = naverLogout($accessToken);
    $result = unlinkLogout($accessToken);

    unset($_SESSION["userid"]);
    unset($_SESSION["username"]);
    unset($_SESSION["accessToken"]);

    echo (
        "<script>
            localStorage.setItem('token', '$result');
            location.href = 'index.php'
        </script>"
    );
?>