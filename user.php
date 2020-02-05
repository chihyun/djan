<?php
require_once 'head.php';

 
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_form', 'string');
// $sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
$loginMsg=null;
/* 程式流程 */
switch ($op){
  case "op_form" :
    // $msg = op_form();
    // header("location:index.php");//注意前面不可以有輸出
  break;
 
  case "login" :
    $msg = login();
    header("location:index.php");
  break;

  case "logout" :
    $msg=logout();
    header("location:index.php");
  break;
 
  default:
    
    break;  
}

/*---- 將變數送至樣版----*/
// $smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
$smarty->assign("loginMsg", $loginMsg);
/*---- 程式結尾-----*/
$smarty->display('user.tpl');

/*---- 函數區-----*/

function login(){
  global $smarty;
  global $loginMsg;
  $name="chihyun";
  $pass="111111";
  $token="xxxxxx";
  if($name==$_POST["name"]){
      if($pass==$_POST["pass"]){
        $_SESSION['chihyun']=true;
        $_POST['remember']=isset($_POST['remember'])?$_POST['remember']:"";//有記住我記得cookie資料
        if($_POST['remember']){
          setcookie("name",$name,time()+60*60*24*365);
          setcookie("token",$token,time()+60*60*24*365);
        }
        
      }else{
        $loginMsg= "密碼錯誤";
      }
  }else{
    $loginMsg= "沒有這個帳號";
  }
}

function logout(){
  session_destroy();//清空session資料
  setcookie("name","",time()-60*60*24*365);//清空cookie資料
  setcookie("token","",time()-60*60*24*365);//清空cookie資料
}

?>