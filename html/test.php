<!-- http://localhost/database-project/html/test.php -->
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
      
      if(isset($_POST['button1'])) {
          echo "This is Button1 that is selected";
      }
      if(isset($_POST['button2'])) {
          echo "This is Button2 that is selected";
      }
      else{
          echo "no selected";
      }
      echo ($_POST['authority']);

  ?>

</html>