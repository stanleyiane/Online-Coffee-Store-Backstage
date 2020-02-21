<?php
session_start();
unset($_SESSION['username']);
// Fake login:
// If account contains 'admin' ^ 'seller':
// Redirect to corresponded page.
// If invalid ^ no pwd: error message.
$sUserName = "";
$error = "";
$seller = 'seller';
$admin = 'admin';

if (isset($_POST["btnOK"])) {
    $sUserName = $_POST["txtacc"];
    $sPassword = $_POST["txtpwd"];
    if ($sPassword !== "") {
        if (strpos($sUserName, $admin) !== false) {
            //Redirect to admin.
            $_SESSION["username"] = $sUserName;
            header('Location: index_admin.php');
        } else if (strpos($sUserName, $seller) !== false) {
            //Redirect to seller
            $_SESSION["username"] = $sUserName;
            header('Location: index_seller.php');
        } else {
            $error = '無效帳號！';
            //echo "<script type='text/javascript'>alert('無效帳號！');</script>";
        }
    } else {
        $error = '密碼欄位不得為空白。';
        //echo "<script type='text/javascript'>alert('密碼欄位不得為空白。');</script>";
        // header("Refresh:0");
        // header('Location: index.php');
        // exit();
    }
}
?>

<!DOCTYPE html>
<title>管理後台</title>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- include Bootstrap 4: cdn-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- I edited these stuffs.-->
    <link rel="stylesheet" type="text/css" href="demostyle.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Noto+Serif+TC&display=swap" rel="stylesheet">
    <script src="demoutil.js"></script>
</head>

<body>
    <form method='post' action="index.php" class='login card p-5'>
        <div class="form-group">
            <label for="account">輸入帳號:</label>
            <input type="text" class="form-control" name='txtacc' placeholder="Enter account" id="acc">
        </div>
        <div class="form-group">
            <label for="pwd">輸入密碼:</label>
            <input type="password" class="form-control" name='txtpwd' placeholder="Enter password" id="pwd">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> 記得我
            </label>
        </div>
        <!--Fake login: -->
        <button type="submit" name="btnOK" class="btn btn-primary">登入</button>
        <span id='error'><?php print_r($error);?></span>
    </form>
</body>
