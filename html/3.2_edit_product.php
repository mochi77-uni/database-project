<!--localhost/myProject/3.2_edit_product.html -->

<html>
<head>
	<title>編輯商品</title>
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
	
	<h1 align="center">編輯商品
		
	</h1>
	<!-- <form action="create.php" method="post">	 -->
	<table id="table" width="500" border="1" bgcolor="#cccccc" align="center">

		<tr >
			<th >商品名稱</th>
			<th >ID</th>
			<th >售價</th>
			<th >數量</th>
			<th >編輯商品</th>
			
		</tr>
		<tr >
			<td >商品A</td>
			<td >xxxxxxx</td>
			<td >xxxxxxx</td>
			<td >xxxxxxx</td>
			<td>
				<input type="button" value="修改"/>		
				<input type="button" value="作廢"/>		
			</td>
		</tr>
		<tr >
			<td >商品B</td>
			<td >xxxxxxx</td>
			<td >xxxxxxx</td>
			<td >xxxxxxx</td>
			<td>
				<input type="button" value="修改"/>		
				<input type="button" value="作廢"/>		
			</td>
		</tr>


	</table>
	<!-- </form> -->
	<div align="center">
		<input type="button" value="新增商品"/>
		<p></p>
		<input type="submit" value="上一頁(取消變更)" onclick='window.location.href="2_route.php"'/>

		<input type="submit" value="確定(確認變更)"/>
	</div>	
</body>
	
</html>
