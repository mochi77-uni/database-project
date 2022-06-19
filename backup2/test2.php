<!-- http://localhost/database-project/html/test2.php -->
<!DOCTYPE html>
<html>
      
<head>
    <title>
        How to call PHP function
        on the click of a Button ?
    </title>
</head>
  
<body style="text-align:center;">
      
    <form method="post">
        <input type="submit" name="button1"
                value="Button1"/>
          
        <input type="submit" name="button2"
                value="Button2"/>
        <input type="radio" name="authority" value="0" >一般店員
        <input type="radio" name="authority" value="1">管理者

    </form>

      
</head>
<?php
    $arr=array(1,2,3);
    session_start();
    $_SESSION["arr"]=$arr;
    $url = "test.php";
    header("Location:$url" );
?>

</html>