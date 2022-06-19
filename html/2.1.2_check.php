<!--localhost/myProject/2.1.2_check.html -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script lang="JavaScript">
	function setTable(){
		var table = document.getElementById("table")
		var obj = table.insertRow(-1);
		obj.innerHTML = 
		'<th >商品<input type="text" name="product"/></th>'+
		'<th >數量<input type="text" name="amount"/></th>'

	}
</script>

<body>
	
	<h1 align="center">結帳
		<input type="submit" value="上一頁"/>
	</h1>
	<!-- <form action="create.php" method="post">	 -->
	<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">
	<th >商品名稱: abc</th>  
	<th >數量:1</th>
	<th >金額:333</th>
	</table>
	<div align="center">
		<p>最終金額<input type="text" name="amount"/></p>
		<p>
			<input type="radio" id="card" name="payment"/><label for="card">刷卡</label>
			<input type="radio" id="cash" name="payment"/><label for="cash">現金</label>
		</p>
		<input type="submit" value="確定"/>


	</div>
	</form>
	
</body>
	
</html>
