<?php
session_start();

//Prevents direct connection.
if ($_SESSION['username'] == '') {
    header('Location: index.php');
    //echo "<script type='text/javascript'>alert('請先登入！');</script>";
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
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Noto+Serif+TC&display=swap" rel="stylesheet">

    <!-- I edited these stuffs.-->
    <link rel="stylesheet" type="text/css" href="demostyle.css">
    <script src="demoutil.js"></script>
</head>

<body>
    <div id="mySidebar" class="sidebar">
        <!-- Add logo here. -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">訂單管理</a>
        <a href="#">商品管理</a>
        <a href="#">資料管理</a>
        <a href="#">行銷管理</a>
    </div>

    <div id="main">
        <button class="openbtn" id='openbtn' onclick="openNav()">☰ 展開選單</button>
        <button class='outbtn' id='logout' onclick='logout()'>登出</button>
        <h3 style="float: right;">Hello, <?php print_r($_SESSION['username']);?></h3>
    </div>

    <footer>
        <p>Powered by: MFEE06<br>
            Contact information: <a href="mailto:someone@example.com">
                someone@example.com</a>.</p>
    </footer>
</body>