<!--localhost/database-project/html/2.1.1_check.php -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
    function insertRow() {
        var table = document.getElementById("table")
        // table.insertRow();
        var obj = table.insertRow(-1);
        obj.innerHTML = 
		'<th >'+
			'商品編號<input type="text" name="product[]"/>'+
		'</th>'+
		'<th >'+
			'數量<input type="text" name="amount[]"/>'+
		'</th>'
        console.log(obj.attributes)
    }
</script>

<body>
	
	<h1 align="center">結帳
		<input type="button" value="上一頁" onclick="window.history.go(-1)"/>
	</h1>
	<form method="post">
	<table id = "table" width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th colspan="2">
				<input type="submit" value="新增品項" onclick="insertRow()"/>
					<input type="submit" value="確定" />
			</th>
		</tr>    
		<tr>
				<th >商品編號<input type="text" name="product[]"/></th>
				<th >數量<input type="text" name="amount[]"/></th>
		</tr>
	</table>

</body>
<!-- <?php
	if(isset($_POST['submit'])) {
		foreach($_POST['product'] as $product){
			echo "<script>console.log('Debug Objects: " . $product . "' );</script>";
		}
	}
	else{

		if(isset($_POST['setRows'])) {
			$rows = $_POST['rows'];
		}
		else{
			$rows=1;
		}
		for($i=1; $i<=$rows; $i++){
			echo('	  
			<tr>
				<th >商品編號<input type="text" name="product[]"/></th>
				<th >數量<input type="text" name="amount"/></th>
			</tr>
			');
	}

		echo('</table>');
	}
?> -->

<div align="center">
	<p></p>
	<input type="submit" value="確定" name="submit" />
</div>
</form>
</html>
