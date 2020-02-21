<?php

echo '<div id="mySidebar" class="sidebar">';  
echo '<!-- Add welcome message here. -->';  
echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>';  
        
    $sUserName = "";
    $error = "";
    $seller = 'seller';
    $admin = 'admin';
            
    if (strpos($_SESSION["username"] , $admin) !== false) {
            echo ' <a href="#">會員管理</a>   ';
            echo ' <a href="#">廠商管理</a>   ';
        } elseif (strpos($_SESSION["username"] , $seller) !== false){
            echo ' <a href="#">訂單管理</a>  ';
            echo ' <a href="#">商品管理</a>   ';
            echo ' <a href="#">資料管理</a>  ';
            echo ' <a href="#">行銷管理</a>  ';                           
            
        }

       
echo ' </div>';  

?>