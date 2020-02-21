<?php
session_start();
if (isset($_GET["logout"])) {
    setcookie("username", "", time() - 3600);
    unset($_SESSION['AorS']);
}

//SESSION: stored in server.
// COOKIE: stored in client.
//setcookie("myData", $Data, time()+60*60*24);

//Return:
//admin  -->0
//seller -->1
//Invalid-->-1
function loginCheck($acc, $pwd)
{
    header("content-type:text/html; charset=utf-8");
    $link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
    $result = mysqli_query($link, "set names utf8");
    mysqli_select_db($link, "coffee");

    //Seller filter.
    $commandText = "select * from sellers";
    $result = mysqli_query($link, $commandText);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['sAccount'] == $acc && $row['sPassword'] == $pwd) {
            mysqli_close($link);
            $_SESSION["AorS"] = 1;
            return 1;
        } else {
            continue;
        }

    }

    //Admin filter.
    $commandText = "select * from admins";
    $result = mysqli_query($link, $commandText);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['aAccount'] == $acc && $row['aPassword'] == $pwd) {
            mysqli_close($link);
            $_SESSION["AorS"] = 0;
            return 0;
        } else {
            continue;
        }

    }

    //Invalid case:
    mysqli_close($link);
    return -1;
}

$sUserName = "";
$error = "";
$seller = 'seller';
$admin = 'admin';

if (isset($_POST["btnOK"])) {
    $sUserName = $_POST["txtacc"];
    $sPassword = $_POST["txtpwd"];
    //Empty contents shall not pass.
    if ($sPassword !== "" && $sUserName !== "") {
        if (loginCheck($sUserName, $sPassword) >= 0) {
            setcookie("username", $sUserName);
            header('Location: back.php');
        } else {
            $error = '帳號或密碼錯誤！';
        }
    } else {
        $error = '密碼或欄位不得為空白。';
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
