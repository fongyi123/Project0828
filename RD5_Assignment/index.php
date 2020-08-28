<?php 

session_start();
if (isset($_SESSION["uid"])){
  $userName = $_SESSION["uid"];
}  
else{
  $userName = "Guest";
}
if (isset($_GET["login"])){
  header("Location: login.php");
  exit();
}
if (isset($_GET["logout"])){

  header("Location: index.php");
  exit();
}

if (isset($_GET["savings"])){
  header("Location: savings.php");
  exit();
}
if (isset($_GET["withdrawal"])){
  header("Location: withdrawal.php");
  exit();
}
if (isset($_GET["secret"])){
  header("Location: secret.php");
  exit();
}

// if (isset($_COOKIE["uid"])){
//   $userName = $_COOKIE["uid"];
// }  
// else{
//   $userName = "Guest";
// } 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
body {
  background-color: lightblue;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
</head>
<body>
<h1 align="center">線上網銀系統</h1>


<form  width="100%" height="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2" style="background-color:Violet;">
  
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;" ><font color="#FFFFFF" >會員系統 - 首頁</font>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
     
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php if ($userName == "Guest") { ?>
      <input name="login" type="submit" class="btn btn-primary" color="white" value="登入"></input>
      <?php } else { ?>
      <input name="logout" type="submit" class="btn btn-primary" value="登出"></input>
      <?php } ?>
      <input name="savings" type="submit" class="btn btn-primary" href="savings.php" value="存款"></input>    
      <input name="withdrawal" type="submit" class="btn btn-primary" href="withdrawal.php" value="提款"></input>
      <input name="secret" type="submit" class="btn btn-primary" href="secret.php" value="各項資訊查詢"></input>
    </div>
    <div style="background-color:SlateBlue;"><font color="#FFFFFF" ><?= "Welcome! " .$userName ?></font></div>

  </div>
  
</form>




















<!-- <table width="100%" height="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2" style="background-color:Violet;">
  
  <tr>
  <?php if ($userName == "Guest") { ?>
    
    <td align="center"><font color="#FFFFFF"><a href="login.php"><font color="#FFFFFF">登入</a> |
    <?php } else { ?>
    <td align="center"><a href="login.php?logout=1"><font color="#FFFFFF">登出</a> | 
    <?php } ?>   
    <a href="savings.php"><font color="#FFFFFF">存款</a> |
    <a href="withdrawal.php"><font color="#FFFFFF">提款</a> |
    <a href="secret.php"><font color="#FFFFFF">各項資訊查詢</a></td>
  </tr>
  
</table> -->



</body>


</html>