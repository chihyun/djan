<?php
require_once 'head.php';

//變數
$smarty->assign("item0","關於我們");
$smarty->assign("item1","主題");
$smarty->assign("item2","聯絡我們");
/*---- 程式結尾-----*/
$smarty->display('theme.tpl');
?>