<!--localhost/database-project/html/2.1.1_check.php -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	
	<h1 align="center">結帳
		<input type="button" value="上一頁" />
	</h1>
	<form method="post">
	<table id = "table" width="500" border="1" bgcolor="#cccccc" align="center">
	<tr>
		<th colspan="2">
			<label for="rows" >品項數</label>
			<input name="rows" type="text" value="1" onclick="insertRow()"/>
			<input type="submit" value="設定品項數" name="setRows" />
		</th>
	</tr>    
	
</body>
<?php
      if(isset($_POST['setRows'])) {
		$rows = $_POST['rows'];
		for(i)
		echo "This is Button1 that is selected";
	}

	echo('	  
	<tr>
		<th >商品編號<input type="text" name="product"/></th>
		<th >數量<input type="text" name="amount"/></th>
	</tr>
	');
	echo('</form>');
?>
</html>
