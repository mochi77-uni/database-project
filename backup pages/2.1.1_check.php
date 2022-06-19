<!--localhost/database-project/html/2.1.1_check.php -->

<html>
<head>
	<title>結帳</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
	var row=1
    function insertRow() {
        var table = document.getElementById("table")
        // table.insertRow();
        var obj = table.insertRow(-1);
		var a=0
        obj.innerHTML = '<th>'+row+'</th>'
		// '<th >'+
		// 	'商品編號<input type="text" name="product"/>'+
		// '</th>'+
		// '<th >'+
		// 	'數量<input type="text" name="amount"/>'+
		// '</th>'
        console.log(obj.attributes)
    }
</script>

<body>
	
	<h1 align="center">結帳
		<input type="submit" value="上一頁"/>
	</h1>
	<?php

	?>
	  <table id = "table" width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
            <th colspan="2">
				<input type="submit" value="新增品項" onclick="insertRow()"/>
				<input type="submit" value="確定" />
            </th>
        </tr>    
		<tr>
            <th >商品編號<input type="text" name="product"/></th>
            <th >數量<input type="text" name="amount"/></th>
        </tr>
	  </table>
	
</body>
	
</html>
