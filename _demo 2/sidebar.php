<?php 
$sUserName = "";
$error = "";
$seller = 'seller';
$admin = 'admin';

?>

<div id="mySidebar" class="sidebar">
<!-- Add welcome message here. -->
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>


<?php if ($_SESSION['AorS'] === 0) { ?>
    <a href="#">會員管理</a>   
    <a href="#">廠商管理</a> 
<?php } elseif ($_SESSION['AorS'] === 1) {  ?>
    <a href="#">訂單管理</a>
    <a href="#">商品管理</a>
    <a href="#">資料管理</a> 
    <a href="#">行銷管理</a>
<?php  } ?>
</div>
