<?php

echo '<div id="mySidebar" class="sidebar">';
echo '<!-- Add welcome message here. -->';
echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>';

$sUserName = "";
$error = "";
$seller = 'seller';
$admin = 'admin';

if ($_SESSION['AorS'] === 0) {
    echo ' <a href="#">會員管理</a>   ';
    echo ' <a href="#">廠商管理</a>   ';
} elseif ($_SESSION['AorS'] === 1) {
    echo ' <a href="#">訂單管理</a>  ';
    echo ' <a href="#">商品管理</a>   ';
    echo ' <a href="#">資料管理</a>  ';
    echo ' <a href="#">行銷管理</a>  ';

}
echo ' </div>';
